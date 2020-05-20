<?php
require_once (dirname(__DIR__)."/config/dbConnection.php");
require_once(dirname(__DIR__)."/Helpers/Helper.php");
require_once(dirname(__DIR__)."/Model/PlanModel.php");

require_once(dirname(__DIR__).'/config/config.php');  

class EmailController
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
	public function marchentEmail()
	{
		$query="SELECT * FROM `users` WHERE id='".$_SESSION['uid']."'";
		$check=mysqli_query($this->conn,$query);
		$result=$check->fetch_array();
		if($check->num_rows>0)
		{
			$query1="SELECT * FROM `emails` WHERE user_id='".$_SESSION['uid']."'";
			$check1=mysqli_query($this->conn,$query1);
			$result1=$check1->fetch_all();
			if($check->num_rows>0)
			{
return $result1;
			}
		}
	}
	public function allEmails()
	{
$query1="SELECT * FROM `emails`";
			$check1=mysqli_query($this->conn,$query1);
			$result1=$check1->fetch_all();
			if($check1->num_rows>0)
			{
return $result1;
			}
	}
}




