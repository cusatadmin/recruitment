<?php
	session_start();
include 'conf/db.php';
include "functions.php";

$oldpass = "Lal@1234";
$emailid = "lalpaul@cusat.ac.in";
$password = password_hash($oldpass, PASSWORD_DEFAULT);

$query = "UPDATE profile  set 
						password = '$password'
				where emailid = '$emailid'";
		
			$stmt = $conn->prepare($query);

			$stmt->execute();
echo "Password Changed";

?>