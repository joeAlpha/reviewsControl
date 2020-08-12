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
                        $("#reviewAlert").html(result);
                        setTimeout(function() {
                            $('#reviewAlert').html(' ');
                        }, 3000);
                        
                        // $("#tableContainer").html(result);
                    } else {
                        alert("ERROR AT INSERT TOPIC");
                    }

                }
            });
        });
    });

    

    
