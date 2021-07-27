<?php
	/**
	 * This Is the Kit File To Be included For Transaction Request/Response
	 */
	include '../paymentgateway/AWLMEAPI.php';
	
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
?>
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
<form action="../paymentgateway/testTxnStatus.php" method="POST" >
<center> <H3>Transaction Status </H3>
	<table style="border:solid green 5px;border-radius:2px;">
		<tr><!-- PG transaction reference number-->
			<td><label for="statusDesc">Status Description :</label></td>
			<td><?php echo $response->getStatusDesc();?></td>
			
			<!-- Transaction amount-->
			<td><label for="amount">Amount :</label></td>
			<td><?php echo (($response->getTrnAmt())/100);?></td>
		</tr>
		
		<!--
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
		-->
	</table>
	</center>
</form>

<?php 
//print_r($response);
session_start();

$trns_id=$response->getPgMeTrnRefNo();
$order_id=$response->getOrderId();
$amt=$response->getTrnAmt();
$status=$response->getStatusCode();
$status_desc=$response->getStatusDesc();
$rrn =$response->getRrn();
$authcode=$response->getAuthZCode();
$responses=$response->getResponseCode();
$trans_time=$response->getTrnReqDate();

$regno=$response->getAddField1();
$email=$response->getAddField2();
$card=$response->getAddField10(); 
$dubai=$response->getAddField3();

include "../dbcat.php";

if($status=='S')
    $pay_done=1;
else
    $pay_done=0;


$sql_pay="insert into payment(trns_id,order_id,amt,status,status_desc,rrn,authcode,response,trans_time,regno,emailid,payment_done) values
(?,?,?,?,?,?,?,?,?,?,?,?)";
$st2=$mysqli->prepare($sql_pay);
$st2->bind_param("issssssssisi",$trns_id,$order_id,$amt,$status,$status_desc,$rrn,
    $authcode,$responses,$trans_time,$regno,$email,$pay_done);
$st2->execute();


if ($status=="S"){
$sql = "update academic set dubai = ?, paymentamount = ?, paymentmethod = 'online', progress = 5 where emailid = ? and progress < 5";
$stmt = $mysqli -> prepare($sql);
$stmt -> bind_param("iis", $dubai, $amt, $email);
$stmt -> execute();


if($stmt -> errno != 0){
    echo "ERROR: while updating payment data.";
    print_r($stmt -> error_list);
    exit(1);
}
$stmt -> close();

?>

<?php
header("refresh:5;url=../AppliCation.php");
}



else{
	
	?>
	
<?php
	header("refresh:8;url=../AppliCation.php");

}

?>
