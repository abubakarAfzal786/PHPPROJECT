<?php
require_once (dirname(__DIR__)."/config/dbConnection.php");
require_once(dirname(__DIR__)."/Helpers/Helper.php");
require_once(dirname(__DIR__).'/config/config.php');    
class Controller
{
	public $conn;
	 function __construct() {  
              $this->conn=new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE); 
              if ($this->conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

        }
}