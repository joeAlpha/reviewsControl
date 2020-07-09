/* Send a request to retrieve all subjects
and then they are showed in the subjects managment
view. */
function loadSubjects() {
    $.ajax({
        type: "POST",
        url: 'app/controller/includeSubjectsController.php',
        success: function(result) {
            if (result != 0) {
                $("#mainSection").html(result);
            } else {
                alert("loadSubjectsController says: possible error in query.");
            }

        }
    });
}