<?php
require_once(dirname(__DIR__).'/Controllers/PlanController.php');
if(isset($_POST['id']))
{
$plan=new Plan();
$result=$plan->edit_plan($_POST['id']);
echo json_encode($result);
}
