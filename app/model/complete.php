<!-- CRITICAL: Calculates the next date for review the topic studied
and increments the count of the times reviewed. -->

<?php
    include("connection.php");
    $id = $_POST['id'];
    $oldDate = $_POST['date'];
    $numberOfReview = $_POST['numberOfReview'];

    // DateTime implements Unix timestamp internally for all operations,
    // therefore, the format is specified by the user.
    $newDate = new DateTime();
    $newDate->setTimestamp(strtotime($oldDate));

    /* Calculates the next review date based on the review
    theory. */
    switch($numberOfReview) {
        case 0: $newDate->add(new DateInterval('P2D')); 
            break;
        case 1: $newDate->add(new DateInterval('P4D')); 
            break;
        case 2: $newDate->add(new DateInterval('P8D')); 
            break;
        case 3: $newDate->add(new DateInterval('P16D')); 
            break;
        case 4: $newDate->add(new DateInterval('P32D')); 
            break;
        case 5: $newDate->add(new DateInterval('P64D')); 
            break;
        case 6: $newDate->add(new DateInterval('P128D')); 
            break;
        case 7: $newDate->add(new DateInterval('P256D')); 
            break;
        case 8: $newDate->add(new DateInterval('P512D')); 
            break;
    }
    
    $numberOfReview += 1;
    $dateFormatted = $newDate->format('Y-m-d H:i:s');
    $updateReviewQuery = "UPDATE review SET review_date = '$dateFormatted', number_of_review = '$numberOfReview' WHERE review_id = '$id'";
    $updateReviewResult = $connection->query($updateReviewQuery);

    if(!$updateReviewResult) {
        echo 0;
        die(" [complete.php says] -> Error at execute the query");
    } else {
        include("../view/reviewTable.php");
    }
?>
