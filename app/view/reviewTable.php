    <table class="rounded table table-hover table-dark text-center">
        <!-- Header of the table, shows the colmun's name. -->
        <thead class="thead-dark">
            <tr>
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
                
                $allTopics = [];
                while($row = $reviewResult->fetch_array(MYSQLI_ASSOC)) {
                    $allTopics[] = $row;
                }
      
                // This causes an issue to show all topics to be reviewed
                // $allTopicsForToday = $reviewResult->fetch_array(MYSQLI_ASSOC);
                $TOPICS_PER_PAGE = 8;

                // Si el numero de topicos rebasa el limite, imprimir n por secciones,
                // caso contrario imprimir todos.
                $counterFlag = 0;
                for($i = 0; $i < $TOPICS_PER_PAGE; $i++) {  
                    // $counterFlag++;
                    // if($counterFlag == $TOPICS_PER_PAGE) break;
                // $reviewRow = $reviewResult->fetch_array(MYSQLI_ASSOC);
                // for($i = 0; $i < $reviewResult->num_rows; $i++) {  
            ?>

                <tr>
                    <th class="align-middle" scope="row">
                        <?php
                            if(date('Y-m-d', strtotime($allTopics[$i]['review_date'])) < date('Y-m-d')) {
                                echo '<i class="fas fa-exclamation-triangle mr-3 text-warning"></i>';
                            }
                            echo $allTopics[$i]['name']; 
                        ?>
                    </th>
                    <td class="align-middle">
                        <?php 
                            $subjectId = $allTopics[$i]['fk_subject'];
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
                                $progress = $allTopics[$i]['number_of_review']; 
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
                                $progress = $allTopics[$i]['number_of_review'];
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
                            '<?php echo $allTopics[$i]['review_id']; ?>',
                            '<?php echo $allTopics[$i]['review_date']; ?>',
                            '<?php echo $allTopics[$i]['number_of_review']?>')" class="mx-2 btn btn-success">
                            <i class="fas fa-check mx-1"></i> Review 
                        </a>

                        <a onclick="restoreTopicStatus('<?php echo $allTopics[$i]['review_id']; ?>', 'reviewTable')" class="
                        <?php
                            if(date('Y-m-d', strtotime($allTopics[$i]['review_date'])) >= date('Y-m-d')) {
                                echo 'd-none';
                            }
                        ?>
                         text-light mx-2 btn btn-danger" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                            <i class="fas fa-redo-alt mx-1"></i> Restore
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Pagination nav -->
    <nav aria-label="Page navigation example" class="<?php if($reviewResult->num_rows <= $TOPICS_PER_PAGE) echo 'd-none'; ?>">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link mx-1" href="#" tabindex="-1">Previous</a>
    </li>

    <?php
        $numberOfPages = ($reviewResult->num_rows / $TOPICS_PER_PAGE) + 1;
        for($i = 1; $i <= $numberOfPages; $i++) {
            echo '<li class="page-item"> <a class="page-link btn mx-1" onclick="getPage(' . ($TOPICS_PER_PAGE * $i - $TOPICS_PER_PAGE + 1) . ', ' . json_encode($allTopics) . ')">' . $i . '</a></li>';
            // echo '<li class="page-item"> <a class="page-link btn mx-1" onclick="getPage(' . ($TOPICS_PER_PAGE * $i - $TOPICS_PER_PAGE + 1) . ')">' . $i . '</a></li>';
        }
    ?>

    <li class="page-item">
      <a class="page-link mx-1" href="#">Next</a>
    </li>
  </ul>
    </nav>

    <div id="reviewAlerts" class="mx-auto mt-2 text-center"></div>
