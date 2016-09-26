$(document).ready(function(){
	$(document).on('click', '.login', function() {
		var username = $("username").val();
		var password = $("password").val();

		var data = "username="+username+"&password="+password+"&actionfunction=logIn";

		if(username=='' || password=='') {
			Materialize.toast('Please Fill all Fields!', 3000, 'rounded');
		} else {
			$.ajax({
				url:"taskbook.php",
				type:"POST",
				data:data,
				cache:false,
				success: function(response) {
					if(response!='error'){

					}
				}
			});
		}

	});
});