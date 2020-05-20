<?php

session_start();

class UserMiddleware
{
	
	function __construct()
	{
		
		if($_SESSION['login']!=true)
		{
header("Location: login.php");
		}
	}

}