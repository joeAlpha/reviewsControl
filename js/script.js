    // After press 'Save topic'
    $(document).ready(function(e) {
        /* console.log("ok"); */
        $('#userForm').submit(function(submitEvent) {
            submitEvent.preventDefault();
            var formData = $(this).serialize(); 
            console.log(formData);
            $.ajax({
                type: "POST", 
                url: "includes/model/save.php",
                data: formData,
                success: function( result ) {
                    if(result != 0) {
                        $("#tableContainer").html(result);
                    } else {
                        alert("ERROR AT INSERT TOPIC");
                    }

                }
            });
        });
    });

    function deleteTopic(id) {
        data = "id=" + id;
        $.ajax({
            type: "GET",
            url: "includes/model/delete.php", // API which will process the data
            data: data, // Data 
            // Actions after the event was processed sucessfully
            success: function( result ) {
                if(result != 0) {
                    // Change the DOM
                    $("#tableContainer").html(result);
                } else {
                    alert("ERROR AT DELETE TOPIC");
                }

            }
        });
    }

    function completeTopic(id, date, numberOfReview) {
        console.log("ok");
        $.ajax({
            type: "POST",
            url: "includes/model/complete.php", // API which will process the data
            data: {
                // Will be send in a GET protocol
                id : id,
                date : date,
                numberOfReview : numberOfReview
            }, // Data 
            // Actions after the event was processed sucessfully
            success: function( result ) {
                if(result != 0) {
                    // Change the DOM
                    $("#tableContainer").html(result);
                } else {
                    alert("ERROR AT COMPLETE THE TOPIC");
                }

            }
        });
    }
