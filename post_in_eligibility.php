<?php 
	session_start();

	$auth = $_SESSION['admin'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	} 
	include 'conf/db.php';
	$appn_id= $_POST['appn_id'];
	$reason= $_POST['reason'];
	
	

   	$query = "update applications set ineligible_reason='$reason' WHERE appn_id='$appn_id'";   
   	$stmt = $conn->prepare($query);
	$stmt->execute(); //working
	//echo $query;
	//echo "<span style='color:red'>Reason Posted</span>";

?>