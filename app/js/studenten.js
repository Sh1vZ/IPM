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