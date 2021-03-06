<?php
	session_start();
	//$_SESSION['admin'] =1;
	//$_SESSION['superadmin'] = 1;
	$auth = $_SESSION['admin'] || $_SESSION['superadmin'];
	$username = $_SESSION['username'];

	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}
	include 'conf/db.php';

	$query = "SELECT * from index_page";
	
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

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
                	<h4 align="center"><?php echo "Admin Page - Logged in as ".$username; ?></h4>
                    <br><br>
                </div>
                <?php 	while ($row = $result->fetch_object()) {	?>
                	<h2>
                      <p class="col-md-4 col-md-offset-1 bg-primary">
                     	 <?php echo $row->short_title; ?>
                      </p> </h2>
                      <p class="col-md-8 col-md-offset-2" align="justify">
                      		<?php echo $row->description; ?></a>
                      	<?php if ($row->filename1) { ?>
                        	<a href="<?php echo "documents/".$row->filename1; ?>" target="_new">
                        	Download Details</a>		 
						<?php } ?>
                      </p>
                <?php } ?>
        	</div>
        </div>
    </section>
<?php include "footer.php"; ?> 
</body>

</html>