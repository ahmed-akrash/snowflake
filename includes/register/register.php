<?php 
if(isset($_SESSION["username"]))header('location:?PG=pro_posts');
?>


<link rel="stylesheet" href="css/register.css">
	
</head>

<body>
	<div id="messageBox">
		<form action="phpDB/registerDB.php" method="post" enctype="multipart/form-data">
			<h1>snowflake <i class="fas fa-snowflake"></i></h1>
			<input placeholder="   first name" class="input" type="text"  name="Fname" required title="Please enter at least 3 characters a-z or numbers" pattern="[a-zA-Z0-9].{3,}"><br><br>
			<input placeholder="   last name" class="input" type="text" name="Lname" required title="Please enter at least 6 characters a-z or numbers" pattern="[a-zA-Z0-9].{3,}"><br><br>
			<input placeholder="   email" class="input" type="email" name="email"  required  pattern=".{6,}"><br><br>
			<input placeholder="   password" class="input" type="password" name="pass" id="pass1" required title="Please enter at least 6 characters a-z or numbers" pattern="[a-zA-Z0-9].{6,}" onKeyUp="Ocheck();"><br><br>
			<input placeholder="   Confirm password" class="input" type="password"  name="pass2" id="pass2" required title="Please enter at least 6 characters a-z or numbers" pattern="[a-zA-Z0-9].{6,}" onKeyUp="Ocheck();"><br><br>
			<input placeholder="   birth day" class="input" type="date" name="birth_day"  required><br><br>
			<input placeholder="   city" class="input" type="text"  name="city" required ><br><br>
			<input placeholder="   job" class="input" type="text" st  name="job" required  pattern=".{6,}"><br><br>
			<textarea placeholder="   bio" class="input" type="text" st name="bio" id="" required  pattern=".{6,}"></textarea><br><br>
			<label style="color: white!important">profile photo </label><input placeholder="profile photo" class="input" type="file" name="pro_photo"  required><br><br>
			<label style="color: white!important">cover photo </label><input placeholder="" class="input" type="file" name="cover_photo"  required><br><br>
			<label style="color: white!important">name of your uncle wife (secret question) </label><input placeholder="   help you to get your forgotten password !!!" class="input" type="text"  name="secret" required title="Please enter at least 3 and almost 10 characters a-z or numbers" pattern="[a-zA-Z0-9].{3,10}"><br><br>
			<input type="submit" id="submit" disabled>
			<input type="reset">
		</form>
	</div>
	<script>
		function Ocheck(){
		var pass1=document.getElementById("pass1").value;
		var pass2=document.getElementById("pass2").value;
		var submit=document.getElementById("submit");
		if(pass1!=''&&pass1==pass2)
			{
				submit.disabled = false;
			}
			else{
				submit.disabled = true;
			}
		}
	</script>
</body>