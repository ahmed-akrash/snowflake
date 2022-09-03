<?php 
if(!isset($_SESSION["username"]))header('location:?PG=login');



if(isset($_GET["HW"]))
{
if($_GET["HW"]=="new")$_SESSION["how"]="time";
if($_GET["HW"]=="populer")$_SESSION["how"]="likes";
if($_GET["HW"]=="most_share")$_SESSION["how"]="share";
if($_GET["HW"]=="only_following")$_SESSION["how"]="time";
}else {$_SESSION["how"]="time";$_GET["HW"]="new";};

?>
<div id="godown" class="go">down</div>
<div id="goup" class="go" style="top:92%;left: 20%;">up</div>
	<span id="#top"></span>

<link rel="stylesheet" href="css/news_feeds.css">


<h1 style=" position: fixed; top:4%;left:50%; z-index: 10;">news feeds</h1>
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
	<br>
	<br>


<div class="news_feeds" >
	<a href="?PG=news_feeds&HW=new"><div class="nav k">new</div></a>
	
	<a href="?PG=news_feeds&HW=populer" ><div class="nav k">populer</div></a>

	<a href="?PG=news_feeds&HW=most_share"><div class="nav k">most share</div></a>
	
	<a href="?PG=news_feeds&HW=only_following"><div class="nav ">only following</div></a>
	
</div>
	<div id="send">
		<form class="message" action="phpDB/post_share.php"  method="post" enctype="multipart/form-data">
					<img src="cloud/<?php echo $_SESSION["id"] ?>/profile.jpg?v=<?php echo $_SESSION["my_version"]?>">

					<h4>post </h4>
				<textarea name="post" id="post" required></textarea>
					<h4 style="top:75%;">photo </h4>

				<input type="file" name="pro_post_img" id="img">
				<input type="submit" value="share" id="submit">
			</form>
		
	</div>
	<div id="posts">
		
		<?php
	
		include_once('phpDB/connectDB.php');
						 
						 
		if($_GET["HW"]=="only_following")
		{
			$query="SELECT posts.* , users.id , users.username FROM posts INNER JOIN users ON posts.user_id=users.id INNER JOIN follow ON follow.followed_user_id=users.id WHERE follow.user_id=".$_SESSION["id"]." ORDER BY `posts`.`".$_SESSION["how"]."` DESC;";
		}
		else
		{
			$query="SELECT posts.* , users.id , users.username FROM posts INNER JOIN users ON posts.user_id=users.id ORDER BY `posts`.`".$_SESSION["how"]."` DESC;";
			
		}
						 
						 

	
				
				 
						 
			$result=mysqli_query($connect,$query);
			while ($row=mysqli_fetch_row($result))
			{
				
				
				$block_query="SELECT id FROM `block` WHERE user_id =".$_SESSION["id"]." and blocked_user_id =".$row[7]." or user_id=".$row[7]." and blocked_user_id=".$_SESSION["id"].";";
				
				$block_result=mysqli_query($connect,$block_query);
				
				if(mysqli_num_rows($block_result) > 0)
	 			{
					
				}
				else
				{
					
					
						
				echo'
			<form  class="post the_post" >
			<img src="cloud/'.$row[7].'/profile.jpg?v='.$_SESSION["my_version"].'">
				
			<a href="?PG=S_profile&S_user_id='.$row[7].'"><h2 style="color:steelblue!important;">'.$row[8].'</h2></a>
			
			<h5>'.$row[2].'</h5>
			
			<p style="padding-bottom:30px" >'.$row[1].'</p>';
				
				
					if(file_exists('cloud/'.$row[7].'/pro_post_img/'.$row[0].'.jpg'))
				{
					echo '<div class="post_img"><img src="cloud/'.$row[7].'/pro_post_img/'.$row[0].'.jpg"></div>';
				}
					
			 
			 if($row[7]==$_SESSION["id"])
			 {
				 echo ' 
				
				 <button  type="submit" class="delete" style="width:15px!important;top:5%!important;left:95%!important;"><i class="fas fa-trash-alt" style="color:red!important;"></i><button>';
			 }
				 
				 echo '
				 
				 
			 <button  type="submit" class="share therdbutton" id="B_share'.$row[0].'" ><i class="fas fa-share-square" id="I_share'.$row[0].'"> </i><span id="C_share'.$row[0].'" value="'.$row[5].'"> '.$row[5].'</span></button>
				
				
			<button  type="submit" class="comment secondbutton" ><i class="fas fa-comment"></i> '.$row[4].'</button>
				
			
				
				
				
				
			<button type="submit" id="B_like'.$row[0].'" class="like firstbutton" > <i class="fas fa-heart" id="I_like'.$row[0].'" ></i><span id="C_like'.$row[0].'" value="'.$row[2].'"> '.$row[3].'</span> </button>
			
			
			
			<input type="hidden" name="post_id" value="'.$row[0].'">
			<input type="hidden" name="type" id="type'.$row[0].'" value="unliked">
			<input type="hidden" name="which" class="which" value="none">
			<input type="hidden" name="who" value="post">
			
		</form>
		';
					
					
					
				}
			
	}
				 
	
	?>
		
	<span id="sound"></span>
</div>
<script>
	
	
		 $(function () {
			 
			 
			  $("#godown").click(function() {
					$('html, body').animate({
						scrollTop: $("#down").offset().top
					}, 10000);
				});
		 $("#goup").click(function() {
			 $("html, body").animate({ 
				 scrollTop: 0 }, 5000);
			 return false;
					});

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
