/* This controller sends a request for get a
new set of topics correspondig to a some page index. */

let getNewSubjectPage = (
  indexBegin,
  userId,
  elementsPerPage,
  originRequest
) => {
  $.ajax({
    type: "POST",
    url: "app/model/subjectPagination.php",
    data: { indexBegin, userId, elementsPerPage, originRequest },
    success: function (result) {
      if (result != 0) {
        switch (originRequest) {
          case "subjectManagerTable":
            $("#subjectManagerTableBody").html(result);
            break;
        }
      } else {
        console.error("An error ocurred in subjectPagination API.");
      }
    },
  });
};
