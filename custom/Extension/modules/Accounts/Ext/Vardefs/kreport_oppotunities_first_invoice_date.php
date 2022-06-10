<?php

$dictionary['Account']['fields']['first_invoice_date'] = array(
	'name' => 'first_invoice_date',
	'vname' => 'LBL_FIRST_INVOICE_DATE',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'int',
	'eval' => array(
		'presentation' => array(
			'eval' => '
				SELECT
					MIN(opp.date_closed)
				FROM
					accounts acc 
				LEFT JOIN
					accounts_cstm as acc_c  
					ON acc.id = acc_c.id_c  
				INNER JOIN
					accounts_opportunities acc_opp 
					ON acc.id=acc_opp.account_id 
					AND acc_opp.deleted=0 
				INNER JOIN
					opportunities opp 
					ON opp.id=acc_opp.opportunity_id 
					AND opp.deleted=0 
				LEFT JOIN
					opportunities_cstm as opp_c 
					ON opp.id = opp_c.id_c 
				WHERE
					acc.deleted = "0" 
					AND opp.sales_stage IN (\'Closed Won\') 
					AND acc.id={t}.id 
				GROUP BY
					acc.id  
				ORDER BY
					acc.id ASC
			',
		),
	)
);

