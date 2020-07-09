/* Sends a request to check the user and password, also
manage the alerts for the login view. */

$(document).ready(function(e) {
    $('#loginForm').submit(function(submitEvent) {
        submitEvent.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: '../model/loginCheck.php',
            data: formData,
            success: function(result) {
                if (result == 1) {
                    $("#alertContainer").html(
                        "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" +
                        '  <i class="fa fa-times"></i> The username or password is wrong ' +
                        "</div>"
                    );
                    setTimeout(function() {
                        $('#alertContainer').html(' ');
                    }, 3000);
                    $("#tableContainer").html(result);
                } else if (result == 2) {
                    $("#alertContainer").html(
                        "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" +
                        '  <i class="fa fa-times"></i> Fill al l fields ' +
                        "</div>"
                    );
                    setTimeout(function() {
                        $('#alertContainer').html(' ');
                    }, 3000);
                } else if (result == 0) {
                    window.location.replace("../../index.php");
                }
            }
        });
    });
});