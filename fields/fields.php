<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_SERVER['REQUEST_URI'] == REGISTRATION_PAGE || $_SERVER['REQUEST_URI'] == THANK_YOU_PAGE) {
        //check if const Phone is defined and not empty
        if (defined("PHONE") && !empty(PHONE)) {
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
        }
        //Check if Email const is defined and not empty
        if (defined("EMAIL") && !empty(EMAIL)) {
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
        //Check if const Name is defined and not empty
        if (defined("NAME") && !empty(NAME)) {
            if (!empty($_POST[NAME])) {
                $name = $_POST[NAME];
                //formatting information
                $name = trim($_POST[NAME]);
                $name = strtolower($name);
                //check encoding
                $encoding = mb_detect_encoding($name);
                if (!mb_check_encoding($name, 'UTF-8')) {
                    $name = mb_convert_encoding($name, 'UTF-8', $encoding);
                } else {
                    //encoding is utf-8
                }
                //hashing information
                $name = hash("sha256", $name);
            } else {
                //field name is empty
            }
        }
    }
}
