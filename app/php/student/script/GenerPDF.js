$('#genDispensatie').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        url: "../../app/php/student/generatePDF.php",
        method: "POST",
        data: {
           
            insert: 1
        },
        success: function(data) {
            if (data == 'success') {
                Swal.fire({
                    title: 'Successvol',
                    text: "Dispensatie brief succesvol gegenereerd",
                    icon: 'success',
                    confirmButtonColor: '#2e8b57',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then(function(isConfirm) {
                    if (isConfirm) {
                    //    location.reload();
                   
                    //    $("#modalBrief").hide();
                        $("#modalDownl").modal("toggle");
                        
                        // $("#show-button").hide()
                     
                    }
                }),
                $('#genDispensatie').trigger("reset");
                 
                load_data();
            }
            else if (data == 'exist') {
                Swal.fire({
                    icon: 'error',
                    title: 'Probeer opnieuw...',
                    text: 'Iets ging mis!',
                 
                  })
            }
        }
    });
});


$('#genLaatbrief').on('submit', function(e) {
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
            if (data == 'success') {
                Swal.fire({
                    title: 'Successvol',
                    text: "Laat brief succesvol gegenereerd",
                    icon: 'success',
                    confirmButtonColor: '#2e8b57',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then(function(isConfirm) {
                    if (isConfirm) {
                    //    location.reload();
                   
                    //    $("#modalDownl").hide();
                    //    $("#modalDownl").modal("toggle");
                        
                        // $("#show-button").hide()
                     
                    }
                }),
                $('#genLaatbrief').trigger("reset");
                 
                load_data();
            }
            else if (data == 'exist') {
                Swal.fire({
                    icon: 'error',
                    title: 'Probeer opnieuw...',
                    text: 'Iets ging mis!',
                 
                  })
            }
        }
    });
});