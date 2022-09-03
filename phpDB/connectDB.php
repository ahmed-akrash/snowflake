<?php


	define('C_server','localhost');
	define('C_user','root');
	define('C_pass','');
	define('C_database','snowflake');
	$connect=mysqli_connect(C_server,C_user,C_pass,C_database);
	mysqli_query($connect,"SET NAMES utf8");
	mysqli_query($connect,"SET CHARACTER SET utf8");

?>