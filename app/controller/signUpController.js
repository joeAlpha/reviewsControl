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
                if (result == 0) $('#formAccessContainer').html('<p>User inserted!</p>');
                else console.error('Error at API signUp');
            }
        });
    });
};