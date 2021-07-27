<?php 
	include '../conf/db.php';

	$query = "SELECT GROUP_CONCAT(OrderId) as orderid FROM faculty.transaction_request left join faculty.transaction_response on transaction_response.order_id = transaction_request.OrderId where order_id IS NULL"; 
	$stmt = $conn->prepare($query);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$row = $result->fetch_object();


	session_start();
	//Step 1: include the following namespace

	include 'AWLMEAPI.php';
	$obj = new AWLMEAPI();
	//$orderId = $row->orderid;
	$orderId = "525_334320210702145053";

	$mId =”WL0000000013355”;
	$enc_key=”36bc3959bbbebde21c17317fbfaa411d”;
	$pgMeTrnRefNo=””;
	//Step 2: Construct the request DTO with respective Parameter
	$resMsgDTO = $obj->getTransactionStatus( $mId , $orderId , $pgMeTrnRefNo , $enc_key); 

print_r($resMsgDTO);

	//Step 4: Retrieve Status:
	if ($resMsgDTO->getStatusCode()== "S"){
		echo "Success"; exit;
	else
	 	echo "Failed"; exit;
	}


	
	echo $tr_ref_no 				= $response->getPgMeTrnRefNo();
	echo $tr_order_id 			= $response->getOrderId();
	echo $tr_amount 				= $response->getTrnAmt()/100;
	echo $tr_status_code 		= $response->getStatusCode();
	echo $tr_status_desc 		= $response->getStatusDesc();
	echo $tr_req_date 			= $response->getTrnReqDate(); 
	$tr_resp_code 			= $response->getResponseCode();
	$tr_rrn 				= $response->getRrn();
	$tr_authcode 			= $response->getAuthZCode();
	$tr_emailid 			= $response->getAddField1();
	$tr_section 			= $response->getAddField2();
	$todays 				= date('Y-m-d H:i:s');
	$AddlField1 			= $response->getAddField1();
	$AddlField2 			= $response->getAddField2();
	$AddlField3 			= $response->getAddField3();
	$AddlField4 			= $response->getAddField4();
	$AddlField5 			= $response->getAddField5();
	$AddlField6				= $response->getAddField6();
	$AddlField7 			= $response->getAddField7();
	$AddlField8 			= $response->getAddField8();

	$query = "INSERT INTO transaction_response 
				(trans_refer_no, order_id, Amount, StatusCode, StatusDescription,RRN, Authzcode, Response_code, Transaction_datetime, AddlField1, AddlField2, AddlField3, AddlField4, AddlField5, AddlField6, AddlField7, AddlField8) 
				VALUES 
				('$tr_ref_no','$tr_order_id', '$Amount', '$tr_status_code', '$tr_status_desc', 
					'$tr_rrn','$tr_authcode', '$tr_resp_code', '$tr_req_date', '$AddField1', '$AddField2', '$AddField3', '$AddField4', '$AddField5', '$AddField6', '$AddField7', '$AddField8')";	
		echo $query; exit;
	$stmt = $conn->prepare($query);
	$stmt->execute();

?>
