<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
	session_start();
	include_once('connectDB.php');
	
	function Filter($var)
	{
		return filter_var ( $var, FILTER_SANITIZE_STRING);
	}
	
	
	
	define('message',Filter($_POST['message']));
	define('user_id',$_POST['user_id']);
	define('other_user_id',$_POST['other_user_id']);
	
	

		$query="INSERT INTO `message` (`id`, `text`, `time`, `user_id`, `other_user_id`) VALUES (NULL, '".message."', CURRENT_TIMESTAMP, '".user_id."', '".other_user_id."');";
		
			mysqli_query($connect,$query);

				
			
	

}
else
{
}


?>