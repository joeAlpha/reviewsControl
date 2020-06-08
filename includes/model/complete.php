<?php
    include("db.php");
    // if(isset($_POST['id'])) {
        // echo "<h1>ok</h1>";
    // var_dump($_POST);
    $id = $_POST['id'];
    $oldDate = $_POST['date'];
    $numberOfReview = $_POST['numberOfReview'];


    // Debug zone
    // echo "After: " . $oldDate;
    // $oldDate->add(new DateInterval('P1D'));
    // echo "Before: " . $oldDate;

    // DateTime implements Unix timestamp internally for all operations,
    // therefore, the format is specified by the user.
    $newDate = new DateTime();
    // echo $newDate->format('U = Y-m-d H:i:s');
    $newDate->setTimestamp(strtotime($oldDate));
    // $newDate->add(new DateInterval('P10D'));
    // echo $newDate->format('U = Y-m-d H:i:s');


    switch($numberOfReview) {
        case 0: $newDate->add(new DateInterval('P1D')); 
            break;
        case 1: $newDate->add(new DateInterval('P2D')); 
            break;
        case 2: $newDate->add(new DateInterval('P4D')); 
            break;
        case 3: $newDate->add(new DateInterval('P8D')); 
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
    // } 
    // else{
    //     echo 1;
    //     die("Id is not set");
    // } 
?>
