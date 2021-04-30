function load_data() {
    $.ajax({
        url: "../../app/php/admin/fetchDocumenten.php",
        type: "POST",
        cache: false,
        success: function(data) {
            $('#table').html(data);
        }
    });

}

$('#documentenform').on('submit', function(e) {
   
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "../../app/php/admin/upload.php",
            data: new FormData(this),
            // dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submit').attr("disabled","disabled");
              
            },
   
            success: function(data) {
                if (data == 'success') {
                    Swal.fire({
                        title: 'Successvol',
                        text: "Document succesvol ingevoerd",
                        icon: 'success',
                        confirmButtonColor: '#2e8b57',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false
                    }).then((result) => {})
                    $('documentenform').trigger("reset");
                    load_data();
                }
            else if (data == 'exist') {
                Swal.fire({
                    icon: 'error',
                    title: 'Probeer opnieuw...',
                    text: 'Document bestaat al!',
                 
                  })
            }
        }
    });
});



$(document).on("click", ".delete", function() {
    var id = $(this).val();
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Bent u zeker?',
        text: "U kunt dit niet ongedaan maken!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ja, Verwijder het!',
        cancelButtonText: 'Annuleren!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: '../../app/php/admin/crudDocument.php',
                data: {
                    id: id,
                    delete: 1
                },
                success: function(response) {
                    if (response == 'success') {
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Verwijderd.',
                            'success'
                        )
                        load_data();
                    }
                }
            })

        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'U heeft niets verwijdert',
                'error'
            )
        }
    })
});



$(document).on('click', '.edit', function() {
    var id = $(this).val();
    $.ajax({
        type: 'POST',
        url: '../../app/php/admin/fetchSingleDocument.php',
        data: {
            id: id,
            getDocument: 1
        },
        success: function(response) {
            $('#modal-edit').html(response);
            $('#modalEdit').modal('toggle');
        }
    })
});

const updateDocument = (e) => {
    var id = e;
    var naam = $("#naamU").val();
    var prijs = $("#prijsU").val();
 

    $.ajax({
        type: 'POST',
        url: '../../app/php/admin/crudDocument.php',
        data: {
            id: id,
            naam: naam,
            prijs: prijs,
            updateDocument: 1
        },
        success: function(response) {
            if (response == "success") {
                Swal.fire({
                    title: 'Succesvol',
                    text: "Document succesvol bijgewerkt",
                    icon: 'success',
                    confirmButtonColor: '#2e8b57',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#modalEdit').modal('toggle');
                    }
                })
                $('#documentenUpdate').trigger("reset");
                load_data();
            } else if (response == 'exist') {
                Swal.fire({
                    icon: 'error',
                    title: 'Probeer opnieuw...',
                    text: 'Document bestaat al!',
                 
                  })
            }
        }
    })
}

$('#import-form-documenten').on('submit', function(e) {
    e.preventDefault();
    var naam = $("#naam").val();
    var file = $("#file").val();
    var student= $("#student").val();

    $.ajax({
        url: "../../app/php/admin/export.php",
        method: "POST",
        data: {
            naam: naam,
            file: file,
            student: student,
           
          
            insert: 1
        },
        success: function(data) {
            if (data == 'success') {
                Swal.fire({
                    title: 'Successvol',
                    text: "Laatbrief succesvol ingevoerd",
                    icon: 'success',
                    confirmButtonColor: '#2e8b57',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {})
                $('#import-form-documenten').trigger("reset");
                load_data();
            }
            else if (data == 'exist') {
                Swal.fire({
                    icon: 'error',
                    title: 'Probeer opnieuw...',
                    text: 'Laatbrief bestaat al!',
                 
                  })
            }
        }
    });
});

