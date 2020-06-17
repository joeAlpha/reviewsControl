function getAllTopics() {
    // $('#mainSection').html('');
    $.ajax({
        type: "POST",
        url: 'app/model/getAllTopics.php',
        success: function(result) {
            if (result != 0) {
                $("#mainSection").html(result);
            } else {
                alert("getAllTopicsController says: error at load all topics.");
            }

        }
    });
}