<!-- Restore the next review date and the times of
reviews for a specific topic. -->

<?php 
    include("connection.php");
    $id = $_POST['id'];
    $origin = $_POST['origin'];
    $restoreTopicStatusQuery = 
        "UPDATE review
        SET review_date = ADDDATE(curdate(), INTERVAL 1 DAY), number_of_review = 0
        WHERE review_id = '$id'";
    $restoreTopicStatusResult = $connection->query($restoreTopicStatusQuery);
    if($restoreTopicStatusResult) {
        if($origin == 'reviewTable') {
            // echo 'origin -> reviewTable';
            include('../view/reviewTable.php');
        } else {
            // echo 'origin -> topicTable';
            include('../view/topicTable.php');
        }
    } else {
        echo -1;
    }
?>