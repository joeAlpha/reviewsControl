/* This controller sends a request for get a
new set of topics correspondig to a some page index. */

let getPage = (indexBegin, userId, topicsPerPage, originRequest) => {
    // let userId = 'userId=' + id;
    
    $.ajax({
        type: "POST",
        // Before api call: getTopics.php
        url: 'app/model/pagination.php',
        data: {indexBegin, userId, topicsPerPage},
        success: function(result) {
            if (result != 0) {
                // TODO: set the origin request
                switch(originRequest) {
                    case "reviewTable": 
                        $("#reviewTableBody").html(result);
                        break;
                    case "topicTable": 
                        $("#topicTableBody").html(result);
                        break;
                } 
            } else {
                alert("getAllTopicsController says: error at load all topics.");
            }

        }
    });
}