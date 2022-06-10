<?PHP
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once('modules/GI_Mobile_Messages/GI_Mobile_Messages_sugar.php');
class GI_Mobile_Messages extends GI_Mobile_Messages_sugar {
    
    function GI_Mobile_Messages(){    
        parent::GI_Mobile_Messages_sugar();
    }
    
    /*
    Use:
    This function will send the push notifications to all devices registered in the mobile app.
    */
    function send_push_notification() {
        
        $sql = "
                SELECT
                    mob_msg.id as 'mob_msg_id',
                    mob_msg.name as 'mob_msg_name',
                    mob_msg.description as 'mob_msg_description',
                    pros_list.name as 'pros_list_name',
                    cont.id as 'cont_id',
                    cont.first_name as 'cont_first_name',
                    cont.last_name as 'cont_last_name',
                    reg.id as 'reg_id',
                    reg_cstm.device_os_c as 'reg_device_os',
                    reg.description as 'reg_token'
                FROM
                    gi_mobile_messages mob_msg 
                LEFT JOIN
                    gi_mobile_messages_cstm as mob_msg_cstm  
                        ON mob_msg.id = mob_msg_cstm.id_c  
                INNER JOIN
                    gi_mobile_messages_prospectlists_1_c mob_msg_pros_list 
                        ON mob_msg.id=mob_msg_pros_list.gi_mobile_messages_prospectlists_1gi_mobile_messages_ida 
                        AND mob_msg_pros_list.deleted=0 
                INNER JOIN
                    prospect_lists pros_list 
                        ON pros_list.id=mob_msg_pros_list.gi_mobile_messages_prospectlists_1prospectlists_idb 
                        AND pros_list.deleted=0 
                LEFT JOIN
                    prospect_lists_cstm as pros_list_cstm 
                        ON pros_list.id = pros_list_cstm.id_c  
                INNER JOIN
                    prospect_lists_prospects pros_list_pros 
                        ON pros_list.id=pros_list_pros.prospect_list_id 
                        AND pros_list_pros.deleted=0 
                        AND pros_list_pros.related_type = 'Contacts' 
                INNER JOIN
                    contacts cont 
                        ON cont.id=pros_list_pros.related_id 
                        AND cont.deleted=0 
                LEFT JOIN
                    contacts_cstm as cont_cstm 
                        ON cont.id = cont_cstm.id_c  
                INNER JOIN
                    contacts_gi_mobile_registrations_1_c cont_reg 
                        ON cont.id=cont_reg.contacts_gi_mobile_registrations_1contacts_ida 
                        AND cont_reg.deleted=0 
                INNER JOIN
                    gi_mobile_registrations reg 
                        ON reg.id=cont_reg.contacts_gi_mobile_registrations_1gi_mobile_registrations_idb 
                        AND reg.deleted=0 
                LEFT JOIN
                    gi_mobile_registrations_cstm as reg_cstm 
                        ON reg.id = reg_cstm.id_c 
                WHERE
                    mob_msg.id = '{$this->id}'
                AND
                    mob_msg.deleted = '0'
                ORDER BY
                    mob_msg.id ASC
        ";
        
        // Create an empty array for each device OS, separately.
        $android = array();
        $ios = array();
        $contacts = array();
        
        // Populate the array of each device OS, with the "registration_id" of the matching devices.
        $result = $GLOBALS["db"]->query($sql);
        while ($registration = $GLOBALS["db"]->fetchByAssoc($result) ) {
            switch ($registration['reg_device_os']) {
                case 'GCM':
                    $android[] = $registration['reg_token'];
                    break;
                case 'APN':
                    $ios[] = $registration['reg_token'];
                    break;
            }
            $contacts[] = $registration['cont_id'];
        }
        
        // Send notification to Android devices
        if (count($android) > 0) {
            $sender_id = "AIzaSyB-JOqSvv3WXlTfMuq27ZW3C9oavEkms3k";
            $payload = array(
                'registration_ids' => $android,
                'data' => array(
                    'title' => $this->name,
                    'body' => $this->description,
                    //'message' => $this->description,
                )
            );
            $this->send_push_notification_os($sender_id, $payload);
        }
        
        // Send notification to iOS devices
        if (count($ios) > 0) {
            $sender_id = "AIzaSyB-JOqSvv3WXlTfMuq27ZW3C9oavEkms3k";
            $payload = array(
                'registration_ids' => $ios,
                'notification' => array(
                    'title' => $this->name,
                    'body' => $this->description,
                )
            );
            $this->send_push_notification_os($sender_id, $payload);
        }
        
        // Save a "Note" message for each contact, separately.
        $this->save_notes(array_unique($contacts));
        
    }
    
    /*
    Use:
    This function connects to GCM service (provided by Google), and uses it to execute the pushing of notifications to both (Android & iOS) devices.
    */
    function send_push_notification_os($sender_id, $payload) {
        
        // Set POST variables
        $url = 'https://gcm-http.googleapis.com/gcm/send';
        $headers = array(
            'Authorization: key=' . $sender_id,
            'Content-Type: application/json'
        );
        
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disable SSL Certificate support temporarily
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);
        
        SugarApplication::appendErrorMessage('Android messages sent... ' + json_decode($result));
        
        /*
        //***** DEBUGING *****
        echo $result;
        echo '<pre>';
        print_r(json_decode($result));
        echo '</pre>';
        die('---END---');
        */
    }
    
    /* 
    Use:
    This function creates a "Note" for each "Contact ID" that is received in the passed array.
    */
    function save_notes($contact_ids) {
        foreach ($contact_ids as $contact_id) {
            $note = new Note();
            $note->name = $this->name;
            $note->description = $this->description;
            $note->parent_type = 'GI_Mobile_Messages';
            $note->parent_id = $this->id;
            $note->contact_id = $contact_id;
            $note->save();
        }
    }
    
    /*
    function send_push_notification_ios($registration_ids) {
        
        // Put your device token here (without spaces):
        $deviceToken = '5fee9ade460c9b1b4aa30797c429b90c822c917c9202a0ac6f9473cf5c0df31e';
        //$deviceToken = $registration_ids[0];
        

        // Put your private key's passphrase here:
        $passphrase = 'genesis';

        // Put your alert message here:
        //$message = 'My first push notification!';
        $message = $this->description;

        ////////////////////////////////////////////////////////////////////////////////

        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', 'ck.pem');
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
        
        if ($production) {
            $gateway = 'ssl://gateway.push.apple.com:2195';
        } else { 
            $gateway = 'ssl://gateway.sandbox.push.apple.com:2195';
        }        

        // Open a connection to the APNS server
        $fp = stream_socket_client(
            'ssl://gateway.sandbox.push.apple.com:2195', $err,
            $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

        if (!$fp)
            exit("Failed to connect: $err $errstr" . PHP_EOL);

        echo 'Connected to APNS' . PHP_EOL;

        // Create the payload body
        $body['aps'] = array(
            'alert' => $message,
            'sound' => 'default'
        );

        // Encode the payload as JSON
        $payload = json_encode($body);

        // Build the binary notification
        $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

        // Send it to the server
        $result = fwrite($fp, $msg, strlen($msg));

        if (!$result)
            echo 'Message not delivered' . PHP_EOL;
        else
            echo 'Message successfully delivered' . PHP_EOL;

        // Close the connection to the server
        fclose($fp);
    }
    */
    
}
?>