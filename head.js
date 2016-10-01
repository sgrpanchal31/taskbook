$(document).ready(function(){
    $('.modal-trigger').leanModal();
    $(".dropdown-button").dropdown();
    $(".button-collapse").sideNav();

    function showDataHead(){
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
	};
	showDataHead();
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
		var count;
		$(document).on('click', '#submit', function(){
			count=Math.floor(Math.random()*100000);

			var task = $('#textarea1').val();
			var data = 'taskID='+count+'&task='+task+'&names=';
			var counter = 0;
			$('input[name="checkSubHead"]:checked').each(function() {
				counter++;
 				data += $(this).val()+',';
			});
			if(task == "" || counter == 0){
				Materialize.toast('Please fill in all the fields!', 5000);
			}else{
				$('#submit').addClass('disabled');
				$.ajax({
			    	url:"taskbook.php",
		      	 	type:"POST",
					data:data+"&actionfunction=assignTask",
		      		cache: false,
		      	    success: function(response){		 
		      	    	Materialize.toast(response, 4000);

		      	    	$('#submit').removeClass('disabled');
		      	    	 $("#form1").trigger("reset");
		      	    	 $('#modal1').closeModal();
		      	    	 showDataHead();
					},
					error: function(){
						alert("There is some problem ");				
					}	
				});
			}
		});
		var pre_tds;
		function editTask(){
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

		};
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
		$(document).on('click','.delbtn',function(){
			var deltrid = $(this).parent().parent().attr('id');
			var tdstr = "";
			var tds = $('#'+deltrid).children('td');
			pre_tds = tds;
			var username = tds.eq(0).text();
			var task = tds.eq(1).text();
			var data = "assignedTo="+username+"&task="+task+"&actionfunction=deleteData";
			$.ajax({
				url:"taskbook.php",
				type:"POST",
				data:data,
				cache: false,
				success: function(response){
					Materialize.toast(response, 5000);
					showDataHead();
				},
				error: function(response){

				}
			});

		});
		$(document).on('click', '.savebtn', function(){
			var task = $('#editTask').val();
			var assignedTo = $('#assignedTo').html();
			var data = "assignedTo="+assignedTo+"&task="+task+"&actionfunction=saveTask";
			if(task == "" || assignedTo=="" || data == ""){
				Materialize.toast('Please fill in all the fields!', 5000);
			}else{
				$('#savebtn').addClass('disabled');
				
				$.ajax({
			    	url:"taskbook.php",
		      	 	type:"POST",
					data:data,
		      		cache: false,
		      	    success: function(response){

		      	    	Materialize.toast(response, 5000);
		      	    	$('#submit').removeClass('disabled');
						showDataHead();
					},
					error: function(response){
						Materialize.toast(response, 5000);				
					}	
				});
			}
		});
    
});











