<?php

	include 'conf/db.php';

	$query = "SELECT * from index_page order by priority";
	
	$stmt = $conn->prepare($query);
	//$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$i=0;
	
	$marque_query ="SELECT * FROM notifications where DATEDIFF(CURDATE(),postdate) <= 7;";
	$stmt_q = $conn->prepare($marque_query);
	//$stmt->bind_param("s", $emailid);
	$stmt_q->execute(); //working
	$result_q = $stmt_q->get_result();
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <section>
		<?php include "header_index.php"; ?>
    </section>
</head>

<body>

    

    <!--HEADER SECTION-->


        <div class="stu-db">
            <div class="container pg-inn">
                <div class="col-md-12 text-success">
                <strong>
                	<h4 align="center">Welcome to Recruitment Section of CUSAT</h4>
                </strong>                
                    <br>
                </div>
                <marquee  onmouseover="this.stop();"  onmouseout="this.start();">
                <?php 	while ($row_q = $result_q->fetch_object()) {	?>
                    <a href="<?php echo "files/".$row_q->filename; ?>" target="_blank" style="color:#F00">
                    <?php echo $row_q->description; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </a>  
                <?php } ?>
                </marquee> 
                <br>
                <?php 	while ($row = $result->fetch_object()) {	?>
                      <div class="col-md-6 col-md-offset-1 text-danger">
								<strong>
                     	 <?php echo $row->short_title; ?>
								</strong>
                      </div> 
                      <p class="col-md-8 col-md-offset-2" align="justify">
                      		<?php echo $row->description; ?>
                      </p>
                      <p class="col-md-8 col-md-offset-2" align="right">
                      		<a href="index_details.php?id=<?php echo $row->index_id; ?>" >
                      		Read More....</a>
                      		
                      </p>
                <?php } ?>
				   <div class="col-md-12 text-success">
                  <div class="tab-inn">
                    <div class="row">
                       <div class="col-md-3 col-md-offset-1" >
                     	<a href="login.php">
                       		<button type="button" class="btn btn-info btn-xs">Candidate Login</button>
                       	</a>
                 	     </div>
                 	     <div class="col-md-3" >
                     	<a href="register.php">
                       		<button type="button" class="btn btn-primary btn-xs">New Registration</button>
                       	</a>
                 	     </div>
         			   </div>
					    </div>               
                    <br>
               </div>
        	</div>
        	
        </div>

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