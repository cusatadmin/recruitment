<?php 
	session_start();
	$emailid = $_SESSION['emailid'] ;
	$auth_admin = $_SESSION['admin'];
	$auth_candidate = $_SESSION['authuser'];


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
                 <p align="center" class="text-primary"><strong>Thank You !!!</p>
                 <div class="sdb-tabl-com sdb-pro-table">
                   <p align="center" class="text-danger"><?php echo$_GET['message']; ?></strong></p> 
  
</div>
                 </div>

            </div>
      </div>
	</div>
    </section>  
   <!--SECTION END-->
  
</body>
</html>