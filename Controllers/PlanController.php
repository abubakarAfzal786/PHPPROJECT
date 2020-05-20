<?php
require_once (dirname(__DIR__)."/config/dbConnection.php");
require_once(dirname(__DIR__)."/Helpers/Helper.php");
require_once(dirname(__DIR__)."/Model/PlanModel.php");
require_once(dirname(__DIR__)."/Model/UserModel.php");


require_once(dirname(__DIR__).'/config/config.php');  

class Plan
{
	        public $conn;
	 function __construct() {  
              $this->conn=new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE); 
              if ($this->conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

        }
        function __destruct() {  
              
        }
	
	public function add_plan($price,$type,$email_number,$description)
	{
	$query="INSERT INTO `plan` (`description`,`plan_name`,`emails`,`price`) VALUES ('".$description."','".$type."','".$email_number."','".$price."')";
	$result=mysqli_query($this->conn,$query)or die(mysqli_error());
	if($result)
	{
		return true;
	}
	else
	{
return	$result=mysqli_query($this->conn,$query)or die(mysqli_error());

	}
	}
	public function all_plan()
	{
		$query="SELECT * FROM `plan`";
		$result=mysqli_query($this->conn,$query) or die(mysqli_error());
		return $result->fetch_all();
	}
	public function edit_plan($id)
	{
		$query="SELECT * FROM `plan` WHERE id='".$id."'";
		$result=mysqli_query($this->conn,$query);
		if(mysqli_num_rows($result)>0)
		{
		return $plan=mysqli_fetch_array($result);

		}
		else
		{
			return false;
		}
		
	}
	public function update_plan($id,$price,$type,$email_number,$description)
	{
		$query="UPDATE `plan` SET `description`='".$description."',`plan_name`='".$type."',`emails`='".$email_number."',`price`='".$price."' WHERE id='".$id."'";
	$result=mysqli_query($this->conn,$query)or die(mysqli_error());
	if($result)
	{
		return true;
	}
	else
	{
return	$result=mysqli_query($this->conn,$query)or die(mysqli_error());

	}
	}
public function BuyPlan($id)
{
$userid=$_SESSION['uid'];

$expiry_date=date('d/m/Y', strtotime('+1 months'));

$query="INSERT INTO `user_plan` (`plan_id`,`user_id`,`expiry_date`) VALUES ('".$id."','".$userid."','".$expiry_date."')";
$result=mysqli_query($this->conn,$query);
$email=PlanModel::getEmail($id);
$user_token=UserModel::getToken($userid);
$check_report="SELECT * FROM `daily_report` WHERE user_token='".$user_token."'";
$check_row=mysqli_query($this->conn,$check_report);
if($check_row->num_rows)
{
	$update="UPDATE `daily_report` SET emails='".$email."' WHERE user_token='".$user_token."'";
	mysqli_query($this->conn,$update);
}
else
{
	$query1="INSERT INTO `daily_report` (`user_token`,`emails`) VALUES ('".$user_token."','".$email."')";
return $result1=mysqli_query($this->conn,$query1)or die(mysqli_error());
}

}
}




