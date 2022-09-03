
<?php


if($_SERVER['REQUEST_METHOD']=='POST')
{
	session_start();
	include_once('connectDB.php');
		
			define('user_id',$_POST['user_id']);
	
			define('followed_user_id',$_POST['followed_user_id']);

			
			
	if($_POST["type"]=="follow")
	 	{
		
			$query="INSERT INTO `follow` (`id`, `time`, `user_id`, `followed_user_id`) VALUES (NULL, CURRENT_TIMESTAMP, '".user_id."', '".followed_user_id."');";
			mysqli_query($connect,$query);
		  	header('location:../?PG=S_profile&S_user_id='.followed_user_id.'');
		
		}elseif($_POST["type"]=="unfollow")
		{
			$query="DELETE FROM `follow` WHERE `follow`.`user_id` = ".user_id." and `follow`.`followed_user_id` = ".followed_user_id." ;";
			mysqli_query($connect,$query);
		  	header('location:../?PG=S_profile&S_user_id='.followed_user_id.'');
		
		}
	else{
		
		
		  header('location:../?PG=S_profile&S_user_id='.followed_user_id.'');
		
	}
			
}
else{
	header('location:../?PG=logout');
}




?>