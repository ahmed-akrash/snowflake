<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
	include_once('connectDB.php');
	
	function Filter($var)
	{
		return filter_var ( $var, FILTER_SANITIZE_STRING);
	}
	
	
	
	define('email',Filter($_POST['email']));
	define('pass',Filter($_POST['pass']));

	
	
	$query="SELECT email FROM `users` WHERE email='".email."';";
	
	
	$result=mysqli_query($connect,$query);
	
	
	if(mysqli_num_rows($result) > 0)
	 {
		 
		$query="SELECT password FROM `users` WHERE email='".email."';";
	
	
		$result=mysqli_query($connect,$query);
		
		$row=mysqli_fetch_row($result);
		
		if (password_verify(pass, $row[0]))
		{
			$query="SELECT * FROM `users` WHERE email='".email."';";
			$result=mysqli_query($connect,$query);
			$row=mysqli_fetch_row($result);
			
			
				session_start();
				$_SESSION["id"]=$row[0];
				$_SESSION["username"]=$row[1];
				$_SESSION["email"]=$row[3];
				$_SESSION["birth_day"]=$row[4];
				$_SESSION["bio"]=$row[5];
				$_SESSION["job"]=$row[6];
				$_SESSION["city"]=$row[7];
				$_SESSION["time"]=$row[8];
			
			header("Location:../?PG=pro_posts");

			
		} else 
		{
			header("Location:../?PG=login");
		}

	 }
	 else
	 {
		 header("Location:../?PG=register");
	 }
	mysqli_close($connect);
}
else
{
	header("Location:../?PG=login");
}
	




?>