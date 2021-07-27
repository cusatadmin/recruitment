<?php 
	session_start();

	$auth = $_SESSION['authuser'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	} 
	include 'conf/db.php';
	include "functions.php";
	
	$id= $_GET['entry'];
	
	$exp_certificate= $_GET['exp_certificate'];
	delete_file($exp_certificate);
	
   	$query = "DELETE FROM experience WHERE exp_id='$id'";   
   	$stmt = $conn->prepare($query);
	$stmt->execute(); //working

header("Location: candidate_experience.php");

?>