<?php 
	session_start();

	include 'conf/db.php';
	$id= $_GET['entry'];

   	$query = "DELETE FROM notifications WHERE notifid='$id'";   
   	$stmt = $conn->prepare($query);
	$stmt->execute(); //working

	header("Location: admin_notifications_all.php");

?>