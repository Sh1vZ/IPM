// // $(document).on('submit', '#studentenForm', function(e) {
// //     e.preventDefault();

// //     $.ajax({
// //         method: "POST",
// //         url: "../php/studenten-registreren.php",
// //         data: $(this).serialize(),
// //         success: function(data) {
// //             $('#msg').html(data);
// //             $('#studentenForm').find('input').val('')

// //         }
// //     });
// // });

// // function load_data() {
// //     $.ajax({
// //         url: "../../app/php/show-studenten.php",
// //         type: "POST",
// //         cache: false,
// //         success: function(data) {
// //             $('#table').html(data);
// //         }
// //     });

// // }

// // $('#studentenform').on('submit', function(e) {
// //     e.preventDefault();
// //     var Anaam = $("#Anaam").val();
// //     var Vnaam = $("#Vnaam").val();
// //     var GebDatum= $("#GebDatum").val();
// //     var GebPlaats= $("#GebPlaats").val();
// //      var Email = $("#Email").val();
    
// //     $.ajax({
// //         url: "../app/php/admin/studenten-registreren.php",
// //         method: "POST",
// //         data: {
// //             Anaam: Anaam,
// //             Vnaam: Vnaam,
// //             GebDatum: GebDatum,
// //             GebPlaats: GebPlaats,
// //             Email: Email,
          
// //             insert: 1
// //         },
// //         success: function(data) {
// //             if (data == 'success') {
// //                 Swal.fire({
// //                     title: 'Successvol',
// //                     text: "Student succesvol ingevoerd",
// //                     icon: 'success',
// //                     confirmButtonColor: '#2e8b57',
// //                     confirmButtonText: 'OK',
// //                     allowOutsideClick: false
// //                 }).then((result) => {})
// //                 $('#studentenform').trigger("reset");
// //                 load_data();
// //             }
// //         }
// //     });
// // });




// $('#documenten-form').on('submit', function(e) {
//     e.preventDefault();
//     var naam = $("#naam").val();
//     var path = $("#path").val();
    
//     $.ajax({
//         url: "../../app/php/admin/documenten-import.php",
//         method: "POST",
//         data: {
//             naam: naam,
//             path: path,
//             insert: 1
//         },
//         success: function(data) {
//             if (data == 'success') {
//                 Swal.fire({
//                     title: 'Successvol',
//                     text: "document succesvol ingevoerd",
//                     icon: 'success',
//                     confirmButtonColor: '#2e8b57',
//                     confirmButtonText: 'OK',
//                     allowOutsideClick: false
//                 }).then((result) => {})
//                 $('#documenten-form').trigger("reset");
//                 load_data();
//             }
//         }
//     });
// });


   


// $(document).on("click", ".delete", function() {
//     var id = $(this).val();
//     const swalWithBootstrapButtons = Swal.mixin({
//         customClass: {
//             confirmButton: 'btn btn-success',
//             cancelButton: 'btn btn-danger'
//         },
//         buttonsStyling: false
//     })

//     swalWithBootstrapButtons.fire({
//         title: 'Bent u zeker?',
//         text: "U kunt dit niet ongedaan maken!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonText: 'Ja, Verwijder het!',
//         cancelButtonText: 'Annuleren!',
//         reverseButtons: true
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 type: 'POST',
//                 url: '../../app/php/delete-studenten.php',
//                 data: {
//                     id: id,
//                     delete: 1
//                 },
//                 success: function(response) {
//                     if (response == 'success') {
//                         swalWithBootstrapButtons.fire(
//                             'Deleted!',
//                             'Verwijderd.',
//                             'success'
                            
//                         )
//                         load_data();
//                     }
//                 }
//             })

//         } else if (
//             /* Read more about handling dismissals below */
//             result.dismiss === Swal.DismissReason.cancel
//         ) {
//             swalWithBootstrapButtons.fire(
//                 'Cancelled',
//                 'U heeft niets verwijdert',
//                 'error'
//             )
//         }
//     })
// });






// $(document).on('click', '.edit', function() {
//     var id = $(this).val();
//     $.ajax({
//         type: 'POST',
//         url: '../../app/php/student-update-form.php',
//         data: {
//             id: id,
//             getStudent: 1
//         },
//         success: function(response) {
//             $('#modal-edit-student').html(response);
//             $('#modalEditStudent').modal('toggle');
//         }
//     })
// });



// const updateStudent = (e) => {
//     var id = e;
//     var Anaam = $("#Anaamu").val();
//     var Vnaam = $("#Vnaamu").val();
//     var GebDatum = $("#GebDatumu").val();
//     var GebPlaats = $("#GebPlaatsu").val();
//     var Email = $("#Emailu").val();
//     $.ajax({
//         type: 'POST',
//         url: '../../app/php/update-studenten.php',
//         data: {
//             id: id,
//             Anaam: Anaam,
//             Vnaam: Vnaam,
//             GebDatum: GebDatum,
//             GebPlaats: GebPlaats,
//             Email: Email,
//             updateStudent: 1
//         },
//         success: function(response) {
//             if (response == "success") {
                
//                 Swal.fire({
//                     title: 'Succesvol',
//                     text: "Student succesvol bijgewerkt",
//                     icon: 'success',
//                     confirmButtonColor: '#2e8b57',
//                     confirmButtonText: 'OK',
//                     allowOutsideClick: false
//                 })
//                 // }).then((result) => {
//                 //     if (result.isConfirmed) {
//                 //         $('#modalEditStudent').modal('toggle');
//                 //     }
//                 // })
//                 // $('#studentenUpdate').trigger("reset");
//                 // load_data();
//             } else if (response == 'exist') {}
//         }
//     })
// }


// $(document).on("click", ".deleteDoc", function() {
//     var id = $(this).val();
//     const swalWithBootstrapButtons = Swal.mixin({
//         customClass: {
//             confirmButton: 'btn btn-success',
//             cancelButton: 'btn btn-danger'
//         },
//         buttonsStyling: false
//     })

//     swalWithBootstrapButtons.fire({
//         title: 'Bent u zeker?',
//         text: "U kunt dit niet ongedaan maken!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonText: 'Ja, Verwijder het!',
//         cancelButtonText: 'Annuleren!',
//         reverseButtons: true
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 type: 'POST',
//                 url: '../../app/php/delete-documenten.php',
//                 data: {
//                     id: id,
//                     delete: 1
//                 },
//                 success: function(response) {
//                     if (response == 'success') {
//                         swalWithBootstrapButtons.fire(
//                             'Deleted!',
//                             'Verwijderd.',
//                             'success'
                            
//                         )
//                         load_data();
//                     }
//                 }
//             })

//         } else if (
//             /* Read more about handling dismissals below */
//             result.dismiss === Swal.DismissReason.cancel
//         ) {
//             swalWithBootstrapButtons.fire(
//                 'Cancelled',
//                 'U heeft niets verwijdert',
//                 'error'
//             )
//         }
//     })
// });