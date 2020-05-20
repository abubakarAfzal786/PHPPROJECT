<?php
require_once (dirname(__DIR__)."/config/dbConnection.php");
require_once(dirname(__DIR__)."/Helpers/Helper.php");
require_once(dirname(__DIR__).'/config/config.php');  
class Permission
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
        public function addPermission($permission)
        {
$query="INSERT INTO `permission` (`permission`) VALUES ('".$permission."')";
$result=mysqli_query($this->conn,$query);
if($result>0)
{
	return true;
}
else
{
	return false;
}
}
public function permissions()
{
  $query="SELECT * FROM `permission`";
  $result=mysqli_query($this->conn,$query) or die(mysqli_error());
    return $result->fetch_all();
}
public function single_permission($id)
{
  $permission=[];
  $query="SELECT * FROM `role_permission` WHERE role_id='".$id."'";
  $result=mysqli_query($this->conn,$query);
   $all_permission=$result->fetch_all();

   foreach ($all_permission as $key => $value) {

    $query1="SELECT * FROM `permission` WHERE id='".$value[2]."'";
    $result1=mysqli_query($this->conn,$query1);
    $single=$result1->fetch_array();
    array_push($permission,$single);
   }
   return $permission;

}
public function edit_permission($id)
{
  $query="SELECT * FROM `permission` WHERE id='".$id."'";
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
public function updatePermission($id,$permission)
{
  $query="UPDATE `permission` SET `permission`='".$permission."' WHERE id='".$id."'";
  $result=mysqli_query($this->conn,$query)or die(mysqli_error());
  if($result)
  {
    return true;
  }
  else
  {
return  $result=mysqli_query($this->conn,$query)or die(mysqli_error());

  }
}
}


