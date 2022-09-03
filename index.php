<?php

include('includes/header.php');

if(isset($_GET["PG"]))
{
	

	switch($_GET["PG"])
	{
			case 'pro_posts':
			{
				include_once('includes/profile/pro.php');
				include_once('includes/profile/pro_posts.php');
			}
			break;
			
			case 'pro_photos':
			{
				include_once('includes/profile/pro.php');
				include_once('includes/profile/pro_photos.php');
			}
			break;
			case 'pro_following':
			{
				include_once('includes/profile/pro.php');
				include_once('includes/profile/pro_following.php');
			}
			break;
			case 'pro_followers':
			{
				include_once('includes/profile/pro.php');
				include_once('includes/profile/pro_followers.php');
			}
			break;
			case 'blocked':
			{
				include_once('includes/profile/pro.php');
				include_once('includes/blocked/blocked.php');
			}
			break;
			case 'news_feeds':
			{
				include_once('includes/timeline/news_feeds.php');
			}
			break;
			case 'notifications':
			{
				include_once('includes/notifications/notifications.php');
			}
			break;
			case 'register':
			{
				include_once('includes/register/register.php');
			}
			break;
			case 'login':
			{
				include_once('includes/login/login.php');
			}
			break;
			case 'messages':
			{
				include_once('includes/chat/messages.php');
			}
			break;
			case 'logout':
			{
				include_once('includes/logout/logout.php');
			}
			break;
			case 'S_post':
			{
				include_once('includes/special/S_post.php');
			}
			break;
			case 'S_profile':
			{
				include_once('includes/special/S_profile/S_pro.php');
				include_once('includes/special/S_profile/S_pro_posts.php');
			}
			break;
			case 'S_pro_posts':
			{
				include_once('includes/special/S_profile/S_pro.php');
				include_once('includes/special/S_profile/S_pro_posts.php');
			}
			break;
			
			case 'S_pro_photos':
			{
				include_once('includes/special/S_profile/S_pro.php');
				include_once('includes/special/S_profile/S_pro_photos.php');
			}
			break;
			case 'forget1':
			{
				include_once('includes/forget_pass/forget1.php');
			}
			break;
			case 'forget2':
			{
				include_once('includes/forget_pass/forget2.php');
			}
			break;
			case 'forget3':
			{
				include_once('includes/forget_pass/forget3.php');
			}
			break;
		default:
			{
				include_once('includes/login/login.php');
			}
			break;
	}
	
	
	



}
else
{
	include_once('includes/logout/logout.php');
}



include('includes/footer.php');
?>