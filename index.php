<?php
	session_start();
    if(!isset($_SESSION['id']) || !isset($_COOKIE['id'])) {
        header("Location: includes/view/login.php");
    }
    include("includes/model/db.php");
    include("includes/view/header.php");
    include("includes/view/nav.php"); 
?>

<div class="container-fluid p-4">
    <div class="row">
        <div class="col-md-3 mt-4">
            <div class="card bg-dark">
                <div class="card-header text-center text-light">
                   Student panel
                </div>
                
                <div class="card-body">
                    <div class="text-center">
                        <i class="fas fa-user text-light"></i>
                        <h2 class="card-title text-light">
                            Welcome <?php echo $_SESSION['username']; ?>
                        </h2> 
                    </div>
                    

                    <div class="mx-1 mb-4 text-center">
                        <button onclick="logout()" class="mr-2 btn btn-lg btn-warning" type="submit" value="Save topic" name="saveTopic">
                            <i class="fas fa-sign-out-alt"></i> Log out
                        </button>

                        <button class="btn btn-lg btn-primary" type="submit" value="Save topic" name="saveTopic">
                            <i class="fas fa-cog"></i> Settings
                        </button>
                    </div>

                    <form id="userForm" action="" method="POST">
                        <div class="form-group">
                            <input placeholder="Topic name" type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="subject" name="subject">
                                <?php
                                    $userId = $_SESSION['id'];
                                    $query = 
                                        "SELECT 
                                            subject.id,
                                            subject.name,
                                            subject.user
                                        FROM 
                                            subject
                                        WHERE
                                            subject.user = '$userId'";
                                    $result = $connection->query($query);
                                    while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                                    <option value="<?php echo $row['id'] ?>">
                                        <?php echo $row['name'] ?>
                                    </option>;
                                    <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input placeholder="New subject" type="text" name="newSubject" id="newSubject" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-lg btn-success btn-block" type="submit" value="Save topic" name="saveTopic">
                                <i class="fas fa-save"></i> Save topic
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="tableContainer" class="col-md-9 mt-4 table-responsive">
            <?php include("includes/view/reviewTable.php") ?>
        </div>
    </div>
</div>

<?php include("includes/view/footer.php"); ?>



