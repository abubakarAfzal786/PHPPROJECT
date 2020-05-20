<?php
require_once(dirname(__DIR__).'/Controllers/emailController.php');

$plan=new EmailController();
$result=$plan->marchentEmail();
echo json_encode($result);

