<?php

require_once('UserMiddleware.php');
require_once(dirname(__DIR__)."/Model/PlanModel.php");
class PlanMiddleware
{
	
	function __construct()
	{
		$user=new UserMiddleware();
		if(PlanModel::checkPlan())
		{
header("Location: admin panel/emails.php");
		}
		

	}
}