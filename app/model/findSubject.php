<?php
    /*  CANDIDATE TO BE DELETED
        This module is used on pagination to retrieve the subject's names
    */
    
    include('connection.php');
    if(!isset($_POST['subjectId'])) echo "The subject id wasn't received!";
    else {
        $subjectId = $_POST['subjectId'];
        // echo $subjectId;

        $findSubjectQuery = 
            "SELECT *
            FROM subject
            WHERE id = '$subjectId'";
        $findSubjectResult = $connection->query($findSubjectQuery);
        // echo $findSubjectResult;

        if(!$findSubjectResult) echo 0; // Error
        else {
            $subjectFound = $findSubjectResult->fetch_array(MYSQLI_ASSOC);
            echo json_encode($subjectFound);
        }
    }
?>