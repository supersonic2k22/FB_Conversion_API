<?php
// Generate a unique identifier
$event_id = uniqid();
?>
<script>
        function waitForFbq(callback){
        if(typeof fbq !== 'undefined'){
            callback()
        } else {
            setTimeout(function () {
                waitForFbq(callback)
            }, 100)
        }
    }

    waitForFbq(function () {
        fbq('track', 'PageView', {}, {
            eventID: '<?php echo $event_id; ?>'
        });
    })
</script>
<?php
$page_view = [
    "action_source" => "website",
    "event_name" => "PageView",
    "event_time" => time(),
    "event_id" => $event_id,
    "event_source_url" => $actual_link,
    "user_data" => [
        "client_ip_address" => $user_ip,
        "client_user_agent" => $_SERVER['HTTP_USER_AGENT']
    ]
];

$page_view = SetAdditionalFields($page_view);

$submitJson["data"][] = $page_view;
