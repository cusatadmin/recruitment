<?php 
	session_start();
	include 'conf/db.php';
	
	$emailid = $_SESSION['emailid'] ;
	$notifid= $_POST["notifid"];
	
	//get notifications
	$query = "UPDATE notifications SET
					display=0
				where notifid='$notifid'";
	$stmt = $conn->prepare($query);
	$stmt->execute(); //working
	
	echo "<span style='color:red'>Removed from the website. Refresh page to see the effect</span>";
	
?>
