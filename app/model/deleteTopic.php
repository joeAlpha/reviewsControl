<!-- Deletes a topic from DB -->

<?php
	include("connection.php");
    // var_dump($_POST);
	$id = $_POST['id'];
	$deleteTopicQuery = "DELETE FROM review WHERE review_id = '$id'";
	$deleteTopicresult = $connection->query($deleteTopicQuery);
	if(!$deleteTopicresult) {
		echo 0;
		die("The server can't delete the data");
	} else {
        include("../view/topicManagerTable.php");
	}
?>