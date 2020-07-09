/* Sends a request to save a new topic data. */
$(document).ready(function(e) {
        /* console.log("ok"); */
        $('#userForm').submit(function(submitEvent) {
            submitEvent.preventDefault();
            var formData = $(this).serialize();
            // console.log(formData);
            $.ajax({
                type: "POST",
                url: 'app/model/save.php',
                data: formData,
                success: function(result) {
                    if (result != 0) {
                        $("#tableContainer #reviewAlerts").html(
                            "<div class='alert alert-success alert-dismissible fade show' role='alert'>" +
                            '  <i class="fa fa-check"></i> Topic saved ' +
                            ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> ' +
                            '  <span aria-hidden="true">&times;</span> ' +
                            '</button> ' +
                            "</div>"
                        );
                        setTimeout(function() {
                            $('#tableContainer #reviewAlerts').html(' ');
                        }, 3000);
                        $("#tableContainer").html(result);
                    } else {
                        alert("ERROR AT INSERT TOPIC");
                    }

                }
            });
        });
    });

    

    
