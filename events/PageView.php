<?php
//Send PageView from all pages
$submitJson = [
    "data" => [
        [
            "action_source" => "website",
            "event_name" => "PageView",
            "event_time" => time(),
            "event_source_url" => $actual_link,
            "user_data" => [
                "client_ip_address" => $user_ip,
                "client_user_agent" => $_SERVER['HTTP_USER_AGENT']
            ]
        ]
    ]
];
?>