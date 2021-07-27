<?php 
	session_start();

	$auth = $_SESSION['admin'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	} 
	include 'conf/db.php';
	$appnid= $_POST['appnid'];
	$rankpos= $_POST['rankpos'];
	//echo ":::APPNID=:::".$appnid.":::RANKPOS:::".$rankpos;
   	$query = "update applications set appn_rank='$rankpos' WHERE appn_id='$appnid'";   
   	$stmt = $conn->prepare($query);
	$stmt->execute(); //working
	//echo $query;
	echo "<span style='color:red'>Ranked</span>";

?>