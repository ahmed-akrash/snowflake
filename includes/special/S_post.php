<?php 
if(!isset($_SESSION["username"]))header('location:?PG=login');
if(!isset($_GET["post_id"]))header('location:?PG=login');
include_once('phpDB/connectDB.php');


$query="SELECT id FROM `posts` WHERE id=".$_GET["post_id"];
			$result=mysqli_query($connect,$query);

	if(mysqli_num_rows($result) <= 0)
	 {
		header('location:?PG=logout');
	}
	define('post_id',Filter($_GET['post_id']));
		

	$query="SELECT posts.* , users.id , users.username FROM posts INNER JOIN users ON posts.user_id=users.id WHERE posts.id ='".post_id."' ORDER BY `posts`.`time` DESC;";
			$result=mysqli_query($connect,$query);
			$row=mysqli_fetch_row($result);
		$post_user_name=$row[8];

?>
<a href="#bottom"><div class="go">down</div></a>
<a href="#top"><div class="go" style="top:92%;
	left: 20%;">up</div></a>
	<span id="#top"></span>

<link rel="stylesheet" href="css/S_post.css">


<h1 style=" position: fixed; top:4%;left:50%; z-index: 10;"><?php echo $post_user_name ;?>'s post</h1>
<br>
<br>
<br>
	



	
	<div id="posts">
		
		<?php
		
	
				echo'
		<form  class="post the_post" >
			<img src="cloud/'.$row[7].'/profile.jpg?v='.$_SESSION["my_version"].'">
				
		<a href="?PG=S_profile&S_user_id='.$row[7].'"><h2 style="color:steelblue!important;">'.$row[8].'</h2></a>
			
			<h5>'.$row[2].'</h5>
			
			<p style="padding-bottom:30px;">'.$row[1].'</p>
				
				';
				
				if(file_exists('cloud/'.$row[7].'/pro_post_img/'.$row[0].'.jpg'))
				{
					echo '<div class="post_img"><img src="cloud/'.$row[7].'/pro_post_img/'.$row[0].'.jpg"></div>';
				}	
		
		
		if($row[7]==$_SESSION["id"])
		{
			echo'
			<button  type="submit" class="delete" style="width:15px!important;top:5%!important;left:95%!important;"><i class="fas fa-trash-alt" style="color:red!important;"></i><button>
			';
		}
				
				
				echo'
			<button  type="submit" class="share therdbutton" id="B_share'.$row[0].'" ><i class="fas fa-share-square" id="I_share'.$row[0].'"> </i><span id="C_share'.$row[0].'" value="'.$row[5].'"> '.$row[5].'</span></button>
				
				
				
			<button  type="submit" class="comment secondbutton" ><i class="fas fa-comment"></i> '.$row[4].'</button>
				
				
			<button type="submit" id="B_like'.$row[0].'" class="like firstbutton" > <i class="fas fa-heart" id="I_like'.$row[0].'" ></i><span id="C_like'.$row[0].'" value="'.$row[2].'"> '.$row[3].'</span> </button>
			';
		
				
			
			echo '
			
			<input type="hidden" name="post_id" value="'.$row[0].'">
			<input type="hidden" name="type" id="type'.$row[0].'" value="unliked">
			<input type="hidden" name="which" class="which" value="none">
			<input type="hidden" name="who" value="post">
			
		</form>
		<h1 style="display: inline-block!important;">comments</h1>
		
		';
		
		
		include_once('phpDB/connectDB.php');
		
			$query="SELECT posts.user_id FROM comment INNER JOIN posts ON comment.post_id=posts.id WHERE comment.post_id ='".post_id."' ORDER BY `comment`.`time` ASC;";
		
			$result=mysqli_query($connect,$query);
			$row=mysqli_fetch_row($result);
			$post_user=$row[0];
		
		$query="SELECT comment.* , users.id , users.username FROM comment INNER JOIN users ON comment.user_id=users.id WHERE comment.post_id ='".post_id."' ORDER BY `comment`.`time` ASC;";
		
			$result=mysqli_query($connect,$query);
			while ($row=mysqli_fetch_row($result))
			{
				echo'
			<form class="comments" action="phpDB/like.php"  method="post" enctype="multipart/form-data"  >
			<img class="U_profile" src="cloud/'.$row[5].'/profile.jpg?v='.$_SESSION["my_version"].'">
			<a href ="?PG=S_profile&S_user_id='.$row[4].'"><p><span style="color:blue!important;">'.$row[6].' : </span>'.$row[1].'</p></a>
			';
				
			if($row[4]==$_SESSION["id"]||$post_user==$_SESSION["id"])
			{
			echo '
			<button type="submit" style="width:25px!important;"><i class="fas fa-trash-alt" style="color:red!important;"></i></button>
			';
			}
				
				
			echo'	
			<input type="hidden" name="comment_id"  value="'.$row[0].'">
			
			<input type="hidden" name="post_id" value="'.$_GET["post_id"].'">
			<input type="hidden" name="who"  value="comment_delete">
			</form>
		';
			}
	
		
		echo '<div class="comments">
		<form class="message" action="phpDB/like.php"  method="post" enctype="multipart/form-data" >
					<img class="C_profile" src="cloud/'.$_SESSION["id"].'/profile.jpg?v='.$_SESSION["my_version"].'">
					<h4>you </h4>
				<textarea name="comment"></textarea>
				<input type="hidden" name="post_id" value="'.$_GET["post_id"].'">
				<input type="hidden" name="who" value="insert_comment">
				<input type="submit" value="comment" >
			</form>
			</div>
		
		';
		
	function Filter($var)
	{
		return filter_var ( $var, FILTER_SANITIZE_STRING);
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
						  window.location ='?PG=news_feeds';
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
<span id="bottom" ></span>