<?php
    include_once("connection.php");
    if(isset($_POST['topicId'])) {
        $topicId = $_POST['topicId'];
        $archiveTopicQuery = "UPDATE review SET active = false WHERE review_id = '$topicId'";
        $archiveTopicResult = $connection->query($archiveTopicQuery);
        if($archiveTopicResult) include("../view/topicManagerTable.php");
        else echo -2;
    } else echo -1;
?>