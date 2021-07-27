<?php 
	session_start();

	$auth = $_SESSION['admin'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	} 
	include 'conf/db.php';
	$appn_id= $_POST['entry'];

   	$query = "update applications set appn_payment_status=2 WHERE appn_id='$appn_id'";   
   	$stmt = $conn->prepare($query);
	$stmt->execute(); //working
	//echo $query;
	echo "<span style='color:red'>Payment Posted</span>";

?>