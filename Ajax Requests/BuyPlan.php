<?php
require_once(dirname(__DIR__)."/Controllers/PlanController.php");
if(isset($_POST['id']))
{
	$plan=new Plan();
	return $plan->BuyPlan($_POST['id']);

}

