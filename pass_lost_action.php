<?php
session_start();

/** Validate captcha */

    if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
		$message = "Invalid Entry in the Captcha Box. <a href='register.php'>Click here</a> to register again";
		header("Location: ./pass_lost.php?message=$message");
		exit();
    }

include 'conf/db.php';
include "functions.php";


	$emailid = $_POST['emailid'];
	$dateofbirth = $_POST['dateofbirth'];   
	$todays = date('Y-m-d H:i:s');
	
	$password1 = generatePassword(4,1);
	$password = password_hash($password1, PASSWORD_DEFAULT);
	//check if user exists
	$query = "SELECT * from profile where emailid=? and dateofbirth=? ";
	//echo $query."</br/>";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("ss", $emailid, $dateofbirth);
	$stmt->execute();
	$stmt->store_result();
	$num_rows=$stmt->num_rows;
	//echo $num_rows;
	if ($num_rows <> 0) {

		$query = "UPDATE profile  set 
						password_lost = '$password'
				where emailid = '$emailid'";
		echo $query."</br/>";
		
		$stmt = $conn->prepare($query);

		$stmt->execute();
		$link="http://recruit.cusat.ac.in/reset_password.php?key=".$password."&emailid=".$emailid;

		$message_body = "Dear $firstname $lastname,\n\n Kindly click the link to reset your password\n\n
	$link \n\n
	Registrar, CUSAT, Cochin - 22";
	//echo $message_body;
	sendmail($emailid, $message_body);
	$message = "Please check your mail box to reset the password"; 
	$stmt->close();
	$conn->close();
	} else {		
		$message = "User/Password Invalid";
	}
	
	header("Location: message.php?message=$message");
	echo $message."</br/>";
	
?>
