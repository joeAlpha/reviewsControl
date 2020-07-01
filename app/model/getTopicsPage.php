<?php
    include("connection.php");
    // $pageNumber = $_POST['index'];
    $userId = $_COOKIE['id'];
    $getPageQuery = 
        "SELECT 
            review.review_id,
            review.name,
            review.fk_subject,
            review.review_date,
            review.number_of_review 
        FROM review, subject
        WHERE 
            review.fk_subject = subject.id AND 
            subject.user = '$userId' AND 
            review.review_date <= curdate()";
        
        $getPageResult = $connection->query($getPageQuery);
        $allTopics = $getPageResult->fetch_array(MYSQLI_ASSOC);
        if($getPageResult) return $allTopics;
        else echo 0;
?>