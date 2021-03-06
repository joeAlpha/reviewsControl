<div id="subjectAlert" class="mx-auto text-center"></div>

<table class="rounded table table-sm table-hover table-dark text-center">
        <!-- Header of the table, shows the colmun's name. -->
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <!-- The topic data area, main content of the table. -->
        <tbody id="subjectManagerTableBody">
			<?php
				include('../model/connection.php');
                $userId = $_COOKIE['id']; // possible fail after ajax petition
                $subjectQuery = "SELECT * FROM subject WHERE subject.user = '$userId'";    
                $subjectResult = $connection->query($subjectQuery);
                if(!$subjectResult) {
                    echo "Error in query to get user's subjects";
                }

                
                $counterFlag = 0;
                $ELEMENTS_PER_PAGE = 6;
                
                while($subjectRow = $subjectResult->fetch_array(MYSQLI_ASSOC)) { ?>
                 <?php
                    if($counterFlag >= $ELEMENTS_PER_PAGE) break;
                    $counterFlag++;
                ?>
                <tr>
                    <th class="align-middle" scope="row"><?php echo $subjectRow['name']; ?></th>

                    <td class="align-middle">
                        <a href="app/view/edit.php?id=<?php echo $subjectRow['id']?>" class=" mx-2 btn btn-warning">
                            <i class="fas fa-edit mx-1"></i> Edit
                        </a>
                        <a onclick="deleteSubject('<?php echo $subjectRow['id']?>')" class="mx-2 btn btn-danger">
                            <i class="fas fa-trash-alt mx-1"></i> Delete
                        </a>

                    </td>
                </tr>

            <?php } ?>

        </tbody>
    </table>

    <?php 
        $origin = basename(__FILE__, ".php"); // Getting the name of file know the origin of pagination request
        include("subjectPagination.php"); 
    ?>