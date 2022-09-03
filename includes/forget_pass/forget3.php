<?php 
if(isset($_SESSION["username"]))header('location: ?PG=pro_posts');
if(!isset($_SESSION["email"]))header('location: ?PG=pro_logout');
if($_SESSION["step1"]!=true)header('location: ?PG=logout');
if($_SESSION["step2"]!=true)header('location: ?PG=logout');
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
	
	<div id="messageBox" style="height:400px!important">
		<form action="phpDB/forget3DB.php" method="post" enctype="multipart/form-data">
			<h1>snowflake <i class="fas fa-snowflake"></i></h1>
			<h3 style="color: green!important">you entered the right information   <i class="fas fa-check" style="color: green!important"></i></h3>
			<br>
			<input class="input" type="text" placeholder="  new password" name="pass" id="pass1" onKeyUp="Ocheck();" required title="Please enter at least 6 characters a-z or numbers" pattern="[a-zA-Z0-9].{6,}" required><span > &nbsp;&nbsp;&nbsp;</span><br><br>
			<input class="input" type="password" placeholder="  conform new password"  id="pass2" onKeyUp="Ocheck();" required title="Please enter at least 6 characters a-z or numbers" pattern="[a-zA-Z0-9].{6,}" required><span class="check"> <i class="fas fa-times" style="color: red!important"></i></span><br><br>
			
			<input type="submit" value="reset pass" id="submit" disabled><span> &nbsp;&nbsp;&nbsp;</span>
			
		</form>
	</div>
	
	
	
	
	<script>
	function Ocheck(){
		var pass1=document.getElementById("pass1").value;
		var pass2=document.getElementById("pass2").value;
		var submit=document.getElementById("submit");
		if(pass1!=''&&pass1==pass2)
			{
				$(".check").html(' <i class="fas fa-check" style="color: green!important"></i>');
				submit.disabled = false;
			}
			else{
				$(".check").html('<i class="fas fa-times" style="color: red!important"></i>');
				submit.disabled = true;
			}
		}
	</script>
</body>