let getPage = (index, id) => {
    // index = pageNumber;
    // let topics = JSON.parse(allTopics);
    // console.log(userId);
    let userId = 'userId=' + id;
    
    $.ajax({
        type: "POST",
        url: 'app/model/getTopics.php',
        data: userId,
        success: function(result) {
            if (result != 0) {
                // JSON is used to transfer data between client-server
                let allTopics = JSON.parse(result);
                console.log(allTopics);

                // Shows a set of topics for the page requested

            /*     $("#reviewTableBody").html(
                    
                ); */

                // Check if exists the table container, if not, creates it.
                // This case is used when the user is on edit section.
              /*   if($("#tableContainer").length < 1) {
                    $("#mainSection")
                        .html('<div id="tableContainer" class="p-4 table-responsive"></div>');
                }
                $("#tableContainer").attr("class", "p-4 table-responsive");
                $("#mainSection #tableContainer").html(result); */
            } else {
                alert("getAllTopicsController says: error at load all topics.");
            }

        }
    });
}