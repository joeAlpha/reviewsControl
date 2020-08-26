<!-- Deletes a topic from DB -->

<?php
	include("connection.php");
    // var_dump($_POST);
	$id = $_POST['id'];
	$deleteSubjectQuery = "DELETE FROM subject WHERE id = '$id'";
	$deleteSubjectResult = $connection->query($deleteSubjectQuery);
	if(!$deleteSubjectResult) {
		echo 0;
		die("The server can't delete the data");
	} else {
        include("../view/subjectManagerTable.php");
	}
?>