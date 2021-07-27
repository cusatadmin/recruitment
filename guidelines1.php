<?php 
	session_start();
	$emailid = $_SESSION['emailid'] ;
	$auth_admin = $_SESSION['admin'];
	$auth_candidate = $_SESSION['authuser'];
	
	include 'conf/db.php';
	$query = "SELECT * from index_page where short_title='Guidelines'";
	
	$stmt = $conn->prepare($query);
	//$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$row = $result->fetch_object();
	

   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
   
   </head>
<body>
      <!-- MOBILE MENU -->
      <section>
         <?php 

		 	if ($auth_admin || $auth_candidate)
		 		include "header.php"; 
			else
				include "header_index.php"; 
			?>
         <p></p>
         <p></p>
      </section>
      <section>
         <div class="pro-menu">
         <?php 

		 if ($auth_admin)
		 	include "admin_top_menu.php";
		 elseif ($auth_candidate)
		 	include "candidate_top_menu.php";

		 ?>
		<div class="stu-db">
            <div class="container pg-inn">
               <div class="col-md-12">
				<div class="inn-title">
                 <h4 align="center">
                 Guidelines for applying online to various posts in Cochin University of Science and Technology
                 </h4>
				</div>
                 <div class="sdb-tabl-com sdb-pro-table">
                   	<?php echo $row->long_description; ?>
						</div>
             </div>

            </div>
      </div>
	</div>
    </section>  
   <!--SECTION END-->
  <?php include "footer.php"; ?> 
</body>
</html>