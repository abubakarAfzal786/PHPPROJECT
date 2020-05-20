<?php
require_once(dirname(__DIR__)."/Controllers/RoleController.php");
$plan=new Role();
echo json_encode($plan->allRole());