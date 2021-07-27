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
	
	$query = "SELECT * FROM publications where publication_emailid='$emailid'";
	
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
<style>

.table-condensed{
  font-size: 8px;
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
							<h4 align="center">Publications of <?php echo $candidate_name; ?></h4>
									<?php include "admin_candidate_menu.php"; ?>
                            <div class="pro-con-table">
                                <table class="bordered table-responsive  table-condensed">
                                    <thead class="small">
                                        <tr>
                                        	<th>Title</th>
                                            <th>Authorship</th>
                                            <th>Vol No.</th>
                                            <th>Page No.</th>
                                        	<th>Type</th>
                                            <th>Year</th>
                                            <th>ISSN No.</th>                                                                          
                                            <th>Impact Factor</th>                                            
                                            <th>Indexing</th>
                                            <th>Journal</th>
                                            <th>Score</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php 	while ($row = $result->fetch_object()) {	?>
                                        <tr>
                                        	  <td><?php echo $row->publication_title; ?></a></td>
                                            <td><?php echo $row->publication_authorship; ?></td>
                                            <td><?php echo $row->publication_volume_no; ?></td>
                                            <td><?php echo $row->publication_page_no; ?></td>
                                            <td><?php echo $row->publication_type; ?></td>  
                                            <td><?php echo $row->publication_year; ?></td>
                                            <td><?php echo $row->publication_issn_no; ?></td>
                                            
                                            <td><?php echo $row->publication_impact_factor; ?></td>
                                            <td><?php 
                                            if ($row->publication_sci_indexed) echo "SCI"."<br>";
                                            if ($row->publication_scopus_indexed) echo "Scopus"."<br>"; 
                                            if ($row->publication_ugc_carelisted) echo "UGC Carelist"."<br>";
                                            ?></td>                                         
                                            <td><?php echo $row->publication_journal_name; ?></td>
                                            <td>
                                            <!-- change score begin -->
                                            <form id="UserDisplayForm" action="change_publication_score.php" method="POST">
															<div class="input text">
															   <input type="text" class="form-control" 
															   value="<?php echo $row->publication_score; ?>" 
															   name="score" id="score" size="4">
														   </div>
														   <div style="display:none;">
															   <input type="hidden" name="id" 
															   value="<?php echo $row->publication_id; ?>">
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