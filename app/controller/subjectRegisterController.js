/* Sends a request to the API in order
to save a new subject in the database . */
// $(document).ready(function(e) {
let registerNewSubject = () => {
    $('#registerNewSubjectForm').submit(function(submitEvent) {
        submitEvent.preventDefault();
        let formData = $(this).serialize();
        // console.log(`Data: ${formData}`);

        $.ajax({
            type: "POST",
            url: 'app/model/registerNewSubject.php',
            data: formData,
            success: function(result) {
                if (result != 0) {
                    $("#subjectManagerTableBody").html(result);
                    /*    setTimeout(function() {
                        $('#reviewAlert').html(' ');
                    }, 3000); */
                    
                    // $("#tableContainer").html(result);
                } else {
                    alert("Error at save the new subject");
                }
                
            }
        });
    });
};

    
    
    
    
