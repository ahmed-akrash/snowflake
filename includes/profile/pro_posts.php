<div id="posts">
		<!--<img src="images/lock.png" >
		<h3>no posts yet !!</h3>-->


<div id="pro_share">
			<form class="message" action="phpDB/post_share.php"  method="post" enctype="multipart/form-data">
					<img src="cloud/<?php echo $_SESSION["id"] ?>/profile.jpg?v='<?php echo $_SESSION["my_version"];?>'">

					<h4>post </h4>
				<textarea name="post" required></textarea>
					<h4 style="top:75%;">photo </h4>

				<input type="file" name="pro_post_img">
				<input type="submit" value="share">
			</form>
		
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

	
	<?php
	
		include_once('phpDB/connectDB.php');

	$query="SELECT * FROM `posts` WHERE user_id='".$_SESSION["id"]."' ORDER BY `posts`.`time` DESC;";
			$result=mysqli_query($connect,$query);
			while ($row=mysqli_fetch_row($result))
			{
				echo'
		<form class="post the_post" >
			<img src="cloud/'.$_SESSION["id"].'/profile.jpg?v='.$_SESSION["my_version"].'">
				
			<a href="?PG=S_profile&S_user_id='.$_SESSION["id"].'"><h2 style="color:steelblue!important;">'.$_SESSION["username"].'</h2></a>
			
			<h5>'.$row[2].'</h5>
			
			<p style="margin-left:5%;padding-bottom:30px">'.$row[1].'</p>
				
			';
				if(file_exists('cloud/'.$_SESSION["id"].'/pro_post_img/'.$row[0].'.jpg'))
				{
					echo '<div class="post_img"><img src="cloud/'.$_SESSION["id"].'/pro_post_img/'.$row[0].'.jpg"></div>';
				}
				echo'
			<button  type="submit" class="delete" style="width:15px!important;top:5%!important;left:95%!important;"><i class="fas fa-trash-alt" style="color:red!important;"></i><button>
				
				
			<button  type="submit" class="comment" ><i class="fas fa-comment"></i> '.$row[4].'</button>
				
			<button  type="submit" class="share" id="B_share'.$row[0].'" ><i class="fas fa-share-square" id="I_share'.$row[0].'"> </i><span id="C_share'.$row[0].'" value="'.$row[5].'"> '.$row[5].'</span></button>
				
				
				
				
			<button type="submit" id="B_like'.$row[0].'" class="like" > <i class="fas fa-heart" id="I_like'.$row[0].'" ></i><span id="C_like'.$row[0].'" value="'.$row[2].'"> '.$row[3].'</span> </button>
			
			
			
			<input type="hidden" name="post_id" value="'.$row[0].'">
			<input type="hidden" name="type" id="type'.$row[0].'" value="unliked">
			<input type="hidden" name="which" class="which" value="none">
			<input type="hidden" name="who" value="post">
			
		</form>
		';
			}
	
	?>
	<span id="sound"></span>
	</div>
<script>
	
	
		 $(function () {
			
			 $(".share").hover(function(){
				 $(".which").val("share");
			});

			 $(".comment").hover(function(){
				$(".which").val("comment");
			});

			 $(".like").hover(function(){
				$(".which").val("like");
			});
			 $(".delete").hover(function(){
				$(".which").val("delete");
			});

        $('.the_post').on('submit', function (e) {
			
			var which=$(".which").val();

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'phpDB/like.php',
            data: $(this).serialize(),
            success: function (data) {
				
				if(which=="like")
					{
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
				
				
				else if(which=="share")
				   {
				   
				    $("#I_share"+data).css("cssText", "color : green !important;");
					$("#B_share"+data).css("cssText", "border-color : green !important;");
					var share=$("#C_share"+data).html();
					share++;
					$("#C_share"+data).html(share);
					   
					 $("#sound").html('<audio src="audio/share.mp3" autoplay="on" ></audio>');
					    
				   
				   }else if(which=="delete")
				   {
				   
					$("#sound").html('<audio src="audio/delete.mp3" autoplay="on" ></audio>');
					 
				   setTimeout(
					  function() 
					  {
						  	window.location ='?PG=pro_posts';
					  }, 1000);
					   
					   
					 
				   
				   }else if(which=="comment")
					   {
						   $("#sound").html('<audio src="audio/comment.mp3" autoplay="on" ></audio>');
						   		setTimeout(
					  				function() 
					  				{
						   window.location ='?PG=S_post&post_id='+data;
									}, 1000);
					   
					   }
				
				
            }
          });

        });

      });
</script>

<span id="down"></span>
</article>


