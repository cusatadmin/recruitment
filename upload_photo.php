<?php
	session_start();
	$emailid = $_SESSION['emailid'] ;
	$auth = $_SESSION['authuser'];
	include 'conf/db.php';
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	} 
	

		//photo upload
		$photo_src = $_POST['photo_src'];
		$photo_name = $_POST['photo_name'];
		copy($photo_src,"files/" . $photo_name);		
				
		
		$query = "UPDATE profile  set photo = '$photo_name' where emailid = '$emailid'";
		echo $query;
		$stmt = $conn->prepare($query);

		$stmt->execute();
		$_SESSION['photo'] = $photo_name;

?>
