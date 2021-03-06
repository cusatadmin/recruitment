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
   $result_set = $conn->query("SELECT * FROM countries ");// Generate resultset
   $my_array=array();
   while($row = $result_set->fetch_array(MYSQLI_ASSOC)){
   	$my_array[]=array("id"=>$row['id'],"country_code"=>$row['country_code'],"country_name"=>$row['country_name']);
   }
   $max=sizeof($my_array);
   
   $result = $conn->query("SELECT * FROM states ");// Generate resultset
   $mystates=array();
   while($row = $result->fetch_array(MYSQLI_ASSOC)){
   	$mystates[]=array("id"=>$row['id'],"state"=>$row['state']);
   }
   $maxstates=sizeof($mystates);
	
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
	
	if ($_POST['submit'] == "Submit") { 		
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$mobile=$_POST['mobile'];
		$guardianname=$_POST['guardianname'];
		$gender=$_POST['gender'];
		$dob=$_POST['profile-dob'];
		$category=$_POST['category'];
		$religion=$_POST['religion'];
		$pwd=$_POST['profile-pwd'];
		$marital=$_POST['marital'];
		$postaladd1=$_POST['profile-postaladd1'];
		$postaladd2=$_POST['profile-postaladd2'];
		$postalcity=$_POST['profile-postalcity'];
		$postalstate=$_POST['profile-postalstate'];
		$postalpin=$_POST['profile-postalpin'];
		$postalcountry=$_POST['profile-postalcountry'];
		$permanentadd1=$_POST['profile-permanentadd1'];
		$permanentadd2=$_POST['profile-permanentadd2'];
		$permanentcity=$_POST['profile-permanentcity'];
		$permanentstate=$_POST['profile-permanentstate'];
		$permanentpin=$_POST['profile-permanentpin'];
		$permanentcountry=$_POST['profile-permanentcountry'];
		$nationality=$_POST['nationality'];
		$todays = date('Y-m-d H:i:s');
		
		$query = "UPDATE profile  set 
						firstname = '$firstname',
						lastname = '$lastname',
						mobile = '$mobile',
						guardianname = '$guardianname',
						gender = '$gender',
						dateofbirth = '$dob',
						category = '$category',
						religion = '$religion',
						pwd = '$pwd',
						marital = '$marital',
						postaladd1 = '$postaladd1',
						postaladd2 = '$postaladd2',
						postalcity = '$postalcity',
						postalstate = '$postalstate',
						postalpin = '$postalpin',
						postalcountry = '$postalcountry',
						permanentadd1 = '$permanentadd1',
						permanentadd2 = '$permanentadd2',
						permanentcity = '$permanentcity',
						permanentstate = '$permanentstate',
						permanentpin = '$permanentpin',
						permanentcountry = '$permanentcountry',
						nationality = '$nationality',
						postdate = '$todays'
				where emailid = '$emailid'";
				//echo $query;
				$stmt = $conn->prepare($query);
				$stmt->execute();
		
			  $stmt->close();
			  $conn->close();
		
		 header("Location: candidate_profile.php"); 
   
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
                        <h4>Edit My Profile</h4>
                     </div>
                     <div class="tab-inn">
                        <form class="form-inline" action="#" method="post" name="editme" >
                           <!-- Start Row -->
                           <div class="row">
                              <div class="input-field col s4">
                              <div class="text-danger small"><em>First name</em></div>
                                 <input type="text" value="<?php echo $row->firstname; ?>" name="firstname" id="firstname" class="validate" required>
                                  <label class="">First name</label>
                              </div>
                              <div class="input-field col s4">
                              <div class="text-danger small"><em>Last name</em></div>
                                 <input type="text" value="<?php echo $row->lastname; ?>"  name="lastname" id="lastname" class="validate" required>
                                 <label class="">Last name</label>
                              </div>
                              <div class="input-field col s4">
                              <div class="text-danger small"><em>Mobile Number</em></div>
                                 <input type="text" value="<?php echo $row->mobile; ?>"  name="mobile" id="mobile" class="validate" required>
                                 <label class="">Mobile Nuber</label>
                              </div>
                           </div>
                           <!-- End Row -->
                           <!-- Start Row -->
                           <div class="row">
                              <div class="input-field col s4">
                              <div class="text-danger small"><em>Father's/Guardian's Name</em></div>
                                 <input type="text" value="<?php echo $row->guardianname; ?>"  name="guardianname" id="guardianname" class="validate" required>
                                 <label class="">Father's/Guardian's Name</label>
                              </div>
                              <div class="input-field col s2">
                              	<div class="text-danger small"><em>Select Gender</em></div>
                                 <select name="gender" id="gender"  class="custom-select browser-default" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="male" <?php if ($row->gender=='male') echo "Selected"; ?>>Male</option>
                                    <option value="female" <?php if ($row->gender=='female') echo "Selected"; ?>>Female</option>
                                    <option value="other" <?php if ($row->gender=='other') echo "Selected"; ?>>Other</option>
                                 </select>
                              </div>
                              <div class="input-field col s3">
                              <div class="text-danger small"><em>Date of Birth</em></div>
                               <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
				   <input type="date" id="profile-dob" name="profile-dob" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="" value="<?php echo $row->dateofbirth; ?>" > (mm/dd/yyyy)
                </div>
                              </div>
                              <div class="input-field col s3">
                              <div class="text-danger small"><em>Marital Status</em></div>
                                 <select id="marital"  name="marital">
                                    <option value="" disabled selected>Select Marital Status</option>
                                    <option value="1" <?php  if ($row->marital=="1" ) echo  "Selected"; ?>>Single</option>
                                    <option value="2" <?php  if ($row->marital=="2" ) echo  "Selected"; ?>>Married</option>
                                 </select>
                              </div>
                           </div>
                           <!-- End Row -->
                           <!-- Start Row -->
                           <div class="row">
                              <div class="input-field col s4">
                              <div class="text-danger small"><em>Category</em></div>
                                 <select id="category"  name="category" class="custom-select browser-default" required>
                                    <option value="" disabled selected>Select Category</option>
                                    <option value="Open Competition (Unreserved (UR))" <?php if ($row->category=='Open Competition (Unreserved (UR))') echo "Selected"; ?>>Open Competition (Unreserved (UR))</option>
                                    <option value="Other Backward Community (Non-Creamy layer)" <?php  if ($row->category=="Other Backward Community (Non-Creamy layer)" ) echo  "Selected"; ?>>Other Backward Community (Non-Creamy layer)</option>
                                    <option value="Scheduled Caste" <?php  if ($row->category=="Scheduled Caste" ) echo  "Selected"; ?>>Scheduled Caste</option>
                                    <option value="Scheduled Tribe" <?php  if ($row->category=="Scheduled Tribe" ) echo  "Selected"; ?>>Scheduled Tribe</option>
                                    <option value="Ezhava/Thiyya/ Billava (ETB)" <?php if ($row->category=="Ezhava/Thiyya/ Billava (ETB)" ) echo  "Selected"; ?>>Ezhava/Thiyya/ Billava (ETB)</option>
                                    <option value="Muslim" <?php  if ($row->category=="Muslim" ) echo  "Selected"; ?>>Muslim</option>
                                    <option value="Latin Catholic/Anglo Indian (LC/AI)" <?php if ($row->category== "Latin Catholic/Anglo Indian (LC/AI)") echo  "Selected"; ?>>Latin Catholic/Anglo Indian (LC/AI)</option>
                                    <option value="Dheevara" <?php  if ($row->category=="Dheevara" ) echo  "Selected"; ?>>Dheevara</option>
                                    <option value="Viswakarma" <?php  if ($row->category=="Viswakarma" ) echo  "Selected"; ?>>Viswakarma</option>
                                    <option value="International" <?php  if ($row->category=="International" ) echo  "Selected"; ?>>International Students</option>
                                 </select>
                              </div>
                              <div class="input-field col s3">
                               <div class="text-danger small"><em>Whether PwD</em></div>
                                 <select id="profile-pwd"  name="profile-pwd" required="true">
                                    <option value="" disabled selected>Select PwD Category</option>
                                    <option value="Not Applicable"  <?php  if ($row->pwd=="Not Applicable" ) echo  "Selected"; ?>>Not Applicable</option>
                                    <option value="vi" <?php  if ($row->pwd=="vi" ) echo  "Selected"; ?>>Visually Impaired(VI)</option>
                                    <option value="ld" <?php  if ($row->pwd=="ld" ) echo  "Selected"; ?>>Locomotor Disability(LD)</option>
                                    <option value="hi" <?php  if ($row->pwd=="hi" ) echo  "Selected"; ?>>Hearing Impaired (HI)</option>
                                 </select>
                              </div>
                              <div class="input-field col s5">
                              <div class="text-danger small"><em>Religion & Community</em></div>
                                 <input type="text" value="<?php echo $row->religion; ?>"  name="religion" id="religion" class="validate" required placeholder="Religion & Community">
                                 
                              </div>
                           </div>
                           <!-- End Row -->
                           <div class="row">
                              <!--== BODY INNER CONTAINER ==-->
                              <!--== User Details ==-->
                              <div class="row">
                                 <div class="col-md-6">
                               
                                    <h4> Address for Correspondence </h4>  
                                    <div class="text-danger small"><em>Address Line 1</em></div>
                                    <div class="form-group field-profile-postaladd1 required">
                                       <input type="text" id="profile-postaladd1" class="form-control" name="profile-postaladd1" value="<?php echo $row->postaladd1; ?>" maxlength="128" required="true" placeholder="Address Line 1">
                                      

                                    </div>
                                    <div class="text-danger small"><em>Address Line 2</em></div>
                                    <div class="form-group field-profile-postaladd2 required">
                                       <input type="text" id="profile-postaladd2" class="form-control" name="profile-postaladd2" value="<?php echo $row->postaladd2; ?>" maxlength="128"required="true" placeholder="Address Line 2">
                                      

                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                       <div class="text-danger small"><em>Place/City</em></div>
                                          <div class="form-group field-profile-postalcity required">
                                             <input type="text" id="profile-postalcity" class="form-control" name="profile-postalcity" value="<?php echo $row->postalcity; ?>" maxlength="128" required="true" placeholder="City">
                                             

                                          </div>
                                       </div>
                                        </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                        <div class="text-danger small"><em>Pin/Zip Code</em></div>
                                          <div class="form-group field-profile-postalpin required">
                                             <input type="number" id="profile-postalpin" class="form-control" name="profile-postalpin" value="<?php echo $row->postalpin; ?>" maxlength="20" required="true" placeholder="Pin">
                                            
                                          </div>
                                       </div>
                                       </div>
                                     <div class="row">
                                       <div class="col-md-6">
                                       <div class="text-danger small"><em>State</em></div>
                                         <div class="form-group field-profile-permanentcountry required">
                                             <span class="form-group field-profile-gender required">
                                             <select name="profile-postalstate" size="1"  class="custom-select browser-default" id="profile-postalstate" required>
                                             <option value="#">Select State</option>
                                               <?php 	for($i=0; $i<$maxstates; $i++)  {	?>
                                               <option value="<?php echo $mystates[$i]['state'] ?>"  <?php if ($mystates[$i]['state']==$row->postalstate) echo "Selected"; ?>><?php echo $mystates[$i]['state'] ?></option>
                                               <?php } ?>
                                             </select>
                                             </span></div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                       <div class="text-danger small"><em>Country</em></div>
                                          <div class="form-group field-profile-postalcountry required">
                                             <span class="form-group field-profile-postalcountry required">
                                                <select name="profile-postalcountry" id="profile-postalcountry"  class="custom-select browser-default" required>
                                                <option value="#">Select Country</option>
                                                   <?php 	for($i=0; $i<$max; $i++)  {	?>
                                                   <option value="<?php echo $my_array[$i]['country_name'] ?>" <?php if ($my_array[$i]['country_name']==$row->postalcountry) echo "Selected"; ?>><?php echo $my_array[$i]['country_name'] ?></option>
                                                   <?php } ?>
                                                </select>
                                             </span>
                                             
                                             
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <h4>Permanent Address &nbsp;
                                       <small>
                                       <input type="checkbox" id="addresscheck" name="addresscheck" value="1"><label for="addresscheck"> &nbsp;Copy Address </label>                            
                                       </small>
                                    </h4>
                                    <div class="text-danger small"><em>Address Line 1</em></div>
                                    <div class="form-group field-profile-permanentadd1 required">
                                       <input type="text" id="profile-permanentadd1" class="form-control" name="profile-permanentadd1" value="<?php echo $row->permanentadd1; ?>" maxlength="128" required="true" placeholder="Address Line 1">

                                    </div>
                                    <div class="text-danger small"><em>Address Line 2</em></div>
                                    <div class="form-group field-profile-permanentadd2 required">
                                       <input type="text" id="profile-permanentadd2" class="form-control" name="profile-permanentadd2" value="<?php echo $row->permanentadd2; ?>" maxlength="128" required="true" placeholder="Address Line 2">

                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                       <div class="text-danger small"><em>Place/City</em></div>
                                          <div class="form-group field-profile-permanentcity required">
                                             <input type="text" id="profile-permanentcity" class="form-control" name="profile-permanentcity" value="<?php echo $row->permanentcity; ?>" maxlength="128" required="true" placeholder="City">

                                          </div>
                                       </div>
                                        </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                       <div class="text-danger small"><em>Pin/Zip Code</em></div>
                                          <div class="form-group field-profile-permanentpin required">
                                             <input type="number" id="profile-permanentpin" class="form-control" name="profile-permanentpin" value="<?php echo $row->permanentpin; ?>" maxlength="20" required="true" placeholder="Pin">

                                          </div>
                                       </div>
                                       </div>
                                       <div class="row">
                                       <div class="col-md-6">
                                       <div class="text-danger small"><em>State</em></div>
                                         <div class="form-group field-profile-permanentcountry required">
                                             <span class="form-group field-profile-gender required">
                                             <select name="profile-permanentstate" size="1"  class="custom-select browser-default" id="profile-permanentstate" required>
                                             <option value="#">Select State</option>
                                               <?php 	for($i=0; $i<$maxstates; $i++)  {	?>
                                               <option value="<?php echo $mystates[$i]['state'] ?>" <?php if ($mystates[$i]['state']==$row->permanentstate) echo "Selected"; ?>><?php echo $mystates[$i]['state'] ?></option>
                                               <?php } ?>
                                             </select>
                                             </span></div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                       <div class="text-danger small"><em>Country</em></div>
                                          <div class="form-group field-profile-permanentcountry required">
                                             <span class="form-group field-profile-gender required">
                                                <select name="profile-permanentcountry" id="profile-permanentcountry"  class="custom-select browser-default" required>
                                                <option value="#">Select Country</option>
                                                   <?php 	for($i=0; $i<$max; $i++)  {	?>
                                                   <option value="<?php echo $my_array[$i]['country_name'] ?>" <?php if ($my_array[$i]['country_name']==$row->permanentcountry) echo "Selected"; ?>><?php echo $my_array[$i]['country_name'] ?></option>
                                                   <?php } ?>
                                                </select>
                                             </span>

                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- End Row -->
                                 <div class="row">
                                       <div class="col-md-6">
                                       <div class="text-danger small"><em>Nationality</em></div>
                                          <div class="form-group field-profile-permanentcountry required">
                                             <span class="form-group field-profile-gender required">
                                                <select name="nationality" id="nationality"  class="custom-select browser-default" required>
                                                <option value="#">Select Country</option>
                                                   <?php 	for($i=0; $i<$max; $i++)  {	?>
                                                   <option value="<?php echo $my_array[$i]['country_name'] ?>" <?php if ($my_array[$i]['country_name']==$row->nationality) echo "Selected"; ?>><?php echo $my_array[$i]['country_name'] ?></option>
                                                   <?php } ?>
                                                </select>
                                             </span>

                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- End Row -->
                                 
                                 
                              </div>
                              <!----- delete ----->

                           <!-- Start Row -->
                           <!-- Start Row -->
                           <div class="row">
                              <div class="input-field col s12">
                                 <p>&nbsp;</p>
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

    </section>  
   <!--SECTION END-->
   <script type="text/javascript">
         //form validation 
           (function() {
         'use strict';
         window.addEventListener('load', function() {
         // Fetch all the forms we want to apply custom Bootstrap validation styles to
         var forms = document.getElementsByClassName('needs-validation');
         // Loop over them and prevent submission
         var validation = Array.prototype.filter.call(forms, function(form) {
         form.addEventListener('submit', function(event) {
         if (form.checkValidity() === false) {
         event.preventDefault();
         event.stopPropagation();
         }
         form.classList.add('was-validated');
         }, false);
         });
         }, false);
         })();
           
             // copy address
         
                 $(document).on("click", "#addresscheck", function () {
                     if ($(this).is(":checked")) {
                         $("#profile-permanentadd1").val($("#profile-postaladd1").val());
                         $("#profile-permanentadd1").attr("readonly", true);
                         $("#profile-permanentadd2").val($("#profile-postaladd2").val());
                         $("#profile-permanentadd2").attr("readonly", true);
                         $("#profile-permanentcity").val($("#profile-postalcity").val());
                         $("#profile-permanentcity").attr("readonly", true);
                         $("#profile-permanentstate").val($("#profile-postalstate").val()).prop("disabled", true);
                         $("#profile-permanentstate").attr("readonly", true);
                         $("#profile-permanentpin").val($("#profile-postalpin").val());
                         $("#profile-permanentpin").attr("readonly", true);
                         $("#profile-permanentcountry").val($("#profile-postalcountry").val()).prop("disabled", true);
                         $("#profile-permanentcountry").attr("readonly", true);
                     } else {
                         $("#profile-permanentadd1").attr("readonly", false);
                         $("#profile-permanentadd2").attr("readonly", false);
                         $("#profile-permanentcity").attr("readonly", false);
                         $("#profile-permanentstate").attr("readonly", false).prop("disabled", false);
                         $("#profile-permanentpin").attr("readonly", false);
                         $("#profile-permanentcountry").attr("readonly", false).prop("disabled", false);
                     }
                 });
            
             
         
         //post values end
             
      </script>
      
      <?php include "footer.php" ?>
</body>
</html>