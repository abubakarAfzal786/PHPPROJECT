<?php
require_once(dirname(__DIR__)."/Controllers/PermissionController.php");
$permission=new Permission();

echo json_encode($permission->permissions());

