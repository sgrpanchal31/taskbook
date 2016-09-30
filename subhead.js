$(document).ready(function(){
	$(".button-collapse").sideNav();
	function showData(){
		$.ajax({
	    	url:"taskbook.php",
      	 	type:"POST",
			data:"actionfunction=showData",
      		cache: false,
      	    success: function(response){		 
				$('#tableBody').html(response);
			},
			error: function(){
				$('#tableBody').html("Can't load the data");
			}	
		});
	};
	function taskData(){
		$.ajax({
	    	url:"taskbook.php",
      	 	type:"POST",
			data:"actionfunction=taskData",
      		cache: false,
      	    success: function(response){
      	    	 if(parseInt(response)!=0){	 
					$('.response').html(response);
					$('.finish').prop("disabled",false);
				 }
				if(parseInt(response)==0){
							 
					$('.response').html("No task Assigned");
					$('.finish').prop("disabled",true);
					
				}
			},
			error: function(){
				$('.response').html();
			}	
		});
	};	
	showData();
	taskData();
	$('.finish').click(function(){
		$.ajax({
	    	url:"taskbook.php",
	  	 	type:"POST",
			data:"actionfunction=finish",
	  		cache: false,
	  	    success: function(response){
	  	    	showData();
	  	    	taskData();
			},
			error: function(){
					
			}	
		});
	});
});
