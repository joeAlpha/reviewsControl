<?php 
	session_start();
    if(isset($_SESSION['id'])) {
        header("Location: ../../index.php");
    }
    include("../model/db.php");
	include("header.php");
?>

<link rel="stylesheet" href="../../web/styles/styles.css">
<div class="container-fluid row p-4">
	<div class="container col text-center bg-dark p-4">
		<i class="fas fa-book-open text-white icon-big"></i>
		<br>
		<h1 class="text-light">Review's control</h1>
		<hr>
		<span class="text-light">
			Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa omnis minima consequuntur voluptatum ipsa? Laborum cum vero quasi, debitis aliquam ex. Soluta, aspernatur reiciendis adipisci necessitatibus ex harum excepturi recusandae?
		</span>
	</div>

	<div class="container col text-center">
		<div class="card bg-dark m-auto w-75">
			<div class="card-header">
				<i class="fas fa-sign-in-alt text-white icon-big"></i>
				<br>

				<h2 class="text-center text-light">
					Login
				</h2>
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
							Create account
						</button>

						<button type="submit" class="mx-2 btn btn-success">
							<i class="fas fa-sign-in-alt"></i> Login
						</button>
					</div>

					<div class="container my-4">
						<a href="" class="badge badge-info">
							I forget my password
						</a>
					</div>
					
				</form>
			</div>
		</div>
	</div>


</div>


<?php include("footer.php") ?>
