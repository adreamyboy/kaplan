<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the Composer autoloader or use your own PSR-0 autoloader
require 'vendor/autoload.php';

use Smsglobal\RestApiClient\ApiKey;
use Smsglobal\RestApiClient\RestApiClient;
use Smsglobal\RestApiClient\Resource\Sms;

// Get an API key from SMSGlobal and insert the key and secret
$apiKey = new ApiKey('adb6211b2fa5dd33b7a7e637fa8a17a4', '0698ad6f6c1ce52146c9c7fd8991c7c6');

// All requests are done via a 'REST API client.' This abstracts away the REST
// API so you can deal with it like you would an ORM
$rest = new RestApiClient($apiKey);

// You can also instantiate new resources
$sms = new Sms();
$sms->setDestination('971507728838')
    ->setOrigin('KaplanME')
    ->setMessage('Hello World.  Testing REST API now.');
// And save them
//$rest->save($sms);
// For an SMS, saving also sends the message, so you can use a more meaningful
// keyword for it
// $sms->send($rest);
// When a new object is saved, the ID gets populated (it was null before)
//echo $sms->getId(); // integer

echo '<pre>';
print_r($sms);
echo '</pre>';

/*
// Now you can get objects
$contact = $rest->get('contact', 109034333); // Contact resource with ID = 1
// Edit them
$contact->setMsisdn('971507728838');
// And save them
$rest->save($contact);
// Or delete them
$rest->delete($contact);

/*
// You can get a list of available resources
$list = $rest->getList('sms');

foreach ($list->objects as $resource) {
    // ...
}

// Pagination data is included
echo $list->meta->getTotalPages(); // integer

// Lists can be filtered
// e.g. contacts belonging to group ID 1
$rest->getList('contact', 0, 20, array('group' => 1));
*/

?>
