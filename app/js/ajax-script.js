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

function deleteData(id) {

    if(confirm('bent u zeker?')){
        $.ajax({


        type:'post',
        url:'delete-student.php',
        data:{deleteId:id},
        success:function(data){
            $('#delete'+id).hide('slow')
        }

        });
    }
}