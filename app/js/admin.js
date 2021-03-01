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