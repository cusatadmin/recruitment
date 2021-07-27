<?php 
	session_start();
	include 'conf/db.php';

	$appn_id= $_POST["appn_id"];
	
	$query = "delete from applications where appn_id=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("i", $appn_id);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	echo "<span style='color:red'>Removed</span>";
	
?>
