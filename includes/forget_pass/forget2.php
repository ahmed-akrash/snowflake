<?php 
if(isset($_SESSION["username"]))header('location: ?PG=pro_posts');
if(!isset($_SESSION["email"]))header('location: ?PG=pro_logout');
if($_SESSION["step1"]!=true)header('location: ?PG=logout');

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
		<form action="phpDB/forget2DB.php" method="post" enctype="multipart/form-data">
			<h1>snowflake <i class="fas fa-snowflake"></i></h1>
			<h3 style="color: green!important">we have just send mail to your email successfully  <i class="fas fa-check" style="color: green!important"></i></h3>
			<br>
			<input class="input" type="text" placeholder="  name of your uncle wife (the secret question)" name="secret"  required title="Please enter at least 3 and almost 10 characters a-z or numbers" pattern="[a-zA-Z0-9].{3,10}" onKeyUp="Ocheck();" required><br><br>
			<input class="input" type="text" placeholder="  the code on your email" name="email_code"  onKeyUp="Ocheck();" required title="Please enter the 4 numbers on your email " pattern="[0-9].{3,}" required><br><br>
			
			<input type="submit" value="check" id="submit"  >
			
		</form>
	</div>
	
</body>