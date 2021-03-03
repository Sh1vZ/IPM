function load_data() {
    $.ajax({
        url: "../../app/php/admin/fetchKlas.php",
        type: "POST",
        cache: false,
        success: function(data) {
            $('#table').html(data);
        }
    });

}

$('#klassenform').on('submit', function(e) {
    e.preventDefault();
    var klas = $("#klas").val();
    var richting = $("#richting").val();
    var docent = $("#docent").val();
    $.ajax({
        url: "../../app/php/admin/crudKlas.php",
        method: "POST",
        data: {
            klas: klas,
            richting: richting,
            docent: docent,
            insert: 1
        },
        success: function(data) {
            if (data == 'success') {
                Swal.fire({
                    title: 'Successvol',
                    text: "Klas succesvol ingevoerd",
                    icon: 'success',
                    confirmButtonColor: '#2e8b57',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {})
                $('#klassenform').trigger("reset");
                load_data();
            }
            else if (data == 'exist') {
                Swal.fire({
                    icon: 'error',
                    title: 'Probeer opnieuw...',
                    text: 'Klas bestaat al!',
                 
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
                url: '../../app/php/admin/crudKlas.php',
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
        url: '../../app/php/admin/fetchSingleKlas.php',
        data: {
            id: id,
            getKlas: 1
        },
        success: function(response) {
            $('#modal-edit').html(response);
            $('#modalEdit').modal('toggle');
        }
    })
});

const updateKlas = (e) => {
    var id = e;
    var klas = $("#klasU").val();
    var richting = $("#richtingU").val();
    var docent = $("#docentU").val();
    $.ajax({
        type: 'POST',
        url: '../../app/php/admin/crudKlas.php',
        data: {
            id: id,
            klas: klas,
            richting: richting,
            docent: docent,
            updateKlas: 1
        },
        success: function(response) {
            if (response == "success") {
                Swal.fire({
                    title: 'Succesvol',
                    text: "Klas succesvol bijgewerkt",
                    icon: 'success',
                    confirmButtonColor: '#2e8b57',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#modalEdit').modal('toggle');
                    }
                })
                $('#klasUpdate').trigger("reset");
                load_data();
            } else if (response == 'exist') {
                Swal.fire({
                    icon: 'error',
                    title: 'Probeer opnieuw...',
                    text: 'Klas bestaat al!',
                 
                  })
            }
        }
    })
}