<?php
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
        
    $completeregistration = SetAdditionalFields($completeregistration);

    $submitJson["data"][] = $completeregistration;
}
