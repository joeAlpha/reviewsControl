
    <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th>Name</th>
                <th>Subject</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $query = "SELECT * FROM review";    
                $result = $connection->query($query);

                while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>

                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['fk_subject']; ?></td>
                    <td>
                        <a href="includes/model/complete.php?id=<?php echo $row['review_id']?>" class="btn btn-success">
                            <i class="fas fa-check"></i> Review 
                        </a>
                        <a href="includes/controller/edit.php?id=<?php echo $row['review_id']?>" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a onclick="deleteTopic(<?php echo $row['review_id']?>)" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> Delete
                        </a>

                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
