<?php 
	session_start();
	include 'conf/db.php';
	
	$emailid = $_SESSION['emailid'] ;
	$notifid= $_POST["notifid"];
	
	//get notifications
	$query = "UPDATE notifications SET
					display=1
				where notifid='$notifid'";
	$stmt = $conn->prepare($query);
	$stmt->execute(); //working
	
	echo "<span style='color:red'>Published in the website. Refresh page</span>";
	
?>
