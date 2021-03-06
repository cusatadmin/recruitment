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
<style type="text/css">
	#UserDisplayForm label { display: block; }
	#UserDisplayForm div { display: inline-block; }
</style>
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
                
                  <h4 align="center">Awards Received by <?php echo $candidate_name; ?></h4>
									<?php include "admin_candidate_menu.php"; ?>
                            <div class="pro-con-table">
                                <table class="bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Awarding Body</th>                                            
                                            <th>Name of Award</th>
                                            <th>Date Awarded</th>
                                            <th>Award Level</th>
                                            <th>Score</th>
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
                                            <td>
                                            
                                            <!-- change score begin -->
                                            <form id="UserDisplayForm" action="change_award_score.php" method="POST">
															<div class="input text">
															   <input type="text" class="form-control" 
															   value="<?php echo $row->award_score; ?>" 
															   name="score" id="score" size="4">
														   </div>
														   <div style="display:none;">
															   <input type="hidden" name="id" 
															   value="<?php echo $row->award_id; ?>">
														   </div>
														   <div class="submit">
															   <input type="submit" value="Update" />
                                           	</div>
                                            </form>
                                             <!-- change score end -->
                                             
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