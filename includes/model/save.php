<?php
	include("db.php");
    $name = $_POST['name'];
    $subjectId = $_POST['subject'];

    // Inserts and retrieves a new subject information
    if($_POST['newSubject']) {
        session_start();
        $userId = $_SESSION['id'];
        /* echo "USER ID:" . $_SESSION['username'] . " ]"; */
        $newSubjectName = $_POST['newSubject'];
        $insertNewSubjectQuery = "INSERT INTO subject(name,user) VALUES('$newSubjectName','$userId')"; 
        $insertNewSubjectResult = $connection->query($insertNewSubjectQuery);
        if($insertNewSubjectResult) {
            $lastSubjectIdQuery = "SELECT * FROM subject ORDER BY id DESC LIMIT 1";
            $lastSubjectIdResult = $connection->query($lastSubjectIdQuery);
            $lastSubjectIdRow = $lastSubjectIdResult->fetch_array(MYSQLI_ASSOC);
            $lastSubjectIdValue = $lastSubjectIdRow['id'];
            $insertNewTopicQuery = "INSERT INTO review(name,fk_subject) VALUES('$name','$lastSubjectIdValue')";
            $insertNewTopicResult = $connection->query($insertNewTopicQuery);
            if($insertNewTopicResult) {
                include("../controller/reviewTable.php");
            } else {
                echo 0;
                die("Query error");
            }
        } else {
            echo 1;
            die("Query error");
        }
    } else {
        $insertNewTopicQuery = "INSERT INTO review(name,fk_subject) VALUES('$name','$subjectId')";
        $insertNewTopicResult = $connection->query($insertNewTopicQuery);
        if(!$insertNewTopicResult) {
            echo 2;
            die("Query error");
        } else {
            include("../controller/reviewTable.php");
        }
    }
?>
