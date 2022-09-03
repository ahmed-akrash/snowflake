<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
	include_once('connectDB.php');
	
	function Filter($var)
	{
		return filter_var ( $var, FILTER_SANITIZE_STRING);
	}
	
	session_start();
		
		$query="SELECT secret FROM `users` WHERE email='".$_SESSION["email"]."';";
	
		$result=mysqli_query($connect,$query);
		
		$row=mysqli_fetch_row($result);
	
	
		define('DBsecret',$row[0]);
	
		define('email_code',Filter($_POST['email_code']));
		define('secret',Filter($_POST['secret']));
	

				
		if(email_code==$_SESSION["email_code"]&&secret==DBsecret&&$_SESSION["step1"]==true)
		{
			$_SESSION["step2"]=true;
			
			header("Location:../?PG=forget3");
		}
	else
	{
		
		header("Location:../?PG=login");
	}
			


}
else
{
	header("Location:../?PG=login");
}
	




?>