<?php
	session_start();
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
	$reqMsgDTO->setMid("WL0000000013355");
	// Merchant Unique order id
	$old_order_id = $_POST['OrderId'];
	$new_order_id = $old_order_id.date("YmdHis");
   $reqMsgDTO->setOrderId($new_order_id);
   //$order_id = 20210629001;
   //$reqMsgDTO->setOrderId($orderId);
 
	//$reqMsgDTO->setOrderId("1122334466");
	//Transaction amount in paisa format
	$amount = $_POST['amount'];
	$amount = $amount * 100;
	//$reqMsgDTO->setTrnAmt($amount);
	$reqMsgDTO->setTrnAmt(100);
	//Transaction remarks
	$reqMsgDTO->setTrnRemarks("This Payment has to be done ");
	// Merchant transaction type (S/P/R)
	$reqMsgDTO->setMeTransReqType("S");
	// Merchant encryption key
	//$reqMsgDTO->setEnckey($_POST['enckey']);
	$reqMsgDTO->setEnckey("36bc3959bbbebde21c17317fbfaa411d");
	// Merchant transaction currency
	//echo $_POST['currencyName'];
	$reqMsgDTO->setTrnCurrency($_POST['currencyName']);
	//$reqMsgDTO->setTrnCurrency("INR");
	// Recurring period, if merchant transaction type is R
	//$reqMsgDTO->setRecurrPeriod($_POST['recurPeriod']);
	// Recurring day, if merchant transaction type is R
	//$reqMsgDTO->setRecurrDay($_POST['recurDay']);
	// No of recurring, if merchant transaction type is R
	//$reqMsgDTO->setNoOfRecurring($_POST['numberRecurring']);
	// Merchant response URl
	//$reqMsgDTO->setResponseUrl($_POST['responseUrl']);
	$reqMsgDTO->setResponseUrl("https://recruit.cusat.ac.in/paymentgateway/meTrnSuccess.php");
	// Optional additional fields for merchant
	$reqMsgDTO->setAddField1($_POST['emailid']);
	$reqMsgDTO->setAddField2("recruitment");
	//$reqMsgDTO->setAddField3($_POST['addField3']);
	//$reqMsgDTO->setAddField4($_POST['addField4']);
	//$reqMsgDTO->setAddField5($_POST['addField5']);
	//$reqMsgDTO->setAddField6($_POST['addField6']);
	//$reqMsgDTO->setAddField7($_POST['addField7']);
	//$reqMsgDTO->setAddField8($_POST['addField8']);
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

<form action="https://ipg.in.worldline.com/doMEPayRequest" method="post" name="txnSubmitFrm">
	<h4 align="center">Redirecting To Payment Please Wait..</h4>
	<h4 align="center">Please Do Not Press Back Button OR Refresh Page</h4>
	<input type="hidden" size="200" name="merchantRequest" id="merchantRequest" value="<?php echo $merchantRequest; ?>"  />
	<input type="hidden" name="MID" id="MID" value="<?php echo $reqMsgDTO->getMid(); ?>"/>
</form>
<script  type="text/javascript">
	//submit the form to the worldline
	document.txnSubmitFrm.submit();
</script>
