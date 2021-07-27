<?php
	session_start();
	 
	
	
	/**
	 * This Is the Kit File To Be included For Transaction Request/Response
	 */
	include 'AWLMEAPI.php';
	
	//create an Object of the above included class
	$obj = new AWLMEAPI();
	
	/* This is the response Object */
	$resMsgDTO = new ResMsgDTO();

	/* This is the request Object */
	$reqMsgDTO = new ReqMsgDTO();
	
	//This is the Merchant Key that is used for decryption also
	$enc_key = "36bc3959bbbebde21c17317fbfaa411d";
	
	/* Get the Response from the WorldLine */
	$responseMerchant = $_REQUEST['merchantResponse'];
	
	$response = $obj->parseTrnResMsg( $responseMerchant , $enc_key );
	
	$tr_ref_no = $response->getPgMeTrnRefNo();
	$tr_order_id = $response->getOrderId();
	$tr_amount = $response->getTrnAmt()/100;
	$tr_status_code = $response->getStatusCode();
	if ( $tr_status_code == "S")
		$appn_payment_status = 2;
	else
		$appn_payment_status = 0;
	$tr_status_desc = $response->getStatusDesc();
	$tr_req_date = $response->getTrnReqDate();
	$tr_resp_code = $response->getResponseCode();
	$tr_rrn = $response->getRrn();
	$tr_authcode = $response->getAuthZCode();
	$tr_emailid = $response->getAddField1();
	$tr_section = $response->getAddField2();
	$todays = date('Y-m-d H:i:s');
	



		$AddlField1 			=  $response->getAddField1();
		$AddlField2 			=  $response->getAddField2();
		$AddlField3 			=  $response->getAddField3();
		$AddlField4 			=  $response->getAddField4();
		$AddlField5 			=  $response->getAddField5();
		$AddlField6				=  $response->getAddField6();
		$AddlField7 			=  $response->getAddField7();
		$AddlField8 			=  $response->getAddField8();

		include '../conf/db.php';

		$query = "INSERT INTO transaction_response 
				(trans_refer_no, order_id, Amount, StatusCode, StatusDescription,RRN, Authzcode, Response_code, Transaction_datetime, AddlField1, AddlField2, AddlField3, AddlField4, AddlField5, AddlField6, AddlField7, AddlField8) 
				VALUES 
				('$tr_ref_no','$tr_order_id', '$Amount', '$tr_status_code', '$tr_status_desc', 
					'$tr_rrn','$tr_authcode', '$tr_resp_code', '$tr_req_date', '$AddField1', '$AddField2', '$AddField3', '$AddField4', '$AddField5', '$AddField6', '$AddField7', '$AddField8')";	
		//echo $query; exit;
	$stmt = $conn->prepare($query);
	$stmt->execute();

	
	$query = "UPDATE applications  set
				section = '$section', 
				appn_payment_status = '$appn_payment_status',
				tr_ref_no = '$tr_ref_no',
				tr_order_id = '$tr_order_id',
				tr_amount = '$tr_amount',
				tr_status_code = '$tr_status_code',
				tr_status_desc = '$tr_status_desc',
				tr_req_date = '$tr_req_date',
				tr_resp_code = '$tr_resp_code',
				tr_rrn = '$tr_rrn',
				tr_authcode = '$tr_authcode',			
				tr_emailid = '$tr_emailid',
				tr_postdate = '$todays'
		where appn_emailid = '$tr_emailid'";
		//echo $query;
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
	$query = "INSERT INTO tr_response 
				(tr_ref_number, order_id, amount, status_code,  status_description, 
					rrn, auth_code, response_code, tr_date, tr_emailid, tr_section, postdate) 
				VALUES 
				('$tr_ref_no','$tr_order_id', '$tr_amount', '$tr_status_code', '$tr_status_desc', 
					'$tr_rrn','$tr_authcode', '$tr_resp_code', '$tr_req_date', '$tr_emailid', '$tr_section', '$todays')";	
		//echo $query;
	$stmt = $conn->prepare($query);
	$stmt->execute();	
	
	$query = "SELECT * FROM profile where emailid=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s", $tr_emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$row = $result->fetch_object();

	$_SESSION['firstname'] = $row->firstname;
	$_SESSION['lastname'] = $row->lastname;
	$_SESSION['photo'] = $row->photo;
	$_SESSION['emailid'] = $tr_emailid ;
	$_SESSION['authuser'] = 1;
	
	header("Location: ../candidate_page.php");
    exit();

	
?>