function deleteTopic(id) {
    id = "id=" + id;
    $.ajax({
        type: "POST",
        url: 'app/model/delete.php',
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