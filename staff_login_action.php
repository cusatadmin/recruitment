<?php
	session_start();
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
	
include 'conf/db.php';
include "functions.php";

  	$username=$_POST['username'];
  	$passkey=$_POST['passkey'];
	$todays = date('Y-m-d H:i:s');

	$query = "SELECT * from users where username=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s", $username);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	
	if ($num_rows>=1) {
		$row = $result->fetch_object();
		$stored_key = $row->password;
		$role = $row->role;
		//echo "Stored Key".$stored_key;
		if (password_verify($passkey, $stored_key)) {		
			$message = "Password Valid";
			$_SESSION['username'] = $row->username;
			switch ($role) {			
				case "admin":
				case "staff":
					$_SESSION['admin']=1;
	 	 			header("Location: admin_page.php");
					exit();
				case "superadmin":
					$_SESSION['superadmin'] = 1;
					$_SESSION['admin']=1;
					header("Location: admin_page.php");
					exit();	
				default:
					$message = 'Invalid User.';
					header("Location: message.php?message=$message");
					exit();
			} // switch
		} else {
    		$message = 'Invalid password.';
			header("Location: message.php?message=$message");
			exit();
		}

	} else {
		$message =  "Invalid Username";
		header("Location: message.php?message=$message");
		exit();
	}
	//echo $message;
header("Location: staff_login.php");
exit();
?>