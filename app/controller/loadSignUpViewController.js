let loadSignUpView = () => {
    $.ajax({ 
        type: 'POST',
        url: '../model/loadSignUpView.php',
        data: '',
        success: function(result) {
            if (result != 0) $("#formAccessContainer").html(result);
            else console.error('Error at include the signup view');
            }
    });
};