let loadSignUpView = () => {
    $.ajax({ 
        type: 'POST',
        url: 'app/model/loadSignUpView.php',
        data: '',
        success: function(result) {
            if (result != 0) $("#mainContainer").html(result);
            else console.error('Error at include the signup view');
            }
    });
}