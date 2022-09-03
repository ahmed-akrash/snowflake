<?php
session_start();
if (isset($_SESSION["my_version"]))
{
	
}
else{
	$_SESSION["my_version"]=1;
}

?>


<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>snowflake</title>
		<link rel="shortcut icon" href="images/favicon.png">
		
		
		
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/solid.css" integrity="sha384-S2gVFTIn1tJ/Plf+40+RRAxBCiBU5oAMFUJxTXT3vOlxtXm7MGjVj62mDpbujs4C" crossorigin="anonymous">
		
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/fontawesome.css" integrity="sha384-0b7ERybvrT5RZyD80ojw6KNKz6nIAlgOKXIcJ0CV7A6Iia8yt2y1bBfLBOwoc9fQ" crossorigin="anonymous">
		
		
		
		
		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">	
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<link rel="stylesheet" href="css/index.css">
	</head>

	<body>
		
		<header style=" z-index:3!important;"> 
			<h5 style="color: white!important;">snowflake <i class="fas fa-snowflake" style="color: white!important;"></i></h5>
		</header>
		
		<aside>
			
			<?php
			if(isset($_SESSION["username"]))
			{
			echo '
				<img id="pro" src="cloud/'.$_SESSION["id"].'/profile.jpg?v='.$_SESSION["my_version"].'">
				<h1 style="color:steelblue!important;"> '.$_SESSION["username"].' </h1>
				<h5>'.$_SESSION["bio"].'</h5>

				<a href="?PG=pro_posts"><div> <i class="fas fa-user" ></i> <h4 >my profile</h4></div></a>
				<a href="?PG=news_feeds"><div> <i class="fas fa-newspaper" > </i> <h4 >news feeds</h4></div></a>
				<a href="?PG=messages&S_user_id='.$_SESSION["id"].'"><div> <i class="fas fa-envelope-open" ></i><h4 >messages</h4></div></a>
				<a href="?PG=notifications"><div> <i class="fas fa-bell" ></i> <h4 >Notifications</h4></div></a>
				<a href="?PG=logout"><div> <i class="fas fa-sign-out-alt" ></i> <h4 >log out</h4></div></a>';

			}
			else
			{
				echo '<img id="pro" src="cloud/default/profile.png">
				<h1> unknown</h1>
				<h5>No bio yet !</h5>
				<a href="?PG=login"><div> <i class="fas fa-sign-in-alt"></i> <h4>login</h4></div></a>
			<a href="?PG=register"><div> <i class="fas fa-sign-out-alt"></i> <h4>register</h4></div></a>';
			}
			?>
			
			
			
			
		</aside>