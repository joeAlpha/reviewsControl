<?php 
	session_start();
    if(isset($_SESSION['id'])) {
        header("Location: ../../index.php");
    }
    include("../model/db.php");
    include("header.php");
?>

<div class="mx-auto card w-25 bg-dark">
	<div class="card-header">
		<h1 class="text-center text-light">
			Login
		</h1>
	</div>

	<div class="card-body">
		<form method="POST" action="../model/loginCheck.php">
			<div class="form-group">
				<input type="text" class="form-control" name="user" id="user" placeholder="Username/e-mail">
			</div>

			
			<div class="form-group">
				<input type="password" class="form-control" name="password" id="password" placeholder="Password">
			</div>

			<div class="text-center">
				<button type="button" onClick="document.location.href='registro.php'" class="btn mx-2 	btn-primary">
					<i class="fas fa-user-plus"></i>
	    		    Create new account
				</button>

				<button type="submit" class="mx-2 btn btn-success">
					<i class="fas fa-sign-in-alt"></i> Login
				</button>
			</div>
		</form>
	</div>
</div>

<?php include("footer.php") ?>
