$("#import-form").on('submit', (function(e) {
    e.preventDefault();
    $.ajax({
        url: "../../app/php/studenten-import.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {},
        success: function(response) {

        },
    });
}));