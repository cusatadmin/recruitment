<?php
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
	//$enc_key = "df58d8ce4f9ce8a7865fa7b08e13f2e5";
	
	$enc_key = "9839b7dff256386bb6db5e208ec0558d";
	/* Get the Response from the WorldLine */
	$responseMerchant = $_REQUEST['merchantResponse'];
	
	$response = $obj->parseTrnResMsg( $responseMerchant , $enc_key );

//print_r($response);
session_start();

include '../conf/db.php';

$trns_id=$response->getPgMeTrnRefNo();
$order_id=$response->getOrderId();
$amt=$response->getTrnAmt();
$status=$response->getStatusCode();
$status_desc=$response->getStatusDesc();
$rrn =$response->getRrn();
$authcode=$response->getAuthZCode();
$responses=$response->getResponseCode();
$trans_time=$response->getTrnReqDate();

if ($status=="S"){
	
	$query = "UPDATE awards  set 
					trns_id = '$trns_id',
					status = '$status',
					status_desc = '$status_desc',
					rrn = '$rrn',
					authcode = '$authcode',
					response = '$responses',
					trans_time = '$trans_time',
					trans_amount = '$amt'
				where OrderId = '$order_id'";
				
		//echo $query;
		$stmt = $conn->prepare($query);
		$stmt->execute();
		$message = "Transaction Success";

} else {
	$message = "Transaction Error";
	
}

header("Location: message.php?message=$message");
?>
