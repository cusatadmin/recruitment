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

   	$query = "UPDATE awards SET
   						award_score='$score'
   				WHERE award_id='$id'";   
   	$stmt = $conn->prepare($query);
	$stmt->execute(); //working

	header("Location: admin_awards.php");

?>