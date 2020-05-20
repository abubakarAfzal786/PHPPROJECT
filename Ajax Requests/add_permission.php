<?php
require_once(dirname(__DIR__)."/Controllers/PermissionController.php");
if(isset($_POST['permission']))
{
	$permission=new Permission();
	echo  json_encode($permission->addPermission($_POST['permission']));
}



