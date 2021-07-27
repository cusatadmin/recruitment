<?php 
	session_start();
	$auth = $_SESSION['admin'] || $_SESSION['superadmin'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}

	include 'conf/db.php';
	$id = $_GET['entry'];

   	$query = "DELETE FROM postnames WHERE postid='$id'";   
   	$stmt = $conn->prepare($query);
	$stmt->execute(); //working

	header("Location: admin_postname_list.php");

?>