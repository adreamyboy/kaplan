<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set("memory_limit", "10056M");
set_time_limit(0);

ini_set('mysql.connect_timeout', '0');
ini_set('max_execution_time', '0');
error_reporting(E_ALL);
	class TrackPaymentLink
	{
		public function getReports($date_from, $date_to, $assignedUser, $currentUser,$filter)
		{
			global $db;
			global $sugar_config;
			$filterData = "";
			$newDateFrom = "";
			$newDateTo = "";
			$user = "";
			$resDataArray = [];
			$resAllDataArray = [];
			$finalResult = [];

			$siteUrl = $sugar_config['site_url'];
			if ($filter != 'false') {
				if ($assignedUser != '') {

					$user = " AND opportunities.assigned_user_id = '".$assignedUser."'";
				}else{
					$user = "";
				}
				$newDateFrom = $date_from;
				$newDateTo = $date_to;

				// Check If any filter present for current user
				$filterData = $this->getFiltersForCurrentUser($currentUser);
				if (gettype($filterData) == 'array') {
					// Update Filter
					$updateFilter = $this->createNewFilter("UpdateFilter",$date_from, $date_to, $assignedUser,$currentUser);
					$filterData = $this->getFiltersForCurrentUser($currentUser);
					$finalResult['Filter'] = $filterData;
				}else{
					// Create Filter
					$createNewFilter = $this->createNewFilter("CreateNewFilter",$date_from, $date_to, $assignedUser,$currentUser);
					$filterData = $this->getFiltersForCurrentUser($currentUser);
					$finalResult['Filter'] = $filterData;
				}
			}else{
				$filterData = $this->getFiltersForCurrentUser($currentUser);
				if (gettype($filterData) == 'array') {
					if ($filterData['assigned_user_id'] != '') {
						$user = " AND opportunities.assigned_user_id = '".$filterData['assigned_user_id']."'";
					}else{
						$user = "";
					}					
					$newDateFrom = str_replace("-", "/", explode(" ", $filterData['from_date'])[0]);
					$newDateTo = str_replace("-", "/", explode(" ", $filterData['to_date'])[0]);

					$finalResult['Filter'] = $filterData;
				}else{
					$user = '';
					$newDateFrom = $date_from;
					$newDateTo = $date_to;
					$finalResult['Filter'] = false;
				}
			}
			$query = "
				SELECT
					opportunities.id,
					opportunities.name AS 'InvoiceNumber',
					opportunities.date_closed AS 'InvoicedDate',
					opportunities_cstm.quote_valid_until_c AS 'QuoteValidUntil',
					opportunities.amount AS 'InvoiceValue',
					opportunities.edit_amount AS 'PaymentLinkValue',
					opportunities_cstm.total_payments_c AS 'ReceivedAmount',
					opportunities_cstm.total_unpaid_c AS 'PendingAmount',
					opportunities.payment_link_sent_date AS 'PaymentLinkSentDate'
				FROM 
					opportunities
				LEFT JOIN
					opportunities_cstm ON opportunities.id = opportunities_cstm.id_c AND opportunities.deleted = 0
                WHERE
					(opportunities.date_closed BETWEEN '".$newDateFrom."' AND '".$newDateTo."')
					".$user.";
			";
			$result = $db->query($query);			
			if ($result->num_rows > 0){				
				while ($row = $db->fetchByAssoc($result)){			
					array_push($resDataArray, $row);
				}
				$finalResult['data'] = $resDataArray;
				$finalResult['siteUrl'] = $siteUrl;
			}else{
				$finalResult['Error'] = true;
				$finalResult['Message'] = 'No data found!';
			}
            echo json_encode($finalResult);
		}
		public function getFiltersForCurrentUser($currentUser){
			global $db;
			$query = "
				SELECT
					payment_link_tracking.from_date,
					payment_link_tracking.to_date,
					payment_link_tracking.assigned_user_id,
					CONCAT(users.first_name,' ',users.last_name) AS 'name'
				FROM 
					genesisr_sugarcrm.payment_link_tracking		
				LEFT JOIN 
					users ON users.id = payment_link_tracking.assigned_user_id		
                WHERE
					payment_link_tracking.current_user_id ='".$currentUser."'";
			$result = $db->query($query);
			if ($result->num_rows > 0){				
				while ($row = $db->fetchByAssoc($result)){			
					return $row;
				}
			}else{
				return 'false';
			}			
		}
		public function getAssignedUsers()
		{
			global $db;
			$query = "
				SELECT 
					DISTINCT(opportunities.assigned_user_id),
				    concat(users.first_name,' ',users.last_name) AS 'AssignedUser'
				FROM 
					opportunities
				LEFT JOIN 
					users ON users.id = opportunities.assigned_user_id
				WHERE 
					opportunities.deleted = 0
				    AND opportunities.assigned_user_id != '';
			";
			$result = $db->query($query);	
			$resDataArray = [];
			if ($result->num_rows > 0){				
				while ($row = $db->fetchByAssoc($result)){			
					array_push($resDataArray, $row);
				}
			}else{
				$resDataArray['Error'] = true;
				$resDataArray['Message'] = 'No users found!';
			}
			echo json_encode($resDataArray);
		}
        public function createNewFilter($reqType,$date_from, $date_to, $assignedUser,$currentUser){
        	global $db;
        	$date_from = $date_from." 00:00:00";
        	$date_to = $date_to." 00:00:00";
        	if ($reqType == "CreateNewFilter") {
	            $query = "
	            	INSERT INTO 
	            		genesisr_sugarcrm.payment_link_tracking 
	            		(
	            			`id`,
	        				`from_date`,
	        				`to_date`,
	        				`assigned_user_id`,
	        				`current_user_id`,
	        				`deleted`
	            		)
					VALUES 
					(
						UUID(),
						'".$date_from."',
						'".$date_to."', 
						'".$assignedUser."', 
						'".$currentUser."', 
						0
					);
				";
				if ($result = $db->query($query)) {
					return true;
				}else{
					return false;
				}
        	}else if ($reqType == "UpdateFilter") {
	            $query = "
	            	UPDATE genesisr_sugarcrm.payment_link_tracking SET
        				`from_date` = '".$date_from."',
        				`to_date` = '".$date_to."', 
        				`assigned_user_id` = '".$assignedUser."'
        			WHERE
        				payment_link_tracking.current_user_id = '".$currentUser."';					
				";
				$result = $db->query($query);
        	}           
        }
	}
	$tpl = new TrackPaymentLink;
	if (isset($_POST['FromDate']) && strlen(trim($_POST['FromDate'])) > 0) {
		if (isset($_POST['ToDate']) && strlen(trim($_POST['ToDate'])) > 0) {return $tpl->getReports($_POST['FromDate'],$_POST['ToDate'],$_POST['AssignedUser'],$_POST['currentUser'],$_POST['filter']);
		}
	}
	if (isset($_POST['getAssignedUsers'])) {
		$tpl->getAssignedUsers();
	}
?>