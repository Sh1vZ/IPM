
$(document).ready(function(){  

	load_data();
    
	function load_data()
	{
		$.ajax({
			url: "../../app/php/admin/crudDocent.php",
			type: "POST",
			cache: false,
			success: function(data){
				$('#table').html(data); 
			}
		});
		
	}
	
	
	
	
	$('#docentenform').on('submit', function(event){
		
			$('#form_action').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"../../app/php/admin/crudDocent.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					
					alert("succes");
					load_data();
					
				}
			});
		
		
	});
	
	

		$(document).on("click", ".delete", function() { 
			var value = $(this).val();
		    var action = 'delete';
			$.ajax({
				url: "../../app/php/admin/crudDocent.php",
				type: "POST",
				cache: false,
				data:{
					id: value,action:action
				},
				success: function(dataResult){
                    alert("you are about to delete this");
					load_data();
					var dataResult = JSON.parse(dataResult);
					
				}
			});
		});

		

	$(document).on('click', '.edit', function(){  
		
		var value = $(this).val();
		var action = 'fetch_single';
		
		$.ajax({  
			 url:"../../app/php/admin/crudDocent.php",  
			 method:"POST",  
			 data:{
				id: value,action:action
			},
			 dataType:"json",  
			 success:function(data){  
				$("#modal").modal("show");	
				$('#naam').val(data.naam);
				$('#email').val(data.email);
                $('#nummer').val(data.nummer);
				$('#modal').attr('title', 'Edit Data');
				$('#action').val('update');
				
				   
			 }  
		});  
   });  
	
});  
