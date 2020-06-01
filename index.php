<?php include("includes/model/db.php"); ?>
<?php include("includes/view/header.php"); ?>
<?php include("includes/view/nav.php"); ?>

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
                url: "includes/model/saveTopic.php",
                data: formData,
                success: function( result ) {
                    if(result != 0) {
                        $("#tableContainer").html(result);
                    } else {
                        alert("The insertion failed!");
                    }

                }
            });
        });
    });

    function deleteUser(id) {
        data = "id=" + id;
        $.ajax({
            url: "includes/model/deleteTopic.php", // API which will process the data
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
        <div class="col-md-4 mt-4">
            <div class="card card-body">
                <form id="userForm" action="" method="POST">
                    <div class="form-group">
                        <input placeholder="Topic name" type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="subject" name="subject">
                            <!-- Load subjects --> 
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-success btn-block" type="submit" value="Save topic" name="saveTopic">
                            <i class="fas fa-save"></i> Save topic
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div id="tableContainer" class="col-md-8 mt-4 table-responsive">
            <?php include("includes/controller/reviewTable.php") ?>
        </div>
    </div>
</div>

<?php include("includes/view/footer.php"); ?>



