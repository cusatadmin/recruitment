<?php
	session_start();

	$auth = $_SESSION['admin'] || $_SESSION['superadmin'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}
	include 'conf/db.php';

	$query = "SELECT * from users";
	
	$stmt = $conn->prepare($query);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$i=0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    
    
 <script type="text/javascript">
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
<script>
        $(document).ready(function() {
    $('#mytable').DataTable();
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
                <div class="col-md-12">
                	<h4 align="center">Staff Maintenance Page</h4>
                    <div class="pro-con-table">
                  
                          <table width="50%" class="table table-striped table-bordered table-responsive" id="mytable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="8%">No</th>
                                            <th width="40%">User Name</th>
                                            <th width="35%">Role</th>
                                            <th colspan="2">
                                             <?php if ( $_SESSION['superadmin'] ) { ?>
                                            <a href="admin_staff_add.php">
                                            <button type="button" class="btn btn-info btn-xs">Add New</button>
                                            </a>
                                            <?php } ?>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php 	while ($row = $result->fetch_object()) {	?>
                                        <tr>
                                            <td> <?php echo (++$i); ?></td>
                                            <td><?php echo $row->username; ?></td>
                                            <td><?php echo $row->role; ?></td>
                                            <td width="17%">
                                            <?php if ( $_SESSION['superadmin'] ) { ?>
                                             <a href="admin_staff_edit.php?entry=<?php echo $row->userid; ?>" class="btn waves-effect waves-light">
                                    <i class="fa fa-pencil">Edit</i> </a>
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

    <!--SECTION END-->

    <section>
<?php include "footer.php"; ?> 
</body>

</html>