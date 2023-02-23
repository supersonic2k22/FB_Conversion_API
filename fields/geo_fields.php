<?php
// First, you need to download the MaxMind GeoIP2 PHP library from https://github.com/MaxMind/GeoIP2-php
// Include the library in your PHP file
//Require composer
require $_SERVER["DOCUMENT_ROOT"].'/FB_Conversion_API/vendor/autoload.php';

// Create a new instance of the MaxMind GeoIP2 reader
use GeoIp2\Database\Reader;
$reader = new Reader($_SERVER["DOCUMENT_ROOT"].'/FB_Conversion_API/fields/geoip2data/GeoLite2-City.mmdb');

// Get the IP address of the user visiting your website
$ip_address = $_SERVER['REMOTE_ADDR'];

// Use the reader to get the information for the IP address
$record = $reader->city($ip_address);

// Access the information you need
//Get the city
$city = preg_replace('/[^a-zA-Z]+/', '', $record->city->name);
$city = strtolower($city);
//Get the state
$state = preg_replace('/[^a-zA-Z]+/', '', $record->mostSpecificSubdivision->name);
$state = strtolower($state);
//Get zip code
$zip_code = preg_replace('/[^0-9]+/', '', $record->postal->code);
$zip_code = strtolower($zip_code);
//Get country
$country = strtolower($record->country->isoCode);

//Hashing information to sha-256
$city = hash('sha256', $city);
$state = hash('sha256', $state);
$zip_code = hash('sha256', $zip_code);
$country = hash('sha256', $country);

?>
