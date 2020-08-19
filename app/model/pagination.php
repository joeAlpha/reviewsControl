<!-- Retrieves all topics from DB and select 
a subgroup of them based on the index and topics 
per page values given by the controller of this API
and then renders a result which will be showed in the
page by the controller that calls this API. -->

<?php
    include("connection.php");
    // var_dump($_POST);
    if(isset($_POST['userId']) && 
        isset($_POST['topicsPerPage']) &&
        isset($_POST['indexBegin']) &&
        isset($_POST['originRequest'])) {
        // var_dump($_POST);

        $userId = $_POST['userId'];
        $topicsPerPage = $_POST['topicsPerPage'];
        $indexBegin = $_POST['indexBegin']; // First index of page required
        $originRequest = $_POST['originRequest']; 
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
        
        if($getTopicsResult) {
            $htmlContent = ""; // Table which contains the new topics
            $limitFlag = 0; // For know how many topics was displayed
            
            // If the limit of topics per page was reached, this
            // flag helps to stop loading extra topics in the table.
            // $stopRender = false;
            
            // Indicates when was reached the start index of the page requested,
            // this helps to avoid show all topics starting from the first one.
            $startFlag = 0; 
            while($topic = $getTopicsResult->fetch_array(MYSQLI_BOTH)) {
                
                $startFlag++;

                // Checks for start and stop the render for topic manager
                if($startFlag >= ($indexBegin-1) &&
                    $limitFlag < $topicsPerPage) {
                    
                    if($originRequest == "reviewTable" && date('Y-m-d', strtotime($topic['review_date'])) > date('Y-m-d')) continue;
                    
                    switch($topic['number_of_review']) {
                        case 0: 
                            $progressBarWidth = 'width: 10%'; 
                            $progress = 1;
                        break;
                        case 1: 
                            $progressBarWidth = 'width: 20%'; 
                            $progress = 2;
                        break;
                        case 2: 
                            $progressBarWidth = 'width: 30%'; 
                            $progress = 3;
                        break;
                        case 3: 
                            $progressBarWidth = 'width: 40%'; 
                            $progress = 4;
                        break;
                        case 4: 
                            $progressBarWidth = 'width: 50%'; 
                            $progress = 5;
                        break;
                        case 5: 
                            $progressBarWidth = 'width: 60%'; 
                            $progress = 6;
                        break;
                        case 6: 
                            $progressBarWidth = 'width: 70%'; 
                            $progress = 7;
                        break;
                        case 7: 
                            $progressBarWidth = 'width: 80%'; 
                            $progress = 8;
                        break;
                        case 8: 
                            $progressBarWidth = 'width: 90%'; 
                            $progress = 9;
                        break;
                        case 9: 
                            $progressBarWidth = 'width: 100%';
                            $progress = 10;
                         break;
                    } 

                    // Getting the name of each topic's subject
                    $subjectQuery = 
                        "SELECT name
                        FROM subject
                        WHERE '$topic[fk_subject]' = subject.id";    
                    $subjectResult = $connection->query($subjectQuery);
                    if($subjectResult) $subject = $subjectResult->fetch_array(MYSQLI_ASSOC);
                    else echo "QUERY ERROR";

                    // TODO: REPLACE ALL IF OF RENDER BY SWITCH INSTEAD
                    // Rendering the outdated icon
                    $outdated = "";
                    $outdatedButton = "";
                    if(date('Y-m-d', strtotime($topic['review_date'])) < date('Y-m-d')) {
                        $outdated = '<i class="fas fa-exclamation-triangle mr-3 text-warning" data-toggle="tooltip" data-placement="top" title="This topic had to be reviewed before."></i>';
                    } else $outdatedButton = "d-none"; // Not show the button

                    // Rendering the date based on the origin request
                    if($originRequest == "topicManagerTable") {
                        $nextReviewDate =  '<td class="align-middle">' . date('Y-m-d', strtotime($topic['review_date'])) . '</td>';
                    } else $nextReviewDate = '';

                    // Rendering buttons
                    if($originRequest == "topicManagerTable") {
                        $actions =  
                        '<td class="align-middle">

                            <a onclick="loadEditView(' . $topic['review_id'] . ')" class="text-dark mx-2 btn   btn-warning">
                                <i class="fas fa-edit mx-1"></i> Edit
                            </a>

                            <a onclick="restoreTopicStatus(' . $topic['review_id'] . ', topicTable)" class=" ' . $outdatedButton .    ' text-light mx-2 btn btn-danger " data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                <i class="fas fa-redo-alt mx-1"></i> Reset
                            </a>

                            <a onclick="deleteTopic('. $topic['review_id'] . ')" class="mx-2 btn btn-danger">
                                <i class="fas fa-trash-alt mx-1"></i> Delete
                            </a>

                        </td>';
                    } else $actions = 
                    '<td class="align-middle">
                    
                        <a onclick="completeTopic( ' . $topic['review_id'] . ',' . $topic['review_date'] . ',' . $topic['number_of_review'] .')" class="mx-2 btn   btn-success">
                            <i class="fas fa-check mx-1"></i> Review 
                        </a>

                        <a onclick="restoreTopicStatus(' . $topic['review_id'] . ', reviewTable)" class=" ' . $outdatedButton .    ' text-light mx-2 btn btn-danger  " data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                            <i class="fas fa-redo-alt mx-1"></i> Restore
                        </a>

                    </td>';

                    // Integration of all renders (ready to be showed in DOM)
                    $htmlContent .= '
                        <tr>
                            <th class="align-middle">' . $outdated . $topic['name'] . '</th>
                            <td class="align-middle">' . $subject['name'] . '</td>
                            <td class="align-middle"> 
                                <div class="progress">
                                <div class="progress-bar" role="progressbar" style="' . $progressBarWidth . '"' . 
                                'aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">' . $progress .
                            '</td>' .
                            $nextReviewDate . $actions .
                        '</tr>';
                        
                        
                    $limitFlag++;
                }

            }
            $htmlContent .= "<br> <script> $(document).ready(function(){  $('[data-toggle=" . 'tooltip' . "]').tooltip(); }); </script>";
            echo $htmlContent;
        } else echo -2;
    } else {
        echo "Error: some variable of POST isn't defined -> " . var_dump($_POST);
        echo -1;
    } 

?>