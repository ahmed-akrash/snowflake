<?php 
if(!isset($_SESSION["username"]))header('location:?PG=login');
if(!isset($_GET["S_user_id"]))header('location:?PG=pro_posts');
if($_GET["S_user_id"]=='')header('location:?PG=pro_posts');


include_once('phpDB/connectDB.php');

	
	$block_query="SELECT id FROM `block` WHERE user_id =".$_SESSION["id"]." and blocked_user_id =".$_GET["S_user_id"]." or user_id=".$_GET["S_user_id"]." and blocked_user_id=".$_SESSION["id"].";";

	$block_result=mysqli_query($connect,$block_query);

	if(mysqli_num_rows($block_result) > 0)
	{
		header('location:?PG=news_feeds');
	}






$query="SELECT id FROM `users` WHERE id='".$_GET["S_user_id"]."';";
			$result=mysqli_query($connect,$query);

	if(mysqli_num_rows($result) <= 0)
	 {
		header('location:?PG=logout');
	 }



if($_GET["S_user_id"]==$_SESSION["id"])
				{
		header('location:index.php?PG=pro_posts');
	}
?>
<link rel="stylesheet" href="css/profile.css">

<h1 style=" position: fixed; top:4%;left:55%; z-index: 100;">profile</h1>


<input type="hidden" id="which_nav" value="<?php echo $_GET["PG"] ?>">


<?php


$_SESSION["S_id"]=$_GET["S_user_id"];




			$query="SELECT * FROM `users` WHERE id='".$_SESSION["S_id"]."';";
			$result=mysqli_query($connect,$query);
			$row=mysqli_fetch_row($result);
			
			
				
				$_SESSION["S_id"]=$row[0];
				$_SESSION["S_username"]=$row[1];
				$_SESSION["S_email"]=$row[3];
				$_SESSION["S_birth_day"]=$row[4];
				$_SESSION["S_bio"]=$row[5];
				$_SESSION["S_job"]=$row[6];
				$_SESSION["S_city"]=$row[7];
				$_SESSION["S_time"]=$row[8];





?>


<article>
	<div class="cover" style="background-image: url('cloud/<?php echo $_SESSION["S_id"];?>/cover.jpg?v=<?php echo $_SESSION["my_version"]?>);"></div>
	<div class="info"  >
		<img src="cloud/<?php echo $_SESSION["S_id"];?>/profile.jpg?v=<?php echo $_SESSION["my_version"]?>">
		<h1><span style=" color:steelblue!important;">name : </span><span id="name"> <?php echo $_SESSION["S_username"];?></span></span></h1>
		
		<h4><span style="color:steelblue!important;">bio : </span><span id ="bio"> <?php echo $_SESSION["S_bio"];?></span></h4>
		
		<div style="margin-left: 0%; text-align: left; display:inline-block">
			<h4><span style="color:steelblue!important;">job : </span><span id ="job"> <?php echo $_SESSION["S_job"];?></span></h4>
			<h4><span style="color:steelblue!important;">birth : </span><span id ="birth_day"> <?php echo $_SESSION["S_birth_day"];?></span></h4>
		</div>
		
		<div style="margin-left: 20%; text-align: left; display: inline-block">
			<h4><span style="color:steelblue!important;">city : </span><span id ="city"> <?php echo $_SESSION["S_city"]?></span></h4>
			<h4><span style="color:steelblue!important;">email : </span><span id ="email"> <?php echo $_SESSION["S_email"]?></span></h4>
		</div>
		
		<h4><span style="color:steelblue!important;">joined : </span><?php echo $_SESSION["S_time"]?></h4>
		<h3 style="display: inline-block;"><span id="profile" style="color:steelblue!important;"></span></h3>
		<h3 style="display: inline-block;"><span id="cover" style="color:steelblue!important;"></span></h3>
	
	
	
		<a href="?PG=messages&S_user_id=<?php echo $_SESSION["S_id"]; ?>"><button id="follow" style=" cursor: pointer; width: 70px;margin-top: 50px"> <span style="color:rebeccapurple!important;" >message  <i style="color:rebeccapurple!important;" class="fas fas fa-envelope-open"></i></span> </button></a>


	
	
	
	
	
	
	
	
		<form style="display: inline;" enctype="multipart/form-data" action='phpDB/follow.php' method="post">
			
			
			
			
			
			<?php
			
				include_once('phpDB/connectDB.php');
		
			define('user_id',$_SESSION["id"]);
	
			define('followed_user_id',$_SESSION["S_id"]);

			$query="SELECT * FROM `follow` WHERE user_id =".user_id." and followed_user_id =".followed_user_id.";";

			$result=mysqli_query($connect,$query);

			
				if(mysqli_num_rows($result) <= 0)
				{
					echo'
					
						<button type="submit" style="cursor: pointer; width: 70px; margin-top: 50px;margin-left:10px"><span style="color:green!important;" >follow <i style="color:green!important;" class="fas fa-user-plus"></i></span></button>
						<input type="hidden" name="type" value="follow">
					
					';
				}
				else
				{
					echo'
					
						<button type="submit" style="cursor: pointer; width: 70px; margin-top: 50px;margin-left:10px"><span style="color:green!important;" >friend <i style="color:green!important;" class="fas fa-user-friends"></i></span></button>
						<input type="hidden" name="type" value="unfollow">
					';
				}

			
			?>
			
			
			<input type="hidden" name="user_id" value="<?php echo $_SESSION["id"];?>">
			<input type="hidden" name="followed_user_id" value="<?php echo $_SESSION["S_id"] ?>">
			
		</form>
			
			
			
			
			
			<form style="display: inline;" enctype="multipart/form-data" action='phpDB/blockDB.php' method="post">
		
					
			<button type="submit" style="cursor: pointer; width: 70px; margin-top: 50px;margin-left:10px"><span style="color:red!important;" >block <i style="color:red!important;" class="fas fa-ban"></i></span></button>
			<input type="hidden" name="type" value="block">
			
			<input type="hidden" name="user_id" value="<?php echo $_SESSION["id"];?>">
			<input type="hidden" name="blocked_user_id" value="<?php echo $_SESSION["S_id"] ?>">
			
		</form>
	
	
	
	</div>
	<div class="wall">
		<a href="?PG=S_pro_posts&S_user_id=<?php echo $_GET["S_user_id"];?>" ><div style="width:44%!important"><h1 class="nav1">last posts</h1></div></a>
		<a href="?PG=S_pro_photos&S_user_id=<?php echo $_GET["S_user_id"];?>"><div  style="width:44%!important"><h1 class="nav2">photos</h1></div></a>
	</div>
	<div id="godown" class="go">down</div>
	<div id="goup" class="go goup" style="top:92%;left: 20%;">up</div>

	<span class="up" id="#up"></span>
	

<script>

	if($("#which_nav").val()=="S_pro_posts"){$(".nav1").css("cssText", "color : steelblue !important;");;};
	if($("#which_nav").val()=="S_profile"){$(".nav1").css("cssText", "color : steelblue !important;");;};
	if($("#which_nav").val()=="S_pro_photos"){$(".nav2").css("cssText", "color : steelblue !important;");};
	

</script>
		