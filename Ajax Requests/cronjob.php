<?php
require_once(dirname(__DIR__)."/cron jobs/emailcron.php");
$plan=new cron();
echo json_encode($plan->sendEmail());
