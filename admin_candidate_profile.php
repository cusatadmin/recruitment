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
	
	$query = "SELECT * FROM profile where emailid=?";
	
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();
	if ( $num_rows==0) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	} 
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
						<h4 align="center">Profile of <?php echo $candidate_name; ?></h4>
							<?php include "admin_candidate_menu.php"; ?>
                            <div class="sdb-tabl-com sdb-pro-table">
                                <table class="table-responsive bordered">
                                    <tbody>
                                        <tr>
                                            <td> Name of Candidate</td>
                                            <td>:</td>
                                            <td><?php echo $row->firstname. " ". $row->lastname; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td>:</td>
                                            <td><?php echo $row->gender; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Mobile Number</td>
                                            <td>:</td>
                                            <td><?php echo $row->mobile; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Father's/Guardian's Name</td>
                                            <td>:</td>
                                            <td><?php echo $row->guardianname; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nationality</td>
                                            <td>:</td>
                                            <td><?php echo $row->nationality; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Marital Status</td>
                                            <td>:</td>
                                            <td><?php  if ($row->marital=="2" ) echo  "Married"; else echo "Single"; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Date of birth</td>
                                            <td>:</td>
                                            <td><?php echo date("d-m-Y", strtotime($row->dateofbirth)); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Category</td>
                                            <td>:</td>
                                            <td><?php echo $row->category; ?></td>
                                        </tr>
                                        <tr>
                                            <td>PwBD Category</td>
                                            <td>:</td>
                                            <td><?php echo $row->pwd; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Postal Address</td>
                                            <td>:</td>
                                            <td><?php echo $row->postaladd1."<br>".$row->postaladd2."<br>".$row->postalcity."<br>".$row->postalpin."<br>".$row->postalstate."<br>".$row->postalcountry; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Permanent Address</td>
                                            <td>:</td>
                                            <td><?php echo $row->permanentadd1."<br>".$row->permanentadd2."<br>".$row->permanentcity."<br>".$row->permanentpin."<br>".$row->permanentstate."<br>".$row->permanentcountry; ?></td>
                                        </tr>
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