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
		$qry_items = "";
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
    							
   								 		
                                    
                                    
							</div>

                              </div> 

                               

                                 
                     <!-- Start Row -->
                         <div class="row">
                           <div class="col-md-3">
                              <input type="checkbox" id="eligible" name="eligible" value="1">
                              <label for="eligible"></label>
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
                              
                          </div>
                     <!-- End Row -->    
                     <span class="input-group-btn">
                                	<input type="submit" class="btn btn-info" id="submit" name="submit" value="Search">
                                    
   								 </span>         
                    </form>          

                    </div>
                    
                </div>
            </div>
        </div>

<?php include "footer.php"; ?> 


</body>

</html>