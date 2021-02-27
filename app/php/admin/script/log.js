
function load_data() {
    $.ajax({
		url: "../../app/php/admin/Log.php",
		type: "POST",
		cache: false,
		success: function(data){
			$('#table').html(data); 
		}
	});

}