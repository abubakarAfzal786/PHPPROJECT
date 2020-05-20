<?php
require_once(dirname(__DIR__).'/config/config.php');  
require_once(dirname(__DIR__)."/Model/UserModel.php");

		   $conn=new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE); 

class PlanModel
{
	    public static $user_id;
	    public static $user_token;
	public  static function getEmail($id)
	{
		   $conn=new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE); 
		   
              if ($conn->connect_error) {
    die("Connection failed: " .$conn->connect_error);
}
		$query="SELECT * from `plan` WHERE id='".$id."'";
		
		$run=mysqli_query($conn,$query);

		$result=$run->fetch_array();
		return $result['emails'];
	}
	public static function checkPlan()
	{
		   $conn=new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE); 

		// $query="SELECT * FROM `user_plan` WHERE user_id='".$_SESSION['uid']."'";
		// $check=mysqli_query($conn,$query);
		// $result=mysqli_fetch_array($check);
		// if(mysqli_num_rows($check)>0)
		// {
			$user_token=UserModel::getToken($_SESSION['uid']);
		$query="SELECT * FROM `user_plan` WHERE user_id='".$_SESSION['uid']."'";
		$check=mysqli_query($conn,$query);
		$result=mysqli_fetch_array($check);
		
		$query2="SELECT * FROM `daily_report` WHERE user_token='".$user_token."'";
		$check2=mysqli_query($conn,$query2);
		$result2=mysqli_fetch_array($check2);
if($check2->num_rows>0 && $check->num_rows>0)
{


	if(strtotime(date('d/m/Y'))>=strtotime($result['expiry_date']))
			{
				return false;
			}
			else
			{
				return true;
			}
}		
	
		else
		{
			return false;
		}
	}
	public static function apicheckPlan($token)
	{
		   $conn=new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE); 
		   self::$user_token=$token;
		$query1="SELECT * FROM `users` WHERE token='".$token."'";
		$check=mysqli_query($conn,$query1);
		$result=mysqli_fetch_array($check);

		if(mysqli_num_rows($check)>0)
		{
self::$user_id=$result['id'];
		$query="SELECT * FROM `user_plan` WHERE user_id='".$result['id']."'";
		$check=mysqli_query($conn,$query);
		$result=mysqli_fetch_array($check);
		$query2="SELECT * FROM `daily_report` WHERE user_token='".$token."'";
		$check2=mysqli_query($conn,$query2);
		$result2=mysqli_fetch_array($check2);
		if(mysqli_num_rows($check)>0 && mysqli_num_rows($check2))
		{
			if(strtotime(date('d/m/Y'))>=strtotime($result['expiry_date']) && $result2['emails']==0)
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		else
		{
			return false;
		}	
		}
		
	}

}
