
setInterval(function(){
			
			
			
			  $.ajax({
			  
			  url:'phpDB/messagesDB.php' ,
			  type:'POST',
			  data:'',
			  
			  success:function (data){
				  
				  $("#the_chat").html(data);
			  }
			  
		  });
			 
			},1000);
	
	

