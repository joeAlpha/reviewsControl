/* This controller calls the API and send the 
data of a topic reviewed. */

function completeTopic(id, date, numberOfReview) {
    // console.log(id + "," + date + "," + numberOfReview);
    $.ajax({
        type: "POST",
        url: 'app/model/complete.php',
        // Way to send multiple parameters to the API
        data: {
            id: id,
            date: date,
            numberOfReview: numberOfReview
        },

        success: function(result) {
            if (result != 0) {
                 $("#tableContainer").html(result);

                $("#tableContainer #alertContainer").html(
                    "<div class='alert alert-primary alert-dismissible fade show' role='alert'>" +
                    '  <i class="fa fa-check"></i> Topic reviewed ' +
                    ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> ' +
                    '  <span aria-hidden="true">&times;</span> ' +
                    '</button> ' +
                    "</div>"
                );
                setTimeout(function() {
                    $('#tableContainer #alertContainer').html(' ');
                }, 3000);

               
            } else {
                console.log("no ok");
                alert("ERROR AT COMPLETE THE TOPIC");
            }

        }
    });
}