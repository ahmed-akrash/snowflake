<br>
<br>
<
<div id="photos">
	<!--<img src="images/lock.png" >
		<h3>no posts yet !!</h3>-->

<div id="pro_share">
			<form class="message" style="min-height:60px;" action="phpDB/pro_img_share.php" method="post" enctype="multipart/form-data">
					<img src="cloud/<?php echo $_SESSION["id"] ?>/profile.jpg?v=<?php echo $_SESSION["my_version"]?>">

					<h4 style="top:40%;">photo </h4>

				<input type="file" style="top:45%;" name="pro_img" required>
				<input type="submit" value="share">
			</form>
		
	</div>
	<br>
	<br>
	<br>
	<br>

	<?php
	include_once('phpDB/connectDB.php');

	$query="SELECT * FROM `pro_img` WHERE user_id='".$_SESSION["id"]."' ORDER BY `pro_img`.`time` DESC;";
			$result=mysqli_query($connect,$query);
			while ($row=mysqli_fetch_row($result))
			{
			echo'
		<form class="photo theform" >
			<input type="hidden" name="img_id" value="'.$row[0].'">
			<input type="hidden" name="who" value="img">
			<h4 style="margin-left:5%;color:steelblue!important;">'.$row[1].'</h4>
			<div class="photo_img"><img src="cloud/'.$_SESSION["id"].'/pro_img/'.$row[0].'.jpg"></div>
			
			<button name="submit" type="submit" id="B_like'.$row[0].'" ><i class="fas fa-heart" id="I_like'.$row[0].'" > </i><span id="C_like'.$row[0].'" value="'.$row[2].'">  '.$row[2].'</span></button>
			<button><i class="fas fa-eye"></i>  '.$row[3].'</button>
			<input type="hidden" name="type" id="type'.$row[0].'" value="unliked">
		</form>';
		}?>
	
		<span id="sound"></span>
	</div>
    <script>
      $(function () {

        $('.theform').on('submit', function (e) {

          e.preventDefault();
			
          $.ajax({
            type: 'post',
            url: 'phpDB/like.php',
            data: $(this).serialize(),
            success: function (data) {
				var type=$("#type"+data).val();
							if(type=="liked")
							   {

								$("#type"+data).val("unliked");

								 $("#I_like"+data).css("cssText", "color : black !important;");
								$("#B_like"+data).css("cssText", "border-color : black !important;");
								var likes=$("#C_like"+data).html();
								likes--;
								$("#C_like"+data).html(likes);
								   
							   $("#sound").html('<audio src="audio/like.mp3" autoplay="on" ></audio>');


							   }
						  else{

								  $("#type"+data).val("liked");

								 $("#I_like"+data).css("cssText", "color : red !important;");
								$("#B_like"+data).css("cssText", "border-color : red !important;");
								var likes=$("#C_like"+data).html();
								likes++;
								$("#C_like"+data).html(likes);
							  
							   $("#sound").html('<audio src="audio/like.mp3" autoplay="on" ></audio>');
							}
				
            }
          });

        });

      });
		
		
		
		
		
		
		
		
    </script>
<span id="down"></span>
</article>
