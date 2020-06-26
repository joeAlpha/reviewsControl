    // After press 'Save topic'
    $(document).ready(function(e) {
        /* console.log("ok"); */
        $('#userForm').submit(function(submitEvent) {
            submitEvent.preventDefault();
            var formData = $(this).serialize();
            // console.log(formData);
            $.ajax({
                type: "POST",
                url: '../model/save.php',
                data: formData,
                success: function(result) {
                    if (result != 0) {
                        $("#alertContainer").html(
                            "<div class='alert alert-success alert-dismissible fade show' role='alert'>" +
                            '  <i class="fa fa-check"></i> Topic saved ' +
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
            url: "app/model/delete.php", // API which will process the data
            data: id, // Data 
            // Actions after the event was processed sucessfully
            success: function(result) {
                // console.log("id: " + id);
                if (result != 0) {
                    // Change the DOM
                    $("#alertContainer").html(
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

    

    function logout() {
        $.ajax({
            type: "POST",
            url: "app/model/logout.php",
            success: function(result) {
                if (!result) {
                    console.warn("Error at closing session");
                } else {
                    window.location.href = 'app/view/login.php';
                }

            }
        });
    }