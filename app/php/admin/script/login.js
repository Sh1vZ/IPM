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
			  required: "verplicht"
			 },
			username: "verplicht",
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
			
			},
			success : function(response){						
				if(response=="ok"){									
					$("#login_button").html(' Inloggen ...');
					setTimeout(' window.location.href = "./dashboard.php"; ',400);
				}  
			
				else if (response == 'wrong') {
					Swal.fire({
						icon: 'error',
						title: 'Gebruikersnaam of password incorrect',
						text: 'Probeer opnieuw!',
					 
					})
					$('#login-form').trigger("reset");
				}
			}
		});
		return false;
	}   
});

