<?php
session_start();

/** Validate captcha */

    if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
		$message = "Invalid Entry in the Captcha Box. <a href='register.php'>Click here</a> to register again";
		header("Location: ./register.php?message=$message");
		exit();
    }

include 'conf/db.php';
include "functions.php";

	$otp = $_POST['otp'];
	$emailid = $_POST['emailid'];
	$password1 = $_POST['pass2'];   
	$todays = date('Y-m-d H:i:s');
	
	$password = password_hash($password1, PASSWORD_DEFAULT);
	//check if user exists
	$query = "SELECT emailid from profile where emailid=? and password_lost=?";
	//echo $query."</br/>";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("ss", $emailid, $otp);
	$stmt->execute();
	$stmt->store_result();
	$num_rows=$stmt->num_rows;
	//echo $num_rows;
	if ($num_rows <> 0) {

		$query = "UPDATE profile  set 
						password = '$password',
						password_reset_date='$todays'
				where emailid = '$emailid'";
		echo $query."</br/>";
		
		$stmt = $conn->prepare($query);

		$stmt->execute();

		$message_body = "Dear $firstname $lastname,\n\n Your new password is $password1\n\n
	Registrar, CUSAT, Cochin - 22";
	//echo $message_body;
	sendmail($emailid, $message_body);
	$message = "Please check your mail box"; 
	$stmt->close();
	$conn->close();
	} else {		
		$message = "User/Password Invalid";
	}
	
	header("Location: message.php?message=$message");
	//echo $message."</br/>";
?>