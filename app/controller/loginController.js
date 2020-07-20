/* Sends a request to check the user and password, also
manage the alerts for the login view. */

// $(document).ready(function(e) {
function checkLogin() {
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

                    // #tableContainer ?
                    // $("#tableContainer").html(result);
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
                    // NOTE: This isn't redirecting to index and
                    // the problem can be the setting of cookie 
                    //(samesite and secure)
                    /* Or can be a problem with the script  */
                    console.log("Response received: " + result);
                    // window.location.replace("../../index.php");
                }
            }
            
        });
    });
}