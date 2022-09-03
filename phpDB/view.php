<?php
include_once("connectDB.php");



	$query="SELECT * FROM `pro_img` WHERE `user_id`=".$_GET["S_user_id"].";";
		
	$result=mysqli_query($connect,$query);
		
while ($row=mysqli_fetch_row($result))
			{
	
	if($_SESSION["id"]!=$row[4])
			{
				$view=$row[3]+1;
			
				$query="UPDATE `pro_img` SET `view` = '".$view."' WHERE `pro_img`.`id` = ".$row[0].";";


				mysqli_query($connect,$query);
			}
		}

mysqli_close($connect);



?>