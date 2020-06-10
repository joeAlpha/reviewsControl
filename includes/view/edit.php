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
            $date = $row['review_date'];
		} else {
			header("Location: ../../index.php");
		}
    } else {
        echo "Id is not set";
    } 
    
    // Move to model
	if(isset($_POST['save'])) {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $newDate = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
		$query = "UPDATE review SET name = '$name', fk_subject = '$subject', review_date = '$newDate' WHERE review_id = '$id'";
        $result = $connection->query($query);
        if($result) {
            header("Location: ../../index.php");
        } else {
            
        }
    } 

    if(isset($_POST['cancel'])) {
        header("Location: ../../index.php");
    } 
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-dark">
                <div class="text-center">
                    <h2 class="card-title text-light mx-2">
                        <i class="fas fa-edit text-light mb-4"></i>
                        <br>
                            Edit topic information 
                        </h2> 
                </div>

                <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST" class="mt-5">

                    <!-- Name -->
                    <div class="form-group">
                        <input placeholder="Name" type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>">
                    </div>

                    <!-- Date -->
                    <div class="form-group">
                        <select value="<?php echo $subject; ?>" class="form-control" id="subject" name="subject">
                                <?php
                                    $userId = $_COOKIE['id'];
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

                    <!-- Date -->
                    <div class="row form-group">
                        <select class="form-control custom-select col-md-4 mx-auto" id="year" name="year">
                            <?php
                                echo 'ok';
                                for($i = date('o'); $i > 1970; $i--) { ?>
                                    <option value="<?php echo $i; ?>" <?php if(date('Y', strtotime($date)) == $i) { echo 'selected';}; ?> ><?php echo $i; ?></option>;
                                <?php } ?>
                        </select>

                        <select class="form-control custom-select col-md-3 mx-auto" id="month" name="month">
                        <?php
                            // $months = array(1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre');
                            $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');

                            for($i = 12; $i > 0; $i--) { ?>
                                <option value="<?php echo $months[$i]; ?>" <?php if(date('m', strtotime($date)) == $i) { echo 'selected';}; ?> ><?php echo $months[$i]; ?></option>;
                            <?php } ?>
                        </select>

                        <select class="form-control custom-select col-md-3 mx-auto" id="day" name="day">
                        <?php
                                for($i = 31; $i > 0; $i--) { ?>
                                    <option value="<?php echo $i; ?>" <?php if(date('d', strtotime($date)) == $i) { echo 'selected';}; ?> ><?php echo $i; ?></option>;
                                <?php } ?>
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="row form-group mt-5">
                            <button class="form-control w-25 mx-auto btn btn-warning btn-font" type="submit" value="Cancel" name="cancel">
                                <i class="fa fa-ban" aria-hidden="true"></i> Cancel
                            </button>

                            <button class="form-control w-25 mx-auto btn btn-success btn-font" type="submit" value="Save" name="save">
                            <i class="fa fa-save" aria-hidden="true"></i> Save
                            </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php include("../view/footer.php"); ?>
