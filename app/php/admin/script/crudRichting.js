function load_data() {
    $.ajax({
        url: "../../app/php/admin/fetchRichting.php",
        type: "POST",
        cache: false,
        success: function(data) {
            $('#table').html(data);
        }
    });

}

$('#richtingform').on('submit', function(e) {
    e.preventDefault();
    var richting = $("#richting").val();
    $.ajax({
        url: "../../app/php/admin/crudRichting.php",
        method: "POST",
        data: {
            richting: richting,
            insert: 1
        },
        success: function(data) {
            if (data == 'success') {
                Swal.fire({
                    title: 'Successvol',
                    text: "Richting succesvol ingevoerd",
                    icon: 'success',
                    confirmButtonColor: '#2e8b57',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {})
                $('#richtingform').trigger("reset");
                load_data();
            }
            else if (data == 'exist') {
                Swal.fire({
                    icon: 'error',
                    title: 'Probeer opnieuw...',
                    text: 'Richting bestaat al!',
                 
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
                url: '../../app/php/admin/crudRichting.php',
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
        url: '../../app/php/admin/fetchSingleRichting.php',
        data: {
            id: id,
            getRichting: 1
        },
        success: function(response) {
            $('#modal-edit').html(response);
            $('#modalEdit').modal('toggle');
        }
    })
});

const updateRichting = (e) => {
    var id = e;
    var richting = $("#richtingU").val();
  
    $.ajax({
        type: 'POST',
        url: '../../app/php/admin/crudRichting.php',
        data: {
            id: id,
            richting: richting,
            updateRichting: 1
        },
        success: function(response) {
            if (response == "success") {
                Swal.fire({
                    title: 'Succesvol',
                    text: "Richting succesvol bijgewerkt",
                    icon: 'success',
                    confirmButtonColor: '#2e8b57',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#modalEdit').modal('toggle');
                    }
                })
                $('#richtingUpdate').trigger("reset");
                load_data();
            }  else if (response == 'exist') {
                Swal.fire({
                    icon: 'error',
                    title: 'Probeer opnieuw...',
                    text: 'Richting bestaat al!',
                 
                  })
            }
        }
    })
}