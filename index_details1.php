<?php

	include 'conf/db.php';

	$data = $_GET['data'];
	$decrypted1 = base64_decode(urldecode($data));
	$id = (($decrypted1*999521)/5064)/123456789;
	
	$query = "SELECT * from index_page where index_id='$id'";
	
	$stmt = $conn->prepare($query);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <section>
		<?php include "header_index.php"; ?>
    </section>
</head>

<body>

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

    <!--SECTION END-->

<?php include "footer.php"; ?>  

    <!--SECTION LOGIN, REGISTER AND FORGOT PASSWORD-->
   

    <!--Import jQuery before materialize.js-->
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>