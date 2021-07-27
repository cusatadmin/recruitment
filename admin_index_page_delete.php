<?php 
	session_start();

	include 'conf/db.php';
	$id= $_GET['entry'];

   	$query = "DELETE FROM index_page WHERE index_id='$id'";   
   	$stmt = $conn->prepare($query);
	$stmt->execute(); //working

	header("Location: admin_index_page_list.php");

?>