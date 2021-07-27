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
	$eligibility= $_POST['eligibility'];
	if ($eligibility==0) {
   	$query = "update applications set appn_eligible='$eligibility' WHERE appn_id='$appn_id'";   
   } else {
   	$query = "update applications set 
   						appn_eligible='$eligibility',
   						ineligible_reason = NULL
   					WHERE appn_id='$appn_id'";
   }
   	
   	$stmt = $conn->prepare($query);
	$stmt->execute(); //working
	//echo $query;
	echo "<span style='color:red'>Posted</span>";

?>