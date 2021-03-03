$(document).ready(function(){  
	$.ajax({
		url: "../../app/php/admin/dash.php",
		type: "POST",
		cache: false,
		success: function(data){
			$('#table').html(data); 
		}
	});

});

function load_data() {
    $.ajax({
		url: "../../app/php/admin/log.php",
		type: "POST",
		cache: false,
		success: function(data){
			$('#table1').html(data); 
		}
	});

}