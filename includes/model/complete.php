<?php
    include("db.php");
    if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $oldDate = $_POST['date'];
    $oldNumberOfReview = $_POST['numberOfReview'];
    /* echo $oldNumberOfReview; */

    $newDate = new DateTime($oldDate);
    switch($oldNumberOfReview) {
        case 0: $newDate->add(new DateInterval('P1D')); 
            break;
        case 1: $newDate->add(new DateInterval('P2D')); 
            break;
        case 2: $newDate->add(new DateInterval('P4D')); 
            break;
        case 3: $newDate->add(new DateInterval('P8D')); 
            break;
    }
    $newNumberOfReview = ++$oldNumberOfReview;
    console.log($newDate);

    $updateReviewQuery = "UPDATE review SET review_date = '$newDate', number_of_review = '$newNumberOfReview' WHERE review_id = '$id'";
    $updateReviewResult = $connection->query($updateReviewQuery);

    if(!$updateReviewResult) {
        echo 0;
        die("Error at execute the query");
    } else {
        include("../controller/reviewTable.php");
    }
    } else{
        echo 1;
        die("Id is not set");
    } 
?>
