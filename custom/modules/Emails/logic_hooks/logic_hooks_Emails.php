<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/gi_functions_custom.php');

class logic_hooks_Emails {

	function after_save_method($bean, $event, $arguments) {
		
		// When an activitiy is added, update the opportunity's first/last/next activities & their dates
		$link = 'opportunities';
		if ($bean->load_relationship($link)) {
			$collection = $bean->$link->getBeans();
			if (count($collection) > 0) {
				$opportunity = current($collection);
				$opportunity->save();
			}
		}
		
		
		// Process email-to-lead
		$link = 'leads';
		if ($bean->load_relationship($link)) {
			$collection = $bean->$link->getBeans();
			if (count($collection) == 0) {
				
				// Handle Laimoon.com leads
				if ($bean->from_addr == 'help@laimoon.com' && 
					(strpos($bean->name, 'New Callback Inquiry from Laimoon') === 0 || 
					 strpos($bean->name, 'New Lead') === 0 || 
					 strpos($bean->name, 'New Corporate Callback Inquiry') === 0 || 
					 strpos($bean->name, 'New RFP Enquiry') === 0 || 
					 strpos($bean->name, 'You have a new brochure download') === 0)
					) {
					
					$GLOBALS['log']->fatal('Laimoon - Email ID: ' . $bean->id);
					//$GLOBALS['log']->fatal("Email Description Plain: " . htmlspecialchars_decode($bean->description_html));
					
					$html = htmlspecialchars_decode($bean->description_html);
					
					if (strpos($bean->name, 'New Corporate Callback Inquiry') === 0) {
						
						//$pattern_email = "/<td>Email<\/td>\s*<td>:<\/td>\s*<td><a href='(.*?)'>(.*?)<\/a><\/td>/";
						//$pattern_message = "/<td width=\"561\" bgcolor=\"#b6d570\">(.*?)<\/td>/";
						$pattern_name = "/<td>Name<\/td>\s*<td>:<\/td>\s*<td>(.*?)<\/td>/";
						$pattern_phone = "/<td>Phone Number<\/td>\s*<td>:<\/td>\s*<td>(.*?)<\/td>/";
						$pattern_email = "/<td>Email<\/td>\s*<td>:<\/td>\s*<td>(.*?)<\/td>/";
						$pattern_message = "/<td>Message<\/td>\s*<td>:<\/td>\s*<td>(.*\n?)<\/td>/";
						
						$pattern_company = "/<td>Company<\/td>\s*<td>:<\/td>\s*<td>(.*?)<\/td>/";
						$pattern_subject = "/<td>Subject<\/td>\s*<td>:<\/td>\s*<td>(.*?)<\/td>/";
						$pattern_no_of_trainees = "/<td>Number of Staff to be trained<\/td>\s*<td>:<\/td>\s*<td>(.*?)<\/td>/";
						$pattern_preferred_date = "/<td>Preferred date<\/td>\s*<td>:<\/td>\s*<td>(.*?)<\/td>/";
						
					} elseif ((strpos($bean->name, 'New Lead') === 0) || (strpos($bean->name, 'New Callback Inquiry from Laimoon') === 0)) {
                    
						/*
                        $pattern_name = "/<td(.*?)>\s*<strong>Name:<\/strong>\s*<\/td>\s*<td(.*?)>(.*?)<\/td>/";
						$pattern_phone = "/<td(.*?)>\s*<strong>Phone:<\/strong>\s*<\/td>\s*<td(.*?)>(.*?)<\/td>/";
						$pattern_email = "/<td(.*?)>\s*<strong>Email:<\/strong>\s*<\/td>\s*<td(.*?)>(.*?)<\/td>/";
						$pattern_message = "/<td(.*?)>\s*<strong>Message:<\/strong>\s*<\/td>\s*<td(.*?)>(.*?)<\/td>/";
						
						$pattern_location = "/<td(.*?)>\s*<strong>Prefered Location:<\/strong>\s*<\/td>\s*<td(.*?)>(.*?)<\/td>/";
						$pattern_city = "/<td(.*?)>\s*<strong>Prefered City:<\/strong>\s*<\/td>\s*<td(.*?)>(.*?)<\/td>/";
                        */
                        
                        $pattern_name = '/<td(.*?)>\s*<small(.*?)>Name:<\/small>\s*<span(.*?)>(.*?)<\/span>\s*<\/td>/';
						$pattern_phone = '/<td(.*?)>\s*<small(.*?)>Phone:<\/small>\s*<span(.*?)>(.*?)<\/span>\s*<\/td>/';
						$pattern_email = '/<td(.*?)>\s*<small(.*?)>Email:<\/small>\s*<span(.*?)>(.*?)<\/span>\s*<\/td>/';
						$pattern_message = "/<td(.*?)>\s*<strong>Message:<\/strong>\s*<\/td>\s*<td(.*?)>(.*?)<\/td>/";
						
						$pattern_location = '/<td(.*?)>\s*<small(.*?)>Prefered Location:<\/small>\s*<span(.*?)>(.*?)<\/span>\s*<\/td>/';
						$pattern_city = '/<td(.*?)>\s*<small(.*?)>Prefered City:<\/small>\s*<span(.*?)>(.*?)<\/span>\s*<\/td>/';
                        
					} elseif (strpos($bean->name, 'New RFP Enquiry') === 0) {
						
                        $pattern_name = "/You have a new RFP enquiry from (.*?)<br \/>/";
						
                    } else {
						
						$pattern_name = "/<td(.*?)><strong>Name:<\/strong>(.*?)<\/td>/";
						$pattern_phone = "/<td(.*?)><strong>Phone:<\/strong>(.*?)<\/td>/";
						$pattern_email = "/<td(.*?)><strong>Email:<\/strong>(.*?)<\/td>/";
						$pattern_message = "/<td(.*?)><strong>Message:<\/strong>(.*?)<\/td>/";
						
						$pattern_location = "/<td(.*?)><strong>Prefered Location:<\/strong>(.*?)<\/td>/";
						$pattern_city = "/<td(.*?)><strong>Prefered City:<\/strong>(.*?)<\/td>/";
					
					}
					
					preg_match_all($pattern_name, $html, $match_name);
					preg_match_all($pattern_phone, $html, $match_phone);
					preg_match_all($pattern_email, $html, $match_email);
					preg_match_all($pattern_message, $html, $match_message);
					
					preg_match_all($pattern_location, $html, $match_location);
					preg_match_all($pattern_city, $html, $match_city);
					
					preg_match_all($pattern_company, $html, $match_company);
					preg_match_all($pattern_subject, $html, $match_subject);
					preg_match_all($pattern_no_of_trainees, $html, $match_no_of_trainees);
					preg_match_all($pattern_preferred_date, $html, $match_preferred_date);
					
					$GLOBALS['log']->fatal('ddd... ' . trim($match_message[1][0]));
					$GLOBALS['log']->fatal('fff... ' . trim($match_message[2][0]));
					
					if (strpos($bean->name, 'New Corporate Callback Inquiry') === 0) {
						$name = trim($match_name[1][0]);
						$phone = trim($match_phone[1][0]);
						$email = trim($match_email[1][0]);
						$message = trim($match_message[1][0]);
						
						$breaks = array("<br />","<br>","<br/>");
						$message = str_ireplace($breaks, "\n", $message);
						
						$company_sponsored = true;
						$company = trim($match_company[1][0]);
						$subject = trim($match_subject[1][0]);
						$no_of_trainees = trim($match_no_of_trainees[1][0]);
						$preferred_date = trim($match_preferred_date[1][0]);
					
						$description = "Subject: {$bean->name}\n\nCompany: {$company}\n\nInterest: {$subject}\n\nPrefered Date: {$preferred_date}\n\nNumber of Trainees: {$no_of_trainees}\n\nMessage: {$message}";
										
					} elseif (strpos($bean->name, 'New RFP Enquiry') === 0) {
						$name = trim($match_name[1][0]);
                        $message = "Please log in to the dashboard for more details on the requirements. https://providers.laimoon.com?utm_source=providers&utm_medium=email&utm_campaign=rfp_providers&login=1";
						$company = $name;
						$company_sponsored = true;
						$description = "Subject: {$bean->name}\n\nMessage:{$message}";
                        
					} elseif ((strpos($bean->name, 'New Lead') === 0) || (strpos($bean->name, 'New Callback Inquiry from Laimoon') === 0)) {
						$name = trim($match_name[4][0]);
						$phone = trim($match_phone[4][0]);
						$email = trim($match_email[4][0]);
						$message = trim($match_message[4][0]);
						
						$company_sponsored = false;
						$location = trim($match_location[4][0]);
						$city = trim($match_city[4][0]);
						
						$description = "Subject: {$bean->name}\n\nPrefered Location: {$location} {$city}\n\nMessage:{$message}";
                        
					} else {
						$name = trim($match_name[2][0]);
						$phone = trim($match_phone[2][0]);
						$email = trim($match_email[2][0]);
						$message = trim($match_message[2][0]);
						
						$company_sponsored = false;
						$location = trim($match_location[2][0]);
						$city = trim($match_city[2][0]);
						
						$description = "Subject: {$bean->name}\n\nPrefered Location: {$location} {$city}\n\nMessage:{$message}";
					}
					
					
					/*
					$html = $GLOBALS['log']->fatal("Laimoon - Email Name: " . $name);
					$html = $GLOBALS['log']->fatal("Laimoon - Email Phone: " . $phone);
					$html = $GLOBALS['log']->fatal("Laimoon - Email Email: " . $email);
					$html = $GLOBALS['log']->fatal("Laimoon - Email Prefered Location: " . $location . ' ' . $city);
					$html = $GLOBALS['log']->fatal("Laimoon - Email Message: " . $message);
					*/
					
					$name_array = explode(' ', $name);
					
					$first_name = $name_array[0];
					array_shift($name_array);
					if (count($name_array) > 0) {
						$last_name = trim(implode(' ', $name_array));
					} else {
						$last_name = $first_name;
					}
					
					$lead = new Lead();
					$lead->first_name = $first_name;
					$lead->last_name = $last_name;
					$lead->phone_mobile = $phone;
					$lead->email1 = $email;
					$lead->account_name = $company;
					$lead->company_sponsored_c = $company_sponsored;
					$lead->description = $description;
					$lead->status = 'New';
					$lead->lead_source = 'Web_to_Lead';
					//$lead->assigned_user_id = 'd9ede1d5-996e-310d-05bc-54571b4a4826'; // = Nikki (user)
					$lead->assigned_user_id = '53a77649-1254-10b1-f46c-53e9c1579b22'; // = Web User (user)
					$lead->campaign_id = '5'; // = Laimoon (campaign)
					$lead->save();
					
					//$bean->load_relationship('leads');
					//$bean->leads->add($lead->id);
					$bean->$link->add($lead->id);
					
					$GLOBALS['log']->fatal('Laimoon - Lead ID: ' . $lead->id);
				}
				
				// Handle GulfTalent.com leads
				if ($bean->from_addr == 'courses@gulftalent.com' && 
					strpos($bean->name, 'New enquiry for ') === 0
					) {
					
					$GLOBALS['log']->fatal('GulfTalent - Email ID: ' . $bean->id);
					//$GLOBALS['log']->fatal("Email Description Plain: " . htmlspecialchars_decode($bean->description_html));
					
					$html = htmlspecialchars_decode($bean->description_html);
					
					$pattern_country = "/<td(.*?)>Country<\/td>\s*<td(.*?)>(.*?)<\/td>/";
					$pattern_title = "/<td(.*?)>Job title:<\/td>\s*<td(.*?)>(.*?)<\/td>/";
					$pattern_payment = "/<td(.*?)>How will you pay for this course\?:<\/td>\s*<td(.*?)>(.*?)<\/td>/";
					$pattern_name = "/<td(.*?)>Full name:<\/td>\s*<td(.*?)>(.*?)<\/td>/";
					$pattern_email = "/<td(.*?)>Email:<\/td>\s*<td(.*?)>(.*?)<\/td>/";
					$pattern_phone = "/<td(.*?)>Mobile:<\/td>\s*<td(.*?)>(.*?)<\/td>/";
					$pattern_message = "/<td(.*?)>Query:<\/td>\s*<td(.*?)>(.*?)<\/td>/";
					
					preg_match_all($pattern_country, $html, $match_country);
					preg_match_all($pattern_title, $html, $match_title);
					preg_match_all($pattern_payment, $html, $match_payment);
					preg_match_all($pattern_name, $html, $match_name);
					preg_match_all($pattern_email, $html, $match_email);
					preg_match_all($pattern_phone, $html, $match_phone);
					preg_match_all($pattern_message, $html, $match_message);
					
					$country = trim($match_country[3][0]);
					$title = trim($match_title[3][0]);
					$payment = trim($match_payment[3][0]);
					$name = trim($match_name[3][0]);
					$email = trim($match_email[3][0]);
					$phone = trim($match_phone[3][0]);
					$message = trim($match_message[3][0]);
					
					$html = $GLOBALS['log']->fatal("GulfTalent - Email Country: " . $country);
					$html = $GLOBALS['log']->fatal("GulfTalent - Email Title: " . $title);
					$html = $GLOBALS['log']->fatal("GulfTalent - Email Payment: " . $payment);
					$html = $GLOBALS['log']->fatal("GulfTalent - Email Name: " . $name);
					$html = $GLOBALS['log']->fatal("GulfTalent - Email Email: " . $email);
					$html = $GLOBALS['log']->fatal("GulfTalent - Email Phone: " . $phone);
					$html = $GLOBALS['log']->fatal("GulfTalent - Email Message: " . $message);
					
					$description = "{$bean->name}\n\n{$payment}\n\n{$message}";
					$name_array = explode(' ', $name);
					
					$first_name = $name_array[0];
					array_shift($name_array);
					if (count($name_array) > 0) {
						$last_name = trim(implode(' ', $name_array));
					} else {
						$last_name = $first_name;
					}
					
					$lead = new Lead();
					$lead->first_name = $first_name;
					$lead->last_name = $last_name;
					$lead->phone_mobile = $phone;
					$lead->email1 = $email;
					$lead->title = $title;
					$lead->primary_address_country = $country;
					$lead->description = $description;
					$lead->status = 'New';
					$lead->lead_source = 'Web_to_Lead';
					$lead->assigned_user_id = '53a77649-1254-10b1-f46c-53e9c1579b22'; // = Web User (user)
					$lead->campaign_id = '1beffbe3-e351-7500-8b33-56a097eb9705'; // = GulfTalent (campaign)
					$lead->save();
					
					//$bean->load_relationship('leads');
					//$bean->leads->add($lead->id);
					$bean->$link->add($lead->id);
					
					$GLOBALS['log']->fatal('GulfTalent - Lead ID: ' . $lead->id);
				}
				
					
				// Handle Bayt.com leads
				if ($bean->from_addr == 'noreply@bayt.com' && 
					strpos($bean->name, 'You have a new lead for one of your courses') === 0
					) {
					
					$GLOBALS['log']->fatal('Bayt - Email ID: ' . $bean->id);
					//$GLOBALS['log']->fatal("Email Description Plain: " . htmlspecialchars_decode($bean->description_html));
					
					$html = htmlspecialchars_decode($bean->description_html);
					
					$pattern_first_name = "/First Name: (.*?) <br \/>/";
					$pattern_last_name = "/Last Name: (.*?) <br \/>/";
					$pattern_email = "/Email: (.*?) <br \/>/";
					$pattern_phone = "/Phone Number: (.*?) <br \/>/";
					$pattern_message = "/Course Name: (.*?) <br \/>/";
					
					preg_match_all($pattern_first_name, $html, $match_first_name);
					preg_match_all($pattern_last_name, $html, $match_last_name);
					preg_match_all($pattern_email, $html, $match_email);
					preg_match_all($pattern_phone, $html, $match_phone);
					preg_match_all($pattern_message, $html, $match_message);
					
					$first_name = trim($match_first_name[1][0]);
					$last_name = trim($match_last_name[1][0]);
					$email = trim($match_email[1][0]);
					$phone = trim($match_phone[1][0]);
					$message = trim($match_message[1][0]);
					
					$html = $GLOBALS['log']->fatal("Bayt - Email First Name: " . $first_name);
					$html = $GLOBALS['log']->fatal("Bayt - Email Last Name: " . $last_name);
					$html = $GLOBALS['log']->fatal("Bayt - Email Email: " . $email);
					$html = $GLOBALS['log']->fatal("Bayt - Email Phone: " . $phone);
					$html = $GLOBALS['log']->fatal("Bayt - Email Message: " . $message);

					$lead = new Lead();
					$lead->first_name = $first_name;
					$lead->last_name = $last_name;
					$lead->phone_mobile = $phone;
					$lead->email1 = $email;
					$lead->description = $message;
					$lead->status = 'New';
					$lead->lead_source = 'Web_to_Lead';
					$lead->assigned_user_id = '53a77649-1254-10b1-f46c-53e9c1579b22'; // = Web User (user)
					$lead->campaign_id = 'e25903f3-b039-c581-4257-5778debed5be'; // = Bayt Web-to-Lead (campaign)
					$lead->save();
					
					//$bean->load_relationship('leads');
					//$bean->leads->add($lead->id);
					$bean->$link->add($lead->id);
					
					$GLOBALS['log']->fatal('Bayt - Lead ID: ' . $lead->id);
				}
				
			}
		}
	}
}
?>