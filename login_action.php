<?php
	session_start();
include 'conf/db.php';
include "functions.php";

  	$emailid=$_POST['emailid'];
  	$key=$_POST['pass1'];
	$todays = date('Y-m-d H:i:s');
	echo $emailid.$key;

	$query = "SELECT * from profile where emailid=? and activate = 1";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	
	if ($num_rows>=1) {
		$row = $result->fetch_object();
		$stored_key = $row->password;
		$category = $row->category;
		$firstname = $row->firstname;
		$lastname = $row->lastname;
		$photo = $row->photo;
		/*
		$_SESSION['authuser'] = 1;
					$_SESSION['emailid'] = $emailid;
					$_SESSION['firstname'] = $firstname;
					$_SESSION['lastname'] = $lastname;
					$_SESSION['photo'] = $photo;
					header("Location: candidate_page.php");
		*/
		//echo "Stored Key".$stored_key;

		if (password_verify($key, $stored_key)) {		
			$message = "Password Valid";
			switch ($category) {			
				case "Admin":
					$_SESSION['admin']=1;
	 	 			header("Location: admin_page.php");
					exit();
				default:
					$_SESSION['authuser'] = 1;
					$_SESSION['emailid'] = $emailid;
					$_SESSION['firstname'] = $firstname;
					$_SESSION['lastname'] = $lastname;
					$_SESSION['photo'] = $photo;
					header("Location: candidate_page.php");
					exit();		
			} // switch
		} else {
    		$message = 'Invalid password.';
			header("Location: message.php?message=$message");
			exit();
		}

	} else {
		$message =  "Invalid Username / User Not activated";
		header("Location: message.php?message=$message");
		exit();
	}
	echo $message;
?>