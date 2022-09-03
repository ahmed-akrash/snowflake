<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
	session_start();
	include_once('connectDB.php');
	
	function Filter($var)
	{
		return filter_var ( $var, FILTER_SANITIZE_STRING);
	}
	
	if($_POST["who"]=='post')
	{
		
		
	
if($_POST["which"]=="like")
		{
		
			define('post_id',Filter($_POST['post_id']));

			$query="SELECT `likes` ,`user_id` FROM `posts` WHERE id =".post_id.";";

			$result=mysqli_query($connect,$query);

			$row=mysqli_fetch_row($result);

			if($_POST["type"]=="unliked")
			{
				$likes=$row[0]+1;
			}
			elseif($_POST["type"]=="liked")
			{
				$likes=$row[0]-1;
			}
			
				
	
			


			$query="UPDATE `posts` SET `likes` = '".$likes."' WHERE `posts`.`id` = ".post_id.";";


			mysqli_query($connect,$query);
	
	
			$owner=$row[1];
	
			$query="INSERT INTO `notifications` (`id`, `type`, `place`, `post_id`, `img_id`, `time`, `user_id`, `owner`) VALUES (NULL, 'like', 'post', '".post_id."', NULL, CURRENT_TIMESTAMP, '".$_SESSION["id"]."', '".$owner."');";


			mysqli_query($connect,$query);

			
				echo post_id ;
			
		}
elseif($_POST["which"]=="delete")
		{
		
			define('post_id',Filter($_POST['post_id']));
	
	
			$query="SELECT `id` FROM `comment`WHERE post_id =".post_id;

			$result=mysqli_query($connect,$query);
			while ($row=mysqli_fetch_row($result))
			{
				$comment_id=$row[0];
				$query="DELETE FROM `comment` WHERE `comment`.`id` = ".$comment_id.";";
				mysqli_query($connect,$query);
				
			}
	
			$query="DELETE FROM `posts` WHERE `posts`.`id` =".post_id.";";


			mysqli_query($connect,$query);
	
			$query="DELETE FROM `posts` WHERE `posts`.`id` =".post_id.";";


			mysqli_query($connect,$query);
	
		$query="DELETE FROM `notifications` WHERE `post_id` is NULL and `img_id` is NULL;";


			mysqli_query($connect,$query);

			
			unlink('../cloud/'.$_SESSION["id"].'/pro_post_img/'.post_id.'.jpg');
		
			
			
		}
elseif($_POST["which"]=="comment")
		{
	
		define('post_id',Filter($_POST['post_id']));
			
		echo post_id;
			
		}

elseif($_POST["which"]=="share")
		{
		
			define('post_id',Filter($_POST['post_id']));

			$query="SELECT `share` FROM `posts` WHERE id =".post_id.";";

			$result=mysqli_query($connect,$query);

			$row=mysqli_fetch_row($result);

				$share=$row[0]+1;


			$query="UPDATE `posts` SET `share` = '".$share."' WHERE `posts`.`id` = ".post_id.";";
			


			mysqli_query($connect,$query);
			
			
			$query="SELECT `text`,`user_id` FROM `posts` WHERE `id`= ".post_id.";";
			
				$result=mysqli_query($connect,$query);
				$row=mysqli_fetch_row($result);
			

				define('post',$row[0]);
				define('user_id',$_SESSION["id"]);
				define('old_user_id',$row[1]);

				$query="INSERT INTO `posts` (`id`, `text`, `time`, `likes`, `comments`, `share`, `user_id`) VALUES (NULL, '".post."', CURRENT_TIMESTAMP, '0', '0', '0', '".user_id."');";
		
				mysqli_query($connect,$query);

				$query="SELECT id FROM `posts` WHERE user_id=".user_id." ORDER BY `posts`.`time` DESC;";
				$result=mysqli_query($connect,$query);
				$row=mysqli_fetch_row($result);
			
				
				$newfile =  '../cloud/'.user_id.'/pro_post_img/'.$row[0].'.jpg';
			
				$oldfile =  '../cloud/'.old_user_id.'/pro_post_img/'.post_id.'.jpg';
				
			
			     copy($oldfile, $newfile);
	
	
			$owner=old_user_id;
	
			$query="INSERT INTO `notifications` (`id`, `type`, `place`, `post_id`, `img_id`, `time`, `user_id`, `owner`) VALUES (NULL, 'share', 'post', '".post_id."', NULL, CURRENT_TIMESTAMP, '".$_SESSION["id"]."', '".$owner."');";


			mysqli_query($connect,$query);

			
			
			
			
				echo post_id ;
			}

		}
	
