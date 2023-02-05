<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_SERVER['REQUEST_URI'] == REGISTRATION_PAGE || $_SERVER['REQUEST_URI'] == THANK_YOU_PAGE) {
        //Check if fields not empty
        if (!empty($_POST[PHONE])) {
            $phone = $_POST[PHONE];
            //formatting information
            function formatPhoneNumberForUkraine($phoneNumber)
            {
                $phoneNumber = preg_replace('/\D/', '', $phoneNumber);
                if (strlen($phoneNumber) == 10) {
                    $phoneNumber = '38' . $phoneNumber;
                }
                return $phoneNumber;
            }
            $phone = formatPhoneNumberForUkraine($phone);
            //hashing information
            $phone = hash("sha256", $phone);
        } else {
            //field phone is empty
        }
        if (!empty($_POST[EMAIL])) {
            $email = $_POST[EMAIL];
            //formatting information
            $email = trim($_POST[EMAIL]);
            $email = strtolower($email);
            //hashing information
            $email = hash("sha256", $email);
        } else {
            //field email is empty
        }
    }
}
