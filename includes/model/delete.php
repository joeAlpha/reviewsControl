<?php
	include("db.php");
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "DELETE FROM review WHERE review_id = $id";
		$result = $connection->query($query);
		if(!$result) {
			die("The server can't delete the data");
		} else {
            include("../controller/reviewTable.php");
		}
	} else {
		echo "Wrong id";
	}
?>
