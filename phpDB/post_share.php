<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
	session_start();
	include_once('connectDB.php');
	
	function Filter($var)
	{
		return filter_var ( $var, FILTER_SANITIZE_STRING);
	}
	
	
	
	define('post',Filter($_POST['post']));
	define('user_id',$_SESSION["id"]);

		$query="INSERT INTO `posts` (`id`, `text`, `time`, `likes`, `comments`, `share`, `user_id`) VALUES (NULL, '".post."', CURRENT_TIMESTAMP, '0', '0', '0', '".user_id."');";
		
				mysqli_query($connect,$query);


				$query="SELECT id FROM `posts` WHERE user_id=".user_id." ORDER BY `posts`.`time` DESC;";
				$result=mysqli_query($connect,$query);
				$row=mysqli_fetch_row($result);
				
				$dir =  '../cloud/'.user_id.'/pro_post_img/'.$row[0].'.jpg';
				
				 $path = $_FILES['pro_post_img']['tmp_name'];
			     move_uploaded_file($path,$dir);

				
				header("Location:../index.php?PG=news_feeds");	
			
	

}
else
{
	header('location:../index.php');
}


?>