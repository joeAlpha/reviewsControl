/* Sends a request to retrieve all topics from
a specific user */
  console.log('ok');
const loadTopicManager = () => {
  $.ajax({
    type: "POST",
    url: "app/model/includeTopicManager.php",
    success: function (result) {
      if (result != 0) $("#mainSection").html(result);
      else alert("getAllTopicsController says: error at load all topics.");
    },
  });
}
