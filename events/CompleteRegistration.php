<?php
//For debug
//echo $_SERVER['REQUEST_URI'];
//Send lead and PageView to Facebook if we on thank you page
global $phone;
global $email;
global $name;

if ($_SERVER['REQUEST_URI'] == REGISTRATION_PAGE) {

    $completeregistration =
        [
            "action_source" => "website",
            "event_name" => "CompleteRegistration",
            "event_time" => time(),
            "event_source_url" => $actual_link,
            "user_data" => [
                "client_ip_address" => $user_ip,
                "client_user_agent" => $_SERVER['HTTP_USER_AGENT']
            ]
        ];
    //if phone is filled we will add the phone to array
    if (!empty($phone)) {
        $completeregistration['user_data']['ph'] = $phone;
    }

    //if email is filled we will add the email to array
    if (!empty($email)) {
        $completeregistration['user_data']['em'] = $email;
    }

    //if name is filled we will add the email to array
    if (!empty($name)) {
        $completeregistration['user_data']['fn'] = $name;
    }

    $submitJson["data"][] = $completeregistration;
}
