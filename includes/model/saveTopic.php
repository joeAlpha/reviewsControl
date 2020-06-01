<?php
	include("db.php");
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $query = "INSERT INTO review(name,fk_subject) VALUES('$name','$subject')";

    $result = $connection->query($query);

    /* echo "Result value " . $result; */
    if(!$result) {
        echo 0;
        die("Query error");
    } else {
        include("../controller/reviewTable.php");
    }

    /* $result->close(); */
    /* $connection->close(); */
?>
