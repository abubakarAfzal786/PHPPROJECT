<?php
session_start();
class loginMiddleware
{
	
	function __construct()
	{
		
		if($_SESSION)
		{
			if($_SESSION['login']==true)
		{
header("Location: admin panel/emails.php");
		}
		}

	}
}