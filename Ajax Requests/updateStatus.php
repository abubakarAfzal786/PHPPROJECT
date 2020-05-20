<?php
require_once(dirname(__DIR__)."/Controllers/UserController.php");
if(isset($_POST['activate']))
{
	$user=new User();
	echo json_encode($user->activateUser($_POST['activate']));
}
if(isset($_POST['dactivate']))
{
	$user=new User();
	echo json_encode($user->DactivateUser($_POST['dactivate']));
}