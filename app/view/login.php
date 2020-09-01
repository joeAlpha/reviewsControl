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
		<p class="text-light h5">
			Review's control is a tool that helps you to memorize/master a specific topic
			using a techique of "distribute reviews through the time" based on the <a href="https://en.wikipedia.org/wiki/Forgetting_curve" class="badge badge-primary" target="_blank">Forgetting curve</a>
			proposed by the psychologist <a href="https://wikipedia.org/wiki/Hermann_Ebbinghaus" class="badge badge-primary" target="_blank">Hermann Ebbinghaus</a> (January 24, 1850 – February 26, 1909).
		</p>
	</div>


	<!-- Place for login and sign up forms  -->
	<div id="formAccessContainer" class="col">
		<?php include("loginForm.php") ?>
	</div>

</div>

<!-- Controllers out of app, only for login and sign up purposes -->
<script src="../controller/loadLoginViewController.js"></script>
<script src="../controller/loginController.js"></script>
<script src="../controller/loadSignUpViewController.js"></script>
<script src="../controller/signUpController.js"></script>


<?php include("footer.php") ?>
