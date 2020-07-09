/* Sends a request to save new data in DB from a existing topic. */

function saveEdition(id) {
    let formData = "id=" + id + "&" + $("#editForm").serialize();
    console.log(`Data serialized: ${formData}`);

    $.ajax({
        type: "POST",
        url: "app/model/saveTopicChanges.php", // API which will process the data
        data: formData, // Data 
        // Actions after the event was processed sucessfully
        success: function(result) {
            if (result != -1) {
                if($("#tableContainer").length < 1) {
                    $("#mainSection")
                        .html('<div id="tableContainer" class="p-4 table-responsive"></div>');
                }
                $("#tableContainer").attr("class", "p-4 table-responsive");
                $("#mainSection #tableContainer").html(result);
            } else {
                $("#alertContainer").html(
                    "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" +
                    '  <i class="fa fa-ban"></i> Error at save new changes ' +
                    ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> ' +
                    '  <span aria-hidden="true">&times;</span> ' +
                    '</button> ' +
                    "</div>"
                );

                setTimeout(function() {
                    $('#alertContainer').html(' ');
                }, 3000);
            }
        }
    });
}