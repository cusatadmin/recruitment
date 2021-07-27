<?php 
	session_start();
	include 'conf/db.php';
	
	$emailid = $_SESSION['emailid'] ;
	$notifid= $_POST["notifid"];
	
	//get notifications
	$query = "SELECT * from notifications where notifid='$notifid'";
	$stmt = $conn->prepare($query);
	$stmt->execute(); //working
	$result_n = $stmt->get_result();
	$row_n = $result_n->fetch_object();
	//get profile
	$query = "SELECT * from profile where emailid = '$emailid'";
	$stmt = $conn->prepare($query);
	$stmt->execute(); //working
	$result_p = $stmt->get_result();
	$row_p = $result_p->fetch_object();
	//get fees as per the category of the candidate
	if  (($row_p->category=="Scheduled Caste") || ($row_p->category=="Scheduled Tribe") ) {
			$fees = $row_n->fees_scst;
			$currencyName = "INR";
	} elseif ($row_p->category=="International") {
			$fees = $row_n->fees_foreign;
			$currencyName = "USD";
	} else {	
			$fees = $row_n->fees_general;	
			$currencyName = "INR";
	}
	//generate order id 
	$order_id = $notifid."_".$row_p->id;
	
	$query = "SELECT * from applications where appn_emailid='$emailid' and appn_notifid='$notifid'";
	$stmt = $conn->prepare($query);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row_a = $result->fetch_object();
	
	if ($num_rows ==0)
		{
			$query = "insert into applications (appn_emailid, appn_notifid,amount,currencyName,OrderId )
						values ( '$emailid', '$notifid','$fees', '$currencyName','$order_id') ";
			$stmt = $conn->prepare($query);
			$stmt->execute(); //working
			echo "<span style='color:red'>Accepted</span>";
		  
		} 
		else{
			echo "<span style='color:red'>Already Applied</span>";
		}
		
?>
