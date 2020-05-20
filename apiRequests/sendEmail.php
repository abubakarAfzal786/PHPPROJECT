<?php
require_once(dirname(__DIR__)."/apiController/emailController.php");

$email=new email();
$email->send_email();
 