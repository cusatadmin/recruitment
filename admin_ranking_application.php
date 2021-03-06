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


?>
<!DOCTYPE html>
<html lang="en">

<head>
<script language="javascript">
	function rank_this($sid) {
		 var x = document.getElementById("rank").value;
		//	var x = 1;
			$("#loaderIcon").show();
				jQuery.ajax({
					url: "rank_this.php",
					data:{appnid: $sid, rankpos: x},
					type: "POST",
					success:function(data){
						$("#user-status").html(data);
						$("#loaderIcon").hide();
						},
					error:function (){}
					});
		}
</script>
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
        include "admin_top_menu.php";
		?>
        <div class="stu-db">
            <div class="container pg-inn">

                <div class="col-md-12">

                    <h4 align="center">Ranking for <?php echo $row1->firstname." ".$row1->lastname; ?></h4>

                            <div class="pro-con-table">
                                     
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
                                            <td>Address for Communication</td>
                                            <td>:</td>
                                            <td>
											<?php echo $row1->postaladd1."<br>".$row1->postaladd2.
											"<br>".$row1->postalcity."<br>".$row1->postalpin."<br>".
											$row1->postalstate."<br>".$row1->postalcountry; ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Category</td>
                                            <td>:</td>
                                            <td><?php echo $row1->category; ?></td>
                                        </tr>
                                        
                                        
                                        <tr>
                                           <td>Status</td>
                                           <td>:</td>
                                           <td>
                                            <?php 
                                            	if ($row->status_desc)
                                            			echo $row->status_desc; 
                                            	else
                                            			echo "Not Available";		
                                            		?>			
                                           	   </td>
                                        </tr>
                                        <tr>
                                           <td>Rank</td>
                                           <td>:</td>
                                           <td>
											<select name="rank"  class="custom-select browser-default col-xs-2" id="rank"
                                            onchange="rank_this('<?php echo $row->appn_id; ?>')" >
                                           	  <?php for ($i=0; $i<=100; $i++) { ?>
                                              <option value="<?php echo $i; ?>" 
											  <?php if ($row->appn_rank == $i) echo "selected"; ?> >
                                              <?php echo $i; ?>
                                              </option>
												<?php } ?>   
                                    		</select>
												<span id="user-status" style="font-size:12px;"></span>
                                           	</td>
                                        </tr>

                                     </tbody>
                                 </table>
                                  <button type="button" class="btn btn-info btn-xs" onclick="goBack()">Go Back</button>
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