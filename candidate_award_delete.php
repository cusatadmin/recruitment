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
	
	$award_certificate= $_GET['award_certificate'];
	delete_file($award_certificate);

   	$query = "DELETE FROM awards WHERE award_id='$id'";   
   	$stmt = $conn->prepare($query);
	$stmt->execute(); //working

	header("Location: candidate_awards.php");

?>