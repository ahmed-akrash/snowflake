<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
	include_once('connectDB.php');
	
	function Filter($var)
	{
		return filter_var ( $var, FILTER_SANITIZE_STRING);
	}
	
	
	
	define('Fname',Filter($_POST['Fname']));
	define('Lname',Filter($_POST['Lname']));
	define('email',Filter($_POST['email']));
	define('pass',password_hash(Filter($_POST['pass']), PASSWORD_DEFAULT));
	define('birth_day',Filter($_POST['birth_day']));
	define('city',Filter($_POST['city']));
	define('job',Filter($_POST['job']));
	define('bio',Filter($_POST['bio']));
	define('secret',Filter($_POST['secret']));


	
	$query="SELECT email FROM `users` WHERE email='".email."';";
	
	
	$result=mysqli_query($connect,$query);
	
	
	if(mysqli_num_rows($result) > 0)
	 {
	
			header("Location:../index.php");
	 }
	else
	{
		$query="INSERT INTO `users` (`id`, `username`, `password`, `email`, `birth_day`, `bio`, `job`, `city`, `time`, `secret`) VALUES (NULL,'".Fname." ".Lname."','".pass."', '".email."','".birth_day."', '".bio."', '".job."', '".city."', CURRENT_TIMESTAMP, '".secret."');";
		
		if(mysqli_query($connect,$query))
		{
			
			$query="SELECT * FROM `users` WHERE email='".email."';";
			$result=mysqli_query($connect,$query);
			while ($row=mysqli_fetch_row($result))
			{
				session_start();
				$_SESSION["id"]=$row[0];
				$_SESSION["username"]=$row[1];
				$_SESSION["email"]=$row[3];
				$_SESSION["birth_day"]=$row[4];
				$_SESSION["bio"]=$row[5];
				$_SESSION["job"]=$row[6];
				$_SESSION["city"]=$row[7];
				$_SESSION["time"]=$row[8];
				

				 
				 mkdir("../cloud/".$row[0]);
				mkdir("../cloud/".$row[0]."/pro_img");
				 mkdir("../cloud/".$row[0]."/pro_post_img");
				
			     $dir =  '../cloud/'.$row[0].'/profile.jpg';
				 $path = $_FILES['pro_photo']['tmp_name'];
			     move_uploaded_file($path,$dir);
				
				$dir =  '../cloud/'.$row[0].'/cover.jpg';
				 $path = $_FILES['cover_photo']['tmp_name'];
			     move_uploaded_file($path,$dir);

				
				header("Location:../index.php?PG=pro_posts");	
			}
			
		}
	}
	

}
else
{
	header('location:../index.php');
}


?>