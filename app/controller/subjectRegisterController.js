/* Sends a request to the API in order
to save a new subject in the database . */
// $(document).ready(function(e) {
let registerNewSubject = () => {
  $("#registerNewSubjectForm").submit(function (submitEvent) {
    submitEvent.preventDefault();
    let formData = $(this).serialize();
    // console.log(`Data: ${formData}`);

    $.ajax({
      type: "POST",
      url: "app/model/registerNewSubject.php",
      data: formData,
      success: function (result) {
        if (result != 0) {
          $("#subjectManagerTable").html(result);
          $("#subjectManagerTable #subjectAlert").html(
            "<div class='alert alert-primary alert-dismissible fade show' role='alert'>" +
              '  <i class="fa fa-check mr-2"></i> Subject registered ' +
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
            "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" +
              '  <i class="fa fa-check mr-2"></i> Error at register subject ' +
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
  });
};
