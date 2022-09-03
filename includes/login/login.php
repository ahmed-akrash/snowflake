<?php 
if(isset($_SESSION["username"]))header('location: ?PG=pro_posts');
?>
<link rel="stylesheet" href="css/login.css">

<body>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div id="messageBox">
		<form action="phpDB/loginDB.php" method="post" enctype="multipart/form-data">
			<h1>snowflake <i class="fas fa-snowflake"></i></h1>
			
			<input class="input" type="text" placeholder="  email" name="email" id="email" onKeyUp="Ocheck();"><br><br>
			<input class="input" type="password" placeholder="  password" name="pass" id="pass" onKeyUp="Ocheck();"><br><br>
			<a href="?PG=forget1" style="color: blue!important;text-decoration: none; ">Forgot your password ?</a>
			<input type="submit" value="login" style="margin-top:12px" id="submit" disabled >
			
		</form>
	</div>
	
	
	
	
	<script>
		function Ocheck(){
		var email=document.getElementById("email").value;
		var pass=document.getElementById("pass").value;
		var submit=document.getElementById("submit");
		if(email!=''&&pass!='')
			{
				submit.disabled = false;
			}
			else{
				submit.disabled = true;
			}
		}
	</script>
</body>