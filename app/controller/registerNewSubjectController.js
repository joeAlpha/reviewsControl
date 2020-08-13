/* Sends a request to the API in order
to save a new subject in the database . */

let registerNewSubject = () => {
        let formData = $('#registerNewSubjectForm').serialize();

        $.ajax({
            type: "POST",
            url: 'app/model/registerNewSubject.php',
            data: formData,
            success: function(result) {
                if (result != 0) {
                    $("#subjectManagerTable").html(result);
                 /*    setTimeout(function() {
                        $('#reviewAlert').html(' ');
                    }, 3000); */
                    
                    // $("#tableContainer").html(result);
                } else {
                    alert("ERROR AT INSERT TOPIC");
                }
                
            }
        });
        });
    });
}
    
    
    
    
