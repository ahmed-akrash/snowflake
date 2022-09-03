<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
	session_start();
	include_once('connectDB.php');
	
	function Filter($var)
	{
		return filter_var ( $var, FILTER_SANITIZE_STRING);
	}
	
	
	
	define('user_id',$_SESSION["id"]);

		$query="INSERT INTO `pro_img` (`id`, `time`, `like`, `view`, `user_id`) VALUES (NULL, CURRENT_TIMESTAMP, '0', '0', '".user_id."');";
		
				mysqli_query($connect,$query);


				$query="SELECT id FROM `pro_img` WHERE user_id='".user_id."' ORDER BY `pro_img`.`time` DESC";
				$result=mysqli_query($connect,$query);
				$row=mysqli_fetch_row($result);
				
				$dir =  '../cloud/'.user_id.'/pro_img/'.$row[0].'.jpg';
				
				 $path = $_FILES['pro_img']['tmp_name'];
	
			    move_uploaded_file($path,$dir);

				
				header("Location:../index.php?PG=pro_photos");	
			
	

}
else
{
	header('location:../index.php');
}


?>