
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
	
	
	$('#submit').click(function(){
		$('#Mymodal').attr('title', 'Add Data');
		$('#action').val('insert');
		$('#form_action').val('Toevoegen');
		$('#docentenform')[0].reset();
		$('#form_action').attr('disabled', false);
		$("#Mymodal").dialog('open');
	});
	
	$('#docentenform').on('submit', function(event){
		
			$('#form_action').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"../../app/php/admin/crudDocent.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					$('#Mymodal').dialog('close');
					alert("succes");
					load_data();
					$('#form_action').attr('disabled', false);
				}
			});
		
		
	});
	

	
	$(document).on('click', '.edit', function(){
		var value = $(this).attr('id');
		var action = 'fetch_single';
		$.ajax({
			url:"../../app/php/admin/crudDocent.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#naam').val(data.naam);
				$('#email').val(data.email);
                $('#nummer').val(data.nummer);
				$('#Mymodal').attr('title', 'Edit Data');
				$('#action').val('update');
				$('#hidden_id').val(id);
				$('#form_action').val('Update');
				$('#Mymodal').dialog('open');
			}
		});
	});
	
	$('#delete_confirmation').dialog({
		autoOpen:false,
		modal: true,
		buttons:{
			Ok : function(){
				var id = $(this).data('id');
				var action = 'delete';
				$.ajax({
					url:"../../app/php/admin/crudDocent.php",
					method:"POST",
					data:{id:id, action:action},
					success:function(data)
					{
						$('#delete_confirmation').dialog('close');
						alert("succes");
						load_data();
					}
				});
			},
			Cancel : function(){
				$(this).dialog('close');
			}
		}	
	});
	
	$(document).on('click', '.delete', function(){
		var value = $(this).attr("id");
		$('#delete_confirmation').data('id', id).dialog('open');
	});
	
});  
