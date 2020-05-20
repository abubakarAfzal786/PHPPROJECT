<?php
require_once(dirname(__DIR__)."/Controllers/RoleController.php");
if(isset($_POST['id']))
{
	$role=new Role();
	echo json_encode($role->edit_role($_POST['id']));
}