<?php
require_once("../Controllers/PlanController.php");
$obj=[];
if(isset($_POST['price']) && isset($_POST['price']) && isset($_POST['type']) && isset($_POST['email_number']) && isset($_POST['description']))
{
	
$plan=new Plan();
$output=$plan->update_plan($_POST['id'],$_POST['price'],$_POST['type'],$_POST['email_number'],$_POST['description']);
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