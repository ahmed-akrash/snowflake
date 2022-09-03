<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
	session_start();
	
	include_once('connectDB.php');
	
	
	
	
	
	function Filter($var)
	{
		return filter_var ( $var, FILTER_SANITIZE_STRING);
	}
	
	
	
	
	define('username',Filter($_POST['username']));
	define('bio',Filter($_POST['bio']));
	define('job',Filter($_POST['job']));
	define('birth_day',Filter($_POST['birth_day']));
	define('email',Filter($_POST['email']));
	define('city',Filter($_POST['city']));
	
	define('user_id',$_SESSION["id"]);
	
	
	
	$query="UPDATE `users` SET `username` = '".username."', `email` = '".email."', `birth_day` = '".birth_day."', `bio` = '".bio."', `job` = '".job."', `city` = '".city."' WHERE `users`.`id` = ".user_id.";";
	
	
	mysqli_query($connect,$query);
	
				$_SESSION["username"]=username;
				$_SESSION["email"]=email;
				$_SESSION["birth_day"]=birth_day;
				$_SESSION["bio"]=bio;
				$_SESSION["job"]=job;
				$_SESSION["city"]=city;

	
				 $dir =  '../cloud/'.$_SESSION["id"].'/profile.jpg';
				 $path = $_FILES['profile']['tmp_name'];
			     move_uploaded_file($path,$dir);
				
				 $dir =  '../cloud/'.$_SESSION["id"].'/cover.jpg';
				 $path = $_FILES['cover']['tmp_name'];
			     move_uploaded_file($path,$dir);
	
				mysqli_close($connect);
					
				$_SESSION["my_version"]+=0.1;
				header('location:../?PG=pro_posts');
	

	
}


?>