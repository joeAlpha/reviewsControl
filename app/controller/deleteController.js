function deleteTopic(id) {
    id = "id=" + id;
    $.ajax({
        type: "POST",
        url: "app/model/delete.php", // API which will process the data
        data: id, // Data 
        // Actions after the event was processed sucessfully
        success: function(result) {
            // console.log("id: " + id);
            if (result != 0) {
                // Change the DOM
                $("#tableContainer #alertContainer").html(
                    "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" +
                    '  <i class="fa fa-check"></i> Topic deleted ' +
                    ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> ' +
                    '  <span aria-hidden="true">&times;</span> ' +
                    '</button> ' +
                    "</div>"
                );
                setTimeout(function() {
                    $('#alertContainer').html(' ');
                }, 3000);
                $("#tableContainer").html(result);
            } else {
                alert("ERROR AT DELETE TOPIC");
            }

        }
    });
}