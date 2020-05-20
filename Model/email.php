<?php
require_once("PlanModel.php");
require_once(dirname(__DIR__).'/config/config.php');  

class emailModel
{
	
	function __construct()
	{
		
	}
	public static function daily_report()
	{
		   $conn=new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE); 
echo PlanModel::$user_token;
		$query="SELECT * FROM `daily_report` WHERE user_token='".PlanModel::$user_token."'";
		$check=mysqli_query($conn,$query);
		$result=mysqli_fetch_array($check);
		if(mysqli_num_rows($check)>0)
		{
			$query1="UPDATE  `daily_report` SET emails=emails-1 WHERE user_token='".PlanModel::$user_token."' and emails>0";
			return mysqli_query($conn,$query1)or die(mysqli_error());
		}
	}
}