<?php 
if(!isset($_SESSION["username"]))header('location:?PG=login');
?>


<input type="hidden" id="which_nav" value="<?php echo $_GET["PG"] ?>">



<link rel="stylesheet" href="css/profile.css">

	<h1 style=" position: fixed; top:4%;left:55%; z-index: 100;">profile</h1>

<article>
	<div class="cover" style="background-image: url('cloud/<?php echo $_SESSION["id"];?>/cover.jpg?v=<?php echo $_SESSION["my_version"]?>);"></div>
	<form class="info" id="the_edit" enctype="multipart/form-data" action='phpDB/edit.php' method="post">
		<img src="cloud/<?php echo $_SESSION["id"];?>/profile.jpg?v=<?php echo $_SESSION["my_version"]?>">
		<h1><span style=" color:steelblue!important;">name : </span><span id="name"> <?php echo $_SESSION["username"];?></span></span></h1>
		
		<h4><span style="color:steelblue!important;">bio : </span><span id ="bio"> <?php echo $_SESSION["bio"];?></span></h4>
		
		<div style="margin-left: 0%; text-align: left; display:inline-block">
			<h4><span style="color:steelblue!important;">job : </span><span id ="job"> <?php echo $_SESSION["job"];?></span></h4>
			<h4><span style="color:steelblue!important;">birth : </span><span id ="birth_day"> <?php echo $_SESSION["birth_day"];?></span></h4>
		</div>
		
		<div style="margin-left: 20%; text-align: left; display: inline-block">
			<h4><span style="color:steelblue!important;">city : </span><span id ="city"> <?php echo $_SESSION["city"]?></span></h4>
			<h4><span style="color:steelblue!important;">email : </span><span id ="email"> <?php echo $_SESSION["email"]?></span></h4>
		</div>
		
		<h4><span style="color:steelblue!important;">joined : </span><?php echo $_SESSION["time"]?></h4>
		<h3 style="display: inline-block;"><span id="profile" style="color:steelblue!important;"></span></h3>
		<h3 style="display: inline-block;"><span id="cover" style="color:steelblue!important;"></span></h3>
		
		<span id="change" style=" cursor: pointer;"><h4><span style="color:green!important;" onClick="__change();">edit profile</span> </h4></span>
		<span id="cancel" ></span>
	</form>
	<div class="wall">
		<a href="?PG=pro_posts"><div ><h1 class="nav1">last posts</h1></div></a>
		<a href="?PG=pro_photos"><div ><h1 class="nav2">photos</h1></div></a>
		<a href="?PG=pro_following"><div ><h1 class="nav3">following</h1></div></a>
		<a href="?PG=pro_followers"><div ><h1 class="nav4">followers</h1></div></a>
		<a href="?PG=blocked"><div ><h1 class="nav5">blocked</h1></div></a>
	</div>
	<div  id = "godown" class="go">down</div></a>
	<div id = "goup" class="go" style="top:92%;left: 20%;">up</div>
	<script>
	function __change()
		{
				$("#name").html("<input type = 'text' name='username' value='<?php echo $_SESSION["username"]; ?>'>");
				$("#bio").html("<input type = 'text' name='bio' value='<?php echo $_SESSION["bio"]; ?>'>");
				$("#job").html("<input type = 'text' name='job' value='<?php echo $_SESSION["job"]; ?>'>");
				$("#birth_day").html("<input type = 'date' name='birth_day' value='<?php echo $_SESSION["birth_day"]; ?>'>");
				$("#city").html("<input type = 'text' name='city' value='<?php echo $_SESSION["city"]; ?>'>");
				$("#email").html("<input type = 'email' name='email' value='<?php echo $_SESSION["email"]; ?>'>");
				$("#change").html("<input type = 'submit'  value='  save ' style='background-color:steelblue;color:white!important; width:100px;'>");
				$("#cancel").html("<input type = 'button'  value='  cancel ' onClick='__cancel();' style='background-color:red;color:white!important; width:100px;'>");
				$("#profile").html('profile: <input  type="file" name="profile">');
				$("#cover").html("cover: <input type='file' name='cover'>");

		}
		function __cancel()
		{
			window.location ='?PG=pro_posts';
		}
		
		  $("#godown").click(function() {
					$('html, body').animate({
						scrollTop: $("#down").offset().top
					}, 3000);
				});
		 $("#goup").click(function() {
			 $("html, body").animate({ 
				 scrollTop: 0 }, 3000);
			 return false;
					});
		
		if($("#which_nav").val()=="pro_posts"){$(".nav1").css("cssText", "color : steelblue !important;");;};
		if($("#which_nav").val()=="pro_photos"){$(".nav2").css("cssText", "color : steelblue !important;");};
		if($("#which_nav").val()=="pro_following"){$(".nav3").css("cssText", "color : steelblue !important;");};
		if($("#which_nav").val()=="pro_followers"){$(".nav4").css("cssText", "color : steelblue !important;");};
		if($("#which_nav").val()=="blocked"){$(".nav5").css("cssText", "color : steelblue !important;");};
	
	
	</script>
		