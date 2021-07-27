<?php
	/**
	 * This Is the Kit File To Be Included For Transaction Request
	 */
	include 'AWLMEAPI.php';
	
	//create an Object of the above included class
	$obj = new AWLMEAPI();

	//create an object of Request Message
	$reqMsgDTO = new ReqMsgDTO();

	/* Populate the above DTO Object On the Basis Of The Received Values */
	// PG MID
	$mid='WL0000000027698';
	$orderid = $_POST['id'];
	$amount = $_POST['amount'];
	$trans_type ="S";
	$enckey = '6375b97b954b37f956966977e5753ee6';
	$currency = "INR";
	$responseUrl = "http://recruit.cusat.ac.in:81/candidate_page.php";
	
	$reqMsgDTO->setMid($mid);
	// Merchant Unique order id
	$reqMsgDTO->setOrderId($orderid);
	//Transaction amount in paisa format
	$reqMsgDTO->setTrnAmt($amount);
	//Transaction remarks
	$reqMsgDTO->setTrnRemarks("This txn has to be done ");
	// Merchant transaction type (S/P/R)
	$reqMsgDTO->setMeTransReqType($trans_type);
	// Merchant encryption key
	$reqMsgDTO->setEnckey($enckey);
	// Merchant transaction currency
	$reqMsgDTO->setTrnCurrency($currency);
	// Recurring period, if merchant transaction type is R
	//$reqMsgDTO->setRecurrPeriod($_REQUEST['recurPeriod']);
	// Recurring day, if merchant transaction type is R
	//$reqMsgDTO->setRecurrDay($_REQUEST['recurDay']);
	// No of recurring, if merchant transaction type is R
	//$reqMsgDTO->setNoOfRecurring($_REQUEST['numberRecurring']);
	// Merchant response URl
	$reqMsgDTO->setResponseUrl($responseUrl);
	// Optional additional fields for merchant

	
	/* 
	 * After Making Request Message Send It To Generate Request 
	 * The variable `$urlParameter` contains encrypted request message
	 */
	 //Generate transaction request message
	$merchantRequest = "";
	
	$reqMsgDTO = $obj->generateTrnReqMsg($reqMsgDTO);
	
	if ($reqMsgDTO->getStatusDesc() == "Success"){
		$merchantRequest = $reqMsgDTO->getReqMsg();
	}
?>


<form action="https://cgt.in.worldline.com/ipg/doMEPayRequest" method="post" name="txnSubmitFrm">
	<h4 align="center">Redirecting To Payment Please Wait..</h4>
	<h4 align="center">Please Do Not Press Back Button OR Refresh Page</h4>
	<input type="hidden" size="200" name="merchantRequest" id="merchantRequest" value="<?php echo $merchantRequest; ?>"  />
	<input type="hidden" name="MID" id="MID" value="<?php echo $reqMsgDTO->getMid(); ?>"/>
</form>
<script  type="text/javascript">
	//submit the form to the worldline
	document.txnSubmitFrm.submit();
</script>