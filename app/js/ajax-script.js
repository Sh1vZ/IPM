// $(document).on('submit', '#studentenForm', function(e) {
//     e.preventDefault();

//     $.ajax({
//         method: "POST",
//         url: "../php/studenten-registreren.php",
//         data: $(this).serialize(),
//         success: function(data) {
//             $('#msg').html(data);
//             $('#studentenForm').find('input').val('')

//         }
//     });
// });

function editData(e) {

    if ( 'undefined' != typeof id ) {
        $.getJSON('datatable.php?edit=' + id, function(obj) {
        $('#edit-id').val(obj.id);
        $('#firstname').val(obj.name);
        $('#email').val(obj.email);
        $('#mobile').val(obj.mobile);
        $('#edit-modal').modal('show')
        }).fail(function() { alert('Unable to fetch data, please try again later.') });
        } else alert('Unknown row id.');
        }
   
//     var id = e;
//     alert("Bent u zeker dat u dit wilt bewerken?");

//     $.ajax({
//         type: 'post',
//         url: '../../app/php/update-studenten.php',
//         data: {
//             "x": 1,
//             "id": id,
//         },
//         dataType: "text",
//         success: function(response) {
//             // $('#form-container').html(response);
//             // $('.selectpicker').selectpicker({});
//             $('#recordModal').modal('toggle');
//         }
//     });
// }

function deleteData(e) {
bootbox.confirm({
    message: "Bent U zeker dat u deze wilt verwijderen?",
    buttons: {
        confirm: {
            label: 'JA',
            className: 'btn-danger'
        },
        cancel: {
            label: 'NEE',
            className: 'btn-success'
        }
    },
    callback: function (result) {
        if (result) {
            // AJAX Request
            $.ajax({
                url: '../php/delete-studenten.php',
                type: 'POST',
                data: {
                    "Delete-Taak": 1,
                    "id": e,
                },
                success: function (response) {
                    // Removing row from HTML Table
                    if (response == 1) {
                        localStorage.setItem("Delete", response.OperationStatus)
                        location.reload();

                    } else {
                        bootbox.alert('Record not deleted.');
                    }

                }
            });
        }
    }
});
}

// var deleteData = function(id){

//     $.ajax({    
//         type: "GET",
//         url: "../../app/php/delete-studenten.php", 
//         data:{deleteId:id},            
//         dataType: "html",                  
//         success: function(data){   

//         $('#msg').html(data);
//        $('#table-container').load('../../app/php/show-studenten.php');
           
//         }  

//     });
// };