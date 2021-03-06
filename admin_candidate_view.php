<?php
	session_start();
	$auth = $_SESSION['admin'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}

	include 'conf/db.php';
	$appn_id = $_GET['appn_id'] ;
	
	//$query = "SELECT * from notifications A RIGHT JOIN applications B on A.notifid=B.appn_notifid JOIN profile C ON B.appn_emailid='$emailid'";
	$query = "SELECT * from notifications A RIGHT JOIN applications B on A.notifid=B.appn_notifid JOIN profile C ON B.appn_emailid=C.emailid where B.appn_id='$appn_id'";
	
	

	//$query = "SELECT * FROM notifications where notifid=?";
	//echo $query;
	$stmt = $conn->prepare($query);
	$stmt->bind_param("i", $id);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();
	//echo "APNID".$row->appn_id;
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
<script language="javascript">

function change_status($sid) {
		$("#loaderIcon").show();
			jQuery.ajax({
				url: "admin_change_pay_status.php",
				data:'entry='+$sid,
				type: "POST",
				success:function(data){
					$("#user-status").html(data);
					$("#loaderIcon").hide();
					},
				error:function (){}
				});
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
      <?php include "admin_top_menu.php" ?>
        <div class="stu-db">
            <div class="container pg-inn">
                <div class="col-md-9">

                    <h4 align="center">View <?php echo " ".$row->firstname." ".$row->lastname; ?></he4>

                            <div class="pro-con-table">
                                <table class="table-responsive bordered">
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
                                            <td><?php echo $row->category; ?></td>
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
                                            <td><?php echo date("d-m-Y",strtotime($row->last_date_hardcopy)); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Category</td>
                                            <td>:</td>
                                            <td><?php echo $row->category; ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $heading; ?></td>
                                            <td>:</td>
                                            <td><?php echo $fees; ?></td>
                                        </tr> 
                                        <tr>
                                            <td>Amount Paid</td>
                                            <td>:</td>
                                            <td><?php if ($row->appn_amount_paid<>0) 
													echo "Not Paid"; else; 
													echo $row->appn_amount_paid;
												?>
                                                
                                                </td>
                                        </tr>
                                        <tr>
                                            <td>Payment Mode</td>
                                            <td>:</td>
                                            <td><?php echo $row->appn_payment_mode; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Name of Bank</td>
                                            <td>:</td>
                                            <td><?php echo  $row->appn_bank_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Transaction Number</td>
                                            <td>:</td>
                                            <td><?php echo $row->appn_transaction_number; ?></td>
                                        </tr><tr>
                                            <td>Transaction Date</td>
                                            <td>:</td>
                                            <td><?php echo  $row->appn_transaction_date; ?></td>
                                        </tr>                                       
                                        <tr>
                                            <td>Payment Status</td>
                                            <td>:</td>
                                            <td>
											<?php 
											if ($row->appn_payment_status == 2 )
											echo '<button type="button" class="btn btn-success btn-xs">Success</button>';
											elseif ($row->appn_payment_status == 1 ) { ?>
                                            <button type="button" class="btn btn-info btn-xs">Paid</button>
											<button type="button" class="btn btn-warning btn-xs" onClick="change_status('<?php echo $row->appn_id; ?>') ">
                                            Change Status</button>
											
											<?php } else { ?>
                                            <button type="button" class="btn btn-danger btn-xs">Not Paid</button>
											<?php } ?>
                                            <span id="user-status" style="font-size:12px;"></span>
                                            
                                            </td>
                                        </tr>
                                     </tbody>
                                 </table>

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