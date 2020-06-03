
    <table class="table table-hover table-dark text-center">
        <thead>
            <tr>
                <th>Name</th>
                <th>Subject</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $reviewQuery = "SELECT * FROM review";    
                $reviewResult = $connection->query($reviewQuery);

                while($reviewRow = $reviewResult->fetch_array(MYSQLI_ASSOC)) { ?>

                <tr>
                    <td><?php echo $reviewRow['name']; ?></td>
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
                        <a onclick="completeTopic(<?php echo $reviewRow['review_id']?>,<?php echo date("Y-m-d", strtotime($reviewRow['review_date']))?>, <?php echo $reviewRow['number_of_review']?>)" class="btn btn-success">
                            <i class="fas fa-check"></i> Review 
                        </a>
                        <a href="includes/controller/edit.php?id=<?php echo $reviewRow['review_id']?>" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a onclick="deleteTopic(<?php echo $reviewRow['review_id']?>)" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> Delete
                        </a>

                    </td>
                </tr>

            <?php } ?>
        </tbody> </table>
