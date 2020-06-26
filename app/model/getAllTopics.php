<?php
	// include("connection.php");
	include('../view/topicTable.php');

/* 	if(isset($_POST['userId'])) {
		$getTopicsQuery = 
			"SELECT 
    		    review.review_id,
    		    review.name,
    		    review.fk_subject,
    		    review.review_date,
    		    review.number_of_review 
			FROM 
	   		    review, 
    		    subject
    		WHERE 
    		    review.fk_subject = subject.id AND 
				subject.user = '$userId'";
		$getTopicsResult = $connection->query($getTopicsQuery);
		$
	} else {
		echo 0;
		die("Error in the query");
	} */
?>