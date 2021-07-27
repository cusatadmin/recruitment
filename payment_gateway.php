<?php

	// process the input.
	// check and verify that the amount is correct for the given inputs
	// send to payment gateway
	// on success goto selection of test center
	// on failure goto error display page
	
	session_start();
	/*
	print "post data\n";
	print_r($_POST);
	print "session data\n";
	print_r($_SESSION);
	*/ 	
	$_SESSION['payment']=true;
	
	include "db.php";
	include "utils.php";
	checkSessionTimeout();
	if(isset($_POST['payment_csrftoken'])){
		$csrf = $_POST['payment_csrftoken'];
		if($_SESSION['latestCSRF'] != $csrf){
			
			
			?>
			<div class="row border-bottom">
	<div class='col-sm-12'>
		<div class="d-flex">
			<div class="flex-fill">
				<h2 align="center">COCHIN UNIVERSITY OF SCIENCE AND TECHNOLOGY</h2>
				<h3 align="center" class="blink">ACADEMIC ADMISSION- 2019</h3>
			</div>
			
		</div>
	</div>
</div>
		
			<h2>Oops an error occurred while page was loading. Click the following button and try payment again.</h2> 
			<form action="intermediate.php" method="post">
				<input type="submit" name="start" value="Back to Payment">
			</form>
			<div class="row">
 <div class="col-sm-12">
  <footer class="container-fluid text-center">
    <hr />
      <p style="color:#CC9999"><b>&copy; Cochin University of Science and Technology; Designed and Developed by : International Relations and Academic Admissions</b></p>
  </footer>
 </div>
</div>

			<?php
			exit(1);
		}
	}
	else{
		echo "error no csrf";
		exit(1);
	}
	
	//echo "success";

	$_SESSION['payment_page'] = true;

	if(!isset($_SESSION['auth'])){
		header("Location: index.php");
	}
	$emailid = $_SESSION['auth'];
//	print("session \n");
//	print_r($_SESSION);

	if(isset($_POST['dubai']))
		$dubai = sanitize($_POST['dubai']) == "yes" ? 1 : 0;
	else
		$dubai = 0;

	if(isset($_SESSION['outsideCenter']) && $_SESSION['outsideCenter'] === false){
		$dubai = 0;
	}

	$_SESSION['dubai'] = $dubai;


	
	$sql = "select res, splres,regno,emailid from academic where emailid = ?";
	$stmt = $mysqli -> prepare($sql);
	$stmt -> bind_param("s", $emailid);
	$stmt -> execute();
	if($stmt -> errno != 0){
		echo "ERROR: while getting payment related data";
		print_r($stmt -> error_list);
		exit(1);
	}
	$res = $stmt -> get_result() -> fetch_object();
	//print_r($res);
	
	//print "\n  ** ".$res->regno." dvsvd ".$res->emailid;
	$stmt -> close();

	$amount = 1000;

	if($res->res === null || $res -> res == "GEN" || $res -> res == "OBC" ){
		//no reservation
		$amount = 1000;
	}
	elseif($res-> res == "KSC" || $res->res == "KST"){
		$amount = 500;
	}

	$splres = explode(",", $res->splres);
	$extra5k = false;
	$cgw = 0;
	$nri = 0;

	foreach($splres as $item){
		if($item == "CGW" && !$extra5k){
			$amount += 5000;
			$extra5k = true;
		}
		elseif($item == "NRI" && !$extra5k){
			$extra5k = true;
			$amount += 5000;
		}
	}

	if($dubai)
		$amount += 10000;



$n=date("U");
$s=rand(0,1000);
$order_id=$n.$s;
//print "id ".$order_id;

include 'sample/AWLMEAPI.php';

//create an Object of the above included class
$obj = new AWLMEAPI();

//create an object of Request Message
$reqMsgDTO = new ReqMsgDTO();
$mid="WL0000000006952";   
$enc_key="9839b7dff256386bb6db5e208ec0558d";

$currency="INR";
$respone_url="https://admissions.cusat.ac.in/staging_test/sample/meTrnSuccess.php";
//    $respone_url="payment/sample/meTrnSuccess.php";


$amount=1;


/* Populate the above DTO Object On the Basis Of The Received Values */
// PG MID

$reqMsgDTO->setMid($mid);

