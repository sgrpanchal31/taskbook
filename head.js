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
		$(document).on('click', '#submit', function(){
			var task = $('#textarea1').val();
			var data = 'task='+task+'&names=';
			var counter = 0;
			$('input[name="checkSubHead"]:checked').each(function() {
				counter++;
 				data += $(this).val()+',';
			});
			if(task == "" || counter == 0){
				alert("Please fill all inputs");
			}else{
				$('#submit').addClass('disabled');
				$.ajax({
			    	url:"taskbook.php",
		      	 	type:"POST",
					data:data+"&actionfunction=assignTask",
		      		cache: false,
		      	    success: function(response){		 
		      	    	alert(response);
		      	    	$('#submit').removeClass('disabled');
					},
					error: function(){
						alert("There is some problem ");				
					}	
				});
			}
		});
		var pre_tds;
		$(document).on('click','.editbtn',function(){
			var edittrid = $(this).parent().parent().attr('id');
			var tdstr = "";
			var tds = $('#'+edittrid).children('td');
			pre_tds = tds;
			var username = tds.eq(0).text();
			var task = tds.eq(1).text();

			tdstr += "<td id='assignedTo'>"+username+"</td>";
			tdstr += '<td><input value="'+task+'" id="editTask" type="text" class="validate"></td>';
			tdstr += "<td><button class='btn waves-effect waves-light cyan savebtn' type='submit' name='action'>save</button></td>"
			$('#'+edittrid).html(tdstr);

		});
		$(document).on('click', '.savebtn', function(){
			var task = $('#editTask').val();
			var assignedTo = $('#assignedTo').html();
			var data = "assignedTo="+assignedTo+"&task="+task+"&actionfunction=saveTask";
			if(task == "" || assignedTo=="" || data == ""){
				alert("Please fill all fields");
			}else{
				$('#savebtn').addClass('disabled');
				console.log(data);
				$.ajax({
			    	url:"taskbook.php",
		      	 	type:"POST",
					data:data,
		      		cache: false,
		      	    success: function(response){

		      	    	alert(response);
		      	    	$('#submit').removeClass('disabled');
						window.location.reload();
					},
					error: function(response){
						alert(response);				
					}	
				});
			}
		});
    });
});











