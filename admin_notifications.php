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
	$query = "SELECT * from notifications";
	
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
    <?php include "header.php"; ?><p></p><p></p>

</section>

    <section>
      <div class="pro-menu">
      <?php include "admin_top_menu.php" ?>
        <div class="stu-db">
            <div class="container pg-inn">
                <?php //include "admin_left_menu.php" ?>
                <div class="col-md-12">
                	<h4 align="center">Admin Page</h4>
                    <div class="pro-con-table">
                    	
                        <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Notification</th>
                                            <th>Post Description</th>
                                            <th>Department</th>
                                            <th>Online Last date</th>
                                            <th><a href="notifications_add.php" class="pro-edit">Add New</a></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php 	while ($row = $result->fetch_object()) {	?>
                                        <tr>
                                            <td> <?php echo (++$i); ?></td>
                                            <td><?php echo $row->notif_number_date; ?></td>
                                            <td><?php echo $row->description; ?></td>                                            
                                            <td><?php echo $row->department; ?></td>
                                            <td><?php  echo date("d-m-y", strtotime($row->last_date_online)); ?></td>
                                            <td><a href="notifications_view.php?entry=<?php echo $row->notifid; ?>" class="pro-edit">View</a>
                                            &nbsp;&nbsp;<a href="notifications_delete.php?entry=<?php echo $row->notifid; ?>" class="pro-edit" onClick="return confirmSubmit('<?php echo $row->category ?>')">Delete</a></td>
                                        </tr>
                                     <?php } ?>   
                                    </tbody>
                                </table>
                    
                    </div>
                    
                </div>
            </div>
        </div>

    <!--SECTION END-->


    <!--SECTION LOGIN, REGISTER AND FORGOT PASSWORD-->
    <section>
<?php include "footer.php"; ?> 

    <!--Import jQuery before materialize.js-->
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>