const triggerForm = () => {
    $('#districten-form').fadeOut();
    $('#import-form').delay(600).fadeIn();
}

const triggerformStudent = () => {
    $('#import-form').fadeOut();
    $('#districten-form').delay(600).fadeIn();
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