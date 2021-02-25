function load_data() {
    $.ajax({
        url: "../../app/php/admin/fetchVak.php",
        type: "POST",
        cache: false,
        success: function(data) {
            $('#table').html(data);
        }
    });

}


$('#vakform').on('submit', function(e) {
    e.preventDefault();
    var vak = $("#vak").val();
    var docent = $("#docent").val();
    var richting = $("#richting").val();
    $.ajax({
        url: "../../app/php/admin/crudVak.php",
        method: "POST",
        data: {
            vak: vak,
            docent: docent,
            richting: richting,
            insert: 1
        },
        success: function(data) {
            if (data == 'success') {
                Swal.fire({
                    title: 'Successvol',
                    text: "Vak succesvol ingevoerd",
                    icon: 'success',
                    confirmButtonColor: '#2e8b57',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {})
                $('#vakform').trigger("reset");
                load_data();
            }
            else if (data == 'exist') {
                Swal.fire({
                    icon: 'error',
                    title: 'Probeer opnieuw...',
                    text: 'Vak bestaat al!',
                 
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
                url: '../../app/php/admin/crudVak.php',
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
        url: '../../app/php/admin/fetchSingleVak.php',
        data: {
            id: id,
            getVak: 1
        },
        success: function(response) {
            $('#modal-edit').html(response);
            $('#modalEdit').modal('toggle');
        }
    })
});

const updateVak = (e) => {
    var id = e;
    var vak = $("#vakU").val();
  
    $.ajax({
        type: 'POST',
        url: '../../app/php/admin/crudVak.php',
        data: {
            id: id,
            vak: vak,
            updateVak: 1
        },
        success: function(response) {
            if (response == "success") {
                Swal.fire({
                    title: 'Succesvol',
                    text: "Vak succesvol bijgewerkt",
                    icon: 'success',
                    confirmButtonColor: '#2e8b57',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#modalEdit').modal('toggle');
                    }
                })
                $('#vakUpdate').trigger("reset");
                load_data();
            }  else if (response == 'exist') {
                Swal.fire({
                    icon: 'error',
                    title: 'Probeer opnieuw...',
                    text: 'Vak bestaat al!',
                 
                  })
            }
        }
    })
}