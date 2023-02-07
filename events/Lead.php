<?php
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

    $lead = SetAdditionalFields($lead);

    $submitJson["data"][] = $lead;
}
