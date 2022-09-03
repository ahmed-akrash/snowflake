<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	session_start();
	include_once('connectDB.php');
	
	function Filter($var)
		{
			return filter_var ( $var, FILTER_SANITIZE_STRING);
		}

	$search=filter_var($_POST['search']);

	 if($search!=''){

		 $letter =  $search;
		 $sql = "SELECT username , id FROM users WHERE username LIKE '$letter%'";

		 $result = mysqli_query($connect,$sql);

		 if(mysqli_num_rows($result) > 0)
		 {
			 while ($row=mysqli_fetch_row($result))
				{
				 	$block_query="SELECT id FROM `block` WHERE user_id =".$_SESSION["id"]." and blocked_user_id =".$row[1]." or user_id=".$row[1]." and blocked_user_id=".$_SESSION["id"].";";
				
				$block_result=mysqli_query($connect,$block_query);
				
				if(mysqli_num_rows($block_result) > 0)
	 			{
					
				}
				else
				{
					echo '<br><span><a href="?PG=messages&S_user_id='.$row[1].'"><img src="cloud/'.$row[1].'/profile.jpg?v='.$_SESSION["my_version"].' ><h2 style="color:steelblue!important;">'.$row[0].'</h2></span></a><br><br><br>';
				}
			 }

		 }
		  else
		  {
			echo " ";
		  }

		 }
	else
	{
				
					
		
			   $sql = "SELECT username , id FROM users ";
		 		$result = mysqli_query($connect,$sql);
			   while ($row=mysqli_fetch_row($result))
				{
				   	$block_query="SELECT id FROM `block` WHERE user_id =".$_SESSION["id"]." and blocked_user_id =".$row[1]." or user_id=".$row[1]." and blocked_user_id=".$_SESSION["id"].";";
				
				$block_result=mysqli_query($connect,$block_query);
				
				if(mysqli_num_rows($block_result) > 0)
	 			{
					
				}
				else
				{
				 echo '<br><span><a href="send.php?SC='.$row[0].'&id='.$row[1].'"><img src="cloud/'.$row[1].'/profile.jpg?v='.$_SESSION["my_version"].'><h2 style="color:steelblue!important;">'.$row[0].'</h2></span></a><br><br><br>';
				}
			   }
				
	}
	mysqli_close($connect);
}
else
{
	header('location:../home.php');
}


