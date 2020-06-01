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
                $result = mysqli_query($connection, $query);

                // Gets the result as an array of key->value
                while($row = mysqli_fetch_array($result)) { ?>

                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['fk_subject']; ?></td>
                    <td>
                        <a href="editUser.php?id=<?php echo $row['id']?>" class="btn btn-success">
                            <i class="fas fa-check"></i> Review 
                        </a>
                        <a href="editUser.php?id=<?php echo $row['id']?>" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a onclick="deleteUser(<?php echo $row['id']?>)" class="btn btn-danger" cursor="pointer">
                            <i class="fas fa-trash-alt"></i> Delete
                        </a>

                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
