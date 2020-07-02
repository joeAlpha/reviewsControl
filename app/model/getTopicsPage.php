<?php
    // NOT USED
    include("connection.php");
    if(isset($_POST['userId']) && isset($_POST['index'])) {
        $userId = $_POST['userId'];
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
        // echo $getPageResult->num_rows;
        // $allTopics = $getPageResult->fetch_array(MYSQLI_ASSOC);
        if($getPageResult) {
            $allTopics = [];
            while($row = $getPageResult->fetch_array(MYSQLI_ASSOC)) {
                $allTopics[] = $row;
            }
            echo json_encode($allTopics);
        } else {
            echo 0;
        }
    } else {
        echo "Parameters hasn't been received";
    }
?>