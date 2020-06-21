function checkLogin() {
    var formData = $("#loginForm").serialize();
    console.log(formData);
    $.ajax({
        type: "POST",
        url: "app/model/loginCheck.php",
        data: formData,
        success: (result) => {
            if(result != 0) console.log('ok');
        }
    });
}
