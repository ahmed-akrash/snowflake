<?php
session_start();
include_once('connectDB.php');


	$query="SELECT message.* , users.id , users.username FROM message INNER JOIN users ON message.user_id=users.id 	 WHERE user_id=".$_SESSION["id"]." and other_user_id=".$_SESSION["S_id"]." OR user_id=".$_SESSION["S_id"]." and other_user_id=".$_SESSION["id"]." ORDER BY `message`.`time` ASC;";
			$result=mysqli_query($connect,$query);
			while ($row=mysqli_fetch_row($result))
			{
				
				if($row[3]==$_SESSION["id"])
				{
					
					echo '
							<div id="me">
								<div class="post">
									<img src="cloud/'.$row[3].'/profile.jpg">

									<a href="#" ><h4 style="color:steelblue!important;">me</h4></a>

									<h5 style="color:green!important;">'.$row[2].'</h5>

									<p>'.$row[1].'</p>
								</div>
							</div>
							';
		
				}
				else
				{
					
					echo '
						<div id="you">
							<div class="post">
								<img src="cloud/'.$row[3].'/profile.jpg">

								<a href="#"><h4 style="color:steelblue!important;">'.$row[6].'</h4></a>

								<h5 style="color:green!important;">'.$row[2].'</h5>

								<p>'.$row[1].'</p>
								</div>
							</div>
						';
				}
			
								   
		  }
	?>
		
		