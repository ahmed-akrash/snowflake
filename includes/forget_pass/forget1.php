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
		<form action="phpDB/forget1DB.php" method="post" enctype="multipart/form-data">
			<h1>snowflake <i class="fas fa-snowflake"></i></h1>
			
			<input class="input" type="text" placeholder="  email" name="email" id="email" onKeyUp="Ocheck();" required><br><br>
			
			<input type="submit" value="send mail" id="submit"  >
			
		</form>
	</div>

</body>