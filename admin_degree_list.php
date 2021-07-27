<?php
	session_start();

	$auth = $_SESSION['admin'] || $_SESSION['superadmin'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}
	include 'conf/db.php';

	$query = "SELECT * from degrees";
	
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
  
function confirmSubmit(degree)
	{	
		var msg;	
		msg= "Are you sure you want to delete the data  " + degree + " Entry";	
		var agree=confirm(msg);	
		if (agree)	
			return true ;	
		else	
			return false ;	
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
                	<h4 align="center">Degree Maintenance Page</h4>
                    <div class="pro-con-table">
                    	
                          <table class="table table-striped table-bordered table-responsive" id="mytable" style="width:40%" align="center">
                                    <thead>
                                        <tr>
                                            <th width="8%">No</th>
                                            <th width="20%">Degree Name</th>
                                            <th width="20%">
                                            <a href="admin_degree_add.php">
                                            <button type="button" class="btn btn-info btn-xs">Add New</button>
                                            </a>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php 	while ($row = $result->fetch_object()) {	?>
                                        <tr>
                                            <td> <?php echo (++$i); ?></td>
                                            <td><?php echo $row->degree; ?></td>
                                            <td>
                                             <a href="admin_degree_edit.php?entry=<?php echo $row->id; ?>" class="btn waves-effect waves-light">
                                    <i class="fa fa-pencil">Edit</i> </a>
                                     <a href="admin_degree_delete.php?entry=<?php echo $row->id; ?>" 
                                            onClick="return confirmSubmit('<?php echo $row->degree; ?>')">
                                            <button type="button" class="btn btn-danger btn-xs">Delete</button></a>
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