<?php
include 'conf/db.php';
include "functions.php";
  	$paswd=$_GET['key'];
  	$emailid=$_GET['emailid'];
	$todays = date('Y-m-d H:i:s');
	//echo $id.$paswd;
	$query = "SELECT firstname, lastname, emailid, activate from profile where emailid=? and password=?";
	$stmt = $conn->prepare($query); 
	$stmt->bind_param("ss", $emailid, $paswd);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($firstname, $lastname, $emailid, $activate);
	$stmt->fetch();
	$num_rows=$stmt->num_rows;
	echo "NUM ROWS".$num_rows;
	echo "ACTIVATE".$activate;
	if ($num_rows==1) {
//	$result = $stmt->get_result();
//	$row=$result->fetch_object();
//	echo $name = $row->name;
//	echo $emailid = $row->emailid;
//	echo $mobile = $row->mobile;
//	echo $activate = $row->activate;

		if ($activate==1) {
			#echo "-Hai";			
			$message = "You have already activated.";
			echo $message;
			header("Location: message.php?message=$message");
			exit();
		} 
		else {
			#echo "ELSE";
			$query="update profile set
				activate=1
					where emailid=?";
			#echo $query;
			$stmt = $conn->prepare($query);
			$stmt->bind_param("s", $emailid);
			$stmt->execute();

			//$query = "INSERT INTO complaintss (name, emailid, postdate) VALUES ('$name','$emailid', '$todays')";
			//echo $query;$stmt = $conn->prepare($query);
			//$stmt->execute();
			
			$message = "Your Email ID and Password activated successfully";
			// inserted by lal paul on 26/12/2018
			if (sendmail($emailid, $message)) {
				$message = "Your Email ID and Password activated successfully.";
				echo $message;
				$_SESSION['emailid']="";
				session_destroy();
				header("Location: message.php?message=$message");
				exit();
			} else {
				$message = "Mail Cannot be sent. Internal Error. Please try later.";
				echo $message;
				$_SESSION['emailid']="";
				session_destroy();
				header("Location: message.php?message=$message");
				exit();			
			}	  //if sendmail
			
		}
	} else {
		$message = "Invalid Username/Password";
		echo $message;
		$_SESSION['emailid']="";
		session_destroy();
		header("Location: message.php?message=$message");
	
		exit();
	}
	echo $message;
	$stmt->close();
	$stmt1->close();
	$_SESSION['emailid']="";
	session_destroy();
	header("Location: message.php?message=$message");
	
?>