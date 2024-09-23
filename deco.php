<?php
	// Starting the session
	session_start();

	// Destroying the session
	session_destroy();

	// Redirecting to the main page after logout
	header("Location: index.php");
	exit();
?>