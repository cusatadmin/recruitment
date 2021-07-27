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
	
	$query = "SELECT * FROM phd where phd_emailid='$emailid'";
	
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
      <?php include "candidate_top_menu.php" ?>
        <div class="stu-db">
            <div class="container pg-inn">
                <div class="col-md-12">
					<div class="inn-title">
                    	<h4 align="center">My Ph.D. Works</h4>
                    </div>
						<div class="text-danger" align="center">(Required only if Applicable)</div>
                            <div class="pro-con-table">
                                <table class="bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Category</th>                                            
                                            <th>Subject</th>
                                            <th>Title</th>
                                            <th>Guide/Student</th>
                                            <th>Award Date</th>
                                            <th>Reg. Date</th>
                                            <th>Publications</th>
                                            <th colspan="2"><a href="candidate_phd_add.php">
                                            <button type="button" class="btn btn-primary btn-xs">Add New</button>
                                            </a></th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php 	while ($row = $result->fetch_object()) {	?>
                                        <tr>
                                            <td><?php echo $row->phd_category; ?></td>                                           
                                            <td><?php echo $row->phd_subject; ?></td>
                                            <td><?php echo $row->phd_title; ?></td>
                                            <td><?php echo $row->phd_companion; ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($row->phd_award_date)); ?></td>  
                                            <td><?php echo date("d-m-Y", strtotime($row->phd_registration_date)); ?></td>
                                            <td><?php echo $row->phd_publications; ?></td>                                      
                                            <td><a href="candidate_phd_edit.php?entry=<?php echo $row->phd_id; ?>">
                                            <button type="button" class="btn btn-info btn-xs">Edit</button>
                                            </a></td>
                                            <td>
                                           <a href="candidate_phd_delete.php?entry=<?php echo $row->phd_id; ?>" onClick="return confirmSubmit('<?php echo $row->phd_subject ?>')"><button type="button" class="btn btn-danger btn-xs">Delete</button></a>
</td>
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