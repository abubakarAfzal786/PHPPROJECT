<?php
require_once(dirname(__DIR__)."/Model/PlanModel.php");
require_once(dirname(__DIR__)."/Helpers/Helper.php");

class apiMiddleware
{
  
  function __construct()
  {
    $token = null;
  $headers = Helper::getAuthorizationHeader();;
   if (!empty($headers)) {
        if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
            if(Helper::checkUser($matches[1]))
            {
if(PlanModel::apicheckPlan($matches[1])==false)
   {
$error=[];
$error['status']="invalid";
$error['error']=[];
$error['error']['key']="400";
$error['error']['message']="Plan has Been Expired";
$error['description']="Please ReNew Your Plan";
echo json_encode($error);
exit();
   }
            }
            else
            {
             
              $error=[];
$error['status']="invalid";
$error['error']=[];
$error['error']['key']="400";
$error['error']['message']="Invalid Token";
$error['description']="Api Token is wrong or Expired";
echo json_encode($error);
            }
        }
    }
    else
    {
      echo "Please Provide Your Secrate Key";
      $error['status']="invalid";
$error['error']=[];
$error['error']['key']="404";
$error['error']['message']="Api Token missing";
$error['description']="Api Token is not provided";
    }
  
  }
}