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
	
	//echo " ID :".$_POST['acad_id'];
	$entry=$_GET['entry'];
	echo " ID :".$entry;

	$query = "SELECT * FROM phd where phd_id='$entry'";
	
	$stmt = $conn->prepare($query);
	//$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();
	
	if ($_POST['submit'] == "Submit") {
	
		$entry = $_POST['entry'];	
		$todays = date('Y-m-d H:i:s');
		$phd_category = $_POST['phd_category'];
		$phd_subject = $_POST['phd_subject'];
		$phd_title = $_POST['phd_title'];
		$phd_companion = $_POST['phd_companion'];
		$phd_award_date = $_POST['phd_award_date'];
		$phd_registration_date = $_POST['phd_registration_date'];
		$phd_publications = $_POST['phd_publications'];
		
		$query = "UPDATE phd  set 
				phd_category = '$phd_category',
				phd_subject = '$phd_subject',
				phd_title = '$phd_title',
				phd_companion = '$phd_companion',
				phd_award_date = '$phd_award_date',
				phd_registration_date = '$phd_registration_date',
				phd_publications = '$phd_publications',
				phd_postdate = '$todays'
		where phd_id = '$entry'";
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
               <?php include "candidate_left_menu.php" ?>
               <div class="col-md-8">
                  <div class="box-inn-sp admin-form">
                     <div class="inn-title">
                        <h4>Academic Qualifications</h4>
                     </div>
                     <div class="tab-inn">
                      <form class="form-inline" action="#" method="post" name="editme" >
                      		<input type="hidden" name="entry" value="<?php echo $entry; ?>">
                         <!-- Start Row -->
                         <div class="row">
                         
                          	<div class="col-md-6">
                            	<select name="phd_category" id="phd_category"  class="custom-select browser-default" required>
                                    <option value="<?php echo $row->phd_category; ?> <?php if ($row->phd_category=='Guide') echo "Selected"; ?>" >Guide</option>
                                    <option value="<?php echo $row->phd_category; ?>" <?php if ($row->phd_category=='Co-Guide') echo "Selected"; ?>>Co-Guide</option>
                                    <option value="<?php echo $row->phd_category; ?>" <?php if ($row->phd_category=='Scholar') echo "Selected"; ?>>Scholar</option>
                                 </select>
                         	</div>
                              <div class="col-md-6">
                              	<input type="text" value="<?php echo $row->phd_companion; ?>" name="phd_companion" id="phd_companion" class="validate" placeholder="Name" required>
                            </div>
                       	</div> <!-- row -->
                        <div class="row">
                        
                            <div class="col-md-6">
                              <input type="text" value="<?php echo $row->phd_subject; ?>" name="phd_subject" id="phd_subject" class="validate" placeholder="Subject" required>
                            </div>
                            <div class="col-md-6">
                              <input type="text" value="<?php echo $row->phd_title; ?>" name="phd_title" id="phd_title" class="validate" placeholder="Title" required>
                              </div>
                            
                       	</div> <!-- row -->
                        <div class="row">
                        
                            <div class="col-md-6">
                              	<input type="date" id="phd_award_date" name="phd_award_date" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="" value="<?php echo $row->phd_award_date; ?>" > (mm/dd/yyyy)
                            </div>
                            <div class="col-md-6">
                              	<input type="date" id="phd_registration_date" name="phd_registration_date" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="" value="<?php echo $row->phd_registration_date; ?>" > (mm/dd/yyyy)
                              </div>
                            
                       	</div> <!-- row -->
                         <div class="row">
                            <div class="col-md-8">
                              	<input type="text" value="<?php echo $row->phd_publications; ?>" name="phd_publications" id="phd_publications" class="validate"  placeholder="Employer" required>
                            </div>
                              <div class="input-field col s12">
                                 <p><i class="waves-effect waves-light btn-large waves-input-wrapper" style="">
                                    <input type="submit" class="waves-button-input" id="submit" name="submit" value="Submit">
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