
const triggerFormsec = () => {
    $('#import-form-documenten').fadeOut();
    $('#documentenform').delay(600).fadeIn();
}

const triggerformDocument = () => {
    $('#documentenform').fadeOut();
    $('#import-form-documenten').delay(600).fadeIn();
}

$("#documenten").click(function() {
    triggerFormsec();
    $("#documenten").addClass('active');
    $("#laatbrieven").removeClass('active')
   
});
$("#laatbrieven").click(function() {
    triggerformDocument();
    $("#documenten").removeClass('active');
    $("#laatbrieven").addClass('active')
    
});