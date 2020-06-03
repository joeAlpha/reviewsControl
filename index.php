<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: includes/view/login.php");
    }
    include("includes/model/db.php");
    include("includes/view/header.php");
    include("includes/view/nav.php"); 
?>

<div class="container-fluid p-4">
<!--
    <div class="card card-body row">
        <i class="fas fa-user text-center"></i>
        <h1 class="mb-4 mt-4 text-center">Welcome <?php echo $_SESSION['username']; ?>!</h1>
    </div>
-->
    <div class="row">
        <div class="col-md-3 mt-4">
            <div class="card card-body">
                <i class="fas fa-user text-center"></i>
                <h1 class="mb-4 mt-4 text-center">Welcome <?php echo $_SESSION['username']; ?>!</h1>
                        <div class="mx-1 mb-4 text-center">
                            <button class="mr-2 btn btn-lg btn-warning" type="submit" value="Save topic" name="saveTopic">
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
                                $query = "SELECT * FROM subject";
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

        <div id="tableContainer" class="col-md-9 mt-4 table-responsive">
            <?php include("includes/controller/reviewTable.php") ?>
        </div>
    </div>
</div>

<?php include("includes/view/footer.php"); ?>



