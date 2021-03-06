const triggerForm = () => {
    $('#StudentenForm').fadeOut();
    $('#import-form').delay(600).fadeIn();
}

const triggerformStudent = () => {
    $('#import-form').fadeOut();
    $('#StudentenForm').delay(600).fadeIn();
}

$("#importeren").click(function() {
    triggerForm();
    $("#toevoegen").removeClass('active');
    $("#importeren").addClass('active')
});
$("#toevoegen").click(function() {
    triggerformStudent();
    $("#toevoegen").addClass('active');
    $("#importeren").removeClass('active')
});


