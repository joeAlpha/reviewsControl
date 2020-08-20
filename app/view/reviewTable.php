<?php include("motivationalCard.php") ?>
<!-- Main view, the review of topics -->
<div id="reviewAlert" class="mx-auto mt-2 text-center"></div>

    <table class="rounded table table-sm table-hover table-dark text-center">
        <!-- Header of the table, shows the colmun's name. -->
        <thead class="thead-dark">
            <tr class="rounded">
                <th scope="col">Name</th>
                <th scope="col">Subject</th>
                <th scope="col"># Reviews</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <!-- The topic data area, main content of the table. -->
        <tbody id="reviewTableBody">
            <?php
                // var_dump($_COOKIE['id']);
                $userId = $_COOKIE['id']; // possible fail after ajax petition
                $reviewQuery = 
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
                        subject.user = '$userId' AND 
                        review.review_date <= curdate()";    
                $reviewResult = $connection->query($reviewQuery);
                
                /* $allTopics = [];
                while($row = $reviewResult->fetch_array(MYSQLI_ASSOC)) {
                    array_push($allTopics, $row);
                } */
      
                // This causes an issue to show all topics to be reviewed
                // $allTopicsForToday = $reviewResult->fetch_array(MYSQLI_ASSOC);
                $TOPICS_PER_PAGE = 6;

                // Si el numero de topicos rebasa el limite, imprimir n por secciones,
                // caso contrario imprimir todos.
                $counterFlag = 0;
                while($row = $reviewResult->fetch_array(MYSQLI_ASSOC)) {
                    if($counterFlag >= $TOPICS_PER_PAGE) break;
                    $counterFlag++;
                // $reviewRow = $reviewResult->fetch_array(MYSQLI_ASSOC);
                // for($i = 0; $i < $reviewResult->num_rows; $i++) {  
            ?>

                <tr>
                    <th class="align-middle" scope="row">
                        <?php
                            if(date('Y-m-d', strtotime($row['review_date'])) < date('Y-m-d')) {
                                echo '<i class="fas fa-exclamation-triangle mr-3 text-warning" data-toggle="tooltip" data-placement="top" title="This topic had to be reviewed before."></i>';
                            }
                            echo $row['name']; 
                        ?>
                    </th>
                    <td class="align-middle">
                        <?php 
                            $subjectId = $row['fk_subject'];
                            $subjectNameQuery = "SELECT name FROM subject WHERE id = '$subjectId'";
                            $subjectNameResult = $connection->query($subjectNameQuery);
                            $subjectNameRow = $subjectNameResult->fetch_array(MYSQLI_ASSOC);
                            echo $subjectNameRow['name'];
                        ?>

                    </td>

                    <!-- Progress of mastering the topic -->
                    <td class="align-middle">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style=
                        "
                            <?php
                                $progress = $row['number_of_review']; 
                                switch($progress) {
                                    case 0: echo 'width: 10%'; break;
                                    case 1: echo 'width: 20%'; break;
                                    case 2: echo 'width: 30%'; break;
                                    case 3: echo 'width: 40%'; break;
                                    case 4: echo 'width: 50%'; break;
                                    case 5: echo 'width: 60%'; break;
                                    case 6: echo 'width: 70%'; break;
                                    case 7: echo 'width: 80%'; break;
                                    case 8: echo 'width: 90%'; break;
                                    case 9: echo 'width: 100%'; break;
                                }
                            ?>
                        "
                             aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <?php 
                                $progress = $row['number_of_review'];
                                switch($progress) {
                                    // case 0: echo '10%'; break;
                                    case 1: echo '2'; break;
                                    case 2: echo '3'; break;
                                    case 3: echo '4'; break;
                                    case 4: echo '5'; break;
                                    case 5: echo '6'; break;
                                    case 6: echo '7'; break;
                                    case 7: echo '8'; break;
                                    case 8: echo '9'; break;
                                    case 9: echo '10'; break;
                                }
                            ?>
                        </div>
                    </div>
                    </td>

                    <td class="align-middle">
                        <!-- * The result of an echo of PHP inside HTML must be bounded in '' 
                                in order to be manipulated as a string. * -->
                        <a onclick="completeTopic(
                            '<?php echo $row['review_id']; ?>',
                            '<?php echo $row['review_date']; ?>',
                            '<?php echo $row['number_of_review']?>')" class="mx-2 btn   btn-success">
                            <i class="fas fa-check mx-1"></i> Review 
                        </a>

                        <a onclick="restoreTopicStatus('<?php echo $row['review_id']; ?>', 'reviewTable')" class="
                        <?php
                            if(date('Y-m-d', strtotime($row['review_date'])) >= date('Y-m-d')) {
                                echo 'd-none';
                            }
                        ?>
                         text-light mx-2 btn btn-danger  " data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                            <i class="fas fa-redo-alt mx-1"></i> Reset
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php 
    $origin = basename(__FILE__, ".php"); // Getting the name of file know the origin of pagination request
    include("pagination.php"); 
?>
