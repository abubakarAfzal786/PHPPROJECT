<?php
require_once(dirname(__DIR__)."/Controllers/UserController.php");
if(isset($_POST['email']) && isset($_POST['password']))
{
$user=new User();
$email=$_POST['email'];
$password=$_POST['password'];
$user_data=$user->login($email,$password);
echo $user_data;
}