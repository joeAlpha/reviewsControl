    <table class="table table-sm table-hover table-dark text-center">
        <!-- Header of the table, shows the colmun's name. -->
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Subject</th>
                <th scope="col">Retention</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <!-- The topic data area, main content of the table. -->
        <tbody>
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
                        review.review_date = curdate()";    
                $reviewResult = $connection->query($reviewQuery);
                if(!$reviewResult) {
                    echo "Error in query to get user's reviews";
                }

                while($reviewRow = $reviewResult->fetch_array(MYSQLI_ASSOC)) { ?>
                <tr>
                    <th class="align-middle" scope="row"><?php echo $reviewRow['name']; ?></th>
                    <td class="align-middle">
                        <?php 
                            $subjectId = $reviewRow['fk_subject'];
                            $subjectNameQuery = "SELECT name FROM subject WHERE id = '$subjectId'";
                            $subjectNameResult = $connection->query($subjectNameQuery);
                            $subjectNameRow = $subjectNameResult->fetch_array(MYSQLI_ASSOC);
                            echo $subjectNameRow['name'];
                        ?>

                    </td>

                    <!-- Progress of mastering the topic -->
                    <td class="align-middle">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style=
                        "
                            <?php
                                $progress = $reviewRow['number_of_review']; 
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
                                $progress = $reviewRow['number_of_review'];
                                switch($progress) {
                                    // case 0: echo '10%'; break;
                                    case 1: echo '20%'; break;
                                    case 2: echo '30%'; break;
                                    case 3: echo '40%'; break;
                                    case 4: echo '50%'; break;
                                    case 5: echo '60%'; break;
                                    case 6: echo '70%'; break;
                                    case 7: echo '80%'; break;
                                    case 8: echo '90%'; break;
                                    case 9: echo '100%'; break;
                                }
                                ?>
                        </div>
                    </div>
                    </td>

                    <td class="align-middle">
                        <!-- * The result of an echo of PHP inside HTML must be bounded in '' 
                                in order to be manipulated as a string. * -->
                        <a onclick="completeTopic(
                            '<?php echo $reviewRow['review_id']; ?>',
                            '<?php echo $reviewRow['review_date']; ?>',
                            '<?php echo $reviewRow['number_of_review']?>')" class="mx-2 btn btn-success">
                            <i class="fas fa-check mx-1"></i> Review 
                        </a>
                        <a href="app/view/edit.php?id=<?php echo $reviewRow['review_id']?>" class=" mx-2 btn btn-warning">
                            <i class="fas fa-edit mx-1"></i> Edit
                        </a>
                        <a onclick="deleteTopic('<?php echo $reviewRow['review_id']?>')" class="mx-2 btn btn-danger">
                            <i class="fas fa-trash-alt mx-1"></i> Delete
                        </a>

                    </td>
                </tr>

            <?php } ?>

        </tbody>
    </table>
