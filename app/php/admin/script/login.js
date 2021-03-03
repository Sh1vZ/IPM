$('document').ready(function() { 
	/* handling form validation */
	$("#login-form").validate({
		rules: {
			password: {
				required: true,
			},
			username: {
				required: true,
				
			},
		},
		messages: {
			password:{
			  required: "password verplicht"
			 },
			username: "gebruikersnaam verplicht",
		},
		submitHandler: submitForm	
	});	   
	/* Handling login functionality */
	function submitForm() {		
		var data = $("#login-form").serialize();				
		$.ajax({				
			type : 'POST',
			url  : '../../app/php/admin/sign-in.php',
			data : data,
			beforeSend: function(){	
				$("#error").fadeOut();
				$("#login_button").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; bezig ...');
			},
			success : function(response){						
				if(response=="ok"){									
					$("#login_button").html(' Inloggen ...');
					setTimeout(' window.location.href = "./dashboard.php"; ',400);
				} else {									
					$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
						$("#login_button").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
					});
				}
			}
		});
		return false;
	}   
});