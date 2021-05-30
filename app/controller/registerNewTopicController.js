/* Sends a request to save a new topic data. */
// $(document).ready(function(e) {
let registerNewTopic = () => {
  /* console.log("ok"); */
  $("#userForm").submit(function (submitEvent) {
    submitEvent.preventDefault();
    var formData = $(this).serialize();
    // console.log(formData);
    $.ajax({
      type: "POST",
      url: "app/model/registerNewTopic.php",
      data: formData,
      success: function (result) {
        if (result != 0) {
          $("#topicManagerTable").html(result);
          $("#topicManagerTable #topicAlert").html(
            "<div class='alert alert-success alert-dismissible fade show' role='alert'>" +
              '  <i class="fa fa-check"></i> Topic saved ' +
              ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> ' +
              '  <span aria-hidden="true">&times;</span> ' +
              "</button> " +
              "</div>"
          );
          setTimeout(function () {
            $("#topicManagerTable #topicAlert").html(" ");
          }, 3000);

          // $("#tableContainer").html(result);
        } else {
          $("#topicManagerTable #topicAlert").html(
            "<div class='alert alert-success alert-dismissible fade show' role='alert'>" +
              '  <i class="fa fa-check"></i> Error at register new topic ' +
              ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> ' +
              '  <span aria-hidden="true">&times;</span> ' +
              "</button> " +
              "</div>"
          );
          setTimeout(function () {
            $("#topicManagerTable #topicAlert").html(" ");
          }, 3000);
        }
      },
    });
  });
};
