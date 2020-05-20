<?php
require_once(dirname(__DIR__).'/config/config.php');  
class Helper
{
	public static function password_encrypty($password)
	{
// $password_string = mysqli_real_escape_string($password);
  // The value of $password_hash
  // should similar to the following:
  // $2y$10$aHhnT035EnQGbWAd8PfEROs7PJTHmr6rmzE2SvCQWOygSpGwX2rtW
  $password_hash = password_hash($password, PASSWORD_BCRYPT);
return $password_hash;
	}
  public static function reference($ref)
  {
       $conn=new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE); 
   $query="SELECT * FROM `emails` WHERE reference='".$ref."'";
   $check=mysqli_query($conn,$query);
   if($check->num_rows>0)
   {
    return true;
   } 
   else
   {
    return false;
   }
  }
	public static function decrypt_password($password,$hash_password)
	{
		// return $password;
		 $hash=password_verify($password,$hash_password);
error_log($hash);
 error_log((int) $hash);
if($hash==0)
{
  return "false";
}
else
{
  return "true";
}
	}
	public static function generateRandomString($length = 30) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
  public static function checkUser($token)
  {
       $conn=new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE); 
     $query="SELECT * FROM `users` WHERE token='".$token."' and activate=1";
 $check=mysqli_query($conn,$query);
 $result=mysqli_fetch_array($check);
 if(mysqli_num_rows($check)>0)
 {
  return true;
 }
 else
 {
 return false;
 }
  }
  public static function getAuthorizationHeader(){
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        }
        else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            //print_r($requestHeaders);
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        return $headers;
    }
}



?>