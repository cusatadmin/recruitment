<?php
session_start();

/** Validate captcha */

    if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
		$message = "Invalid Entry in the Captcha Box.";
		header("Location: ./message.php?message=$message");
		exit();
    }

include 'conf/db.php';
include "functions.php";

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$mobile = $_POST['mobile2'];
	$emailid = $_POST['emailid2'];
	$password1 = $_POST['pass1'];   
	$todays = date('Y-m-d H:i:s');
	
	$password = password_hash($password1, PASSWORD_DEFAULT);
	//check if user exists
	$query = "SELECT emailid from profile where emailid=? and mobile=?";
	//echo $query."</br/>";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("ss", $emailid, $mobile);
	$stmt->execute();
	$stmt->store_result();
	$num_rows=$stmt->num_rows;
	echo $num_rows;
	if ($num_rows <> 0) {
		$message = "Candidate already Registered";
		//sendmail($emailid, "TEST");
		//echo $message;
	} else {
		//photo upload
		$photo_name = $_FILES['photo']['name'];
		$photo_name = "P_".$emailid.".jpg";
		//echo $photo_name;
		$photo_type = $_FILES['photo']['type'];
		$photo_size = $_FILES['photo']['size'];
				
				if ((($_FILES["photo"]["type"] == "image/jpeg")
							|| ($_FILES["photo"]["type"] == "image/pjpeg"))
								&& ($_FILES["photo"]["size"] < 500000)
								&& ($_FILES["photo"]["error"] <= 0) )
  					{						
     						 //copy($photo_old, $photo_new) or die("Unable to copy $old to $new.");
							copy($_FILES["photo"]["tmp_name"],"files/" . $photo_name);
  					} else {
  						
  						$photo_name = "default.jpg";
  						
  					}
		
		//photo end
		
		$query = "INSERT INTO profile 
				(firstname, lastname, emailid, mobile, password, photo, postdate
				) VALUES 
					('$firstname', '$lastname', '$emailid', '$mobile', '$password', '$photo_name', '$todays')";	
		echo $query."</br/>";
		
		$stmt = $conn->prepare($query);

		$stmt->execute();
		$link="http://recruit.cusat.ac.in/activate.php?key=".$password."&emailid=".$emailid;

		$message_body = "Dear $firstname $lastname,\n\n You have successfully registered. Kindly activate your account by clicking the following link\n\n
	$link \n\n
	Registrar, CUSAT, Cochin - 22";
	//echo $message_body;
	sendmail($emailid, $message_body);

	$stmt->close();
	$conn->close();
	$message = "Registration Successfull. Please check your mail box for activation link"; 
	echo $message_body."</br/>";
	
	}
	
	header("Location: message.php?message=$message");
	//echo $message."</br/>";
	
?>
