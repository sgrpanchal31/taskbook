$(document).ready(function(){
	$(".button-collapse").sideNav();
	$(function(){
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
	});
	$(function(){
		$.ajax({
	    	url:"taskbook.php",
      	 	type:"POST",
			data:"actionfunction=taskData",
      		cache: false,
      	    success: function(response){
      	    	 console.log(response);
      	    	 if(parseInt(response)!=0){	
      	    	  	// alert(response);	 
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
	});

// 	$('.finish').click($(function(){
// 		$.ajax({
// 	    	url:"taskbook.php",
//       	 	type:"POST",
// 			data:"actionfunction=finish",
//       		cache: false,
//       	    success: function(response){
//       	    	 if(response!=1){		 
// 					$('.finish').attr(disable);
// 				 }
// 				if(response==''){		 
// 					$('.response').html("No task Assigned");
// 				}
// 			},
// 			error: function(){
// 				$('.response').html();
// 			}	
// 		});
// 	});
// });
	
	
});
$('.finish').click(function(){
		$.ajax({
	    	url:"taskbook.php",
      	 	type:"POST",
			data:"actionfunction=finish",
      		cache: false,
      	    success: function(response){
      	    	alert('fuck');
			},
			error: function(){
				alert('fuck23');	
			}	
		});
	});
