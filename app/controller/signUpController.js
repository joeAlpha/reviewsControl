let signUp = () => {
    $('#signUpForm').submit(function(formEvent) {
        formEvent.preventDefault();
        let signUpFormData = $('#signUpForm').serialize();
        // console.log(signUpFormData);
        $.ajax({ 
            type: 'POST',
            url: '../model/signUp.php',
            data: signUpFormData,
            success: function(result) {
                if(result != -1) {
                    result += `<div class='alert alert-primary alert-dismissible fade show m-auto w-75 text-center' role='alert' id='signUpConfirmationAlert'>` +
                        `<i class="fa fa-check"></i> Your account was registered successfull, now check your email ` +
                        `<button type="button" class="close" data-dismiss="alert" aria-label="Close">` +
                        `<span aria-hidden="true">&times;</span>` +
                        `</button>` +
                        `</div>`;

                    $('#formAccessContainer').html(result);

                    setTimeout(function() {
                        $('#signUpConfirmationAlert').remove();
                    }, 5000);
                } else {
                    console.log("Error in signUp API");
                }
             //       console.log('ok');
                    // window.location.replace("login.php");
                    // $('#formAccessContainer').html('');
            }
        });
    });
};