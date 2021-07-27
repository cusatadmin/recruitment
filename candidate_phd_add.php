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
   
   if ($_POST['submit'] == "Add") {
	
	$todays = date('Y-m-d H:i:s');
	$phd_category = $_POST['phd_category'];
	$phd_subject = $_POST['phd_subject'];
	$phd_title = $_POST['phd_title'];
	$phd_companion = $_POST['phd_companion'];
	$phd_award_date = $_POST['phd_award_date'];
	$phd_registration_date = $_POST['phd_registration_date'];
	$phd_publications = $_POST['phd_publications'];
	
		$query = "INSERT INTO phd 
				(phd_emailid, phd_category, phd_subject, phd_title,  phd_companion, phd_award_date, phd_registration_date,phd_publications, phd_postdate) VALUES 
					('$emailid','$phd_category', '$phd_subject', '$phd_title', '$phd_companion', '$phd_award_date', '$phd_registration_date', '$phd_publications','$todays')";	
		//echo $query;
		$stmt = $conn->prepare($query);

		$stmt->execute();
		
	$stmt->close();
	$conn->close();

	header("Location: candidate_phd.php");
	   
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
   
   </head>
<body>
      <!-- MOBILE MENU -->
      <section>
         <?php include "header.php"; ?>
         <p></p>
         <p></p>
      </section>
      <section>
         <div class="pro-menu">
         <?php include "candidate_top_menu.php" ?>
		<div class="stu-db">
            <div class="container pg-inn">

               <div class="col-md-12">
                  <div class="box-inn-sp admin-form">
                     <div class="inn-title">
                        <h4>Ph.D. Details</h4>
                     </div>
                     <div class="tab-inn">
                      <form class="form-inline" action="#" method="post" name="editme" >
                         <!-- Start Row -->
                         <div class="row">
                         
                          	<div class="col-md-6">
                             <div class="text-danger small"><em>Category</em></div>
                            	<select name="phd_category" id="phd_category"  class="custom-select browser-default" required>
                                    <option value="" disabled selected>Select Category</option>
                                    <option value="Guide" >Guide</option>
                                    <option value="Co-Guide">Co-Guide</option>
                                    <option value="Scholar">Scholar</option>
                                 </select>
                         	</div>
                              <div class="col-md-6">
                              <div class="text-danger small"><em>Name of the Companion</em></div>
                              <input type="text" value="" name="phd_companion" id="phd_companion" class="validate" placeholder="Name(s)" required>
                            </div>
                       	</div> <!-- row -->
                        <div class="row">
                        
                            <div class="col-md-6">
                            <div class="text-danger small"><em>Subject</em></div>           
                              <input type="text" value="" name="phd_subject" id="phd_subject" class="validate" placeholder="Subject" required>
                            </div>
                            <div class="col-md-6">
                             <div class="text-danger small"><em>Ph.D. Title</em></div>
                              <input type="text" value="" name="phd_title" id="phd_title" class="validate" placeholder="Title" required>
                              </div>
                            
                       	</div> <!-- row -->
                        <div class="row">
                        
                            <div class="col-md-6">
                             <div class="text-danger small"><em>Date Awarded</em></div>
                              	<input type="date" id="phd_award_date" name="phd_award_date" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="" value="" > Award Date
                            </div>
                            <div class="col-md-6">
                            <div class="text-danger small"><em>Date of registration</em></div>
                              	<input type="date" id="phd_registration_date" name="phd_registration_date" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="" value="" > Regn. Date
                              </div>
                            
                       	</div> <!-- row -->
                         <div class="row">
                            <div class="col-md-8">
                             <div class="text-danger small"><em>Publication Journals or other</em></div>
                              	<input type="text" value="" name="phd_publications" id="phd_publications" class="validate"  placeholder="Journals published" required>
                            </div>

                              <div class="input-field col s12">
                                 <p><i class="waves-effect waves-light btn-large waves-input-wrapper" style="">
                                    <input type="submit" class="waves-button-input" id="submit" name="submit" value="Add">
                                    </i>
                                 </p>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
      </div>
	</div>
    </section>  
   <!--SECTION END-->
  
</body>
</html>