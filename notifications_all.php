<?php
	session_start();

	include 'conf/db.php';
	include "functions.php";
	$query = "SELECT * from notifications where closed=0";
	
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
    <section>
		<?php include "header.php"; ?>
    </section>
</head>

<body>

    

    <!--HEADER SECTION-->


    <section>

<div class="pro-menu">
            <div class="container">
                <div class="col-md-9 col-md-offset-3">
                    <ul>
                        <li><a href="index.php" class="pro-act">Home </a></li>
                        <li><a href="guidelines.php">Guidelines</a></li>
                        <li><a href="notifications_all.php">Notifications</a></li>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
        </div>
        </div>
        <div class="stu-db">
            <div class="container pg-inn">
              <div class="col-md-9">
                <div class="udb">
                <?php 	while ($row = $result->fetch_object()) {	?>
                                        <tr>
                                            <td> <?php echo (++$i); ?></td>
                                            <td><?php echo $row->description; ?></td>
                                            <td><?php echo $row->department; ?></td>
                                            <td><?php echo $row->last_date_online; ?></td>
                                            <td><?php echo $row->last_date_online; ?></a></td>
                                            <td><a href="sdb-course-view.html" class="pro-edit">view</a></td>
                                        </tr>
                                     <?php } ?>
                                       
                
                </div>
              </div>
          </div>
        </div>
    </section>
    <!--SECTION END-->


    <!--SECTION START-->
    <section></section>
    <!--SECTION END-->

    <!--HEADER SECTION--><!--END HEADER SECTION-->

    <!--HEADER SECTION-->
<?php include "footer.php"; ?>    <!--END HEADER SECTION-->

    <!--SECTION LOGIN, REGISTER AND FORGOT PASSWORD-->
   

    <!--Import jQuery before materialize.js-->
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>