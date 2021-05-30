let loadLoginView = () => {
  $("#signUpForm").submit(function (submitEvent) {
    submitEvent.preventDefault();
  });

  $.ajax({
    type: "POST",
    url: "../model/loadLoginView.php",
    data: "",
    success: function (result) {
      if (result != 0) $("#formAccessContainer").html(result);
      else console.error("Error at include the login view");
    },
  });
};
