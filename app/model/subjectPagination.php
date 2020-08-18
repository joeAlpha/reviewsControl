<!-- Retrieves all topics from DB and select 
a subgroup of them based on the index and topics 
per page values given by the controller of this API
and then renders a result which will be showed in the
page by the controller that calls this API. -->

<?php
    include("connection.php");
    // var_dump($_POST);
    if(isset($_POST['userId']) && 
        isset($_POST['elementsPerPage']) &&
        isset($_POST['indexBegin']) &&
        isset($_POST['originRequest'])) {
        // var_dump($_POST);

        $userId = $_POST['userId'];
        $elementsPerPage = $_POST['elementsPerPage'];
        $indexBegin = $_POST['indexBegin']; // First index of page required
        $originRequest = $_POST['originRequest']; 
        $getSubjectsQuery = 
            "SELECT *
            FROM subject
            WHERE subject.user = '$userId'";    

        $getSubjectsResult = $connection->query($getSubjectsQuery);
        
        if($getSubjectsResult) {
            $htmlContent = ""; // Table which contains the new topics
            $limitFlag = 0; // For know how many topics was displayed
            
            // Indicates when was reached the start index of the page requested,
            // this helps to avoid show all topics starting from the first one.
            $startFlag = 0; 
            while($subject = $getSubjectsResult->fetch_array(MYSQLI_BOTH)) {
                
                $startFlag++;

                // Checks for start and stop the render for topic manager
                if($startFlag >= ($indexBegin-1) &&
                    $limitFlag < $elementsPerPage) {
                    
                    $subjectName = '<th class="align-middle" scope="row">' . $subject['name'] . '</th>';
                    
                    // Rendering buttons
                    $actions =  
                        '<td class="align-middle">
                            <a href="app/view/edit.php?id=' . $subject['id']  .'" class=" mx-2 btn btn-warning">
                                <i class="fas fa-edit mx-1"></i> Edit
                            </a>

                            <a onclick="deleteTopic(' . $subject['id'] . ')" class="mx-2 btn btn-danger">
                                <i class="fas fa-trash-alt mx-1"></i> Delete
                            </a>
                        </td>';

                    // Integration of all renders (ready to be showed in DOM)
                    $htmlContent .= '<tr>' . $subjectName . $actions . '</tr>';
                        
                    $limitFlag++;
                }

            }
            
            echo $htmlContent;
        } else echo -2;
    } else {
        echo "Error: some variable of POST isn't defined -> " . var_dump($_POST);
        echo -1;
    } 

?>