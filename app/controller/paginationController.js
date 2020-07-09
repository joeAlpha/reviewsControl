/* This controller sends a request for get a
new set of topics correspondig to a some page index. */

let getPage = (index, id, topicsPerPage) => {
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
                        let subjectId = allTopics[i].fk_subject;
                        // let tableContent;

                        // Gets the subject's name
                        // Async function 
                        //      > Can't get the result of this call
                        //      > Can't access to global variables
                        $.ajax({
                            type: "POST",
                            url: 'app/model/findSubject.php',
                            data: ("subjectId="+subjectId),
                            success: function(result) {
                                if (result != 0) return `<tr><td>${(JSON.parse(result)).name}</td></tr>`;
                                else console.log('Response error on API -> [ findSubject ]');
                            }
                        });

                        // console.log(subjectName);

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