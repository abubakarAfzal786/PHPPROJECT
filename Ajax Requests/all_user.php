<?php
require_once(dirname(__DIR__)."/Controllers/UserController.php");

	$user=new User();
	echo json_encode($user->all_user());
