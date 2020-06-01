<!-- Data to be show in the form card -->
<?php
	include("db.php");
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "SELECT * FROM user WHERE id = $id LIMIT 1";
		$result = mysqli_query($connection, $query);
		if(mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$name = $row['name'];
			$email = $row['email'];
			$curriculum = $row['curriculum'];
		} else {
			header("Location: index.php");
		}
    } 
    
	if(isset($_POST['editUser'])) {
        $id = $_GET['id'];
        $name = $_POST['name'];
		$email = $_POST['email'];
		$curriculum = $_POST['curriculum'];
		$query = "UPDATE user SET name = '$name', email = '$email', curriculum = '$curriculum' WHERE id = $id";
        mysqli_query($connection, $query);
        header("Location: index.php");
    } 
?>

<?php
	include("includes/header.php");
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body">
                <form action="editUser.php?id=<?php echo $_GET['id']?>" method="POST">
                    <div class="form-group">
                        <input placeholder="Name" type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>">
                    </div>
                    <div class="form-group">
                        <input placeholder="E-mail" type="text" name="email" id="email" class="form-control" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="curriculum" id="cv" cols="30" rows="10"><?php echo $curriculum; ?></textarea>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success btn-block" type="submit" value="Edit" name="editUser">
                    </div>
                </form>
            </div>
        </div>
</div>

<?php
	include("includes/footer.php");
?>
