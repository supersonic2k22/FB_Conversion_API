<?php
// ------------------------------------------------
// This is a Facebook Conversions API PHP Integration
// Created by: Roman K.
// https://romankarb.tech
// ------------------------------------------------
// First, we need to start by obtaining the information that will be sent to Facebook
// ------------------------------------------------

// ------------------------------------------------

//Initial global variables to fields
$phone = '';
$email = '';
$name = '';
$fbc = "";
$fbp = "";
$city = '';
$state = '';
$zip_code = '';
$country = '';

//init submitJson
$submitJson = [
    "data" => []
];

//Show errors
ini_set('display_errors', 1);

//include read file
include($_SERVER["DOCUMENT_ROOT"] . '/FB_Conversion_API/read.php');
//include config file
include($_SERVER["DOCUMENT_ROOT"] . '/FB_Conversion_API/config.php');
//include fields
include($_SERVER["DOCUMENT_ROOT"] . '/FB_Conversion_API/fields/fields.php');
//include fbc and fbp fields
include($_SERVER["DOCUMENT_ROOT"] . '/FB_Conversion_API/fields/fbp_fbc_fields.php');
//include geo fields
include($_SERVER["DOCUMENT_ROOT"] . '/FB_Conversion_API/fields/geo_fields.php');



// Get Current User IP Address
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $user_ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $user_ip = $_SERVER['REMOTE_ADDR'];
}

// ------------------------------------------------
// Get current page
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//echo $actual_link;

//get event id from pixel

// ------------------------------------------------
// Generate Json code to provide

//require function for events
require($_SERVER["DOCUMENT_ROOT"] . '/FB_Conversion_API/events/functions/SetAdditionalFields.php');

//PageView
include($_SERVER["DOCUMENT_ROOT"] . '/FB_Conversion_API/events/PageView.php');

//Lead
include($_SERVER["DOCUMENT_ROOT"] . '/FB_Conversion_API/events/Lead.php');

//Complete Registration
include($_SERVER["DOCUMENT_ROOT"] . '/FB_Conversion_API/events/CompleteRegistration.php');

//Send test event when test code is defined
if (defined('TEST_EVENT_CODE')) {
    $submitJson['test_event_code'] = TEST_EVENT_CODE;
}


$submitJson = json_encode($submitJson, JSON_UNESCAPED_SLASHES);
//echo $submitJson;

// ------------------------------------------------
// Set the Facebook Conversions API URL
$url = "https://graph.facebook.com/v12.0/" . PIXEL_ID . "/events";

//debug
//echo($url);

// ------------------------------------------------
// Use cURL to send the POST request
include($_SERVER["DOCUMENT_ROOT"] . '/FB_Conversion_API/inc/objects/curl.class.php');
$_curl_ = new CurlServer();
$_curl_->post_request($url, $submitJson);
//var_dump($_curl_->post_request($url, $submitJson));