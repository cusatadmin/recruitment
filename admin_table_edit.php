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
	$deg_query = "SELECT * FROM degrees";
	$stmt_deg = $conn->prepare($deg_query);
	$stmt_deg->execute(); //working
	$result_deg = $stmt_deg->get_result();


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
                <!-- Start Row -->
                <div class="row">
                     <div class="col-md-3">
                         <div class="text-danger small">
                            <em>
                            	Programme Edit
                            </em>
                          </div>    
                      </div>
                      <div class="col-md-3">
                          <div class="text-danger small">
                            	<em>
                            		Department Edit
                            	</em>
                           </div>    
                      </div>
                            
                </div> <!--row end -->
                         
               <div class="row">
                  <div class="col-md-3">
                      <select name="acad_degree" id="acad_degree"  class="custom-select browser-default" required>
                           <?php while ($row_deg = $result_deg->fetch_object()) {	?>
                               <option value="<?php echo $row_deg->degree; ?>"><?php echo $row_deg->degree; ?></option>
                           <?php } ?>
                      </select>
                            
                    </div>
                </div> <!--row end -->
        	</div>
        </div>
    </section>
<?php include "footer.php"; ?> 
</body>

</html>