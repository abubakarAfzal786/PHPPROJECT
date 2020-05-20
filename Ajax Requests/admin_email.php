<?php
require_once(dirname(__DIR__).'/Controllers/emailController.php');

$plan=new EmailController();
$result=$plan->allEmails();
echo json_encode($result);

