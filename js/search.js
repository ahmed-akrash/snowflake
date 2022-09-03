 $(document).ready(function (){
	 
	  $("#SC").keyup(function (){
		  
		 var char =  $(this).val();
		  
		 /* if(char == ''){
			  $("#result").html('');
			  return false;
		  }*/
		  
			  $.ajax({
			  
			  url:'phpDB/searchDB.php' ,
			  type:'POST',
			  data:'search=' + char  ,
			  
			  success:function (data){
				  
				  $("#result").html(data);
			  }
			  
		  });
		  
		  
	  });
	 
 });
	
	

