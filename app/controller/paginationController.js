let getPage = (index, allTopics) => {
    // index = pageNumber;
    console.log(JSON.parse(allTopics));
    
/*     $.ajax({
        type: "POST",
        // url: 'app/model/getTopicsPage.php',
        // data: userId,
        success: function(result) {
            if (result != 0) {
                // JSON is used to transfer data between client-server
                let allTopics = JSON.parse(result);
                console.log(allTopics.length);

                // Shows a set of topics for the page requested

                $("#reviewTableBody").html(
                    
                );

                // Check if exists the table container, if not, creates it.
                // This case is used when the user is on edit section.
                if($("#tableContainer").length < 1) {
                    $("#mainSection")
                        .html('<div id="tableContainer" class="p-4 table-responsive"></div>');
                }
                $("#tableContainer").attr("class", "p-4 table-responsive");
                $("#mainSection #tableContainer").html(result);
            } else {
                alert("getAllTopicsController says: error at load all topics.");
            }

        }
    }); */
}