/* This controller sends a request for get a
new set of topics correspondig to a some page index. */

let getPage = (indexBegin, userId, topicsPerPage, originRequest) => {
  $.ajax({
    type: "POST",
    url: "app/model/pagination.php",
    data: { indexBegin, userId, topicsPerPage, originRequest },
    success: function (result) {
      if (result != 0) {
        switch (originRequest) {
          case "reviewTable":
            $("#reviewTableBody").html(result);
            break;
          case "topicManagerTable":
            $("#topicManagerTableBody").html(result);
            break;
        }
      } else {
        alert("getAllTopicsController says: error at load all topics.");
      }
    },
  });
};
