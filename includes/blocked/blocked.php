
<div id="friends">


<?php
		include_once('phpDB/connectDB.php');

	$query="SELECT users.* ,block.time,block.id FROM users INNER JOIN block ON block.blocked_user_id=users.id WHERE block.user_id=".$_SESSION["id"]." ORDER BY `block`.`time` DESC;";
				$result=mysqli_query($connect,$query);
			while ($row=mysqli_fetch_row($result))
			{
		echo'
		<div class="friend">
		<img src="cloud/'.$row[0].'/profile.jpg?v='.$_SESSION["my_version"].'">
		<a href="?PG=S_profile&S_user_id='.$row[0].'"><h2 style="color:steelblue!important;">'.$row[1].'<h2></a>
		<h3>'.$row[6].'</h3>
		<h4><span style="color:steelblue!important;">birth day : </span>'.$row[4].'</h4>
		<h4><span style="color:steelblue!important;">bio : </span>'.$row[5].'</h4>
		<h4><span style="color:steelblue!important;">city : </span>'.$row[7].'</h4>
		<h4 style="color:red!important;"><span style="color:steelblue!important;">block date : </span>'.$row[10].'</h6>
		
		
		
	<form style="display: inline;" enctype="multipart/form-data" action=\'phpDB/blockDB.php\' method="post">	
		<button style="width:99%" type="submit" ><span style="color:red!important;">unblock </span><i style="color:red!important;" class="fas fa-ban"></i></button>
		<input type="hidden" name="type" value="unblock">	
		<input type="hidden" name="user_id" value="'.$_SESSION["id"].'">
		<input type="hidden" name="blocked_user_id" value=" '.$row[0].'">
		<input type="hidden" name="block_id" value=" '.$row[11].'">
	</form>
	</div>';
		
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