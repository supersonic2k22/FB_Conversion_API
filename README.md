# facebook_conversions API PHP
A PHP implementation of the Facebook Conversions API with cURL
Sending users fields email and phone, with config file. Update of this repository - ```https://github.com/gilbertocortez/facebook_conversions```

To start the work you must to create config file - config.php with these information:
 ```//Define the access token, pixel ID, and test event code

define('ACCESS_TOKEN', 'Conversion API Access token');
define('PIXEL_ID', 'Your pixel id');
define('TEST_EVENT_CODE', 'your test code'); // Please comment this stroke after test, for example - TEST98552
define('THANK_YOU_PAGE', 'your thank you page'); //Page for lead for example - /thank-you.php
define('REGISTRATION_PAGE', ''); // your registration page, for example - /completeregistration.php
define('PHONE', 'phone'); //name of the phone field
define('EMAIL', 'email'); // name of the email field
define('NAME', 'name'); // name of the first name field```
