let signUp = () => {
    $('#signUpForm').submit(function(formEvent) {
        formEvent.preventDefault();
        let signUpFormData = $('#signUpForm').serialize();
        // console.log($('#passCheck1').val());

        if($('#passCheck1').val().localeCompare($('#passCheck2').val()) == 0) {
            $.ajax({ 
                type: 'POST',
                url: '../model/signUp.php',
                data: signUpFormData,
                success: function(result) {
                    if(result != -1) {
                    $('#formAccessContainer').html(result);

                    $('#alertContainer').html(
                        `<div class='alert alert-primary alert-dismissible fade show m-auto w-75 text-center' role='alert'>` +
                        `<i class="fa fa-check"></i> Your account was registered successfull, now check your email ` +
                        `<button type="button" class="close" data-dismiss="alert" aria-label="Close">` +
                        `<span aria-hidden="true">&times;</span>` +
                        `</button>` +
                        `</div>`);
                        
                    
                    setTimeout(function() {
                        $('#alertContainer').html('');
                    }, 5000);
                } else {
                    console.error("Error at signUp API");
                }
                }
            });
        } else {
            $('#signUpAlerts').html(
                `<div class='alert alert-warning alert-dismissible fade show m-auto w-75 text-center' role='alert'>` +
                `<i class="fa fa-times"></i>  The passwords doesn't match! ` +
                `<button type="button" class="close" data-dismiss="alert" aria-label="Close">` +
                `<span aria-hidden="true">&times;</span>` +
                `</button>` +
                `</div>`);

            setTimeout(function() {
                $('#signUpAlerts').html('');
            }, 5000);
        }
    });
};