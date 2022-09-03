<?php 
if(!isset($_SESSION["username"]))header('location:?PG=login');
?>
<a href="#bottom"><div class="go">down</div></a>
<a href="#top"><div class="go" style="top:92%;
	left: 20%;">up</div></a>
	<span id="#top"></span>

<link rel="stylesheet" href="css/notifications.css">

<div id="notifications">
		<!--<img src="images/lock.png" >
		<h3>no posts yet !!</h3>-->
	<h1 style=" position: fixed; top:4%;left:50%; z-index: 10;">notifications</h1>
	<div  id="messageBox">

		<?php
		
		include_once('phpDB/connectDB.php');
		
		$query="SELECT notifications.* , users.username FROM notifications INNER JOIN users ON notifications.user_id=users.id WHERE `owner` =".$_SESSION["id"]." ORDER BY `notifications`.`time` DESC;";


			$result=mysqli_query($connect,$query);
			while ($row=mysqli_fetch_row($result))
			{
				if($row[1]=='like'){$action='d ';}
				elseif($row[1]=='comment'){$action='ed on';}
				elseif($row[1]=='share'){$action='d';};
				
				if($row[6]!=$_SESSION["id"])
				{
						$block_query="SELECT id FROM `block` WHERE user_id =".$_SESSION["id"]." and blocked_user_id =".$row[6]." or user_id=".$row[6]." and blocked_user_id=".$_SESSION["id"].";";
				
				$block_result=mysqli_query($connect,$block_query);
				
				if(mysqli_num_rows($block_result) > 0)
	 			{
					//nothing
				}
				else
				{
				
					
					echo'

					<div class="notification">
						<h3 style="display: inline"><a href="?PG=S_profile&S_user_id='.$row[6].'">'.$row[8].'</a> has just '.$row[1].$action.' <a href="?PG=S_post&post_id='.$row[3].'">your '.$row[2].'</a> at <span style="color:indianred!important">'.$row[5].'</span></h3>
						
						<form style="display: inline" action="phpDB/like.php"  method="post" enctype="multipart/form-data" >
						
						<button type="submit" style="width:25px!important;margin-left:38%"><i class="fas fa-trash-alt" style="color:red!important;"></i></button>
						<input type="hidden" name="notifications_id" value='.$row[0].'>
						<input type="hidden" name="who" value="notifications_delete">
						</form>
					</div>
							';
				}
				}
			}
	?>
		
		
</div>
	
	<span id="bottom"></span>