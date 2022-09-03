<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
	include_once('connectDB.php');
	
	function Filter($var)
	{
		return filter_var ( $var, FILTER_SANITIZE_STRING);
	}
	
	session_start();
		
	if(isset($_SESSION["email"])&&$_SESSION["step1"]==true&&$_SESSION["step2"]==true)
	{
		$_SESSION["email"]="abo.reda5363@gmail.com";
		define('pass',password_hash(Filter($_POST['pass']), PASSWORD_DEFAULT));

		$query="UPDATE `users` SET `password` = '".pass."' WHERE `users`.`email` = '".$_SESSION["email"]."';";
		mysqli_query($connect,$query);


		mysqli_close($connect);
	}

	
	
	header("Location:../?PG=logout");
	
}
else
{
	header("Location:../?PG=logout");
}
	




?>