elseif($_POST["who"]=='img')
	{
		
	
	define('img_id',Filter($_POST['img_id']));

	$query="SELECT `like`,`user_id` FROM `pro_img` WHERE id =".img_id.";";
		
	$result=mysqli_query($connect,$query);
		
	$row=mysqli_fetch_row($result);
		
		if($_POST["type"]=="unliked")
			{
				$likes=$row[0]+1;
			}
			elseif($_POST["type"]=="liked")
			{
				$likes=$row[0]-1;
			}

		
			$query="UPDATE `pro_img` SET `like` = '".$likes."' WHERE `pro_img`.`id` = ".img_id.";";


			mysqli_query($connect,$query);


			$owner=$row[1];
	
			$query="INSERT INTO `notifications` (`id`, `type`, `place`, `post_id`, `img_id`, `time`, `user_id`, `owner`) VALUES (NULL, 'like', 'img', NULL, '".img_id."', CURRENT_TIMESTAMP, '".$_SESSION["id"]."', '".$owner."');";


			mysqli_query($connect,$query);
	
	
	

		echo img_id ;
		
	}
elseif($_POST["who"]=="insert_comment")
		{
			if($_POST["comment"]!='')
			{
				
			define('post_id',Filter($_POST['post_id']));

			$query="SELECT `comments`,`user_id` FROM `posts` WHERE id =".post_id.";";

			$result=mysqli_query($connect,$query);

			$row=mysqli_fetch_row($result);
				
				
				
				
			$owner=$row[1];
	
			$query="INSERT INTO `notifications` (`id`, `type`, `place`, `post_id`, `img_id`, `time`, `user_id`, `owner`) VALUES (NULL, 'comment', 'post','".post_id."', NULL,  CURRENT_TIMESTAMP, '".$_SESSION["id"]."', '".$owner."');";


			mysqli_query($connect,$query);
				
				

			$comment=$row[0]+1;
				
			$query="UPDATE `posts` SET `comments` = '".$comment."' WHERE `posts`.`id` = ".post_id.";";


			mysqli_query($connect,$query);
				
				
			define('comment',Filter($_POST['comment']));
			define('user_id',Filter($_SESSION['id']));
	
			$query="INSERT INTO `comment` (`id`, `text`, `time`, `post_id`, `user_id`) VALUES (NULL, '".comment."', CURRENT_TIMESTAMP, '".post_id."', '".user_id."');";

			mysqli_query($connect,$query);
	
			header('location:../?PG=S_post&post_id='.post_id);
			}
		}
elseif($_POST["who"]=="comment_delete")
		{
	
	
			
	define('post_id',Filter($_POST['post_id']));

			$query="SELECT `comments` FROM `posts` WHERE id =".post_id.";";

			$result=mysqli_query($connect,$query);

			$row=mysqli_fetch_row($result);

			$comment=$row[0]-1;
				
			$query="UPDATE `posts` SET `comments` = '".$comment."' WHERE `posts`.`id` = ".post_id.";";


			mysqli_query($connect,$query);
	
	
	
			
			define('comment',Filter($_POST['comment']));
			define('user_id',Filter($_SESSION['id']));
			define('comment_id',$_POST['comment_id']);
	
			$query="DELETE FROM `comment` WHERE `comment`.`id` = ".comment_id.";";

			mysqli_query($connect,$query);
	
			header('location:../?PG=S_post&post_id='.post_id);
			}
elseif($_POST["who"]=="notifications_delete")
		{
	
	
			
	define('notifications_id',Filter($_POST['notifications_id']));

			$query="DELETE FROM `notifications` WHERE `notifications`.`id` = ".notifications_id;

			$result=mysqli_query($connect,$query);

			header('location:../?PG=pro_posts');
			
		}
	else
	{
		header('location:../?PG=pro_posts');
	}

}
else
{
	header('location:../?PG=pro_posts');
}

mysqli_close($connect);



?>