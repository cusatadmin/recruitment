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
	
	$query = "SELECT * FROM experience where exp_emailid='$emailid'";
	
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
		msg= "Are you sure you want to delete the  " + degree + " Entry";	
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
                    	<h4 align="center">My Experiences</h4>
                    </div>
						<div class="text-danger" align="center">(Required only if Applicable)</div>
                            <div class="pro-con-table">
                                <table class="bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Category</th>                                            
                                            <th>Designation</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Employer</th>
                                            <th colspan="2"><a href="candidate_experience_add.php">
                                            <button type="button" class="btn btn-primary btn-xs">Add New</button>
                                            </a></th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php 	while ($row = $result->fetch_object()) {	?>
                                        <tr>
                                            <th><?php echo $row->exp_category; ?></th>                                           
                                            <td><?php echo $row->exp_designation; ?><br>
                                            <a href="<?php echo "files/".$row->exp_certificate; ?>" target="_blank">Download Certificate</a>
                                            </td>
                                            <td><?php echo date("d-m-Y", strtotime($row->exp_from_date)); ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($row->exp_to_date)); ?></td>
                                            <td><?php echo $row->exp_employer; ?></td>                                          
                                            <td><a href="candidate_experience_edit.php?entry=<?php echo $row->exp_id; ?>">
                                            <button type="button" class="btn btn-info btn-xs">Edit</button>
                                            </a></td>
                                            <td>
                                           <a href="candidate_experience_delete.php?entry=<?php echo $row->exp_id; ?>&exp_certificate=<?php echo $row->exp_certificate; ?>"  onClick="return confirmSubmit('<?php echo $row->exp_designation ?>')"><button type="button" class="btn btn-danger btn-xs">Delete</button></a>
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
</section>
<?php include "footer.php" ?>
    <!--Import jQuery before materialize.js-->
<script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>