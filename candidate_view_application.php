<?php
	session_start();
	$emailid = $_SESSION['emailid'] ;
	$auth = $_SESSION['authuser'] || $_SESSION['admin'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}
	if ($_SESSION['admin']) {
	
		$emailid = $_GET['emailid'];
		$_SESSION['emailid'] = $emailid ;
	}
	$todays = date('Y-m-d H:i:s');
	
	include 'conf/db.php';
	//appn_payment_status = 0 : no payment
	//appn_payment_status = 1 : Payment done by candidate
	//appn_payment_status = 2 : Payment verified
	$id=$_GET['id'];

	$query = "SELECT * FROM profile where emailid=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$row1 = $result->fetch_object();

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
	if ($row->appn_eligible =="0" ) {
		header("Location: candidate_page.php");
    	exit();
	}
	 
	
	//get fees as per the category of the candidate
	if  (($row1->category=="Scheduled Caste") || ($row1->category=="Scheduled Tribe") ) {
			$fees = $row->fees_scst;
			$currencyName = "INR";
	} elseif ($row1->category=="International") {
			$fees = $row->fees_foreign;
			$currencyName = "USD";
	} else {	
			$fees = $row->fees_general;	
			$currencyName = "INR";
	}
	// update application fees with the candidate profile
	
	$cand_appn_id = $row->appn_id;
	$update_query = "update applications set 
									amount='$fees',
									currencyName = '$currencyName'
							where appn_id='$cand_appn_id'";
	
	$stmt2 = $conn->prepare($update_query);
	$stmt2->execute(); //working
	$result2 = $stmt2->get_result();


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
      <?php 
	  if ($_SESSION['authuser'])
	  	include "candidate_top_menu.php";
       else
        include "admin_top_menu.php"
		?>
        <div class="stu-db">
            <div class="container pg-inn">

                <div class="col-md-12">

                    <h4 align="center">Application Status of <?php echo $row1->firstname." ".$row1->lastname; ?></h4>

                            <div class="pro-con-table">
                            <form class="form-inline" action="paymentgateway/meTrnPay.php" method="post" name="txnSubmitFrm" >
                                     <input type="hidden" value="<?php echo $row->OrderId; ?>" id="OrderId" name="OrderId">	
                                     	<input type="hidden" value="<?php echo $row->amount; ?>" id="amount" name="amount" >
                                     <input type="hidden" value="<?php echo $row->currencyName; ?>" id="currencyName" name="currencyName">    
                                     <input type="hidden" value="<?php echo $emailid; ?>" id="emailid" name="emailid">

                                     <input type="hidden" value="<?php echo $row->OrderId; ?>" id="reg_number" name="reg_number"> 
                                     <input type="hidden" value="<?php echo $row1->firstname." ".$row1->lastname; ?>" id="name" name="name">
                                     <?php if($row1->mobile !=''){ ?>
                                     <input type="hidden" value="<?php echo $row1->mobile; ?>" id="mobile" name="mobile">
                                     <?php }else{ ?>
                                     <input type="hidden" value="" id="mobile" name="mobile">  
                                     <?php } ?>
                                     <input type="hidden" value="<?php echo $row1->dateofbirth; ?>" id="dob" name="dob"> 
                                     <input type="hidden" value="<?php echo $row->notif_number_date; ?>" id="purpose_description" name="purpose_description"> 
                                     <input type="hidden" value="<?php echo $row->notifid; ?>" id="purpose_id" name="purpose_id">
                                
                                <table class="table-responsive bordered">
                                    <tbody>
                                    	<tr>
                                            <td>Registration Number</td>
                                            <td>:</td>
                                            <td><?php echo $row->OrderId; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Notification Number/Date</td>
                                            <td>:</td>
                                            <td><?php echo $row->notif_number_date; 
                                            if ($row->appn_eligible =="0" ) 
																echo " (Not Eligible)";  
                                            ?>
                                            </td>
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
                                            <td><?php echo date("d-m-Y", strtotime($row->last_date_online)); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Last date for Hardcopy Submission</td>
                                            <td>:</td>
                                            <td><?php echo date("d-m-Y", strtotime($row->last_date_hardcopy)); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Category</td>
                                            <td>:</td>
                                            <td><?php echo $row1->category; ?></td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td><?php echo "Fees to be Paid"; ?></td>
                                            <td>:</td>
                                            <td>
										<?php 
											echo $row->amount."(".$row->currencyName.")"; 
                                                if ($row->appn_payment_status == 0 )  { ?>
                                            <button type="button" class="btn btn-danger btn-xs">Not Paid</button>
                                            <?php if ($_SESSION['authuser']) { ?>
                                            <input class="btn btn-primary btn-xs" type="submit" value="Check Out" name="submit" id="submit">
                                            <?php } ?>
                                            <?php } elseif ($row->appn_payment_status == 1 )
													echo '<button type="button" class="btn btn-warning btn-xs">Processing</button>';
											  		else 
														echo '<button type="button" class="btn btn-success btn-xs">Success</button>';
											 ?>
                                             
                                             </td>
                                        </tr> 
                                        
													                                      
                                        
                                         <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td>
                                            <?php 
                                            	if ($row->tr_status_desc)
                                            			echo $row->tr_status_desc; 
                                            	else
                                            			echo "Not Available";		
                                            		?>			
                                            	</td>
                                        </tr>
                                        <tr>
                                            <td>Amount Paid as per Bank Records</td>
                                            <td>:</td>
                                            <td>
                                            <?php 
                                            if ($row->tr_amount)
                                            		echo $row->tr_amount." (".$row->currencyName.")";
                                            	else 
                                            		echo "Not Available";    		
                                            	?></td>
                                        </tr>
                                        <tr>
                                            <td>Transaction Reference Number</td>
                                            <td>:</td>
                                            <td>
                                            <?php 
                                            if ($row->tr_ref_no)
                                            		echo $row->tr_ref_no;
                                            	else 
                                            		echo "Not Available";    		
                                            	?></td>
                                        </tr>
                                        <tr>
                                            <td>Bank Retrieval Reference Number (RRN)</td>
                                            <td>:</td>
                                            <td>
                                            <?php 
                                            if ($row->tr_rrn)
                                            		echo $row->tr_rrn;
                                            	else 
                                            		echo "Not Available";    		
                                            	?></td>
                                        </tr>
                                        <tr>
                                            <td>Transaction Request Date and Time</td>
                                            <td>:</td>
                                            <td>
                                            <?php 
                                            if ($row->tr_req_date)
                                            		echo date("d-m-Y h:i:s a", strtotime($row->tr_req_date));
                                            	else 
                                            		echo "Not Available";    		
                                            	?></td>
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
<?php include "footer.php"; ?> 


    <!--Import jQuery before materialize.js-->
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>