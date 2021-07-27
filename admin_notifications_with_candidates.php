<?php
	session_start();
	$emailid = $_SESSION['emailid'] ;
	$auth = $_SESSION['admin'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}
	include 'conf/db.php';
	include "functions.php";
	$query1 = "SELECT * from notifications order by postdate desc ";
	$stmt1 = $conn->prepare($query1);
	$stmt1->execute(); //working
	$result1 = $stmt1->get_result();
	
	
	if ($_POST['submit']=='Search') {	
		$description = $_POST['description'];
		$eligible = $_POST['eligible'];
		$paid = $_POST['paid'];
		
		if (($eligible) && ($paid)) {
			$query = "SELECT * from notifications A RIGHT JOIN applications B on A.notifid=B.appn_notifid 
			JOIN profile C ON B.appn_emailid=C.emailid where 
			description='$description' and B.appn_eligible='1' and B.appn_payment_status=2";
		} elseif ($eligible) {
				$query = "SELECT * from notifications A RIGHT JOIN applications B on A.notifid=B.appn_notifid 
				JOIN profile C ON B.appn_emailid=C.emailid where 
				description='$description' and B.appn_eligible='1'";
			} elseif ($paid) {
				$query = "SELECT * from notifications A RIGHT JOIN applications B on A.notifid=B.appn_notifid 
				JOIN profile C ON B.appn_emailid=C.emailid where 
				description='$description' and B.appn_payment_status=2";
			} else 
		
				$query = "SELECT * from notifications A RIGHT JOIN applications B on A.notifid=B.appn_notifid JOIN profile C 
					ON B.appn_emailid=C.emailid where description='$description'";
	} else {
		$query = "SELECT * from notifications A RIGHT JOIN applications B on A.notifid=B.appn_notifid JOIN profile C ON B.appn_emailid=C.emailid";
		
	}
	
	if ($_POST['excel_export'] == 1) {
		
			$_SESSION['query'] = $query;
			header("Location: admin_export_excel.php");
    		exit();
		}
		
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
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 
<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
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


$(document).ready(function () {
  $('#example').DataTable({
  });
  $('.dataTables_length').addClass('bs-select');
});
</script>
</head>

<body>

    <!-- MOBILE MENU -->
    <section>
    <?php  if ($_POST['excel_export'] <> 1) include "header.php"; ?><p></p><p></p>

</section>

      <div class="pro-menu">
      <?php if ($_POST['excel_export'] <> 1) include "admin_top_menu.php" ?>
        <div class="stu-db">
            <div class="container pg-inn">
                <div class="col-md-12">
                	<h4 align="center">Candidates List</h4>

                      <form action="#" name="search" method="POST" class="form-inline">
									<div class="col-md-12">

                              <div class="input-group">
    <select name="description" id="description" class="custom-select browser-default" width="50%">
    									<option value="" name="description">Select Notification </option>
								 <?php 	while ($row1 = $result1->fetch_object()) {	?>

                                		<option value="<?php echo $row1->description; ?>" name="description"> <?php echo $row1->description; ?>
                                  </option>

                                <?php  } ?>
                              </select>
    							<span class="input-group-btn">
                                	<input type="submit" class="btn btn-info" id="submit" name="submit" value="Search">
                					<input type="submit" class="btn btn-success" id="submit" name="submit" value="Reset">
                                    
   								 </span>
   								 		
                                    
                                    
							</div>

                              </div> 
                         <div class="col-md-3">
   								 			<input type="checkbox" id="eligible" name="eligible" value="1">
                                    <label for="eligible">Eligible Candidates</label>
   								 		</div>
                                 <div class="col-md-3">
                                    <input type="checkbox" id="paid" name="paid" value="1">
                                    <label for="paid">Paid Candidates</label>
                                 </div>
                                 <div class="col-md-3">
                                		<input type="checkbox" id="excel_export" name="excel_export" value="1">
                                    <label for="excel_export">Export to Excel</label>
                                 </div>     
                              
                    </form>          
                              
                    <div class="pro-con-table">
                    	
                        <table id="mytable" class="table table-striped table-bordered table-responsive" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="4%">No</th>
                                            <th width="15%">Notification</th>
                                            <th width="17%">Department</th>
                                            <th width="17%">Description</th>
                                            <th width="11%">Last Date</th>
                                            <th width="18%">Candidate Name</th>
                                            <th width="7%">Status</th>
                                            <th width="10%">Eligible</th>
                                            <th width="8%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php 	while ($row = $result->fetch_object()) {	?>
                                        <tr>
                                            <td> <?php echo (++$i); ?></td>
                                            <td><?php echo $row->notif_number_date; ?></td>
                                            <td><?php echo $row->department; ?></td>
                                            <td><?php echo $row->description; ?></td> 
                                            <td><?php echo date("d-m-Y", strtotime($row->last_date_hardcopy)); ?> </td>                                          
                                            <td><?php echo $row->firstname." ".$row->lastname; ?></td>
                                            <td><?php 
                                            			if ($row->appn_payment_status == 2)
                                            				echo "Paid";
                                            			else {
                                            				echo "Not Paid";
                                            			}
                                            				
                                            		 ?>
                                            </td>
                                            <td><?php 
                                            			if ($row->appn_eligible == 1)
                                            				echo "Yes";
                                            			else {
                                            				echo $row->ineligible_reason;
                                            			}
                                            				
                                            		 ?>
                                            </td>
                                            <td>
                                            <a href="admin_view_application.php?id=
											<?php echo $row->notifid; ?>&emailid=<?php echo $row->appn_emailid; ?>">
                                            <button type="button" class="btn btn-primary btn-xs">View</button></a>
                                            
															</td>
                                            
                                        </tr>
                                     <?php } ?>   
                                    </tbody>
                                </table>
                    
                    </div>
                    
                </div>
            </div>
        </div>

<?php include "footer.php"; ?> 


</body>

</html>