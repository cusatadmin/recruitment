<?php
	session_start();
	$emailid = $_SESSION['emailid'] ;
	$auth = $_SESSION['authuser'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}


	include 'conf/db.php';
	include "functions.php";
	//$query = "SELECT * from notifications";
	
	$query = "SELECT * FROM applications t1 INNER JOIN notifications t2 ON t1.appn_notifid = t2.notifid where t1.appn_emailid='$emailid'";
	//echo $query;
	$stmt = $conn->prepare($query);
	//$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$i=0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
<script language="javascript">
	function apply_this_job() {
	  $("#loaderIcon").show();
		  jQuery.ajax({
		  url: "apply_this_job.php",
		  data:'emailid1='+$("#emailid1").val(),
		  type: "POST",
		  success:function(data){
	  $("#email_availability_status").html(data);
	  $("#loaderIcon").hide();
	  },
		  error:function (){}
	  });
	}	
	
	function remove_this_job($sid) {
		$("#loaderIcon").show();
			jQuery.ajax({
				url: "remove_this_job.php",
				data:'appn_id='+$sid,
				type: "POST",
				success:function(data){
					$("#user-status"+$sid).html(data);
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
      <?php include "candidate_top_menu.php" ?>
<div class="stu-db">
            <div class="container pg-inn">
                <div class="col-md-12">
					<div class="inn-title">
                    	<h4 align="center">My Applications</h4>
					</div>
                            <div class="pro-con-table">
                          <table width="100%" class="bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="2%">No</th>
                                            <th width="21%">Notification</th>
                                            <th width="28%">Post Description</th>
                                             <th width="27%">Department</th>
                                            <th width="10%">Last Date</th>
                                            <th width="7%">Eligible</th>
                                            <th width="5%">Preview</th>
                                            <th width="7%">Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php 	while ($row = $result->fetch_object()) {	?>
                                        <tr>
                                            <td> <?php echo (++$i); ?></td>
                                            <td><?php echo $row->notif_number_date; ?></td>
                                            <td><?php echo $row->description; ?></td>
                                            <td><?php echo $row->department; ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($row->last_date_online)); ?></td>
                                            <td><?php 
                                            			if ($row->appn_eligible == 1)
                                            				echo "Yes";
                                            			else {
                                            				echo "No";
                                            			}
                                            				
                                            		 ?>
                                            </td>
                                            <td>
                                            <?php 
                                            			if ($row->appn_eligible == 1) {
                                            	?>
                                            <a href="candidate_view_application.php?id=<?php echo $row->notifid; ?>">
                                            <button type="button" class="btn btn-primary btn-xs">View</button></a>

                                             <a href="paymentgateway/meTrnStatus.php">status</a>
                                             <?php } ?>
                                            </td>
                                            <td>
                                            <?php 
                                            			if ($row->appn_eligible == 1) {
                                            	?>
                                           <?php if ($row->appn_payment_status == 0 )  { ?>
                                            <a href="#" onClick="remove_this_job('<?php echo $row->appn_id; ?>')">
                                            <button type="button" class="btn btn-danger btn-xs">Remove</button></a>
                                            <span id="user-status<?php echo $row->appn_id; ?>" style="font-size:12px;"></span>
                                            <?php } elseif ($row->appn_payment_status == 1 )
													echo '<button type="button" class="btn btn-warning btn-xs">Processing</button>';
											  		else 
														echo '<button type="button" class="btn btn-success btn-xs">Success</button>';
											 ?>
											        <?php } ?>
											 			</td>
                                        </tr>
                                     <?php } ?>
                                       
                                        
                                       
                                        
                                    </tbody>
                                </table>
						 
                  </div>
                </div>
            </div>
        </div>
        
    <!--SECTION END--><!--Import jQuery before materialize.js-->
<script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
    
    <?php include "footer.php" ?>
</body>

</html>