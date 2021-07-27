<?php
	session_start();
	$emailid = $_SESSION['emailid'] ;
	$auth = $_SESSION['authuser'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}
	
	$todays = date('Y-m-d H:i:s');
	
	include 'conf/db.php';
	//appn_payment_status = 0 : no payment
	//appn_payment_status = 1 : Payment done by candidate
	//appn_payment_status = 2 : Payment verified
	$id=$_GET['id'];
/*
	if ($_POST['submit'] == "Submit") {
		
		$id = $_POST['id'];
		$appn_bank_name = $_POST['appn_bank_name'];
		$appn_ifsc_code = $_POST['appn_ifsc_code'];
		$appn_payment_mode = $_POST['appn_payment_mode'];
		$appn_transaction_number = $_POST['appn_transaction_number'];
		$appn_transaction_date = $_POST['appn_transaction_date'];
		$query = "UPDATE applications  set 
						appn_bank_name = '$appn_bank_name',
						appn_ifsc_code = '$appn_ifsc_code',
						appn_amount_paid = '$fees',
						appn_payment_mode = '$appn_payment_mode',
						appn_transaction_date = '$appn_transaction_date',
						appn_transaction_number = '$appn_transaction_number',
						appn_payment_status = 1,
						postdate = '$todays'
				where appn_notifid = '$id'";
				//echo $query;
				$stmt = $conn->prepare($query);
				$stmt->execute();
				echo '<script  type="text/javascript">
						document.txnSubmitFrm.submit();
					</script>';
		}
*/
	$query = "SELECT * FROM profile where emailid=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$row1 = $result->fetch_object();
	$category = $row1->category;
	//echo $category;
	//$query = "SELECT * from notifications";
	
	$query = "SELECT * FROM applications t1 INNER JOIN notifications t2 ON t1.appn_notifid = t2.notifid where t1.appn_emailid='$emailid' and t1.appn_notifid='$id'";

	//$query = "SELECT * FROM notifications where notifid=?";
	//echo $query;
	$stmt = $conn->prepare($query);
	$stmt->bind_param("i", $id);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();
	$order_id=$emailid."_".$row->appn_id;
	
	if  (($category=="Scheduled Caste") || ($category=="Scheduled Tribe") ) {
			$heading = "Fee for SC/ST Candidates";
			$fees = $row->fees_scst;
	} elseif ($category=="International") {
			$heading = "Fee for Foreign Candidates";
			$fees = $row->fees_foreign;
	} else {
			$heading = "Fee for General Candidates";	
			$fees = $row->fees_general;	
	}



?>
<!DOCTYPE html>
<html lang="en">

<head>
<script src="paymentgateway/jquery-3.3.1.min.js"></script>
<script>
function goBack() {
  window.history.back();
}
</script>
</head>

<body>

    <!-- MOBILE MENU -->
    <section>
    <?php include "header.php"; ?><p></p><p></p>

</section>

    <section>
      <div class="pro-menu">
      <?php include "candidate_top_menu.php" ?>
        <div class="stu-db">
            <div class="container pg-inn">

                <div class="col-md-12">

                    <h4 align="center">My Application Status</h4>

                            <div class="pro-con-table">
                            <form class="form-inline" action="paymentgateway/meTrnPay.php" method="post" name="txnSubmitFrm" >
                                     <input type="text" value="<?php echo $id; ?>" name="id" id="id" hidden>
                                     		<!-- Fees to be paid-->
                                            <input type="hidden" name="amount" id="amount" value="<?php echo $fees; ?>">
                                            <!-- Currency Type -->
                                            <input type="hidden" name="currencyName" id="currencyName" value="INR">
                                            <!-- Merchant ID -->
                                            <input type="hidden" name="mid" id="mid" value="WL0000000027698">
                                            <!--Encryption Key -->
                                            <input type="hidden" name="enckey" id="enckey" value="6375b97b954b37f956966977e5753ee6">
                                            <!-- Order ID created by CUSAT -->
                                            <input type="hidden" value="<?php echo $order_id ?>" id="OrderId" name="OrderId">
                                            <!--  Transaction Type (S/P/R)  -->
                                            <input type="hidden" value="S" id="meTransReqType" name="meTransReqType">
                                            <!--- responseUrl -->
                                            <input type="hidden" name="responseUrl" id="responseUrl" 
                                            value="https://recruit.cusat.ac.in/candidate_transactions.php" />
                                <table class="responsive-table bordered">
                                    <tbody>
                                        <tr>
                                            <td>Notification Number/Date</td>
                                            <td>:</td>
                                            <td><?php echo $row->notif_number_date; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Regular/Contract</td>
                                            <td>:</td>
                                            <td><?php if ($row->regular) echo "Regular"; else echo "Contract"; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Post Name</td>
                                            <td>:</td>
                                            <td><?php echo $row->postname; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Department</td>
                                            <td>:</td>
                                            <td><?php echo $row->department; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Description</td>
                                            <td>:</td>
                                            <td><?php echo $row->description; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Last date for Online Submission</td>
                                            <td>:</td>
                                            <td><?php echo $row->last_date_online; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Last date for Hardcopy Submission</td>
                                            <td>:</td>
                                            <td><?php echo $row->last_date_hardcopy; ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $heading; ?></td>
                                            <td>:</td>
                                            <td>
										<?php 
											echo $fees; 
                                                if ($row->appn_payment_status == 0 )  { ?>
                                            <button type="button" class="btn btn-danger btn-xs">Not Paid</button>
                                            <input class="btn btn-primary btn-xs" type="submit" value="Check Out" name="submit" id="submit">
                                            <?php } elseif ($row->appn_payment_status == 1 )
													echo '<button type="button" class="btn btn-warning btn-xs">Processing</button>';
											  		else 
														echo '<button type="button" class="btn btn-success btn-xs">Success</button>';
											 ?>
                                             
                                             </td>
                                        </tr> 
                                        
                                        <tr>
                                            <td>Preview Application / Payment</td>
                                            <td>:</td>
                                            <td>
                                            <a href="candidate_print_to_pdf.php?notifid=<?php echo $row->notifid; ?>" target="_blank">
                                            <?php if ($row->appn_payment_status == 2 )  { ?>
                                            <button type="button" class="btn btn-primary btn-xs">Print to PDF</button>
                                            <?php } else { ?>
                                            <button type="button" class="btn btn-info btn-xs">Draft PDF</button>
                                            <?php } ?>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-xs" onclick="goBack()">Go Back</button>
                                            </td>
                                        </tr>
                                        
                                     </tbody>
                                 </table>
								</form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->


    <!--SECTION LOGIN, REGISTER AND FORGOT PASSWORD-->
    <section>


    <!--Import jQuery before materialize.js-->
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>