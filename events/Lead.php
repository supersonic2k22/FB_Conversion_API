<?php
//For debug
//echo $_SERVER['REQUEST_URI'];
//Send lead and PageView to Facebook if we on thank you page
global $phone;
global $email;
global $name;

if ($_SERVER['REQUEST_URI'] == THANK_YOU_PAGE) {

    $lead =
        [
            "action_source" => "website",
            "event_name" => "Lead",
            "event_time" => time(),
            "event_source_url" => $actual_link,
            "user_data" => [
                "client_ip_address" => $user_ip,
                "client_user_agent" => $_SERVER['HTTP_USER_AGENT']
            ]
        ];
    //if phone is filled we will add the phone to array
    if (!empty($phone)) {
        $lead['user_data']['ph'] = $phone;
    }

    //if email is filled we will add the email to array
    if (!empty($email)) {
        $lead['user_data']['em'] = $email;
    }

    //if name is filled we will add the email to array
    if (!empty($name)) {
        $lead['user_data']['fn'] = $name;
    }

    $submitJson["data"][] = $lead;
}
