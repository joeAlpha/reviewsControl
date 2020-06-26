function saveEdition() {
    console.log(`Ok`);

    // $("#editForm").submit(function(event) {
    // console.log(`Ok`);

    // event.preventDefault();
    $formData = $("#editForm").serialize();
    console.log(`Data serialized: ${formData}`);

    // $.ajax({
    //     type: "POST",
    //     url: "includes/model/editModel.php", // API which will process the data
    //     data: formData, // Data 
    //     // Actions after the event was processed sucessfully
    //     success: function(result) {
    //         if (result != 0) {
    //             Header('Location: index.php');
    //         } else {
    //             $("#alertContainer").html(
    //                 "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" +
    //                 '  <i class="fa fa-ban"></i> Error at save new changes ' +
    //                 ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> ' +
    //                 '  <span aria-hidden="true">&times;</span> ' +
    //                 '</button> ' +
    //                 "</div>"
    //             );

    //             setTimeout(function() {
    //                 $('#alertContainer').html(' ');
    //             }, 3000);
    //         }

    //     }
    // });
    // });
}