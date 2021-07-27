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
	
	$query = "SELECT * FROM academic where acad_emailid='$emailid'";
	
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
					
                    	<h4 align="center">Qualifications of <?php echo $candidate_name; ?></h4>
							<?php include "admin_candidate_menu.php"; ?>

                            <div class="pro-con-table">
                                <table class="bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Degree</th>                                            
                                            <th>Subject</th>
                                            <th>%</th>
                                            <th>Pass Year</th>
                                            <th>Board/University</th>
                                            <th>Institution</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php 	while ($row = $result->fetch_object()) {	?>
                                        <tr>
                                            <th><?php echo $row->acad_degree; ?><br>
                                            <a href="<?php echo "files/".$row->acad_degree_cert; ?>" target="_blank">Download Certificate</a>
                                            	
                                            </th>                                           
                                            <td><?php echo $row->acad_subject; ?></td>
                                            <td><?php echo $row->acad_percentage; ?><br>
                                            <a href="<?php echo "files/".$row->acad_marklist; ?>" target="_blank">Download Marklist</a>
                                            </td>
                                            <td><?php echo $row->acad_pass_year; ?></td>
                                            <td><?php echo $row->acad_board; ?></td>
                                            <td><?php echo $row->acad_institute; ?></td>                                          
                                        </tr>
                                     <?php } ?>
                                  </tbody>
                                </table>

                    </div>
                </div>
            </div>
        </div>
    <!--SECTION END-->


    <!--SECTION START-->
<section></section>
    <!--SECTION END-->

    <!--HEADER SECTION-->
    <section class="wed-hom-footer"></section>
    <!--END HEADER SECTION-->

    <!--HEADER SECTION-->
    <section class="wed-rights"></section>
    <!--END HEADER SECTION-->

    <!--SECTION LOGIN, REGISTER AND FORGOT PASSWORD-->
    <section>
<!-- LOGIN SECTION --><!-- REGISTER SECTION --><!-- FORGOT SECTION --></section>

    <section></section>

    <!--Import jQuery before materialize.js-->
<script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>