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
	
	$query = "SELECT * from index_page where index_id='23'";
	
	$stmt = $conn->prepare($query);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();

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
      <?php include "candidate_top_menu.php" ?>
<div class="stu-db">
           
				
                
					<div class="container pg-inn">
                <div class="col-md-12 text-success">
                <strong>
                	<h4 align="center"><?php echo $row->short_title; ?></h4>
                </strong>                
                    <br>
                </div>
                <br>
                <div class="col-md-8 col-md-offset-2" align="justify">
                     <?php echo $row->description; ?>                     		
                </div>
                <br>
                <div class="col-md-8 col-md-offset-2" align="justify">
                     <?php echo $row->long_description; ?> 
                </div>
                <div class="col-md-8 col-md-offset-2" align="right">
							<?php if ($row->filename1) { ?>
                      	<a href="<?php echo "documents/".$row->filename1; ?>" target="_new">
                      	
                      	View More Details ..... </a>		 
								<br>
                      <?php } ?>
                </div>
               <div class="col-md-8 col-md-offset-2" align="justify">
                     <hr \>                      
                     <button type="button" class="btn btn-info btn-xs" onclick="goBack()">Go Back</button>                 		
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