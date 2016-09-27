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
				$('#tableBody').html("can't load the data");
			}	
		});
	});
});