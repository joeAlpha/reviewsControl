<!-- Subjects managment view -->

<div class="row">
<div id="topicMaker" class="col-md-3">
            <div class="card bg-dark h-100">
                <div class="card-header text-center text-light">
                <i class="fas fa-book-open text-light icon-big my-2"></i>
                <br>
                   Subject's register
                </div>
                
                <div class="card-body">
                    <form id="userForm" action="" method="POST">

                        <div class="form-group">
                            <input placeholder="Subject's name" type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success btn-lg btn-block" type="submit" value="Save topic" name="saveTopic">
                                <i class="fas fa-save icon-small mx-1"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<table class="table table-hover table-dark text-center col-md-9">
        <!-- Header of the table, shows the colmun's name. -->
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <!-- The topic data area, main content of the table. -->
        <tbody>
			<?php
				include('../model/connection.php');
                // var_dump($_COOKIE['id']);
                $userId = $_COOKIE['id']; // possible fail after ajax petition
                $subjectQuery = "SELECT subject.name FROM subject WHERE subject.user = '$userId'";    
                $subjectResult = $connection->query($subjectQuery);
                if(!$subjectResult) {
                    echo "Error in query to get user's subjects";
                }
                
                while($subjectRow = $subjectResult->fetch_array(MYSQLI_ASSOC)) { ?>
                <tr>
                    <th class="align-middle" scope="row"><?php echo $subjectRow['name']; ?></th>

                    <td class="align-middle">
                        <a href="app/view/edit.php?id=<?php echo $subjectRow['id']?>" class=" mx-2 btn btn-warning">
                            <i class="fas fa-edit mx-1"></i> Edit
                        </a>
                        <a onclick="deleteTopic('<?php echo $subjectRow['id']?>')" class="mx-2 btn btn-danger">
                            <i class="fas fa-trash-alt mx-1"></i> Delete
                        </a>

                    </td>
                </tr>

            <?php } ?>

        </tbody>
    </table>
</div>