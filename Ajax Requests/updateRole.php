<?php
require_once(dirname(__DIR__)."/Controllers/RoleController.php");
if(isset($_POST['id']) && isset($_POST['permission']) && isset($_POST['name']))
{
	$role=new Role();
	echo ($role->updateRole($_POST['id'],$_POST['permission'],$_POST['name']));
}