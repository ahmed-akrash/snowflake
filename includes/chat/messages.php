<?php 
if(!isset($_SESSION["username"]))header('location:?PG=login');
if (!isset($_GET["S_user_id"]))header('location:?PG=login');
$_SESSION["S_id"]=$_GET["S_user_id"];
include_once('phpDB/connectDB.php');


$old_sql = "SELECT username FROM users WHERE id = ".$_GET["S_user_id"]." ORDER BY `users`.`username` ASC ";
		 $old_result = mysqli_query($connect,$old_sql);
		if(mysqli_num_rows($old_result) > 0)
			{
				$block_query="SELECT id FROM `block` WHERE user_id =".$_SESSION["id"]." and blocked_user_id =".$_GET["S_user_id"]." or user_id=".$_GET["S_user_id"]." and blocked_user_id=".$_SESSION["id"].";";

				$block_result=mysqli_query($connect,$block_query);
				
				if(mysqli_num_rows($block_result) > 0)
	 			{
					header('location:?PG=login');
				}
				else
				{
					$old_row=mysqli_fetch_row($old_result);
					$_SESSION["S_username"]=$old_row[0];
				}
			}
				else
				{
					header('location:?PG=login');
				}

?>

<script src="js/messages.js"></script>
<script src="js/search.js"></script>

<div  id = "godown" class="go" style="left:75%">down</div>
	<div id = "goup" class="go" style="top:91%; left: 19.5%;">up</div>

<link rel="stylesheet" href="css/messages.css">

	
	<aside id="search">
		
		<h1>chat</h1><br>
			<label>name </label><input class="input" type="text" placeholder=" it will auto search !"  id="SC"><br><br>
		
		
		<div id="result"> 
			<?php 
			$sql = "SELECT username , id FROM users ORDER BY `users`.`username` ASC ";
		 		$result = mysqli_query($connect,$sql);
			   while ($row=mysqli_fetch_row($result))
				{
				   	$block_query="SELECT id FROM `block` WHERE user_id =".$_SESSION["id"]." and blocked_user_id =".$row[1]." or user_id=".$row[1]." and blocked_user_id=".$_SESSION["id"].";";
				
				$block_result=mysqli_query($connect,$block_query);
				
				if(mysqli_num_rows($block_result) > 0)
	 			{
					
				}
				else
				{
				 echo '<br><span><a href="?PG=messages&S_user_id='.$row[1].'"><img src="cloud/'.$row[1].'/profile.jpg?v='.$_SESSION["my_version"].'" ><h2 style="color:steelblue!important;">'.$row[0].'</h2></span></a><br><br><br>';
				}
			   }
				  ?>

		</div>
		
	</aside>



<a href="?PG=S_profile&S_user_id=<?php echo $_SESSION["S_id"] ?>" ><h1 style=" position: fixed; top:4%;left:45%; z-index: 10; color:steelblue!important"><?php echo $_SESSION["S_username"]; ?></h1></a>
	<div  id="messageBox">
			
		<br>
		<br>
		<br>
		
		
		
		<div id="the_chat" >
	
			
		</div>
		
		
		
		<br>
		<br>
		<br>
		<br>
		<form id="send" class="theform" >
			<div class="message">
					<img src="cloud/<?php echo $_SESSION["id"]; ?>/profile.jpg?v='<?php echo $_SESSION["my_version"];?>'">

				<h4>me</h4>
				<textarea id="the_message" name="message" ></textarea>
				<input type="hidden" name="user_id" value="<?php echo $_SESSION["id"]; ?>">
				<input type="hidden" name="other_user_id" value="<?php echo $_SESSION["S_id"]; ?>">
				<input type="submit" id="submit" value="send">
			</form>
		
		
		
		
	</div>
		<span id="sound"></span>
		<span id="down"></span>
		
		<script>
			
			
			
			
				 
			
			setTimeout(function(){
					$('html, body').animate({
						scrollTop: $("#down").offset().top
					}, 1000);
			},1050)
		
			
		$("#godown").click(function() {
					$('html, body').animate({
						scrollTop: $("#down").offset().top
					}, 3000);
				});
		 $("#goup").click(function() {
			 $("html, body").animate({ 
				 scrollTop: 0 }, 3000);
			 return false;
					});
			
		$('.theform').on('submit', function (e) {
				
			
		 $("#sound").html('<audio src="audio/message.mp3" autoplay="on" ></audio>');
          e.preventDefault();
			
          $.ajax({
            type: 'post',
            url: 'phpDB/send_message.php',
            data: $(this).serialize(),
            success: function () {
				
				$('html, body').animate({
						scrollTop: $("#down").offset().top
					}, 1500);
				 $('#the_message').val("");
				
            }
          });

        });
			
			
			
			$('#the_message').keyup(function (event) {
					if (event.shiftKey && event.keyCode == 13) {
						var content = this.value;
						var caret = getCaret(this);
						this.value = content.substring(0, caret) + "\n" + content.substring(caret, content.length - 1);
						event.stopPropagation();
					} else if (event.keyCode == 13) {
						$('.theform').submit();
					}
				});
		
			
		
		</script>
		
		