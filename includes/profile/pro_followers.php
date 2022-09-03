
<div id="friends">


<?php
		include_once('phpDB/connectDB.php');

	$query="SELECT users.* ,follow.time FROM users INNER JOIN follow ON follow.user_id=users.id WHERE follow.followed_user_id=".$_SESSION["id"]." ORDER BY `follow`.`time` DESC;";
				$result=mysqli_query($connect,$query);
			while ($row=mysqli_fetch_row($result))
			{
				
				
				
				
					
				$block_query="SELECT id FROM `block` WHERE user_id =".$_SESSION["id"]." and blocked_user_id =".$row[0]." or user_id=".$row[0]." and blocked_user_id=".$_SESSION["id"].";";
				
				$block_result=mysqli_query($connect,$block_query);
				
				if(mysqli_num_rows($block_result) > 0)
	 			{
					
				}
				else
				{
				
				
				
				
				
		echo'
		<div class="friend">
		<img src="cloud/'.$row[0].'/profile.jpg?v='.$_SESSION["my_version"].'">
		<a href="?PG=S_profile&S_user_id='.$row[0].'"><h2 style="color:steelblue!important;">'.$row[1].'<h2></a>
		<h3>'.$row[6].'</h3>
		<h4><span style="color:steelblue!important;">birth day : </span>'.$row[4].'</h4>
		<h4><span style="color:steelblue!important;">bio : </span>'.$row[5].'</h4>
		<h4><span style="color:steelblue!important;">city : </span>'.$row[7].'</h4>
		<h4 style="color:green!important;"><span style="color:steelblue!important;">friendship date : </span>'.$row[10].'</h6>
		<button onClick="window.location=\'?PG=messages&S_user_id='.$row[0].'\';"><span style="color:purple!important;">message </span><i style="color:purple!important;" class="fas fa-envelope-open"></i></button>
		
		
		
		<form style="display: inline;" enctype="multipart/form-data" action=\'phpDB/follow.php\' method="post">';
		
		
		
		
			$user_id=$_SESSION["id"];
	
			$followed_user_id=$row[0];

			$new_query="SELECT * FROM `follow` WHERE user_id =".$user_id." and followed_user_id =".$followed_user_id.";";

			$new_result=mysqli_query($connect,$new_query);

			
				if(mysqli_num_rows($new_result) <= 0)
				{
					echo'
					
						<button class="second" type="submit" ><span style="color:green!important;" >follow <i style="color:green!important;" class="fas fa-user-plus"></i></span></button>
						<input type="hidden" name="type" value="follow">
					
					';
				}
				else
				{
					echo'
					
						<button class="second" type="submit" ><span style="color:green!important;" >friend <i style="color:green!important;" class="fas fa-user-friends"></i></span></button>
						<input type="hidden" name="type" value="unfollow">
					';
				}

		
			
				
				
		
		echo'
		
			<input type="hidden" name="user_id" value="'.$_SESSION["id"].'">
			<input type="hidden" name="followed_user_id" value=" '.$row[0].'">
		</form>
		
			</form>
			<form style="display: inline;" enctype="multipart/form-data" action=\'phpDB/blockDB.php\' method="post">
		
					
			<button type="submit" class="therd" style="cursor: pointer; "><span style="color:red!important;" >block <i style="color:red!important;" class="fas fa-ban"></i></span></button>
			
			<input type="hidden" name="type" value="block">
			
			<input type="hidden" name="user_id" value="'.$_SESSION["id"].'">
			<input type="hidden" name="blocked_user_id" value="'.$row[0].'">
			
		</form>
		
		
		</div>';
		
	}
			}
?>
	
	
			
			
			
			
	
	
	
	
	
	
	
	
	
	
	
	
	

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
</div>
<span id="down"></span>