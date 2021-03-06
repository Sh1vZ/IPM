$("#studentenForm").on('submit', (function(e) {
    e.preventDefault();
    $.ajax({
        url: "./app/php/student/login.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {},
        success: function(response) {
            if (response == 'success') {
                let timerInterval
                Swal.fire({
                    title: 'U bent succesvol ingelogd',
                    html: 'U gaat nu naar de resultaten pagina',
                    timer: 1500,
                    timerProgressBar: true,
                    willOpen: () => {
                        Swal.showLoading()
                        timerInterval = setInterval(() => {
                            const content = Swal.getContent()
                            if (content) {
                                const b = content.querySelector('b')
                                if (b) {
                                    b.textContent = Swal.getTimerLeft()
                                }
                            }
                        }, 100)
                    },
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        window.location = './pages/user/home.php'
                    }
                })
            }
        },
    });
}));

$("#bedragForm").submit(function(e) {
    e.preventDefault();
    var bedrag = $('#bedrag').val();
    $.ajax({
        url: "../../app/php/student/bedrag.php",
        method: "post",
        data: {
            bedrag: bedrag
        },
        dataType: "text",
        success: function(data) {
            if (data == 'exist') {
                Swal.fire({
                    title: 'Error',
                    text: "U heeft al een opvraag gedaan.",
                    icon: 'error',
                    confirmButtonColor: '#2e8b57',
                    confirmButtonText: 'Ok',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {}
                })
            }
            if (data == 'success') {
                Swal.fire({
                    title: 'Successvol',
                    text: "Bedrag opvraag gestuurd.",
                    icon: 'success',
                    confirmButtonColor: '#2e8b57',
                    confirmButtonText: 'Ok',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {}
                    $("#bedragForm")[0].reset();
                })
            }
        }
    });
});

const Getsaldo = () => {
    $.ajax({
        method: "POST",
        url: "../../app/php/admin/getSaldo.php",
        success: function(data) {
            $('#valSaldo').html(`Saldo: SRD ${data}`);
        }
    });
}