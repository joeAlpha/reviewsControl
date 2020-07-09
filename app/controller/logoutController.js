/* Sends a request to logout from the current session */
function logout() {
    $.ajax({
        type: "POST",
        url: "app/model/logout.php",
        success: function(result) {
            if (!result) console.warn("Error at closing session");
            else window.location.href = 'app/view/login.php';
        }
    });
}