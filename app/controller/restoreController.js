/* Sends a request to restore the progress
 studied of a topic. */

let restoreTopicStatus = (id, origin) => {
    $.ajax({
        type: "POST",
        url: 'app/model/restoreTopicStatus.php',
        data: {id, origin},
        success: function(result) {
            if (result != 0) {
                $("#tableContainer").html(result);

                if(origin == 'reviewTable') {
                    $("#tableContainer #alertContainer").html(
                        "<div class='alert alert-info alert-dismissible fade show' role='alert'>" +
                        '  <i class="fa fa-check"></i> Topic status was restored ' +
                        ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> ' +
                        '  <span aria-hidden="true">&times;</span> ' +
                        '</button> ' +
                        "</div>"
                        );
                    
                        setTimeout(function() {
                            $('#tableContainer #reviewAlert').html(' ');
                        }, 3000);
                } else {
                    $("#tableContainer #topicAlert").html(
                        "<div class='alert alert-info alert-dismissible fade show' role='alert'>" +
                        '  <i class="fa fa-check"></i> Topic status was restored ' +
                        ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> ' +
                        '  <span aria-hidden="true">&times;</span> ' +
                        '</button> ' +
                        "</div>"
                        );
                    
                        setTimeout(function() {
                            $('#tableContainer #topicAlert').html(' ');
                        }, 3000);
                }
                
            } else {
                console.log("restoreController: Error at query");
            }

        }
    });
}