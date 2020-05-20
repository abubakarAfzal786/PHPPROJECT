<?php
require_once(dirname(__DIR__)."/Controllers/PlanController.php");
$obj=[];
if(isset($_POST['price']) && isset($_POST['type']) && isset($_POST['email_number']) && isset($_POST['description']))
{
	
$plan=new Plan();
$output=$plan->add_plan($_POST['price'],$_POST['type'],$_POST['email_number'],$_POST['description']);
if($output)
{
	$obj['feedback']=true;
}
else
{
	$obj['error']=$output;
}
echo json_encode($obj);
}