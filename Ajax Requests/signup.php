<?php
require_once(dirname(__DIR__)."/Controllers/UserController.php");
if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['password']))
{
	$user=new User();
	echo json_encode($user->SignUp($_POST['email'],$_POST['name'],$_POST['password']));
}