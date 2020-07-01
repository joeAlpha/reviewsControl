<?php
    include("connection.php");
    $pageNumber = $_POST['pageNumber'];
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
        if($getPageResult) {
            
        }
?>