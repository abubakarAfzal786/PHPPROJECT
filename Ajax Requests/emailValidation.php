<?php
require_once(dirname(__DIR__)."/Controllers/UserController.php");
if(isset($_POST['email']))
{
	$user=new User();
	echo json_encode($user->UserExits($_POST['email']));
}
