<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: includes/view/login.php");
    }
    include("includes/model/db.php");
    include("includes/view/header.php");
    include("includes/view/nav.php"); 
?>

<script>
    // After press 'Save topic'
    $(document).ready(function(e) {
        /* console.log("ok"); */
        $('#userForm').submit(function(submitEvent) {
            submitEvent.preventDefault();
            var formData = $(this).serialize(); 
            console.log(formData);
            $.ajax({
                type: "POST", 
                url: "includes/model/save.php",
                data: formData,
                success: function( result ) {
                    if(result != 0) {
                        $("#tableContainer").html(result);
                    } else {
                        alert("ERROR AT INSERT TOPIC");
                    }

                }
            });
        });
    });

    function deleteTopic(id) {
        data = "id=" + id;
        $.ajax({
            type: "GET",
            url: "includes/model/delete.php", // API which will process the data
            data: data, // Data 
            // Actions after the event was processed sucessfully
            success: function( result ) {
                if(result != 0) {
                    // Change the DOM
                    $("#tableContainer").html(result);
                } else {
                    alert("The insertion failed!");
                }

            }
        });
    }
</script>

<div class="container-fluid p-4">
    <div class="row">
        <div class="col-md-3 mt-4">
            <div class="card card-body">
                <h1 class="mb-4">Welcome <?php echo $_SESSION['username']; ?>!</h1>
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



