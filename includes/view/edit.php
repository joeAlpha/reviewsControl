<?php
    include("../view/header.php");
    include("../model/db.php");

	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "SELECT * FROM review WHERE review_id = '$id'";
		$result = $connection->query($query);
		if($result->num_rows == 1) {
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$name = $row['name'];
			$subject = $row['fk_subject'];
		} else {
			header("Location: ../../index.php");
		}
    } else {
        console.log("Id is not set");
    } 
    
	if(isset($_POST['edit'])) {
        $id = $_GET['id'];
        $name = $_POST['name'];
		$subject = $_POST['subject'];
		$query = "UPDATE review SET name = '$name', fk_subject = '$subject' WHERE review_id = '$id'";
        $connection->query($query);
        header("Location: ../../index.php");
    } 
?>


<div class="container p-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">
                    <div class="form-group">
                        <input placeholder="Name" type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>">
                    </div>
                    <div class="form-group">
                        <select value="<?php echo $fk_subject; ?>" class="form-control" id="subject" name="subject">
                            <option value="new">Choose subject</option>
                            <?php
                                $query = "SELECT * FROM subject";
                                $result = $connection->query($query);
                                while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="">
                                    <?php echo $row['name'] ?>
                                </option>;
                                <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success btn-block" type="submit" value="Edit" name="edit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("../view/footer.php"); ?>
