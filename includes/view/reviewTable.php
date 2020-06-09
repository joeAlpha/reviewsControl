
    <table class="table table-hover table-dark text-center">
        <!-- Header of the table, shows the colmun's name. -->
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Subject</th>
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
                    <th scope="row"><?php echo $reviewRow['name']; ?></th>
                    <td>
                        <?php 
                            $subjectId = $reviewRow['fk_subject'];
                            $subjectNameQuery = "SELECT name FROM subject WHERE id = '$subjectId'";
                            $subjectNameResult = $connection->query($subjectNameQuery);
                            $subjectNameRow = $subjectNameResult->fetch_array(MYSQLI_ASSOC);
                            echo $subjectNameRow['name'];
                        ?>

                    </td>
                    <td>
                        <!-- * The result of an echo of PHP inside HTML must be bounded in '' 
                                in order to be manipulated as a string. * -->
                        <a onclick="completeTopic(
                            '<?php echo $reviewRow['review_id']; ?>',
                            '<?php echo $reviewRow['review_date']; ?>',
                            '<?php echo $reviewRow['number_of_review']?>')" class="mx-2 btn btn-success">
                            <i class="fas fa-check"></i> Review 
                        </a>
                        <a href="includes/view/edit.php?id=<?php echo $reviewRow['review_id']?>" class=" mx-2 btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a onclick="deleteTopic('<?php echo $reviewRow['review_id']?>')" class="mx-2 btn btn-danger">
                            <i class="fas fa-trash-alt"></i> Delete
                        </a>

                    </td>
                </tr>

            <?php } ?>
            <?php 
                // $connection->close(); 
                // $reviewResult->close();
                // $subjectNameResult->close();
            ?>

        </tbody>
    </table>
