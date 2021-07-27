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
	
	$query = "SELECT * FROM profile where emailid=?";
	//echo $query;
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();

?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>
 input[type=file]{ 
        color:transparent;
    }
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
				  <h4 align="center">Files Uploaded by <?php echo $candidate_name; ?></h4>
									<?php include "admin_candidate_menu.php"; ?>

                        <div class="pro-con-table">
                      <table class="bordered table-responsive">
                            	<thead>
                                	<tr>
                                    	<td width="270"><div align="center"><strong>Description</strong></div></td>
                                        <td width="180"><div align="center"><strong>Uploaded File</strong></div></td>

                                    </tr>
                                </thead>
                                
                                <tbody>

                                    <tr>
                                        <td>NET Certificate</td>
                                        <td>
                                            <a href="<?php echo "files/".$row->net; ?>" target="_blank"><?php echo $row->net; ?></a>
                                        </td>
                                     </tr>
												<input name="degree" id="degree" value="community" type="hidden">
                                    <tr>
                                        <td>Community Certificate</td>
                                        <td>
                                            <a href="<?php echo "files/".$row->community; ?>" target="_blank"><?php echo $row->community; ?></a>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td>PWBD Certificate</td>
                                        <td>
                                            <a href="<?php echo "files/".$row->pwbd; ?>" target="_blank"><?php echo $row->pwbd; ?></a>
                                        </td>
                                        
                                    </tr>

                                    <tr>
                                        <td>No Objection Certificate</td>
                                        <td>
                                            <a href="<?php echo "files/".$row->noc; ?>" target="_blank"><?php echo $row->noc; ?></a>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td>Information Data Sheet (for teaching posts)
                                        </td>
                                        <td>
                                            <a href="<?php echo "files/".$row->info_data; ?>" target="_blank"><?php echo $row->info_data; ?></a>
                                        </td>
                                        
                                    </tr>

                                    <tr>
                                        <td>Any Other Documents</td>
                                        <td>
                                            <a href="<?php echo "files/".$row->other; ?>" target="_blank"><?php echo $row->other; ?></a>
                                        </td>
                                        
                                    </tr>

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