<?php
require_once (dirname(__DIR__)."/config/dbConnection.php");
require_once(dirname(__DIR__)."/Helpers/Helper.php");
require_once(dirname(__DIR__).'/config/config.php');  
require_once(dirname(__DIR__)."/Controllers/PermissionController.php");
class Role
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
        public function addRole($permission,$role)
        {
        	$query="INSERT INTO `roles` (`role`) VALUES ('".$role."')";
        	$result=mysqli_query($this->conn,$query);
        	if($result>0)
        	{
        		$role_id=$this->conn->insert_id;
        		foreach ($permission as $key => $value) {
        			$query1="INSERT INTO `role_permission` (`role_id`,`permission_id`) VALUES ('".$role_id."','".$value."')";
        	$result1=mysqli_query($this->conn,$query1);
        		}
        	}
        	else
        	{
        		return false;
        	}
        }
        public function allRole()
        {
        	$query="SELECT * FROM `roles`";
        	$result=mysqli_query($this->conn,$query);
        	return $result->fetch_all();
        }
        public function edit_role($id)
        {
        	$permission=new Permission();
        	$data=[];
        	$query="SELECT `role` FROM `roles` WHERE id='".$id."'";
        	$check=mysqli_query($this->conn,$query);
$data['role']=$check->fetch_array();
$data['permission']=$permission->single_permission($id);
return $data;
        }
            public function updateRole($id,$permission,$role)
        {
        	$query="UPDATE  `roles` SET `role`='".$role."' WHERE `id`='".$id."'";
        	$result=mysqli_query($this->conn,$query);
        	if($result>0)
        	{
        		$del_query="DELETE FROM `role_permission` WHERE role_id='".$id."'";
mysqli_query($this->conn,$del_query)or die(mysql_error());
        		foreach ($permission as $key => $value) {
        			$query1="INSERT INTO `role_permission` (`role_id`,`permission_id`) VALUES ('".$id."','".$value."')";
        	$result1=mysqli_query($this->conn,$query1);
        		}
        		return true;
        	}
        	else
        	{
        		return false;
        	}
        }
}


