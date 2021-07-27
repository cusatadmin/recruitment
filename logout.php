<?php
	session_start();

	$_SESSION['emailid']="";
	session_destroy();
	$message = "Logged out successfully. Thank you.";
	
	header("Location: message.php?message=$message");

?>
