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
		// $(document).on('click', '#assign', function(){
		// 	$.ajax({
		//     	url:"taskbook.php",
	 //      	 	type:"POST",
		// 		data:"actionfunction=showAvailSubHead",
	 //      		cache: false,
	 //      	    success: function(response){		 
		// 			$('#availSubHead').html(response);
		// 		},
		// 		error: function(){
		// 			$('#availSubHead').html("Can't load the data");
		// 		}	

		// 	});
		// });
		$(document).on('click', '#submit', function(){
			var $task = $('#textarea1').val();
			var $data = 'task='+$task;
			$('input[name="locationthemes"]:checked').each(function() {
 
			});
			$.ajax({
		    	url:"taskbook.php",
	      	 	type:"POST",
				data:data+"&actionfunction=assignTask",
	      		cache: false,
	      	    success: function(response){		 
					$('#availSubHead').html(response);
				},
				error: function(){
					$('#availSubHead').html("Can't load the data");
				}	

			});
		});
		var pre_tds;
		$(document).on('click','.editbtn',function(){
			var edittrid = $(this).parent().parent().attr('id');
			var tdstr = "";
			var tds = $('#'+edittrid).children('td');
			pre_tds = tds;
			var username = tds.eq(0).text();
			var task = tds.eq(1).text();

			tdstr += "<td>"+username+"</td>";
			tdstr += '<td><input value="'+task+'" id="first_name2" type="text" class="validate"></td>';
			tdstr += "<td><button class='btn waves-effect waves-light cyan savebtn' type='submit' name='action'>save</button></td>"
			$('#'+edittrid).html(tdstr);

		});
    });
});











