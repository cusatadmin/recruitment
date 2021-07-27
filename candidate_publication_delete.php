<?php 
	session_start();

	$auth = $_SESSION['authuser'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	} 
	include 'conf/db.php';
	$id= $_GET['entry'];
	include "functions.php";

   	$query = "DELETE FROM publications WHERE publication_id='$id'";   
   	$stmt = $conn->prepare($query);
	$stmt->execute(); //working

	header("Location: candidate_publications.php");

?>