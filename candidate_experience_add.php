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
   include 'functions.php';
	
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
	$exp_category = $_POST['exp_category'];
	$exp_designation = $_POST['exp_designation'];
	$exp_from_date = $_POST['exp_from_date'];
	$exp_to_date = $_POST['exp_to_date'];
	$exp_employer = $_POST['exp_employer'];

		$query = "INSERT INTO experience 
				(exp_emailid, exp_category, exp_designation, exp_employer,  exp_from_date, exp_to_date, exp_postdate) VALUES 
					('$emailid','$exp_category', '$exp_designation', '$exp_employer', '$exp_from_date', '$exp_to_date', '$todays')";	
		
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		$query_maxid = "select MAX(exp_id) AS Max_Id from experience";
		$stmt_maxid = $conn->prepare($query_maxid);
		$stmt_maxid->execute();
		$result_maxid = $stmt_maxid->get_result();
		$row_maxid = $result_maxid->fetch_object();
		$exp_id = $row_maxid->Max_Id;
		
		//experience Upload;

    $file_Name = $_FILES['myexpcert']['name'];
    $file_Size = $_FILES['myexpcert']['size'];
    $file_TmpName  = $_FILES['myexpcert']['tmp_name'];
    $file_Type = $_FILES['myexpcert']['type'];
    $file_Extension = strtolower(end(explode('.',$file_Name)));
	$file_upload_name = "EXP_".$exp_id."_".$emailid.".".$file_Extension;
	//echo $file_Name;
	//echo $file_upload_name;
	if ($file_Size <>0 ) {
		upload_file($file_Name,$file_Extension,$file_Size,$file_upload_name,$file_TmpName);
		$query = "UPDATE experience  set 
				exp_certificate = '$file_upload_name',
				exp_postdate = '$todays'
		where exp_id = '$exp_id'";
		//echo $query;
		$stmt = $conn->prepare($query);
		$stmt->execute();
	}
		
	$stmt->close();
	$conn->close();

	header("Location: candidate_experience.php");
	
	   
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
                        <h4>My Experiences</h4>
                     </div>
                     <div class="tab-inn">
                      <form class="form-inline" action="#" method="post" name="editme" enctype="multipart/form-data" >
                         <!-- Start Row -->
                         <div class="row">
                         
                          	<div class="col-md-6">
                            <div class="text-danger small"><em>Category</em></div>
                            
                            	<select name="exp_category" id="exp_category"  class="custom-select browser-default" required>
                                    <option value="Teaching">Teaching</option>
                                    <option value="Research">Research</option>
                                    <option value="Others">Other Experiences</option>
                                 </select>

                         	</div>
                              <div class="col-md-6">
                              <div class="text-danger small"><em>Designation</em></div>
                              	<input type="text" value="" name="exp_designation" id="exp_designation" class="validate" placeholder="Designation" required>
                            </div>
                       	</div> <!-- row -->
                        
                        <div class="row">
                        
                            <div class="col-md-6">
                            <div class="text-danger small"><em>Start Date</em></div>
                              	<input type="date" id="exp_from_date" name="exp_from_date" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="" value="" >
                            </div>
                            <div class="col-md-6">
                            <div class="text-danger small"><em>End Date</em></div>
                              	<input type="date" id="exp_to_date" name="exp_to_date" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="" value="" >
                              </div>
                            
                       	</div> <!-- row -->
                         <div class="row">
                            <div class="col-md-8">
                             <div class="text-danger small"><em>Employer</em></div>
                              	<input type="text" value="" name="exp_employer" id="exp_employer" class="validate"  placeholder="Employer" required>
                            </div>
							</div> <!-- row -->
                            <!-- Start Row -->
                         <div class="row">
                         	<div class="col-md-6">
                            	<div class="text-danger small">
                            		<em>
                            			Upload the Experience certificate in jpeg format size less than 2 MB
                            		</em>
                           	 	</div>    
                            </div>
                            
                         </div> <!--row end -->  
                             <!-- Start Row -->
                         <div class="row">
                           <div class="col-md-6">
                         	<input type="file" id="myexpcert" name="myexpcert">
                           </div>
                            </div> <!--row end -->  
                         <div class="row">
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