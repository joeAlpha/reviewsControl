<?php
    include("connection.php");

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        switch($_POST['month']) {
            case "January": $month = 1; break;
            case "February": $month = 2; break;
            case "March": $month = 3; break;
            case "April": $month = 4; break;
            case "May": $month = 5; break;
            case "June": $month = 6; break;
            case "July": $month = 7; break;
            case "August": $month = 8; break;
            case "September": $month = 9; break;
            case "October": $month = 10; break;
            case "November": $month = 11; break;
            case "December": $month = 12; break;
        }
        $date = $_POST['year'] . '-' . $month . '-' . $_POST['day'];
        // echo $date;
        // $nextReviewDate = $_POST['name'];
    
        $saveTopicChangesQuery = 
            "UPDATE review
            SET name = '$name', fk_subject = '$subject', review_date = '$date' 
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