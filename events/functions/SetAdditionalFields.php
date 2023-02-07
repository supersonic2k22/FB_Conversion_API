<?php
function SetAdditionalFields($event_name)
{
    global $phone, $email, $name, $fbc, $fbp, $city, $state, $zip_code, $country;

    if (!is_array($event_name)) {
        trigger_error("The input to the function must be an array.", E_USER_ERROR);
    }

    //if phone is filled we will add the phone to array
    if (!empty($phone)) {
        $event_name['user_data']['ph'] = $phone;
    }

    //if email is filled we will add the email to array
    if (!empty($email)) {
        $event_name['user_data']['em'] = $email;
    }

    //if name is filled we will add the email to array
    if (!empty($name)) {
        $event_name['user_data']['fn'] = $name;
    }

    //if CLICK ID is not empty we will add the CLICK ID to array
    if (!empty($fbc)) {
        $event_name['user_data']['fbc'] = $fbc;
    }

    //if Browser ID is not empty we will add the Browser ID to array
    if (!empty($fbp)) {
        $event_name['user_data']['fbp'] = $fbp;
    }

    //if City is not empty we will add this to array
    if (!empty($city)) {
        $event_name['user_data']['ct'] = $city;
    }

    //if State is not empty we will add this to array
    if (!empty($state)) {
        $event_name['user_data']['st'] = $state;
    }

    //if Zip code is not empty we will add this to array
    if (!empty($zip_code)) {
        $event_name['user_data']['zp'] = $zip_code;
    }

    //if Country is not empty we will add this to array
    if (!empty($country)) {
        $event_name['user_data']['country'] = $country;
    }

    return $event_name;
}
