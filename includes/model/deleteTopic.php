<?php
	include("db.php");
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "DELETE FROM user WHERE id = $id";
		$result = mysqli_query($connection, $query);
		if(!$result) {
			die("The server can't delete the data");
		} else {
			/* header("Location: index.php"); */
            include("refreshUser.php");
		}
	} else {
		echo "Wrong id";
	}
?>
