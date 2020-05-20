<?php
require_once(dirname(__DIR__)."/Controllers/PermissionController.php");
$permission=new Permission();
if(isset($_POST['id']))
{
echo json_encode($permission->single_permission($_POST['id']));
}