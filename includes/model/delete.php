<?php
	include("db.php");
    // var_dump($_POST);
	$id = $_POST['id'];
	$query = "DELETE FROM review WHERE review_id = '$id'";
	$result = $connection->query($query);
	if(!$result) {
		// echo 0;
		die("The server can't delete the data");
	} else {
        include("../view/reviewTable.php");
	}
?>