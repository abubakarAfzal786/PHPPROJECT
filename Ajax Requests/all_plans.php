<?php
require_once(dirname(__DIR__)."/Controllers/PlanController.php");
$plan=new Plan();
echo json_encode($plan->all_plan());




