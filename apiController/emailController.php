<?php
require_once(dirname(__DIR__)."/MiddleWare/apiMiddleware.php");
require_once(dirname(__DIR__).'/config/config.php');  

// echo (dirname(__DIR__));
/**
 * 
 */
require_once(dirname(__DIR__)."/Model/email.php");
require_once(dirname(__DIR__)."/Model/PlanModel.php");

class email
{
	public $conn;

	
	function __construct()
	{
		$api=new apiMiddleware();
		            
	}
	public function send_email()
	{
		$conn=new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE);
	$json_post_data = @file_get_contents('php://input');
	$decode=json_decode($json_post_data);
	$reference=$decode->reference;
	$webhook=$decode->webhook_url;
	$from=$decode->data->from;
	$to=$decode->data->to;
	$cc=$decode->data->cc;
	$bcc=$decode->data->bcc;
	$subject=$decode->data->subject;
	$body=$decode->data->body;
$userid=PlanModel::$user_id;
if(Helper::reference($reference))
{
		 $error=[];
$error['status']="Exception";
$error['error']=[];
$error['error']['key']="500";
$error['error']['message']="Reference Error";
$error['description']="This Reference is already exit";
echo json_encode($error);
}
else
{
	$query="INSERT INTO `emails` (`reference`,`webhook_url`,`email_from`,`email_to`,`cc`,`bcc`,`subject`,`user_id`,`body`,`created_at`) VALUES ('".$reference."','".$webhook."','".$from."','".$to."','".$cc."','".$bcc."','".$subject."','".$userid."','".$body."','".date('d-m-y')."')";

	 $check=mysqli_query($conn,$query)or die(mysqli_error());
	 // $check=$this->conn->query($query);
	 if($check>0)
	 {
 emailModel::daily_report();
	 $error=[];
$error['status']="Received";
$error['error']=[];
$error['error']['key']="200";
$error['error']['message']="Request has been Received";
$error['description']="Request has been Received";
echo json_encode($error);
	 }
}
	

	}
	public function checkStatus()
	{
		$conn=new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE);

		$json_post_data = @file_get_contents('php://input');
	$decode=json_decode($json_post_data);
	$reference=$decode->reference;
	$query="SELECT `status` FROM `emails` WHERE reference='".$reference."'";
	$check=mysqli_query($conn,$query);
	$result=$check->fetch_array();
	if($check->num_rows>0)
	{
		
if($result['status']=="received")
{
		 $error=[];
$error['status']="Received";
$error['error']=[];
$error['error']['key']="200";
$error['error']['message']="Request has been Received";
$error['description']="Request has been Received";
echo json_encode($error);
}
elseif($result['status']=="pending")
{
		 $error=[];
$error['status']="Pending";
$error['error']=[];
$error['error']['key']="200";
$error['error']['message']="Request is Pending";
$error['description']="Request is Pending";
echo json_encode($error);
}
elseif($result['status']=="invalid")
{
		 $error=[];
$error['status']="invalid";
$error['error']=[];
$error['error']['key']="400";
$error['error']['message']="Request is invalid";
$error['description']="Request is invalid";
echo json_encode($error);
}
else
{
		 $error=[];
$error['status']="error";
$error['error']=[];
$error['error']['key']="400";
$error['error']['message']="An Eror Occour in your Request";
$error['description']="An Eror Occour in your Request";
echo json_encode($error);
}




	}
	}
}

		