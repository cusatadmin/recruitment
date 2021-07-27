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
	
	$degree_cert= $_GET['degree_cert'];
	delete_file($degree_cert);
	
	$marklist= $_GET['marklist'];
	delete_file($marklist);

   	$query = "DELETE FROM academic WHERE acad_id='$id'";   
   	$stmt = $conn->prepare($query);
	$stmt->execute(); //working

header("Location: candidate_academic.php");

?>