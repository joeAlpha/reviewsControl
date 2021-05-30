function deleteSubject(id) {
  id = "id=" + id;
  $.ajax({
    type: "POST",
    url: "app/model/deleteSubject.php", // API which will process the data
    data: id, // Data
    // Actions after the event was processed sucessfully
    success: function (result) {
      // console.log("id: " + id);
      if (result != 0) {
        // Change the DOM
        $("#subjectManagerTable").html(result);

        $("#subjectManagerTable #subjectAlert").html(
          "<div class='alert alert-primary alert-dismissible fade show' role='alert'>" +
            '  <i class="fa fa-check mr-2"></i> Subject deleted ' +
            ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> ' +
            '  <span aria-hidden="true">&times;</span> ' +
            "</button> " +
            "</div>"
        );
        setTimeout(function () {
          $("#subjectManagerTable #subjectAlert").html(" ");
        }, 3000);
      } else {
        $("#subjectManagerTable #subjectAlert").html(
          "<div class='alert alert-warning alert-dismissible fade show' role='alert'>" +
            '  <i class="fa fa-check mr-2"></i> Error at delete subject ' +
            ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> ' +
            '  <span aria-hidden="true">&times;</span> ' +
            "</button> " +
            "</div>"
        );
        setTimeout(function () {
          $("#subjectManagerTable #subjectAlert").html(" ");
        }, 3000);
      }
    },
  });
}
