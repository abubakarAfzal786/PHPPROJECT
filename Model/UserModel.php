<?php
require_once(dirname(__DIR__).'/config/config.php');  
session_start();
class UserModel
{
	
	function __construct()
	{
		
	}
	public static function checkRole()
	{
		   $conn=new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE); 

		$query="SELECT * FROM `users` WHERE id='".$_SESSION['uid']."'";
		$check=mysqli_query($conn,$query);
		$result=$check->fetch_array();
		if(mysqli_num_rows($check)>0)
		{
			
			$query1="SELECT `role` FROM `roles` WHERE id='".$result['role']."'";
			$check1=mysqli_query($conn,$query1);
			$result1=$check1->fetch_array();
			if(mysqli_num_rows($check1))
			{
				return $result1['role'];
			}
		}

	}
	public static function getToken($id)
	{
		$conn=new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE); 

		$query="SELECT * FROM `users` WHERE id='".$id."'";
		$check=mysqli_query($conn,$query);
		$result=$check->fetch_array();
		if(mysqli_num_rows($check)>0)
		{
			return $result['token'];
		}

	}
}