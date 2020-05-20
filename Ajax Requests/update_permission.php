<?php
require_once(dirname(__DIR__)."/Controllers/PermissionController.php");
$permission=new Permission();
if(isset($_POST['id']) && isset($_POST['permission']))
{
	echo $permission->updatePermission($_POST['id'],$_POST['permission']);
}