//echo "id is ",$reqMsgDTO->getMid();/
// Merchant Unique order id
$reqMsgDTO->setOrderId($order_id);
//Transaction amount in paisa format
$reqMsgDTO->setTrnAmt($amount*100);
//Transaction remarks
$reqMsgDTO->setTrnRemarks("This txn has to be done");
// Merchant transaction type (S/P/R)
$reqMsgDTO->setMeTransReqType("S");
// Merchant encryption key
$reqMsgDTO->setEnckey($enc_key);
// Merchant transaction currency
$reqMsgDTO->setTrnCurrency($currency);
// Recurring period, if merchant transaction type is R
//$reqMsgDTO->setRecurrPeriod();
// Recurring day, if merchant transaction type is R
//$reqMsgDTO->setRecurrDay();
// No of recurring, if merchant transaction type is R
//$reqMsgDTO->setNoOfRecurring();
// Merchant response URl
$reqMsgDTO->setResponseUrl($respone_url);
// Optional additional fields for merchant
	$reqMsgDTO->setAddField1($res->regno);
	
	$reqMsgDTO->setAddField2($_SESSION['auth']);
	
	$reqMsgDTO->setAddField3($_SESSION['dubai']);
	
//	$reqMsgDTO->setAddField2($_REQUEST['addField2']);
//	$reqMsgDTO->setAddField3($_REQUEST['addField3']);
//	$reqMsgDTO->setAddField4($_REQUEST['addField4']);
//	$reqMsgDTO->setAddField5($_REQUEST['addField5']);
//	$reqMsgDTO->setAddField6($_REQUEST['addField6']);
//	$reqMsgDTO->setAddField7($_REQUEST['addField7']);
//	$reqMsgDTO->setAddField8($_REQUEST['addField8']);

/*
 * After Making Request Message Send It To Generate Request
 * The variable `$urlParameter` contains encrypted request message
 */
//Generate transaction request message

  //print_r($reqMsgDTO);

$merchantRequest = "";

$reqMsgDTO = $obj->generateTrnReqMsg($reqMsgDTO);

if ($reqMsgDTO->getStatusDesc() == "Success"){
    $merchantRequest = $reqMsgDTO->getReqMsg();
}
?>

<!--actual url https://ipg.in.worldline.com/doMEPayRequest"-->
<!--dummy for testing url https://cgt.in.worldline.com/ipg/doMEPayRequest-->
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

<?php
/*
/**
 * This Is the Kit File To Be included For Transaction Request/Response
 */
//include 'AWLMEAPI.php';
include 'sample/AWLMEAPI.php';
//include '../payment/sample/AWLMEAPI.php';

//create an Object of the above included class
$obj = new AWLMEAPI();

/* This is the response Object */
$resMsgDTO = new ResMsgDTO();

/* This is the request Object */
$reqMsgDTO = new ReqMsgDTO();

//This is the Merchant Key that is used for decryption also
$enc_key = "df58d8ce4f9ce8a7865fa7b08e13f2e5";
//$enc_key = "6375b97b954b37f956966977e5753ee6";
/* Get the Response from the WorldLine */
$responseMerchant = $_REQUEST['merchantResponse'];

$response = $obj->parseTrnResMsg( $responseMerchant , $enc_key );
?>
<!--<img src="sample/meTrnSuccess.php"-->
<style>
	body{
		font-family:Verdana, sans-serif	;
		font-size::12px;
	}
	.wrapper{
		width:980px;
		margin:0 auto;
	}
	table{

	}
	tr{
		padding:5px
	}
	td{
		padding:5px;
	}
	input{
		padding:5px;
	}
