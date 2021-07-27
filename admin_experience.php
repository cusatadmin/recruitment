<?php
	session_start();
	$emailid = $_SESSION['emailid'] ;
	$auth = $_SESSION['admin'];
	$candidate_name = $_SESSION['candidate_name'];
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
                <h4 align="center">Experiences of <?php echo $candidate_name; ?></h4>
							<?php include "admin_candidate_menu.php"; ?>
                            <div class="pro-con-table">
                                <table class="bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Category</th>                                            
                                            <th>Designation</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Employer</th>
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