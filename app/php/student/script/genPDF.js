$('#genDispensatie').on('submit', function(e) {

    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: "../../app/php/student/generatePDF.php",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.submit').attr("disabled", "disabled");

        },

        success: function(data) {

            if (data == 'no') {
                Swal.fire({
                    icon: 'error',
                    title: 'Je hebt niet genoeg saldo',
                    text: 'Vraag meer saldo aan!',

                })
                $('#genDispensatie').trigger("reset");
                load_data();
            } else {
                window.location.href = data;
            }
            

        }



    });
});


$('#GenLaatbrief').on('submit', function(e) {
    e.preventDefault();
    var datum = $("#datum").val();
    var tijd = $("#tijd").val();
    var lesuur = $("#lesuur").val();
    var docent = $("#docent").val();
    var reden = $("#reden").val();
    $.ajax({
        url: "../../app/php/student/generateLaatbrief.php",
        method: "POST",
        data: {
            datum: datum,
            tijd: tijd,
            lesuur: lesuur,
            docent: docent,
            reden: reden,
            insertLaatbrief: 1
        },

        success: function(data) {


            window.location.href = data;



        }



    });
});