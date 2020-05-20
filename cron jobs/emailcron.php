<?php
require_once(dirname(__DIR__).'/config/config.php');  
/**
 * 
 */
class cron
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

 public function sendEmail()
 {
$query="SELECT * FROM `emails` Where status='received'";
$check=mysqli_query($this->conn,$query);
$result=$check->fetch_all();
foreach ($result as  $value) {
	print_r($value);
	mail($value[2],$value[3],$value[4]);
	$query1="UPDATE `emails` SET status='processed' WHERE id='".$value[0]."'";
	mysqli_query($this->conn,$query1); 
}
return true;
 }
}