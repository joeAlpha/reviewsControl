<?php 
	session_start();
	$_SESSION = array();
	session_destroy();
	echo 0;
	// header('Location: ../view/login.php');
?>