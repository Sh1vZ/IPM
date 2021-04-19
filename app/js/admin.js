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

$("#import-form").on('submit', (function(e) {
    e.preventDefault();
    $.ajax({
        url: "../../app/php/admin/studenten-import.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $(".import").html(' <button type="button" class="btn btn-success my-4">Bezig ... <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>')
        },
        success: function(response) {
            if (response === 'success') {
                Swal.fire({
                    title: 'Successvol',
                    text: "U heeft succesvol data geimporteerd.",
                    icon: 'success',
                    confirmButtonColor: '#2e8b57',
                    confirmButtonText: 'Ok',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(".import").html('<button type="submit" id="importBtn" class="btn btn-success ">Importeren</button>')
                            // location.reload();
                        load_data();
                    }
                })
                $('#import-form').trigger("reset");
            } else if (response == "errorEmpty") {
                Swal.fire({
                    title: 'Bestand niet geselecteerd!',
                    text: 'Selecteer een bestand',
                    icon: 'error',
                    confirmButtonColor: '#2e8b57',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(".import").html('<button type="submit" id="importBtn" class="btn btn-success ">Importeren</button>')
                    }
                })
            }
        },
    });
}));


$("#cijfer-import-form").on('submit', (function(e) {
    e.preventDefault();
    $.ajax({
        url: "../../app/php/admin/cijfer-import.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $(".import").html(' <button type="button" class="btn btn-success my-4">Bezig ... <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>')
        },
        success: function(response) {
            if (response === 'success') {
                Swal.fire({
                    title: 'Successvol',
                    text: "U heeft succesvol data geimporteerd.",
                    icon: 'success',
                    confirmButtonColor: '#2e8b57',
                    confirmButtonText: 'Ok',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(".import").html('<button type="submit" id="importBtn" class="btn btn-success ">Importeren</button>')
                            // location.reload();
                        load_data();
                    }
                })
                $('#import-form').trigger("reset");
            } else if (response == "errorEmpty") {
                Swal.fire({
                    title: 'Bestand niet geselecteerd!',
                    text: 'Selecteer een bestand',
                    icon: 'error',
                    confirmButtonColor: '#2e8b57',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(".import").html('<button type="submit" id="importBtn" class="btn btn-success ">Importeren</button>')
                    }
                })
            }
        },
    });
}));


const acceptBedrag = (id, f) => {

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Bent u zeker?',
        text: `U gaat dit bedrag accepteren`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ja,accepteer!',
        cancelButtonText: 'Annuleren!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../app/php/admin/accbedrag.php",
                type: "POST",
                cache: false,
                data: {
                    id: id,
                    rid: f,
                    Acc: 1
                },
                success: function(data) {
                    if (data == "success") {
                        Swal.fire({
                            title: 'Successvol',
                            text: "Bedrag geaccepteerd.",
                            icon: 'success',
                            confirmButtonColor: '#2e8b57',
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload()
                            }
                        })
                    }
                }
            });

        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Anuleerd',
                'U heeft niets geaccepteerd',
                'error'
            )
        }
    })


}