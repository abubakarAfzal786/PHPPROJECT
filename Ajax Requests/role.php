<?php
require_once(dirname(__DIR__)."/Controllers/RoleController.php");
if(isset($_POST['permission']) && isset($_POST['role']))
{
	$role=new Role();
	echo $role->addRole($_POST['permission'],$_POST['role']);
}