</style>
<form action="testTxnStatus.php" method="POST" >
	<center> <H3>Transaction Status </H3></center>
    <?php //print_r($response); ?>
	<table>

		<tr><!-- PG transaction reference number-->
			<td><label for="txnRefNo">Transaction Ref No. :</label></td>
			<td><?php echo $response->getPgMeTrnRefNo();?></td>
			<!-- Merchant order number-->
			<td><label for="orderId">Order No. :</label></td>
			<td><?php echo $response->getOrderId();?> </td>
			<!-- Transaction amount-->
			<td><label for="amount">Amount :</label></td>
			<td><?php echo $response->getTrnAmt();?></td>
		</tr>
		<tr><!-- Transaction status code-->
			<td><label for="statusCode">Status Code :</label></td>
			<td><?php echo $response->getStatusCode();?></td>

			<!-- Transaction status description-->
			<td><label for="statusDesc">Status Desc :</label></td>
			<td><?php echo $response->getStatusDesc();?></td>

			<!-- Transaction date time-->
			<td><label for="txnReqDate">Transaction Request Date :</label></td>
			<td><?php echo $response->getTrnReqDate();?></td>
		</tr>
		<tr>
			<!-- Transaction response code-->
			<td><label for="responseCode">Response Code :</label></td>
			<td><?php echo $response->getResponseCode();?></td>

			<!-- Bank reference number-->
			<td><label for="statusDesc">RRN :</label></td>
			<td><?php echo $response->getRrn();?></td>
			<!-- Authzcode-->
			<td><label for="authZStatus">AuthZCode :</label></td>
			<td><?php echo $response->getAuthZCode();?></td>
		</tr>
		<tr>	<!-- Additional fields for merchant use-->
			<td><label for="addField1">Add Field 1 :</label></td>
			<td><?php echo $response->getAddField1();?></td>

			<td><label for="addField2">Add Field 2 :</label></td>
			<td><?php echo $response->getAddField2();?></td>

			<td><label for="addField3">Add Field 3 :</label></td>
			<td><?php echo $response->getAddField3();?></td>
		</tr>
		<tr>
			<td><label for="addField4">Add Field 4 :</label></td>
			<td><?php echo $response->getAddField4();?></td>

			<td><label for="addField5">Add Field 5 :</label></td>
			<td><?php echo $response->getAddField5();?></td>

			<td><label for="addField6">Add Field 6 :</label></td>
			<td><?php echo $response->getAddField6();?></td>
		</tr>
		<tr>
			<td><label for="addField7">Add Field 7 :</label></td>
			<td><?php echo $response->getAddField7();?></td>

			<td><label for="addField8">Add Field 8 :</label></td>
			<td><?php echo $response->getAddField8();?></td>
		</tr>

	</table>
</form>

<?php
echo "payment result ";
print_r($response);
$trns_id=$response->getPgMeTrnRefNo();
$order_id=$response->getOrderId();
$amt=$response->getTrnAmt();
$status=$response->getStatusCode();
$status_desc=$response->getStatusDesc();
$rrn =$response->getRrn();
$authcode=$response->getAuthZCode();
$responses=$response->getResponseCode();
$trans_time=$response->getTrnReqDate();

//$sql = "update academic set dubai = ?, paymentamount = ?, paymentmethod = 'online', progress = 5 where emailid = ? and progress < 5";
$sql = "update academic set dubai = ?, paymentamount = ?, paymentmethod = 'online', progress = 5 where emailid = ? and progress < 5";

$stmt = $mysqli -> prepare($sql);
$stmt -> bind_param("iis", $dubai, $amount, $emailid);
$stmt -> execute();

//$sql_pay="insert into payment "
if($stmt -> errno != 0){
    echo "ERROR: while updating payment data.";
    print_r($stmt -> error_list);
    exit(1);
}
$stmt -> close();

//print_r($response);

$email=$_SESSION['auth'];
$fetch= "select regno,emailid from academic where email=?";
$st=$mysqli->prepare($fetch);
$st->bind_param("s",$email);
$st->execute();
$row=$st->fetch();
print_r($row);



$sql_pay="update payment set trns_id=?,order_id=?,amt=?,status=?,status_desc=?,rrn=?,
          authcode=?,response=?,trans_time=?,regno=?,emailid=?,payment_done=?)";
$st2=$mysqli->prepare($sql_pay);
if($status=='S'){
    $pay_done=1;
}
else{
    $pay_done=0;
}

$st2->bind_param("isssssssssi",$trns_id,$order_id,$amt,$status,$status_desc,$rrn,
    $authcode,$responses,$trans_time,$email,$pay_done);
$st2->execute();

echo "success";



//	$sql = "update academic set dubai = ?, paymentamount = ?, paymentmethod = 'online', progress = 5 where emailid = ? and progress < 5";
//	$stmt = $mysqli -> prepare($sql);
//	$stmt -> bind_param("iis", $dubai, $amount, $emailid);
//	$stmt -> execute();
//	if($stmt -> errno != 0){
//		echo "ERROR: while updating payment data.";
//		print_r($stmt -> error_list);
//		exit(1);
//	}
//	$stmt -> close();
//
//	echo "success";
?>
