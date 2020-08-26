function deleteSubject(id) {
    id = "id=" + id;
    $.ajax({
        type: "POST",
        url: "app/model/deleteSubject.php", // API which will process the data
        data: id, // Data 
        // Actions after the event was processed sucessfully
        success: function(result) {
            // console.log("id: " + id);
            if (result != 0) {
                // Change the DOM
                $("#subjectManagerTable").html(result);

                $("#subjectManagerTable #subjectAlert").html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>" +
                    '  <i class="fa fa-check"></i> Subject deleted ' +
                    ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> ' +
                    '  <span aria-hidden="true">&times;</span> ' +
                    '</button> ' +
                    "</div>"
                );
                setTimeout(function() {
                    $('#tableContainer #subjectAlert').html(' ');
                }, 3000);
            } else {
                alert("ERROR AT DELETE TOPIC");
            }

        }
    });
}