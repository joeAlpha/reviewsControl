let unarchiveTopic = (id) => {
    topicId = "topicId=" + id;
    $.ajax({
        type: 'POST',
        url: 'app/model/unarchiveTopic.php',
        data: topicId,
        success: function (result) {
            if (result != 0) $('#topicManagerTable').html(result);
            else console.error('Error in unarchiveTopic.php API');
        }
    });
};