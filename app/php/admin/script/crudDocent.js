function load_data() {
    $.ajax({
        url: "../../app/php/admin/fetchDocenten.php",
        type: "POST",
        cache: false,
        success: function(data) {
            $('#table').html(data);
        }
    });

}

$('#docentenform').on('submit', function(e) {
    e.preventDefault();
    var naam = $("#naam").val();
    var email = $("#email").val();
    var nummer = $("#nummer").val();
    $.ajax({
        url: "../../app/php/admin/crudDocent.php",
        method: "POST",
        data: {
            naam: naam,
            email: email,
            nummer: nummer,
            insert: 1
        },
        success: function(data) {
            if (data == 'success') {
                Swal.fire({
                    title: 'Successvol',
                    text: "docent succesvol ingevoerd",
                    icon: 'success',
                    confirmButtonColor: '#2e8b57',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {})
                $('#docentenform').trigger("reset");
                load_data();
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
                url: '../../app/php/admin/crudDocent.php',
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
        url: '../../app/php/admin/fetchSingle.php',
        data: {
            id: id,
            getDocent: 1
        },
        success: function(response) {
            $('#modal-edit').html(response);
            $('#modalEdit').modal('toggle');
        }
    })
});

const updateDocent = (e) => {
    var id = e;
    var naam = $("#naamU").val();
    var email = $("#emailU").val();
    var nummer = $("#nummerU").val();
    $.ajax({
        type: 'POST',
        url: '../../app/php/admin/crudDocent.php',
        data: {
            id: id,
            naam: naam,
            email: email,
            nummer: nummer,
            updateDocent: 1
        },
        success: function(response) {
            if (response == "success") {
                Swal.fire({
                    title: 'Succesvol',
                    text: "Docent succesvol bijgewerkt",
                    icon: 'success',
                    confirmButtonColor: '#2e8b57',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#modalEdit').modal('toggle');
                    }
                })
                $('#docentenUpdate').trigger("reset");
                load_data();
            } else if (response == 'exist') {}
        }
    })
}

const deleteDocent = (e) => {
    var id = e;

}