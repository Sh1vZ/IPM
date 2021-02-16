$(document).on('submit','#studentenForm',function(e){
    e.preventDefault();
   
    $.ajax({
    method:"POST",
    url: "../php/studenten-registreren.php",
    data:$(this).serialize(),
    success: function(data){
    $('#msg').html(data);
    $('#studentenForm').find('input').val('')

}});
});

$("#recordListing").on('click', '.update', function(){
	var id = $(this).attr("id");
	var action = 'getRecord';
	$.ajax({
		url:'ajax_action.php',
		method:"POST",
		data:{id:id, action:action},
		dataType:"json",
		success:function(data){
			$('#recordModal').modal('show');
			// $('#id').val(data.id);
			// $('#name').val(data.name);
			// $('#age').val(data.age);
			// $('#skills').val(data.skills);				
			// $('#address').val(data.address);
			// $('#designation').val(data.designation);	
			$('.modal-title').html(" Edit Records");
			$('#action').val('updateRecord');
			$('#save').val('Save');
		}
	})
});
// function editData(e) {
//   // alert(e);
//   var id = e;
//   // alert(e);

//   $.ajax({
//       type: 'post',
//       url: '../php/update-studenten.php',
//       data: {
//           "x": 1,
//           "id": id,
//       },
//       dataType: "text",
//       success: function (response) {
//           $('#form-container').html(response);
//           $('.selectpicker').selectpicker({});
//           $('#modal').modal('toggle');
//       }
//   });
// }

// function edit(e) {

//   var Anaam = $('#Anaam').val();
//   var Vnaam = $('#Vnaam').val();
//   var GebDatum = $('#GebDatum').val();
//   var GebPlaats = $('#GebPlaats').val();
//   var Email = $('#Email').val();


//   $.ajax({
//       url: '../update-studenten.php',
//       type: 'POST',
//       data: {
//           'update': 1,
//           'id': e,
//           'Anaam': Anaam,
//           'Vnaam': Vnaam,
//           'GebDatum': GebDatum,
//           'GebPlaats': GebPlaats,
//           'Email': Email,
          

//       },
//       success: function (response) {
//           localStorage.setItem("Update", response.OperationStatus)
//           location.reload();
//       }
//   });
// }



//  function editData(id){
//     $('#table-container').load('../php/student-update-form.php')
 
//      $.ajax({    
//          type: "GET",
//          url: "../php/update-studenten.php", 
//          data:{editId:id},            
//          dataType: "html",                  
//          success: function(data){   
 
//            var userData=JSON.parse(data);  
//            $("input[name='Anaam']").val(userData.Anaam);               
//            $("input[name='Vnaam']").val(userData.Vnaam);
//            $("input[name='GebDatum']").val(userData.GebDatum);
//            $("input[name='GebPlaats']").val(userData.GebPlaats);
//            $("input[name='Email']").val(userData.Email);
            
//          }
 
//      });
//  };
 
 
 
//  $(document).on('submit','#updateForm',function(e){
//          e.preventDefault();
//           var Anaam= $("input[name='Anaam']").val();               
//           var Vnaam= $("input[name='Vnaam']").val();
//           var GebDatum= $("input[name='GebDatum']").val();
//           var GebPlaats= $("input[name='GebPlaats']").val();
//           var Email= $("input[name='Email']").val();
//          $.ajax({
//          method:"POST",
//          url: "../php/update-studenten.php",
//          data:{
//            updateId:id,
//            Anaam:Anaam,
//            Vnaam:Vnaam,
//            Gebdatum:GebDatum,
//            GebPlaats:GebPlaats,
//            Email:Email
 
//          },
//          success: function(data){
//          $('#table-container').load('../php/show-studenten.php');
//          $('#msg').html(data);
    
//      }});
//  });


 var deleteData = function(id){

  $.ajax({    
      type: "GET",
      url: "../php/delete-studenten.php", 
      data:{deleteId:id},            
      dataType: "html",                  
      success: function(data){   

      $('#msg').html(data);
     $('#table-container').load('../php/show-studenten.php');
         
      }

  });
};