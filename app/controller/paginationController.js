let getPage = (index, id, topicsPerPage) => {
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
                // NOTE: JSON is used to transfer data between client-server
                let allTopics = JSON.parse(result);

                $("#reviewTableBody").html(function() {
                    for(let i = index; i < allTopics.length || i <= topicsPerPage; i++) {
                        let subject;
                        let subjectId = allTopics[i].fk_subject;
                        // console.log(subjectId);

                        // Gets the subject's name
                        $.ajax({
                            type: "POST",
                            url: 'app/model/findSubject.php',
                            data: ("subjectId="+subjectId),
                            success: function(result) {
                                let subjectFound = JSON.parse(result)
                                if (result != 0) console.log("Subject: " + subjectFound.name);
                                else console.log('Response error on API -> [ findSubject ]');
                            }
                        });

                        // Puts the new topics of the page requested in the DOM
                        return `<tr><td>${allTopics[i].name}</td></tr>`;
                    }
                });
            } else {
                alert("getAllTopicsController says: error at load all topics.");
            }

        }
    });
}