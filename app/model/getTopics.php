<?php
    /* 
        Retrieves and return all topics from DB.
    */
    include("connection.php");
    if(isset($_POST['userId'])) {
        $userId = $_POST['userId'];
        $getTopicsQuery = 
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
        
        $getTopicsResult = $connection->query($getTopicsQuery);
        if($getTopicsResult) {
            $allTopics = [];
            while($row = $getTopicsResult->fetch_array(MYSQLI_ASSOC)) $allTopics[] = $row;
            echo json_encode($allTopics);
        } else echo 0;
    } else echo "Parameters hasn't been received";
?>