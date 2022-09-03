<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
	include_once('connectDB.php');
	
	


	define('user_id',$_POST['user_id']);
	
	define('blocked_user_id',$_POST['blocked_user_id']);
	
	define('block_id',$_POST['block_id']);
	
	define('type',$_POST['type']);
	
	
	if(type=='block')
	{
		
	$query="INSERT INTO `block` (`id`, `time`, `user_id`, `blocked_user_id`) VALUES (NULL, CURRENT_TIMESTAMP, '".user_id."', '".blocked_user_id."');";
	
	
	mysqli_query($connect,$query);
	
	
	header("Location:../?PG=blocked");
		
		
	}
	elseif(type=='unblock')
	{
		$query="DELETE FROM `block` WHERE `block`.`user_id` = ".user_id." and `block`.`blocked_user_id` = ".blocked_user_id." and `block`.`id` = ".block_id.";";
	
	
		mysqli_query($connect,$query);
	
	
	header("Location:../?PG=S_profile&S_user_id=".blocked_user_id."");
	}

	
	

}
else
{
	header('location:../');
}


?>