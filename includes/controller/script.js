    // After press 'Save topic'
    $(document).ready(function(e) {
        /* console.log("ok"); */
        $('#userForm').submit(function(submitEvent) {
            submitEvent.preventDefault();
            var formData = $(this).serialize();
            console.log(formData);
            $.ajax({
                type: "POST",
                url: 'includes/model/save.php',
                data: formData,
                success: function(result) {
                    if (result != 0) {
                        $("#tableContainer").html(result);
                    } else {
                        alert("ERROR AT INSERT TOPIC");
                    }

                }
            });
        });
    });

    function deleteTopic(id) {
        id = "id=" + id;
        $.ajax({
            type: "POST",
            url: "includes/model/delete.php", // API which will process the data
            data: id, // Data 
            // Actions after the event was processed sucessfully
            success: function(result) {
                // console.log("id: " + id);
                if (result != 0) {
                    // Change the DOM
                    $("#tableContainer").html(result);
                } else {
                    alert("ERROR AT DELETE TOPIC");
                }

            }
        });
    }

    function completeTopic(id, date, numberOfReview) {
        // console.log(id + "," + date + "," + numberOfReview);
        $.ajax({
            type: "POST",
            url: 'includes/model/complete.php',
            // Way to send multiple parameters to the API
            data: {
                id: id,
                date: date,
                numberOfReview: numberOfReview
            },

            success: function(result) {
                if (result != 0) {
                    console.log("ok");
                    $("#tableContainer").html(result);
                } else {
                    console.log("no ok");
                    alert("ERROR AT COMPLETE THE TOPIC");
                }

            }
        });
    }

    function logout() {
        $.ajax({
            type: "POST",
            url: "includes/model/logout.php",
            success: function(result) {
                if (!result) {
                    console.warn("Error at closing session");
                } else {
                    window.location.href = 'includes/view/login.php';
                }

            }
        });
    }