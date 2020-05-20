<?php
require_once (dirname(__DIR__)."/config/dbConnection.php");
require_once(dirname(__DIR__)."/Helpers/Helper.php");
require_once(dirname(__DIR__).'/config/config.php');  
session_start();
class User
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
public function Login($email, $password){  


              // $hash_passwor=Helper::decrypt_password($password,$);

            $res = "SELECT * FROM `users` WHERE email = '".$email."' and activate=1";  
            $user_data = $this->conn->query($res);
$result=mysqli_fetch_array($user_data);
// return print_r($result['password']);

            if ($user_data->num_rows>0)   
            {  
                $hash=password_verify($password,$result['password']);
error_log($hash);
 error_log((bool) $hash);


          if($hash==1)
           {
           $_SESSION['login'] = true;  
                $_SESSION['uid'] = $result['id'];  
                $_SESSION['username'] = $result['name'];  
                $_SESSION['email'] = $result['email'];  
                return "true";  
           }
           else
           {
           	return "false";
           }
               
            }  
            else  
            {  
                return "false";  
            }  

               
                   
        }
        public function SignUp($email,$name,$password)
        {
              $conn=new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE); 

        	$hash_password=Helper::password_encrypty($password);
        	$token=Helper::generateRandomString();
$query="INSERT INTO `users` (`name`,`email`,`password`,`token`) VALUES ('".$name."','".$email."','".$hash_password."','".$token."')";

$result=mysqli_query($conn,$query)or die(mysqli_error());
return true;
        }
 public function addUser($email,$name,$password)
        {
              $conn=new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE); 
$res = "SELECT * FROM `users` WHERE id = '".$_SESSION['uid']."'";  
            $user_data = $this->conn->query($res);
$user=mysqli_fetch_array($user_data);
          $hash_password=Helper::password_encrypty($password);
         
$query="INSERT INTO `users` (`name`,`email`,`password`,`token`) VALUES ('".$name."','".$email."','".$hash_password."','".$user['token']."')";

$result=mysqli_query($conn,$query)or die(mysqli_error());
return true;
        }
        public function all_user()
        {
          $data=[];
            $conn=new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE); 
$res = "SELECT * FROM `users` WHERE id = '".$_SESSION['uid']."'";  
            $user_data = $this->conn->query($res);
$user=mysqli_fetch_array($user_data);
$res1 = "SELECT * FROM `users` WHERE token = '".$user['token']."'";  
            $user_data = $this->conn->query($res1);
 $result=$user_data->fetch_all();
$data['users']=$result;
$data['owner']=$_SESSION['uid'];
return $data;
        }
        public function users()
        {
          $data=[];
          $res = "SELECT * FROM `users`";  
            $user_data = $this->conn->query($res);
$user=$user_data->fetch_all();
$data['users']=$user;
$data['owner']=$_SESSION['uid'];
return $data;
        }
        public function UserExits($email)
        {
        	$res="SELECT * FROM `users` where email='".$email."'";
        	$result=$this->conn->query($res);
        	if($result->num_rows>0)
        	{
        		return true;
        	}
        	else
        	{
        		return false;
        	}
        }
        public function activateUser($id)
        {
          $res="UPDATE `users` SET activate=1 WHERE id='".$id."'";
           $user_data = $this->conn->query($res);
           return true;
        }
           public function DactivateUser($id)
        {
          $res="UPDATE `users` SET activate=0 WHERE id='".$id."'";
           $user_data = $this->conn->query($res);
           return true;
        }
}









