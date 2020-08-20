/* This controller calls and API to show in the
main section the edit view without refresh the page. */

function loadEditView(id) {
    // $('#mainSection').load('app/view/edit.php');
    id = 'id=' + id;
    $.ajax({
        type: "POST",
        url: 'app/view/edit.php',
        data: id,
        success: function(result) {
            if (result != 0) {
                $("#mainSection").html(result);
            } else {
                alert("loadSubjectsController says: possible error in query.");
            }

        }
    });
}

function cancelEdit() {
    $('#mainSection').load('app/view/topicManager.php');
}
