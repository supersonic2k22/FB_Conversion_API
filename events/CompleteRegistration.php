<?php
if ($_SERVER['REQUEST_URI'] == REGISTRATION_PAGE) {
    $event_id = uniqid();
?>
    <script>
        function waitForFbq(callback) {
            if (typeof fbq !== 'undefined') {
                callback()
            } else {
                setTimeout(function() {
                    waitForFbq(callback)
                }, 100)
            }
        }

        waitForFbq(function() {
            fbq('track', 'CompleteRegistration', {}, {
                eventID: '<?php echo $event_id; ?>'
            });
        })
    </script>
<?php
    $completeregistration =
        [
            "action_source" => "website",
            "event_name" => "CompleteRegistration",
            "event_time" => time(),
            "event_id" => $event_id,
            "event_source_url" => $actual_link,
            "user_data" => [
                "client_ip_address" => $user_ip,
                "client_user_agent" => $_SERVER['HTTP_USER_AGENT']
            ]
        ];

    $completeregistration = SetAdditionalFields($completeregistration);

    $submitJson["data"][] = $completeregistration;
}
