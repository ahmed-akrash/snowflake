<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
	include_once('connectDB.php');
	
	function Filter($var)
	{
		return filter_var ( $var, FILTER_SANITIZE_STRING);
	}
	
	session_start();
		
			
	
	
	$_SESSION["email_code"]=rand(1000,9999);
	$_SESSION["email"]=Filter($_POST['email']);

	
	
	$query="SELECT email FROM `users` WHERE email='".$_SESSION["email"]."';";
	
	
	$result=mysqli_query($connect,$query);
	
	
	if(mysqli_num_rows($result) > 0)
	 {
		
		 
		$to      = $_SESSION["email"];
		$subject = 'forgetpassword';
		$message = 'you have just asked for reset your password so if that is you then your code '.$_SESSION["email_code"].' is if that is wrong ignore this message';
		$headers = 'From: snowflake@company.com' . "\r\n" .
			'Reply-To: '.$_SESSION["email"]. "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);
			
				
				
				$_SESSION["step1"]=true;
		
			
			header("Location:../?PG=forget2");

			
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