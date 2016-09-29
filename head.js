$(document).ready(function(){
    $('.modal-trigger').leanModal();
    $(".dropdown-button").dropdown();
    $(".button-collapse").sideNav();

    $(function(){
		$.ajax({
	    	url:"taskbook.php",
      	 	type:"POST",
			data:"actionfunction=showDataHead",
      		cache: false,
      	    success: function(response){		 
				$('#headTable').html(response);
			},
			error: function(){
				$('#headTable').html("Can't load the data");
			}	
		});
		$(document).on('click', '#assign', function(){
			$.ajax({
	    	url:"taskbook.php",
      	 	type:"POST",
			data:"actionfunction=showAvailSubHead",
      		cache: false,
      	    success: function(response){		 
				$('#availSubHead').html(response);
			},
			error: function(){
				$('#availSubHead').html("Can't load the data");
			}	
		});
		});
	});
    
});