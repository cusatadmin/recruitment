<?php 
	session_start();
	$auth = $_SESSION['admin'] || $_SESSION['superadmin'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}

	include 'conf/db.php';
	$id = $_POST['id'];
	$score = $_POST['score'];

   	$query = "UPDATE publications SET
   						publication_score='$score'
   				WHERE publication_id='$id'";   
   	$stmt = $conn->prepare($query);
	$stmt->execute(); //working

	header("Location: admin_publications.php");

?>