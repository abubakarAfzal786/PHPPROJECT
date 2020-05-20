<?php
require_once(dirname(__DIR__)."/Controllers/PermissionController.php");
$permission=new Permission();
if(isset($_POST['id']))
{
	if($permission->edit_permission($_POST['id']))
	{
		echo json_encode($permission->edit_permission($_POST['id']));
	}
	else
	{
echo "false";
	}
}

