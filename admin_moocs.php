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
	
	$query = "SELECT * FROM moocs where mooc_emailid='$emailid'";
	
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

<style>

.table-condensed{
  font-size: 8px;
}
</style>
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
							<h4 align="center">Mooc Courses by <?php echo $candidate_name; ?></h4>
									<?php include "admin_candidate_menu.php"; ?>	
                            <div class="pro-con-table">
                                <table class="bordered table-responsive table-condensed">
                                    <thead class="small">
                                        <tr>
                                        	<th>Course Title</th>
                                            <th>URL</th>                                                                          
                                            <th>Date Taken</th>                                            
                                            <th>Duration</th>
                                            <th>Score</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php 	while ($row = $result->fetch_object()) {	?>
                                        <tr>
                                        	<td><a href="candidate_mooc_view.php?entry=<?php echo $row->mooc_id; ?>">
											<?php echo $row->mooc_title; ?></a></td> 
                                            <td><a href="<?php echo $row->mooc_url; ?>" target="_blank">
																<?php echo $row->mooc_url; ?></a></td>
                                            <td><?php echo date("d-m-Y", strtotime($row->mooc_date)); ?></td>
                                            <td><?php echo $row->mooc_duration; ?> </td>  
                                            <td>
                                            <!-- change score begin -->
                                            <form id="UserDisplayForm" action="change_mooc_score.php" method="POST">
															<div class="input text">
															   <input type="text" class="form-control" 
															   value="<?php echo $row->mooc_score; ?>" 
															   name="score" id="score" size="4">
														   </div>
														   <div style="display:none;">
															   <input type="hidden" name="id" 
															   value="<?php echo $row->mooc_id; ?>">
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
<?php include "footer.php" ?>

    <!--Import jQuery before materialize.js-->
<script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>