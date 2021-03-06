<?php
	session_start();
	$auth = $_SESSION['admin'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}
	include 'conf/db.php';
	include "functions.php";
	$query = "SELECT * FROM notifications t1 INNER JOIN applications t2 ON t2.appn_notifid = t1.notifid";
	
	//$query = "SELECT * FROM applications t1 INNER JOIN notifications t2 ON t1.appn_notifid = t2.notifid where t1.appn_emailid='$emailid'";
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
                <div class="col-md-12">

                    <h4 align="center">My Applications</h4>

                            <div class="pro-con-table">
                                <table class="bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Post Description</th>
                                            <th>Department</th>
                                            <th>Fees Payment</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php 	while ($row = $result->fetch_object()) {	?>
                                        <tr>
                                            <td> <?php echo (++$i); ?></td>
                                            <td><?php echo $row->notif_number_date; ?></td>
                                            <td><?php echo $row->department; ?></td>
                                            <td>
                                            <?php echo $row->category; ?>
                                            <a href="candidate_payment.php?id=<?php echo $row->notifid; ?>" class="pro-edit">Pay Now</a>
                                            </td>
                                            <td><a href="sdb-course-view.html" class="pro-edit">view</a></td>
                                        </tr>
                                     <?php } ?>
                                       
                                        
                                       
                                        
                                    </tbody>
                                </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->


    <!--Import jQuery before materialize.js-->
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>