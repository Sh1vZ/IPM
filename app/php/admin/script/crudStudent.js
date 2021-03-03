function load_data() {
    $.ajax({
        url: "../../app/php/admin/fetchStudenten.php",
        type: "POST",
        cache: false,
        success: function(data) {
            $('#table').html(data);
        }
    });

}

$('#StudentenForm').on('submit', function(e) {
    e.preventDefault();
    var Anaam = $("#Anaami").val();
        var Vnaam = $("#Vnaami").val();
        var GebDatum= $("#GebDatumi").val();
        var GebPlaats= $("#GebPlaatsi").val();
         var Email = $("#Emaili").val();
    $.ajax({
        url: "../../app/php/admin/crudStudent.php",
        method: "POST",
        data: {
            Anaam: Anaam,
            Vnaam: Vnaam,
            GebDatum: GebDatum,
            GebPlaats: GebPlaats,
            Email: Email,
            insert: 1
        },
        success: function(data) {
            if (data == 'success') {
                Swal.fire({
                    title: 'Succesvol',
                    text: "Student succesvol ingevoerd",
                    icon: 'success',
                    confirmButtonColor: '#2e8b57',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {})
                $('#StudentenForm').trigger("reset");
                load_data();
            }
            else if (data == 'exist') {
                Swal.fire({
                    icon: 'error',
                    title: 'Probeer opnieuw...',
                    text: 'Student bestaat al!',
                 
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
                url: '../../app/php/admin/crudStudent.php',
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
        url: '../../app/php/admin/fetchSingleStudent.php',
        data: {
            id: id,
            getStudent: 1
        },
        success: function(response) {
            $('#modal-edit-student').html(response);
            $('#modalEditStudent').modal('toggle');
        }
    })
});

const updateStudent = (e) => {
    var id = e;
    var Anaam = $("#Anaamu").val();
    var Vnaam = $("#Vnaamu").val();
    var GebDatum = $("#GebDatumu").val();
    var GebPlaats = $("#GebPlaatsu").val();
    var Email = $("#Emailu").val();
    $.ajax({
        type: 'POST',
        url: '../../app/php/admin/crudStudent.php',
        data: {
            id: id,
            Anaam: Anaam,
            Vnaam: Vnaam,
            GebDatum: GebDatum,
            GebPlaats: GebPlaats,
            Email: Email,
            updateStudent: 1
        },
        success: function(response) {
            if (response == "success") {
                Swal.fire({
                    title: 'Succesvol',
                    text: "Student succesvol bijgewerkt",
                    icon: 'success',
                    confirmButtonColor: '#2e8b57',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#modalEditStudent').modal('toggle');
                    }
                })
                $('#studentenUpdate').trigger("reset");
                load_data();
            } else if (response == 'exist') {
                Swal.fire({
                    icon: 'error',
                    title: 'Probeer opnieuw...',
                    text: 'Student bestaat al!',
                 
                  })
            }
        }
    })
}