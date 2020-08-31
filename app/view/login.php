<!-- Login view -->
<?php 
	session_start();
    if(isset($_COOKIE['id'])) {
        header("Location: ../../index.php");
    }
    include("../model/connection.php");
	include("header.php");
?>

<link rel="stylesheet" href="../../web/styles/styles.css">
<div class="container-fluid row p-4" >
	<div class="container col text-center bg-dark p-4">
		<i class="fas fa-book-open text-white icon-big"></i>
		<br>
		<h1 class="text-light">Review's control</h1>
		<hr>
		<span class="text-light">
			Review's control is a tool that helps you to memorize/master a specific topic
			using a techique of "distribute reviews through the time" based on the forgotten curve
			proposed by the psychologist Hermann Ebbinghaus (January 24, 1850 – February 26, 1909).
		</span>
	</div>


	<!-- Place for login and sign up forms  -->
	<div id="formAccessContainer" class="col">
		<?php include("loginForm.php") ?>
	</div>

</div>

<!-- Controllers out of app, only for login and sign up purposes -->
<script src="../controller/loginController.js"></script>
<script src="../controller/loadSignUpViewController.js"></script>
<script src="../controller/loadLoginViewController.js"></script>

<?php include("footer.php") ?>
