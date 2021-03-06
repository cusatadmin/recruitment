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
	
	$query = "SELECT * FROM awards where award_emailid='$emailid'";
	
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
                    <h4 align="center">My Awards</h4>
                   </div>
						<div class="text-danger" align="center">(Required only if Applicable)</div>
                            <div class="pro-con-table">
                                <table class="bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Awarding Body</th>                                            
                                            <th>Name of Award</th>
                                            <th>Date Awarded</th>
                                            <th>Award Level</th>
                                            
                                            <th><a href="candidate_award_add.php">
                                            <button type="button" class="btn btn-primary btn-xs">Add New</button>
                                            </a></th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php 	while ($row = $result->fetch_object()) {	?>
                                        <tr>
                                            <td><?php echo $row->award_body; ?></td>                                           
                                            <td><?php echo $row->award_name; ?> <br>
                                            <a href="<?php echo "files/".$row->award_certificate; ?>" target="_blank">Download Certificate</a>
                                            </td>
											<td><?php echo date("d-m-Y", strtotime($row->award_date)); ?></td>
                                            <td><?php echo $row->award_level; ?></td>
                                            
                             
                                            <td><a href="candidate_award_edit.php?entry=<?php echo $row->award_id; ?>"><button type="button" class="btn btn-info btn-xs">Edit</button></a>&nbsp;&nbsp;<a href="candidate_award_delete.php?entry=<?php echo $row->award_id; ?>&award_certificate=<?php echo $row->award_certificate; ?>" onClick="return confirmSubmit('<?php echo $row->award_name ?>')"><button type="button" class="btn btn-danger btn-xs">Delete</button></a></td>
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