<?php 
	// Destroy the session
	session_start();
	$_SESSION = array();
	session_destroy();

	// Unset the cookie
	if (isset($_COOKIE['id'])) {
		unset($_COOKIE['id']); 
		setcookie('id', null, -1, '/'); 
		header('Location: ../view/login.php');
	} else {
		return false;
	}
?>