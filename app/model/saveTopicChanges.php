<?php
    include("connection.php");

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        // $nextReviewDate = $_POST['name'];
    
        $saveTopicChangesQuery = 
            "UPDATE review
            SET name = '$name', fk_subject = '$subject'
            WHERE review_id = '$id' ";
        $saveTopicChangesResult = $connection->query($saveTopicChangesQuery);
        if($saveTopicChangesResult) {
            include("../view/topicTable.php");
        } else {
            echo -1;
        }
    } else {
        echo "Topic's id wasn't received!";
    }
?>