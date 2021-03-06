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
                        <h4 align="center">Pay and Submit</h4>
                     </div>


                            <div class="pro-con-table">
                                <table width="100%" class="bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="4%">No</th>
                                            <th width="22%">Notification</th>
                                            <th width="32%">Post Description</th>
                                            <th width="30%">Department</th>

                                            <th width="12%">Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php 	while ($row = $result->fetch_object()) {	?>
                                        <tr>
                                            <td> <?php echo (++$i); ?></td>
                                            <td><?php echo $row->notif_number_date; ?></td>
                                            <td><?php echo $row->description; ?></td>
                                            <td><?php echo $row->department; ?></td>
                                            <td>
                                            <?php if ($row->appn_payment_status == 2 )  { 
                                            echo '<button type="button" class="btn btn-success btn-xs">Success</button>';
                                            } elseif($row->appn_payment_status == 1 ) { 
                                            echo '<button type="button" class="btn btn-success btn-xs">Processing</button>';
                                             } else { ?>

															<a href="candidate_view_application.php?id=<?php echo $row->notifid; ?>">
                                            <button type="button" class="btn btn-primary btn-xs">Pay & Submit</button></a> 
                                   
                                            <?php } ?>
                                           
                                        </tr>
                                     <?php } ?>
                                       
                                        
                                       
                                        
                                    </tbody>
                                </table>

                  </div>
                </div>
            </div>
        </div>
    </section>
<?php include "footer.php" ?>
    <!--Import jQuery before materialize.js-->
<script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>