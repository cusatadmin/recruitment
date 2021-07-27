<?php
	include 'conf/db.php';
	$result_set = $conn->query("SELECT * FROM countries ");// Generate resultset
	$my_array=array();
	while($row = $result_set->fetch_array(MYSQLI_ASSOC)){
		$my_array[]=array("id"=>$row['id'],"country_code"=>$row['country_code'],"country_name"=>$row['country_name']);
	}
	$max=sizeof($my_array);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cochin University of Science and Technology</title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keyword" content="Cochin University,CUSAT,College,University">
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="	css/all.css">
    <!-- ALL CSS FILES -->
    <link href="css/materialize.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" />
     <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link href="css/style.css" rel="stylesheet" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="css/style-mob.css" rel="stylesheet" />
  
</head>


<body>
    <!--== MAIN CONTRAINER ==-->
    <div class="container-fluid sb1">
        <div class="row">
            <!--== LOGO ==-->
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
                <a href="index.html" class="logo"><img src="images/logo1.png" alt="" />
                </a>
            </div>
           
           
            <!--== MY ACCCOUNT ==-->
            <div class="col-md-2 col-sm-3 col-xs-6">
                <!-- Dropdown Trigger -->
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><img src="images/user/6.png" alt="" />My Account <i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>

                <!-- Dropdown Structure -->
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    
                    
                    <li><a href="#" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--== BODY CONTNAINER ==-->
    <div class="container-fluid sb2">
        <div class="row">
            <!--== BODY INNER CONTAINER ==-->
                <!--== User Details ==-->
          <div class="sb2-2-3">
          <div class="row">
             <div class="col-md-12">
                <div class="box-inn-sp admin-form">	
						<div class="sb2-2-add-blog sb2-2-1">
                    <ul class="nav nav-tabs tab-list">
                        <li class="active"><a data-toggle="tab" href="#home" aria-expanded="true"><i class="fa fa-info" aria-hidden="true"></i> <span>Detail</span></a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#menu1" aria-expanded="false"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span>Education</span></a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#menu2" aria-expanded="false"><i class="fab fa-first-order-alt" aria-hidden="true"></i> <span>Experience</span></a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#menu10" aria-expanded="false"><i class="far fa-check-circle" aria-hidden="true"></i> <span> Research Experience</span></a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#menu3" aria-expanded="false"><i class="fas fa-newspaper" aria-hidden="true"></i> <span>Research Publications</span></a>
                        </li>
                        
                        <li class=""><a data-toggle="tab" href="#menu4" aria-expanded="false"><i class="fas fa-award" aria-hidden="true"></i> <span>Awards</span></a>
                        </li>
								<li class=""><a data-toggle="tab" href="#menu5" aria-expanded="false"><i class="fa fa-sticky-note" aria-hidden="true"></i> <span>No Objection Certificate</span></a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#menu6" aria-expanded="false"><i class="fas fa-upload" aria-hidden="true"></i> <span>Uploads</span></a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#menu7" aria-expanded="false"><i class="fas fa-money-bill-alt" aria-hidden="true"></i> <span>Fee Payment</span></a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#menu8" aria-expanded="false"><i class="far fa-file-pdf" aria-hidden="true"></i> <span>Preview</span></a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#menu9" aria-expanded="false"><i class="far fa-check-circle" aria-hidden="true"></i> <span>Submission</span></a>
                        </li>   
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade active in">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>1.Personal details</h4>
                                </div>
                                <div class="bor">
                             <p style="color:#FF0000">Note : Please check the information before clicking 'Save' Button for any spelling mistakes.
This information will be used throughout the application and no changes will be allowed.</p>    

                                        <!-- Post -->
              <form id="user-profile-form"  action="profilesubmit.php"  method="post"  novalidate >
			   <input type="hidden" name="post" id="post" value="3">
			 <!-- <input type="hidden" name="department" value="12">
			  <input type="hidden" name="advt" value="12">
			  <input type="hidden" name="previous" value="0">
			  <input type="hidden" name="previousFormNo" value="">-->
   <div class="panel panel-jui">
        
        <div class="panel-body">
            <div id="jx-profile-content"></div>
             
			<div class="row">
              <div class="col-md-3">				
                    <div class="form-group field-profile-firstname required">
					<label class="control-label" for="profile-firstname">Name (As in Class 10<sup> th</sup> /S.S.L.C Certificate)</label>
					<input type="text" id="profile-firstname" class="form-control" name="firstname" maxlength="128" required="true" aria-invalid="false" value="" >
<div class="invalid-feedback">
        Please provide Your name.
      </div>
					
				</div> 
		     </div>

			<div class="col-md-3">
                <div class="form-group field-profile-gender required">
				
			
				<label class="control-label" for="profile-gender">Gender</label>
				<select name="gender" id="profile-gender"  class="custom-select browser-default" required>
					<option value="" disabled selected>Select Gender</option>
               <option value="male">Male</option>
               <option value="female">Female</option>
               <option value="other">Other</option>
            </select>
				<div class="invalid-feedback">
        Please Select Gender
      </div>
				
				
				</div>   
             </div>
		<div class="col-md-6">
            <div class="form-group field-profile-category required">
			
				        <label class="control-label" for="profile-category">Category</label>
			<select id="profile-category"  name="category" class="custom-select browser-default" required>
				<option value="" disabled selected>Select Category</option>							
				                                            
						<option value="Open Competition (Unreserved (UR))">Open Competition (Unreserved (UR))</option>
					                                            
						<option value="Other Backward Community (Non-Creamy layer)">Other Backward Community (Non-Creamy layer)</option>
					                                            
						<option value="Scheduled Caste">Scheduled Caste</option>
					                                            
						<option value="Scheduled Tribe">Scheduled Tribe</option>
					                                            
						<option value="Ezhava/Thiyya/ Billava (ETB)">Ezhava/Thiyya/ Billava (ETB)</option>
					                                            
						<option value="Muslim">Muslim</option>
					                                            
						<option value="Latin Catholic/Anglo Indian (LC/AI)">Latin Catholic/Anglo Indian (LC/AI)</option>
					                                            
						<option value="Dheevara">Dheevara</option>
					                                            
						<option value="Viswakarma">Viswakarma</option>
								</select><div class="invalid-feedback">
        Please Select Category
      </div>
						
			</div>   
 	  </div>
         </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group field-profile-countrycode">
<label class="control-label" for="profile-countrycode">Country Code</label>
<span class="form-group field-profile-countrycode required">
<select name="profile-countrycode" id="profile-countrycode"  class="custom-select browser-default" required>
  <?php 	for($i=0; $i<$max; $i++)  {	?>
  <option value="<?php echo $my_array[$i]['country_name'] ?>"><?php echo $my_array[$i]['country_name'] ?></option>
  <?php } ?>
</select>
</span>
<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                </div>
                <div class="col-md-3">
                    <div class="form-group field-profile-mobile required">
<label class="control-label" for="profile-mobile">Mobile No</label>
<input type="text" id="profile-mobile" class="form-control" name="profile-mobile" value="9495576751" maxlength="10" required="true" readonly="true">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                </div>
                <div class="col-md-6">
                    <div class="form-group field-profile-pwd required">
<label class="control-label" for="profile-pwd">PwBD category</label>
<select id="profile-pwd"  name="profile-pwd" required="true">
<option value="Not Applicable">Not Applicable</option>
<option value="vi">Visually Impaired(VI)</option>
<option value="ld">Locomotor Disability(LD)</option>
<option value="hi">Hearing Impaired (HI)</option>
</select>

<div class="invalid-feedback">      This field cannot be blank </div>
</div>                </div>
            </div>
<div class="row">
                <div class="col-md-3">
                    <div class="form-group field-profile-nationality required">
<label class="control-label" for="profile-nationality">Nationality</label>
<select id="profile-nationality"  name="profile-nationality" required="true" aria-invalid="false">
<option value="Indian">Indian</option>
<option value="Overseas Citizen of India(OCI)">Overseas Citizen of India(OCI)</option>
</select>
<div class="invalid-feedback">      This field cannot be blank </div>
</div>                </div>
                <div class="col-md-3"><div class="form-group">
                <label>Date of Birth</label> 

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
				                    <input type="date" id="profile-dob" name="profile-dob" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="">
				  								</select><div class="invalid-feedback">
        This field cannot be blank
      </div>
                </div>
              </div>
                </div>
                <div class="col-md-3" style="display: none">
                    <div class="form-group field-profile-age">
<label class="control-label" for="profile-age">Age on Date (01-01-2019)</label>
<input type="text" id="profile-age" class="form-control" name="profile-age" value="" readonly="" maxlength="50">

<div class="invalid-feedback">      This field cannot be blank </div>
</div>                </div>
                <div class="col-md-3">
                    <div class="form-group field-marital">
<label class="control-label" for="marital">Marital Status</label>
<select id="marital"  name="marital">
<option value="">Select</option>
<option value="1">Single</option>
<option value="2">Married</option>
</select>

<div class="invalid-feedback">      This field cannot be blank </div>
</div>                </div>
                <div class="col-md-3">
                    <div class="form-group field-profile-guardianname required">
<label class="control-label" for="profile-guardianname">Father's/Mother's  Name</label>
<input type="text" id="profile-guardianname" class="form-control" name="profile-guardianname" value="" maxlength="128" required="true">
								</select>
<div class="invalid-feedback">      This field cannot be blank </div>
</div>                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h4> Address for Correspondence </h4>
                    <div class="form-group field-profile-postaladd1 required">
<label class="control-label" for="profile-postaladd1">Address Line 1</label>
<input type="text" id="profile-postaladd1" class="form-control" name="profile-postaladd1" value="" maxlength="128" required="true">
								</select><div class="invalid-feedback">
        This field cannot be blank
</div>

</div>                    <div class="form-group field-profile-postaladd2 required">
<label class="control-label" for="profile-postaladd2">Address Line 2</label>
<input type="text" id="profile-postaladd2" class="form-control" name="profile-postaladd2" value="" maxlength="128"required="true">
								</select><div class="invalid-feedback">
        This field cannot be blank
</div>

</div>                   
  <div class="row">                     
                            <div class="col-md-6"><div class="form-group field-profile-postalcity required">
<label class="control-label" for="profile-postalcity">City</label>
<input type="text" id="profile-postalcity" class="form-control" name="profile-postalcity" value="" maxlength="128" required="true">
								</select><div class="invalid-feedback">
        This field cannot be blank
</div>

</div></div>

                            <div class="col-md-6"> <div class="form-group field-profile-postalstate required">
<label class="control-label" for="profile-postalstate">State</label>
<select id="profile-postalstate"  name="profile-postalstate" class="custom-select browser-default" required>
<option value="">Select</option>
                                            
						<option value="Outside India">Outside India</option>
					                                            
						<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
					                                            
						<option value="Andhra Pradesh">Andhra Pradesh</option>
					                                            
						<option value="Arunachal Pradesh">Arunachal Pradesh</option>
					                                            
						<option value="Assam">Assam</option>
					                                            
						<option value="Bihar">Bihar</option>
					                                            
						<option value="Chandigarh">Chandigarh</option>
					                                            
						<option value="Chhattisgarh">Chhattisgarh</option>
					                                            
						<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
					                                            
						<option value="Daman and Diu">Daman and Diu</option>
					                                            
						<option value="Delhi">Delhi</option>
					                                            
						<option value="Goa">Goa</option>
					                                            
						<option value="Gujarat">Gujarat</option>
					                                            
						<option value="Haryana">Haryana</option>
					                                            
						<option value="Himachal Pradesh">Himachal Pradesh</option>
					                                            
						<option value="Jammu and Kashmir">Jammu and Kashmir</option>
					                                            
						<option value="Jharkhand">Jharkhand</option>
					                                            
						<option value="Karnataka">Karnataka</option>
					                                            
						<option value="Kerala">Kerala</option>
					                                            
						<option value="Lakshadweep">Lakshadweep</option>
					                                            
						<option value="Madhya Pradesh">Madhya Pradesh</option>
					                                            
						<option value="Maharashtra">Maharashtra</option>
					                                            
						<option value="Manipur">Manipur</option>
					                                            
						<option value="Meghalaya">Meghalaya</option>
					                                            
						<option value="Mizoram">Mizoram</option>
					                                            
						<option value="Nagaland">Nagaland</option>
					                                            
						<option value="Odisha">Odisha</option>
					                                            
						<option value="Puducherry">Puducherry</option>
					                                            
						<option value="Punjab">Punjab</option>
					                                            
						<option value="Rajasthan">Rajasthan</option>
					                                            
						<option value="Sikkim">Sikkim</option>
					                                            
						<option value="Tamil Nadu">Tamil Nadu</option>
					                                            
						<option value="Telangana">Telangana</option>
					                                            
						<option value="Tripura">Tripura</option>
					                                            
						<option value="Uttar Pradesh">Uttar Pradesh</option>
					                                            
						<option value="Uttarakhand">Uttarakhand</option>
					                                            
						<option value="West Bengal">West Bengal</option>
					</select>

								</select><div class="invalid-feedback">
        This field cannot be blank
</div>
</div></div>
                       
                        
                            <div class="col-md-6"><div class="form-group field-profile-postalpin required">
<label class="control-label" for="profile-postalpin">Pin</label>
<input type="number" id="profile-postalpin" class="form-control" name="profile-postalpin" value="" maxlength="20" required="true">

<div class="invalid-feedback">      This field cannot be blank </div>
</div></div>
                            <div class="col-md-6">
                                <div class="form-group field-profile-postalcountry required">
<label class="control-label" for="profile-postalcountry">Country</label>
<span class="form-group field-profile-gender required">
<select name="profile-postalcountry" id="profile-postalcountry"  class="custom-select browser-default" required>
  <?php 	for($i=0; $i<$max; $i++)  {	?>
  <option value="<?php echo $my_array[$i]['country_name'] ?>"><?php echo $my_array[$i]['country_name'] ?></option>
  <?php } ?>
</select>
</span>
</select><div class="invalid-feedback">
        This field cannot be blank
</div>
</div></div></div>
                </div>
                <div class="col-md-6">
                    <h4>Permanent Address &nbsp;
                        <small>
                             <input type="checkbox" id="addresscheck" name="addresscheck" value="1"><label for="addresscheck"> &nbsp;Copy Address of Correspondence</label>                            
                        </small>
                    </h4>

                    <div class="form-group field-profile-permanentadd1 required">
<label class="control-label" for="profile-permanentadd1">Address Line 1</label>
<input type="text" id="profile-permanentadd1" class="form-control" name="profile-permanentadd1" value="" maxlength="128" required="true">

<div class="invalid-feedback">      This field cannot be blank </div>
</div>                    <div class="form-group field-profile-permanentadd2 required">
<label class="control-label" for="profile-permanentadd2">Address Line 2</label>
<input type="text" id="profile-permanentadd2" class="form-control" name="profile-permanentadd2" value="" maxlength="128" required="true">

<div class="invalid-feedback">      This field cannot be blank </div>
</div>                    <div class="row">
                        
                            <div class="col-md-6"><div class="form-group field-profile-permanentcity required">
<label class="control-label" for="profile-permanentcity">City</label>
<input type="text" id="profile-permanentcity" class="form-control" name="profile-permanentcity" value="" maxlength="128" required="true">

<div class="invalid-feedback">      This field cannot be blank </div>
</div></div>
                            <div class="col-md-6">  <div class="form-group field-profile-permanentstate required">
<label class="control-label" for="profile-permanentstate">State</label>
<select id="profile-permanentstate"  name="profile-permanentstate" class="custom-select browser-default" required>
<option value="">Select</option>
                                            
						<option value="">Select</option>
                                            
						<option value="Outside India">Outside India</option>
					                                            
						<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
					                                            
						<option value="Andhra Pradesh">Andhra Pradesh</option>
					                                            
						<option value="Arunachal Pradesh">Arunachal Pradesh</option>
					                                            
						<option value="Assam">Assam</option>
					                                            
						<option value="Bihar">Bihar</option>
					                                            
						<option value="Chandigarh">Chandigarh</option>
					                                            
						<option value="Chhattisgarh">Chhattisgarh</option>
					                                            
						<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
					                                            
						<option value="Daman and Diu">Daman and Diu</option>
					                                            
						<option value="Delhi">Delhi</option>
					                                            
						<option value="Goa">Goa</option>
					                                            
						<option value="Gujarat">Gujarat</option>
					                                            
						<option value="Haryana">Haryana</option>
					                                            
						<option value="Himachal Pradesh">Himachal Pradesh</option>
					                                            
						<option value="Jammu and Kashmir">Jammu and Kashmir</option>
					                                            
						<option value="Jharkhand">Jharkhand</option>
					                                            
						<option value="Karnataka">Karnataka</option>
					                                            
						<option value="Kerala">Kerala</option>
					                                            
						<option value="Lakshadweep">Lakshadweep</option>
					                                            
						<option value="Madhya Pradesh">Madhya Pradesh</option>
					                                            
						<option value="Maharashtra">Maharashtra</option>
					                                            
						<option value="Manipur">Manipur</option>
					                                            
						<option value="Meghalaya">Meghalaya</option>
					                                            
						<option value="Mizoram">Mizoram</option>
					                                            
						<option value="Nagaland">Nagaland</option>
					                                            
						<option value="Odisha">Odisha</option>
					                                            
						<option value="Puducherry">Puducherry</option>
					                                            
						<option value="Punjab">Punjab</option>
					                                            
						<option value="Rajasthan">Rajasthan</option>
					                                            
						<option value="Sikkim">Sikkim</option>
					                                            
						<option value="Tamil Nadu">Tamil Nadu</option>
					                                            
						<option value="Telangana">Telangana</option>
					                                            
						<option value="Tripura">Tripura</option>
					                                            
						<option value="Uttar Pradesh">Uttar Pradesh</option>
					                                            
						<option value="Uttarakhand">Uttarakhand</option>
					                                            
						<option value="West Bengal">West Bengal</option>
					</select>

<div class="invalid-feedback">      This field cannot be blank </div>
</div></div>
                        
                      
                            <div class="col-md-6"> <div class="form-group field-profile-permanentpin required">
<label class="control-label" for="profile-permanentpin">Pin</label>
<input type="number" id="profile-permanentpin" class="form-control" name="profile-permanentpin" value="" maxlength="20" required="true">

<div class="invalid-feedback">      This field cannot be blank </div>
</div></div>
                     <div class="col-md-6"> <div class="form-group field-profile-permanentcountry required">
<label class="control-label" for="profile-permanentcountry">Country</label>
<span class="form-group field-profile-gender required">
<select name="profile-permanentcountry" id="profile-permanentcountry"  class="custom-select browser-default" required>
  <?php 	for($i=0; $i<$max; $i++)  {	?>
  <option value="<?php echo $my_array[$i]['country_name'] ?>"><?php echo $my_array[$i]['country_name'] ?></option>
  <?php } ?>
</select>
</span>
<div class="invalid-feedback">      This field cannot be blank </div>
							</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="form-group">
               <div class="text-center">  
                 <button type="submit" id="profile-submit-btn" name="profile-submit-btn"  onclick="profile()"  class="btn btn-success" >Proceed to Next Section</button>   
               <button  id="profile-cancel-btn"  name="profile-cancel-btn"class="btn btn-default" href="">Cancel</button>               
               </div>
             </div>
        </div>
		</div>
    </form>
 </div>
 </div>
 </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="inn-title">
                                <h4>2.Academic Qualifications</h4>
                                
                            </div>
                            <div class="bor ad-cou-deta-h4">
<!--                            
                            <form id="user-profile-form"  action="profilesubmit.php"  method="post"  novalidate >
    -->                        
                                <form id="academic_quali_form" action="academicsubmit.php" method="post">
<div class="error-summary" style="display:none"><p>Please fix the following errors:</p><ul></ul></div>    <div class="panel panel-jui">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">
                    <div class="text-right">
                          <span><div class="form-group field-academic-totalpoints has-success">

<input type="hidden" id="academic-totalpoints" class="form-control" name="Academic[totalPoints]" value="0" aria-invalid="false">

<div class="invalid-feedback">      This field cannot be blank </div>
</div>Points :  <span id="x-total-points-acadmic-du">0</span> </span>
                        <!-- <span> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div id="jx-cont-acad-res"></div>
			            <table class="table table-striped">
                <tbody><tr>
                    <th style="width:10%;">Examination</th>
                    <th style="width:20%;">Name of Board</th>
                    <th style="width:25%;">Subject(s)</th>
                    <th style="width:10%;">Result Type</th>
                    <th style="width:10%;">Division</th>
                    <th style="width:10%;">Year</th>
                    <th style="width:22%;">School</th>
                </tr>
                <tr>

                    <th>Secondary</th>
                    <td> <div class="form-group field-academic-tenth_board required">

<input type="text" id="academic-tenth_board" class="form-control" name="tenth_board" required="true" value="">

<div class="invalid-feedback">      This field cannot be blank </div>
</div></td>
                    <td> <div class="form-group field-academic-tenth_subject required">

<input type="text" id="academic-tenth_subject" class="form-control" name="tenth_subject" maxlength="255" required="true" value="">

<div class="invalid-feedback">      This field cannot be blank </div>
</div></td>
                    <td> <div class="form-group field-academic-tenthresulttype required">

<select id="academic-tenthresulttype"   name="tenthResultType" required="true">
<option value="Percentage">Percentage</option>
<option value="Grade">Grade</option>
</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                    <td>
                        <div id="tenthPercent"><div class="form-group field-academic-temptenthpercentage">

<select id="academic-temptenthpercentage"  name="tempTenthPercentage">
<option value="">Select</option>
<option value="1">1st</option>
<option value="2">2nd</option>
<option value="3">3rd</option>
</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></div>
                        <div id="tenthGrade" style="display: none;"><div class="form-group field-academic-temptenthgrade">

<select id="academic-temptenthgrade"  name="tempTenthGrade">
<option value="">Select</option>
<option value="O">O</option>
<option value="A Only">A Only</option>
<option value="A Plus">A Plus</option>
<option value="A Minus">A Minus</option>
<option value="B Only">B Only</option>
<option value="B Plus">B Plus</option>
<option value="B Minus">B Minus</option>
<option value="C Only">C Only</option>
<option value="C Plus">C Plus</option>
<option value="C Minus">C Minus</option>
<option value="D">D Only</option>
<option value="E">E -Poor</option>
<option value="F">F Only</option>
</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></div>
                    </td>
                    <td> <div class="form-group field-academic-tenth_year required">

<select id="academic-tenth_year"  name="tenth_year" required="true">
<option value="">Select</option>
<option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option>

</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                    <td> <div class="form-group field-academic-tenth_school required">

<input type="text" id="academic-tenth_school" class="form-control" name="tenth_school" value="" maxlength="255" required="true">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                </tr>
                <tr>

                    <th>Sr. Secondary</th>
                    <td> <div class="form-group field-academic-twelfth_board required">

<input type="text" id="academic-twelfth_board" class="form-control" name="twelfth_board" value="" required="true">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                    <td> <div class="form-group field-academic-twelfth_subject required">

<input type="text" id="academic-twelfth_subject" class="form-control" name="twelfth_subject" value="" maxlength="255" required="true">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                    <td> <div class="form-group field-academic-twelfthresulttype required">

<select id="academic-twelfthresulttype"  name="twelfthResultType" required="true">
<option value="Percentage">Percentage</option>
<option value="Grade">Grade</option>
</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                    <td>
                        <div id="twelthPercent"><div class="form-group field-academic-temptwelthpercentage">

<select id="academic-temptwelthpercentage"  name="tempTwelthPercentage">
<option value="">Select</option>
<option value="1">1st</option>
<option value="2">2nd</option>
<option value="3">3rd</option>

</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></div>
                        <div id="twelthGrade" style="display: none;"><div class="form-group field-academic-temptwelthgrade">

<select id="academic-temptwelthgrade"  name="temptwelthgrade">
<option value="">Select</option>
<option value="O">O</option>
<option value="O">O</option>
<option value="A Only">A Only</option>
<option value="A Plus">A Plus</option>
<option value="A Minus">A Minus</option>
<option value="B Only">B Only</option>
<option value="B Plus">B Plus</option>
<option value="B Minus">B Minus</option>
<option value="C Only">C Only</option>
<option value="C Plus">C Plus</option>
<option value="C Minus">C Minus</option>
<option value="D">D Only</option>
<option value="E">E -Poor</option>
<option value="F">F Only</option>
</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></div>
                    </td>
                    <td> <div class="form-group field-academic-twelfth_year required">

<select id="academic-twelfth_year" name="twelfth_year" required="true">
<option value="">Select</option>
<option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option>
</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                    <td> <div class="form-group field-academic-twelfth_school required">

<input type="text" id="academic-twelfth_school" class="form-control" name="twelfth_school" value="" maxlength="255" required="true">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>

                </tr>
            </tbody></table>
			            <div id="form-area-tab-22">
                <div class="col-md-6">
                    <div class="form-group field-academic-qualification required">
<label class="control-label" for="academic-qualification">Qualification Pattern</label>
<select id="academic-qualification"  name="qualification" required="true">
<option value="1">UG + PG + M.Phil./Ph.D.</option>

</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>
                </div>
                <div class="col-md-6">
                    <div class="form-group field-academic-stream required">
<label class="control-label" for="academic-stream">Stream</label>
<select id="academic-stream"  name="stream" required="true">
<option value="">Select</option>
<option value="Faculty of Sciences / Engineering/ Agriculture / Medical / Veterinary Sciences">Faculty of Sciences / Engineering/ Agriculture / Medical / Veterinary Sciences</option>
<option value="Faculty of Languages / Humanities / Arts / Social Sciences / Library / Education / Physical Education / Commerce /  Management &amp; other related disciplines"></option>
</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>
                </div>
                <div class="row">

                    <table class="table" id="table-rec-acad-quali">
                        <tbody><tr>
                            <th style="width:10%;">Examination</th>
                            <th style="width:20%;">Name of Degree</th>
                            <th style="width:25%;">Subject(s)</th>
                            <th style="width:10%;">Overall Percentage<sup>*</sup></th>
                            <th style="width:10%;">Year</th>
                            <th style="width:22%;">University/Institute</th>
                            <th style="width:3%; display: none;">Points</th>
                        </tr>

                        <tr>

                            <th>Bachelor's Degree</th>
                                                            <td> <div class="form-group field-academic-ugcollege">

<select id="academic-ugcollege" name="ugcollege">
<option value="">Select</option>

                                            
						<option value="B.A.">B.A.</option>
					                                            
						<option value="B.A. (Hons)">B.A. (Hons)</option>
					                                            
						<option value="B.A. (Prog)">B.A. (Prog)</option>
					                                            
						<option value="B.Com.">B.Com.</option>
					                                            
						<option value="B.Com. (Hons)">B.Com. (Hons)</option>
					                                            
						<option value="B.Com. (Prog)">B.Com. (Prog)</option>
					                                            
						<option value="B.Ed.">B.Ed.</option>
					                                            
						<option value="LL.B. 3 yr Programme">LL.B. 3 yr Programme</option>
					                                            
						<option value="B.Sc">B.Sc.</option>
					                                            
						<option value="B.Sc. (Hons)">B.Sc. (Hons)</option>
					                                            
						<option value="B.Sc. (Prog)">B.Sc. (Prog)</option>
					                                            
						<option value="B.Tech.">B.Tech.</option>
					                                            
						<option value="B.E.">B.E.</option>
					                                            
						<option value="B.C.A.">B.C.A.</option>
					                                            
						<option value="Other Science Degree">Other Science Degree</option>
					                                            
						<option value="Other Arts/Commerce Degree">Other Arts/Commerce Degree</option>
					                                            
						<option value="LL.B. 5 Yr Integrated Programme">LL.B. 5 Yr Integrated Programme</option>
					                                            
						<option value="B.El.Ed.">B.El.Ed.</option>
					</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                                    <div class="form-group field-academic-ug_other_degree">

<input type="text" id="academic-ug_other_degree" class="form-control" name="ug_other_degree" value="" style="display: none;">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                                </td>
                                                        <td> <div class="form-group field-academic-ugsubject">

<input type="text" id="academic-ugsubject" class="form-control" name="ugsubject" value="" maxlength="255">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>

                            <td> <div class="form-group field-academic-ugpercentage">

<input type="text" id="academic-ugpercentage" class="form-control" name="ugpercentage" value="">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td> <div class="form-group field-academic-ugyear">
							<input type="hidden" id="academic-castid" name="Academic[castid]" value="0">
							<input type="hidden" id="academic-pwdstat" name="Academic[pwdstat]" value="0">
<select id="academic-ugyear"  name="ugyear">
<option value="">Select</option>
<option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option></select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td><div class="form-group field-academic-uguniversity">

<input type="text" id="academic-uguniversity" class="form-control" name="uguniversity" value="" maxlength="255">
 UG Points :  <span id="ug-acad-value">0</span>
<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td style="display: none;"><div class="form-group field-academic-ugpoints has-success">

<input type="hidden" id="academic-ugpoints" class="form-control" name="ugpoints" value="0" aria-invalid="false">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                               </td>

                        </tr>
                        <tr>
                            <th>Master's/Post Graduate Degree</th>
                                                            <td> <div class="form-group field-academic-pgcollege required">

<select id="academic-pgcollege"  name="pgcollege" required="true">
<option value="">Select</option>
                                            
						<option value="M.Com.">M.Com.</option>
					                                            
						<option value="M.Ed">M.Ed.</option>
					                                            
						<option value="LL.M. 1 Yr Programme">LL.M. 1 Yr Programme</option>
					                                            
						<option value="M.Sc.">M.Sc.</option>
					                                            
						<option value="M.Tech">M.Tech.</option>
					                                            
						<option value="M.E.">M.E.</option>
					                                            
						<option value="M.C.A.">M.C.A.</option>
					                                            
						<option value="Other Science Degree">Other Science Degree</option>
					                                            
						<option value="Other Arts/Commerce Degree">Other Arts/Commerce Degree</option>
					                                            
						<option value="LL.M. 2 Yr Programme">LL.M. 2 Yr Programme</option>
					                                            
						<option value="LL.M. 3 Yr Programme">LL.M. 3 Yr Programme</option>
					                                            
						<option value="M.A.">M.A.</option>
					</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                                    <div class="form-group field-academic-pg_other_degree">

<input type="text" id="academic-pg_other_degree" class="form-control" name="pg_other_degree" value="" style="display: none;">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                                </td>
                                                        <td><div class="form-group field-academic-pgsubject required">

<input type="text" id="academic-pgsubject" class="form-control" name="pgsubject" value="" maxlength="255" required="true">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td>  <div class="form-group field-academic-pgpercentage required">

<input type="text" id="academic-pgpercentage" class="form-control" name="pgpercentage" value="" required="true">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td>    <div class="form-group field-academic-pgyear required">

<select id="academic-pgyear"  name="pgyear" required="true">
<option value="">Select</option>
<option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option></select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td> <div class="form-group field-academic-pguniversity required">

<input type="text" id="academic-pguniversity" class="form-control" name="pguniversity" value="" maxlength="255" required="true">
PG Points : <span id="pg-acad-value">0</span>
<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td style="display: none;"><div class="form-group field-academic-pgpoints has-success">

<input type="hidden" id="academic-pgpoints" class="form-control" name="pgpoints" value="0" aria-invalid="false">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                                </td>
                        </tr>


                    </tbody></table>
                    <table class="table">
                        <tbody><tr>
                            <th rowspan="2">
                                <div>M.Phil.
                                </div> <div class="form-group field-academic-mphilna required has-success">
<label class="control-label"></label>
<input type="hidden" name="Academic[mphilval]" value="1" id="academic-mphilval">
<div id="academic-mphilna" role="radiogroup" required="true" aria-invalid="false">
<input type="radio"   class="filled-in" name="mphilna" value="false" selected="selected" id="mphilno"><label for="mphilno"> No</label>
 <input type="radio"  class="filled-in"  name="mphilna" value="true" id="mphilyes"><label for="mphilyes"> Yes</label></div>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                            </th>
                            <td colspan="6">
                                <div class="col-md-3 col-xs-6">
  <!--                                  <div class="form-group field-academic-mphilname" style="display: none;">
<label class="control-label" for="academic-mphilname">Please select the degree</label>
<select id="academic-mphilname"  name="Academic[mphilName]" disabled="">
<option value="">Select</option>
<option value="M.Phil.">M.Phil.</option>
</select>-->

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                                

                            </td>
                        </tr>
						                        <tr>
                            <td style="width:10%;">
                                <div class="form-group field-academic-mphilstartdate has-success" style="display: none;">
<label class="control-label" for="academic-mphilstartdate">Date of Registration/Admission</label>
<input type="text" id="academic-mphilstartdate" class="form-control hasDatepicker" name="mphilstartdate" value="01/01/1970" placeholder="Date of Registration" disabled="" aria-invalid="false">
<!-- <input type="text" id="academic-mphilstartdate" name="Academic[mphilStartDate]" class="form-control" value="<?//php echo dateFormat($results[0]->mphilStartDate);?>" data-inputmask="'alias': 'dd/mm/yyyy'" placeholder="Date of Registration" disabled="" data-mask>-->


<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>                            <td style="width:10%;"> <div class="form-group field-academic-mphilsubmissiondate" style="display: none;">
<label class="control-label" for="academic-mphilsubmissiondate">Date of Submission</label>
<input type="text" id="academic-mphilsubmissiondate" class="form-control hasDatepicker" name="mphilsubmissiondate" value="01/01/1970" placeholder="Date of Submission" disabled="">


<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>                            <td style="width:10%;"> <div class="form-group field-academic-mphilawarddate has-success" style="display: none;">
<label class="control-label" for="academic-mphilawarddate">Date of Award</label>
<input type="text" id="academic-mphilawarddate" class="form-control hasDatepicker" name="Academic[mphilAwardDate]" value="01/01/1970" placeholder="Date of Award" disabled="" aria-invalid="false">


<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td style="width:30%;"> <div class="form-group field-academic-mphilthesistitle" style="display: none;">
<label class="control-label" for="academic-mphilthesistitle">Thesis/Dissertation Title</label>
<textarea id="academic-mphilthesistitle" class="form-control" name="mphilthesistitle" rows="3" disabled=""></textarea>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td> <div class="form-group field-academic-mphiluniversity" style="display: none;">
<label class="control-label" for="academic-mphiluniversity">University/Institute</label>
<input type="text" id="academic-mphiluniversity" class="form-control" name="mphiluniversity" value="" maxlength="255" disabled="">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                                <div class="form-group field-academic-mphilpercentage" style="display: none;">
<label class="control-label" for="academic-mphilpercentage">Overall Percentage<!--/Grade Points <span style="font-size:10px">(Out of 10)</span>--></label>
<input type="text" id="academic-mphilpercentage" class="form-control" name="mphilpercentage" value="" disabled="">
Mphil Ponits : <span id="mphil-points-value">0</span>
<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td style="display: none;"> <div class="form-group field-academic-mphilpoints has-success">

<input type="hidden" id="academic-mphilpoints" class="form-control" name="mphilpoints" value="0" aria-invalid="false">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                               </td>

                        </tr>
						
						                        <tr>
                            <th rowspan="2" style="width:10%;">
                                <div>Ph.D.
                                </div> <div class="form-group field-academic-phdna required">
<label class="control-label"></label>
<input type="hidden" name="Academic[phdNA]" value="1" id="academic-phdval"><div id="academic-phdna" role="radiogroup" required="true">
<input type="radio" name="phdna" value="false" selected="selected"  id="phdno"= class="filled-in"><label for="phdno"> No</label>
<input type="radio" name="phdna" value="true" selected="selected" id="phdyes" class="filled-in"><label for="phdyes"> Yes</label></div>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                            </th>
                            <td style="width:10%;">
                                <div class="form-group field-academic-phdregdate has-success" style="display: none;">
<label class="control-label" for="academic-phdregdate">Date of Registration</label>
<input type="text" id="academic-phdregdate" class="form-control hasDatepicker" name="phdregdate" value="01/01/1970" placeholder="Date of Registration" aria-invalid="false">


<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>                            <td style="width:10%;"> <div class="form-group field-academic-phdsubdate" style="display: none;">
<label class="control-label" for="academic-phdsubdate">Date of Submission</label>
<input type="text" id="academic-phdsubdate" class="form-control hasDatepicker" name="phdsubdate" value="01/01/1970" placeholder="Date of Submission">


<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>                            <td style="width:10%;"> <div class="form-group field-academic-phdawarddate has-success" style="display: none;">
<label class="control-label" for="academic-phdawarddate">Date of Award</label>
<input type="text" id="academic-phdawarddate" class="form-control hasDatepicker" name="phdawarddate" value="01/01/1970" placeholder="Date of Award" aria-invalid="false">


<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td style="width:30%;"> <div class="form-group field-academic-phdthesistitle" style="display: none;">
<label class="control-label" for="academic-phdthesistitle">Thesis/Dissertation Title</label>
<textarea id="academic-phdthesistitle" class="form-control" name="phdthesistitle" rows="3" disabled="disabled"></textarea>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td style="width:20%;"><div class="form-group field-academic-phduniversity" style="display: none;">
<label class="control-label" for="academic-phduniversity">University/Institute</label>
<input type="text" id="academic-phduniversity" class="form-control" name="phduniversity" value="" maxlength="255" disabled="">
Ph.D Points : <span id="phd-points-value" class="dudnone">0</span>
<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td style="width:5%; display: none;"> <div class="form-group field-academic-phdpoints has-success">

<input type="hidden" id="academic-phdpoints" class="form-control" name="phdpoints" value="0" aria-invalid="false">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                                </td>

                        </tr>
                        

                        <tr style="display: none;">
                            <th>Other/Additional Qualification</th>
                            <td colspan="2">
                                <div class="form-group field-academic-otitle">
<label class="control-label" for="academic-otitle">Name of Degree / Certificate</label>
<textarea id="academic-otitle" class="form-control" name="Academic_oTitle" rows="3"></textarea>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td><div class="form-group field-academic-odatesub">
<label class="control-label" for="academic-odatesub">Date of Award</label>
<input type="text" id="academic-odatesub" class="form-control hasDatepicker" name="academic_odatesub" value="" readonly="" placeholder="Date of Award">


<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td><div class="form-group field-academic-odetails">
<label class="control-label" for="academic-odetails">Details</label>
<textarea id="academic-odetails" class="form-control" name="Academic_oDetails" rows="3"></textarea>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                            </td>
                            <td><div class="form-group field-academic-ouniversity">
<label class="control-label" for="academic-ouniversity">University/Institute</label>
<input type="text" id="academic-ouniversity" class="form-control" name="Academic_oUniversity" value="" rows="3">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                                <div class="form-group field-academic-opercentage">
<label class="control-label" for="academic-opercentage">Overall Percentage/Grade Points <span style="font-size:10px">(Out of 10)</span></label>
<input type="text" id="academic-opercentage" class="form-control" name="Academic_oPercentage" value="">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                            </td>
                            <td style="display: none;"></td>
                        </tr>
						  
                        <tr>
                            <th colspan="2">Whether Qualified UGC/CSIR NET/JRF <br></th>

                            <td></td>
                            <td> <div class="form-group field-academic-net required">
<label class="control-label" for="academic-net">UGC-CSIR NET</label>
<select id="academic-net"  name="net" required="true">
<option value="">Select</option>
<option value="1">NET with JRF</option>
<option value="2">NET</option>
<option value="3">SLET/SET</option>
<option value="4">None/Not Applicable</option>
<option value="5">Ph.D. from Foreign University</option>
</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td>

                                <div id="pns-net-subject"><div class="form-group field-academic-netsubject">
<label class="control-label" for="academic-netsubject">NET Subject</label>
<select id="academic-netsubject" name="netsubject">
<option value=""></option>
<option value="">Select</option>
                                            
						<option value="Adult Education/ Continuing Education/ Andragogy/ Non Formal Education">Adult Education/ Continuing Education/ Andragogy/ Non Formal Education</option>
					                                            
						<option value="Adult Education/ Continuing Education/ Andragogy/ Non Formal Education">Adult Education/ Continuing Education/ Andragogy/ Non Formal Education</option>
					                                            
						<option value="Agricultural Biotechnology">Agricultural Biotechnology</option>
					                                            
						<option value="Agricultural Business Management">Agricultural Business Management</option>
					                                            
						<option value="Agricultural Chemicals">Agricultural Chemicals</option>
					                                            
						<option value="Agricultural Economics">Agricultural Economics</option>
					                                            
						<option value="Agricultural Entomology">Agricultural Entomology</option>
					                                            
						<option value="Agricultural Extension">Agricultural Extension</option>
					                                            
						<option value="Agricultural Meteorology">Agricultural Meteorology</option>
					                                            
						<option value="Agricultural Microbiology">Agricultural Microbiology</option>
					                                            
						<option value="Agricultural Statistics">Agricultural Statistics</option>
					                                            
						<option value="Agricultural Structure and Process Engineering">Agricultural Structure and Process Engineering</option>
					                                            
						<option value="Agroforestry">Agroforestry</option>
					                                            
						<option value="Agronomy">Agronomy</option>
					                                            
						<option value="Animal Biochemistry">Animal Biochemistry</option>
					                                            
						<option value="Animal Biotechnology">Animal Biotechnology</option>
					                                            
						<option value="Animal Genetics &amp;amp; Breeding">Animal Genetics &amp;amp; Breeding</option>
					                                            
						<option value="Animal Nutrition">Animal Nutrition</option>
					                                            
						<option value="Animal Physiolog">Animal Physiology</option>
					                                            
						<option value="Animal Reproduction &amp;amp; Gynaecology">Animal Reproduction &amp;amp; Gynaecology</option>
					                                            
						<option value="Anthropology">Anthropology</option>
					                                            
						<option value="Aquaculture">Aquaculture</option>
					                                            
						<option value="Arab Culture and Islamic Studies">Arab Culture and Islamic Studies</option>
					                                            
						<option value="Arabic">Arabic</option>
					                                            
						<option value="Archaeology">Archaeology</option>
					                                            
						<option value="Assamese">Assamese</option>
					                                            
						<option value="Bengali">Bengali</option>
					                                            
						<option value="Bioinformatics">Bioinformatics</option>
					                                            
						<option value="Bodo">Bodo</option>
					                                            
						<option value="Buddhist, Jaina, Gandhian and Peace Studies">Buddhist, Jaina, Gandhian and Peace Studies</option>
					                                            
						<option value="Chemical Sciences">Chemical Sciences</option>
					                                            
						<option value="Chinese">Chinese</option>
					                                            
						<option value="Commerce">Commerce</option>
					                                            
						<option value="Comparative Literature">Comparative Literature</option>
					                                            
						<option value="Comparative Study of Religions">Comparative Study of Religions</option>
					                                            
						<option value="Computer Applications &amp;amp; IT">Computer Applications &amp;amp; IT</option>
					                                            
						<option value="Computer Science and Applications">Computer Science and Applications</option>
					                                            
						<option value="Criminology">Criminology</option>
					                                            
						<option value="Dairy Chemistry">Dairy Chemistry</option>
					                                            
						<option value="Dairy Microbiology">Dairy Microbiology</option>
					                                            
						<option value="Dairy Technology">Dairy Technology</option>
					                                            
						<option value="Defence and Strategic Studies">Defence and Strategic Studies</option>
					                                            
						<option value="Dogri">Dogri</option>
					                                            
						<option value="Earth Sciences">Earth Sciences</option>
					                                            
						<option value="Economic Botany &amp;amp; Plant Genetic Resources">Economic Botany &amp;amp; Plant Genetic Resources</option>
					                                            
						<option value="Economics">Economics</option>
					                                            
						<option value="Education">Education</option>
					                                            
						<option value="Electronic Science">Electronic Science</option>
					                                            
						<option value="Engineering Sciences">Engineering Sciences</option>
					                                            
						<option value="English">English</option>
					                                            
						<option value="Environmental Science">Environmental Science</option>
					                                            
						<option value="Environmental Sciences">Environmental Sciences</option>
					                                            
						<option value="Farm Machinery &amp;amp; Power">Farm Machinery &amp;amp; Power</option>
					                                            
						<option value="Fish Genetics &amp;amp; Breeding">Fish Genetics &amp;amp; Breeding</option>
					                                            
						<option value="Fish Health">Fish Health</option>
					                                            
						<option value="Fish Nutrition">Fish Nutrition</option>
					                                            
						<option value="Fish Processing Technology">Fish Processing Technology</option>
					                                            
						<option value="Fisheries Resource Management">Fisheries Resource Management</option>
					                                            
						<option value="Floriculture &amp;amp; Landscaping">Floriculture &amp;amp; Landscaping</option>
					                                            
						<option value="Folk Literature">Folk Literature</option>
					                                            
						<option value="Food Technology">Food Technology</option>
					                                            
						<option value="Forensic Science">Forensic Science</option>
					                                            
						<option value="French">French</option>
					                                            
						<option value="Fruit Science">Fruit Science</option>
					                                            
						<option value="Genetics &amp;amp; Plant Breeding">Genetics &amp;amp; Plant Breeding</option>
					                                            
						<option value="Geography">Geography</option>
					                                            
						<option value="German">German</option>
					                                            
						<option value="Gujarati">Gujarati</option>
					                                            
						<option value="Hindi">Hindi</option>
					                                            
						<option value="History">History</option>
					                                            
						<option value="Home Science">Home Science</option>
					                                            
						<option value="Home Science">Home Science</option>
					                                            
						<option value="Human Rights and Duties">Human Rights and Duties</option>
					                                            
						<option value="Indian Culture">Indian Culture</option>
					                                            
						<option value="International and Area Studies">International and Area Studies</option>
					                                            
						<option value="Japanese">Japanese</option>
					                                            
						<option value="Kannada">Kannada</option>
					                                            
						<option value="Kashmiri">Kashmiri</option>
					                                            
						<option value="Konkani">Konkani</option>
					                                            
						<option value="Labour Welfare/Personnel Management/Industrial Relations/ Labour and Social Welfare/Human Resource Management">Labour Welfare/Personnel Management/Industrial Relations/ Labour and Social Welfare/Human Resource Management</option>
					                                            
						<option value="Land &amp;amp; Water Management Engineering">Land &amp;amp; Water Management Engineering</option>
					                                            
						<option value="Law">Law</option>
					                                            
						<option value="Library and Information Science">Library and Information Science</option>
					                                            
						<option value="Life Sciences">Life Sciences</option>
					                                            
						<option value="Linguistics">Linguistics</option>
					                                            
						<option value="Livestock Product Technology">Livestock Product Technology</option>
					                                            
						<option value="Livestock Production Management">Livestock Production Management</option>
					                                            
						<option value="Maithili">Maithili</option>
					                                            
						<option value="Malayalam">Malayalam</option>
					                                            
						<option value="Management">Management</option>
					                                            
						<option value="Manipuri">Manipuri</option>
					                                            
						<option value="Manipuri">Manipuri</option>
					                                            
						<option value="Mass Communication and Journalism">Mass Communication and Journalism</option>
					                                            
						<option value="Mathematical Sciences">Mathematical Sciences</option>
					                                            
						<option value="Museology &amp;amp; Conservation">Museology &amp;amp; Conservation</option>
					                                            
						<option value="Music">Music</option>
					                                            
						<option value="Nematology">Nematology</option>
					                                            
						<option value="Nepali">Nepali</option>
					                                            
						<option value="Odia">Odia</option>
					                                            
						<option value="Pali">Pali</option>
					                                            
						<option value="Performing Arts ? Dance/Drama/Theatre">Performing Arts ? Dance/Drama/Theatre</option>
					                                            
						<option value="Persian">Persian</option>
					                                            
						<option value="Philosophy">Philosophy</option>
					                                            
						<option value="Physical Education">Physical Education</option>
					                                            
						<option value="Physical Sciences">Physical Sciences</option>
					                                            
						<option value="Plant Biochemistry">Plant Biochemistry</option>
					                                            
						<option value="Plant Pathology">Plant Pathology</option>
					                                            
						<option value="Plant Physiology">Plant Physiology</option>
					                                            
						<option value="Political Science">Political Science</option>
					                                            
						<option value="Population Studies">Population Studies</option>
					                                            
						<option value="Poultry Science">Poultry Science</option>
					                                            
						<option value="Prakrit">Prakrit</option>
					                                            
						<option value="Psychology">Psychology</option>
					                                            
						<option value="Public Administration">Public Administration</option>
					                                            
						<option value="Punjabi">Punjabi</option>
					                                            
						<option value="Rajasthani">Rajasthani</option>
					                                            
						<option value="Russian">Russian</option>
					                                            
						<option value="Sanskrit">Sanskrit</option>
					                                            
						<option value="Sanskrit Traditional Subjects">Sanskrit Traditional Subjects</option>
					                                            
						<option value="Seed Science &amp;amp; Technology">Seed Science &amp;amp; Technology</option>
					                                            
						<option value="Social Medicine &amp;amp; Community Health">Social Medicine &amp;amp; Community Health</option>
					                                            
						<option value="Social Work">Social Work</option>
					                                            
						<option value="Sociology">Sociology</option>
					                                            
						<option value="Soil Sciences">Soil Sciences</option>
					                                            
						<option value="Spanish">Spanish</option>
					                                            
						<option value="Spices, Plantation &amp;amp; Medicinal &amp;amp; Aromatic Plants">Spices, Plantation &amp;amp; Medicinal &amp;amp; Aromatic Plants</option>
					                                            
						<option value="Tamil">Tamil</option>
					                                            
						<option value="Telugu">Telugu</option>
					                                            
						<option value="Tourism Administration and Management">Tourism Administration and Management</option>
					                                            
						<option value="ribal and Regional Language/Literature">Tribal and Regional Language/Literature</option>
					                                            
						<option value="Urdu">Urdu</option>
					                                            
						<option value="Vegetable Science">Vegetable Science</option>
					                                            
						<option value="Veterinary Anatomy">Veterinary Anatomy</option>
					                                            
						<option value="Veterinary Medicine">Veterinary Medicine</option>
					                                            
						<option value="Veterinary Microbiology">Veterinary Microbiology</option>
					                                            
						<option value="Veterinary Parasitology">Veterinary Parasitology</option>
					                                            
						<option value="Veterinary Pathology">Veterinary Pathology</option>
					                                            
						<option value="Veterinary Pharmacology">Veterinary Pharmacology</option>
					                                            
						<option value="Veterinary Public Health">Veterinary Public Health</option>
					                                            
						<option value="Veterinary Surgery">Veterinary Surgery</option>
					                                            
						<option value="Visual Arts">Visual Arts</option>
					                                            
						<option value="Women Studies">Women Studies </option>
					</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div> </div>
                                <div id="pns-net-exe-block" style="display: none"><span style="color:red; ">
                                                                            </span>
                                </div>


                            </td>
                            <td>
                                <div id="pns-net-certificate"> <div class="form-group field-academic-netcertificateno">
<label class="control-label" for="academic-netcertificateno">Certificate No./Roll No.</label>
<input type="text" id="academic-netcertificateno" class="form-control" name="netcertificateno" maxlength="30" value="">
 NET Points : <span id="ugcnet-points-value">0</span>
<div class="invalid-feedback">      This field cannot be blank  </div>
</div></div>
                            </td>
                            <td style="display: none;"><div class="form-group field-academic-netpoints has-success">

<input type="hidden" id="academic-netpoints" class="form-control" name="netpoints" value="0" aria-invalid="false">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                               </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <div id="net-fr" style="display: none;">
                                    <table class="table table-bordered">
                                        <tbody><tr>
                                            <th>World University Ranking</th>
                                            <th>Rank</th>
                                            <th>Year</th>
                                        </tr>
                                        <tr>
                                            <td>Quacquarelli Symonds (QS)</td>
                                            <td><div class="form-group field-academic-qs_rank">
<label class="control-label" for="academic-qs_rank"></label>
<input type="text" id="academic-qs_rank" class="form-control" name="qs_rank" value="">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                                            <td><div class="form-group field-academic-qs_rank_year">
<label class="control-label" for="academic-qs_rank_year"></label>
<select id="academic-qs_rank_year" class="form-control" name="qs_rank_year">
<option value="">Select</option>
<option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option></select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                                        </tr>
                                        <tr>
                                            <td>Times Higher Education (THE)</td>
                                            <td><div class="form-group field-academic-the_rank">
<label class="control-label" for="academic-the_rank"></label>
<input type="text" id="academic-the_rank" class="form-control" name="the_rank" value="">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                                            <td><div class="form-group field-academic-the_rank_year">
<label class="control-label" for="academic-the_rank_year"></label>
<select id="academic-the_rank_year" class="form-control" name="the_rank_year">
<option value="">Select</option>
<option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option></select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                                        </tr>
                                        <tr>
                                            <td>Academic Ranking of World Universities (AWRU)</td>
                                            <td><div class="form-group field-academic-awru_rank">
<label class="control-label" for="academic-awru_rank"></label>
<input type="text" id="academic-awru_rank" class="form-control" name="Academic[awru_rank]" value="">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                                            <td><div class="form-group field-academic-awru_rank_year">
<label class="control-label" for="academic-awru_rank_year"></label>
<select id="academic-awru_rank_year" class="form-control" name="Academic[awru_rank_year]">
<option value="">Select</option>
<option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option></select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                                        </tr>

                                    </tbody></table>
                                </div>
                            </td>

                        </tr>
                                                <tr>
                            <td colspan="7">
                                <strong><sup> * </sup>Candidate with Grade Point Average result should convert it into
                                    overall percentage.</strong>
                            </td>
                        </tr>
                                            </tbody></table>
                </div>
                <div class="row">
                    <div class="col-md-12">
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <br>
            <div class="form-group text-center">
                <button type="submit" id="submitAcadmic" class="btn btn-warning" name="acadmic_submit">Save</button> &nbsp;
            </div>
        </div>
		<div class="panel-footer text-center">
                <a id="exp-next-btn-3" class="btn btn-success" href="experience_info.php">Proceed to Next Section</a>            </div>
    </div>
    </form>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div class="inn-title">
                                <h4>3.1 Teaching Experience after grant of PhD</h4>
                                
                            </div>
                            
                            <div class="bor ad-cou-deta-h4">
                                <form id="teachingexpform" action="http://hr.kannuruniversity.ac.in/JobAppln/experience_info.php#" method="post">
                                <div class="error-summary" style="display:none"><p>Please fix the following errors:</p><ul></ul></div>    <div class="panel panel-jui">
                
                    <span>Please leave the table blank if you do not have relevant experience. </span>
                <div class="box box-danger" id="container">
            
           
			 			<div class="box-body">
				<div class="form-group">
					<label>Name of Institution</label>
					<input type="text" id="institution[]" name="institution[]" class="form-control" placeholder="Enter ...">
				</div>
				<div class="form-group"><label>Designation</label><input class="form-control" type="text" id="desig[]" name="desig[]" placeholder="Enter..."></div>
			<div class="form-group">
			<label>Status</label><span class="style1">*</span>			
			<select  name="status[]" required="">
			<option value="">Select</option>
		    <option value="Permanent">Permanent</option>
	  		<option value="Ad-hoc">Ad-hoc</option>
			<option value="Temporary">Temporary</option>
	  		<option value="Contractual">Contractual</option></select>
					</div>
				<div class="form-group"><label>Pay Scale/Consolidated salary</label><input class="form-control" type="text" id="payScale[]" name="payScale[]" placeholder="Enter..."></div>
				<div class="form-group">
			<label>Programme</label><span class="style1">*</span>			
			<select  name="prgrm[]" required="">
			<option value="">Select</option>
		    <option value="Undergraduate">Undergraduate</option>
	  		<option value="Postgraduate">Postgraduate</option>
			<option value="Other">Other</option>
	  		</select>
					</div>
					<div class="form-group"><label>Course/Subject</label><input class="form-control" type="text" id="course[]" name="course[]" placeholder="Enter..."></div>
			<div class="form-group">
			<label>Work equivalent to Asst. Professor or higher</label><span class="style1">*</span>			
			<select name="wrkeq[]" required="">
			<option value="">Select</option>
		    <option value="Yes">Yes</option>
	  		<option value="No">No</option>
			</select>
			</div>
				<div class="row">
					<div class="col-xs-6"><label>From</label><input type="text" id="from[]" name="from[]" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask=""></div>
					<div class="col-xs-6"><label>To</label><input type="text" id="to[]" name="to[]" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask=""><input type="hidden" id="count" name="count" value="1" class="form-control"><hr></div>
				</div>
			</div>
			             <!-- /.box-body -->
          </div>
		 
		    <div class="box-body">
			<div class="row">
                <div class="col-xs-6">
				  <label></label>
                  <input type="button" id="add" value="Add" class="btn btn-primary">
                </div>
                <div class="col-xs-6">
				 <label></label>
                 <input type="button" id="del" value="Delete" class="btn btn-primary">
                </div>               
              </div>
			</div>  
			<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
	  
				</div>
				 <div class="box-footer">
				 
				<input type="submit" name="teachsubmit" value="Save" class="btn btn-warning">
				
              
              </div>
				</div>
			</div>
			</form>
			</div>
                            
                        </div>
                         <div id="menu10" class="tab-pane fade">
                            <div class="inn-title">
                                <h4> 3.2 Research Experience after PhD</h4>
                                
                            </div>
                            
                            <div class="bor ad-cou-deta-h4">
                                
                                
                
                  
            <form id="resexpform" action="#" method="post">
			<div class="error-summary" style="display:none"><p>Please fix the following errors:</p><ul></ul></div>    <div class="panel panel-jui">
			<span>Please leave the table blank if you do not have relevant experience. </span>
			  <div class="box box-danger" id="rescontainer">
            <div class="box-header with-border">
              <h3 class="box-title">Research Experience after PhD</h3>
            </div>
             			<div class="box-body">
			    <div class="form-group">
                  <label>University/Institute/Industry</label>
                  <input type="text" name="resinstitution[]" class="form-control" placeholder="Enter ...">
                </div>
			  <div class="form-group">
			  <label>Designation</label>                 
                  <input type="text" name="rdesignation[]" class="form-control" placeholder="Enter ...">
                </div>
				 <div class="form-group">
			  <label>Pay scale/consolidated salary</label>                 
                  <input type="text" name="rsalary[]" class="form-control" placeholder="Enter ...">
                </div>
				<div class="form-group">
			<label>Work equivalent to Asst. Professor or higher</label><span class="style1">*</span>			
			<select  name="rwrkeq[]" required="">
			<option value="">Select</option>
		    <option value="Yes">Yes</option>
	  		<option value="No">No</option>
			</select>
			</div>
				 
				<div class="row">
                <div class="col-xs-6">
				  <label>From</label>
                  <input type="text" class="form-control" name="resfromdate[]" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" required="" data-mask="">
                </div>
                <div class="col-xs-6">
				 <label>To</label>
                  <input type="text" class="form-control" name="restodate[]" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" required="" data-mask="">
				  <input type="hidden" id="rescount" name="rescount" value="1" class="form-control">
                </div>
               
              </div>
			</div>
			            <!-- /.box-body -->
          </div>
		  <div class="box-body">
			<div class="row">
                <div class="col-xs-6">
				  <label></label>
                  <input type="button" id="addres" value="Add" class="btn btn-primary">
                </div>
                <div class="col-xs-6">
				 <label></label>
                 <input type="button" id="delres" value="Delete" class="btn btn-primary">
                </div>               
              </div>
			</div>
		  
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
	  
				</div>
				 <div class="box-footer">
				 
				<input type="submit" name="ressubmit" value="Save" class="btn btn-warning">
				
              
              </div>
				</div>
		  
                </div>
				</form>
                
		
		      
			
			</div>
			
			</div>
                            
                       
                        <div id="menu3" class="tab-pane fade">
                            <div class="inn-title">
                                <h4> 4. Research Publications in Peer-Reviewed or UGC listed journals</h4>
                               
                            </div>
                            <div class="bor ad-cou-deta-h4">
                               <form id="researchform" action="http://hr.kannuruniversity.ac.in/JobAppln/research_ugclis.php#" method="post">
 
    <div class="panel panel-jui">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-10">
                 
                </div>
                <div class="col-md-2 text-right" style="display:none;">
                    Research Score:  : <span id="total-points-teachexp-du"> </span>


                </div>

            </div>
        </div>
        <div class="panel-body">
          
            <div class="row">
                <div class="col-md-12">
                  
                <div class="box box-danger" id="container">
            
            			<div class="box-body">
			 <div class="row">
			  <div class="col-md-3">
				<div class="form-group">
					<label>Publication Type</label>
					
					<select id="researcharticle-pubtype"  name="pubType[]" required="true">
<option value="">Select</option>
<option value="Peer Reviewed">Peer Reviewed</option>
<option value="UGC Listed">UGC Listed</option>
</select>
				</div>
				<div class="form-group"><label>Title of the Paper</label><textarea id="researcharticle-title" class="form-control" name="title[]" row="2" required="true"></textarea></div>
				<div class="form-group"><label>Journal Name</label><input type="text" id="researcharticle-journalno" class="form-control" name="journalNo[]" maxlength="255" required="true"></div>
				
				
				</div>
				<div class="col-md-3">
				<div class="form-group"><label>Year</label><select id="researcharticle-year"  name="year[]" required="true">
<option value=""></option>
<option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option></select></div>
				<div class="form-group"><label>Vol. No.</label><input type="text" id="researcharticle-volume" class="form-control" name="volume[]" maxlength="10" required="true"></div>
				<div class="form-group"><label>Page No.</label><input type="text" id="researcharticle-pageno" class="form-control" name="pageNo[]" maxlength="10" required="true"></div>
				
				</div>
				<div class="col-md-3">
				<div class="form-group"><label>ISSN No.</label><input type="text" id="researcharticle-issnisbnno" class="form-control" name="issnIsbnNo[]" maxlength="100" required="true"></div>
				<div class="form-group"><label>Impact Factor</label><select id="researcharticle-impactfactor"  name="impactFactor[]" required="true">
<option value="">Select</option>
<option value="no">No Impact factor</option>
<option value="1">less than 1</option>
<option value="2">between 1 and 2</option>
<option value="5">between 2 and 5</option>
<option value="10">between 5 and 10</option>
<option value="11">above 10</option>
</select></div>
				<div class="form-group"><label>SCOPUS Indexed</label><select id="researcharticle-scopus"  name="scopus[]" required="true">
<option value="">Select</option>
<option value="yes">Yes</option>
<option value="no">No</option>
</select></div>
				
				</div>
				<div class="col-md-3">
				<div class="form-group"><label>Authorship</label><select id="researcharticle-author"  name="author[]" required="true">
<option value="">Select</option>
<option value="1">Single Author</option>
<option value="2">One of the two author/ First and  Principal/Corresponding author</option>
<option value="3">Other/Joint Author</option>
</select></div>
				
				
				</div>
				</div>
			</div>
			            <!-- /.box-body -->
          </div>
		 
		    <div class="box-body">
			<div class="row">
                <div class="col-xs-6">
				  <label></label>
                  <input type="button" id="add" value="Add" class="btn btn-primary">
                </div>
                <div class="col-xs-6">
				 <label></label>
                 <input type="button" id="del" value="Delete" class="btn btn-primary">
                </div>               
              </div>
			</div>  
			<div class="panel-heading">
            
        </div>
			  
		  
		  
        
		  
                </div>
            </div>
			<div class="row">
	  <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
	  
				</div>
				 <div class="box-footer">
				 
				<input type="submit" name="submit" value="Save" class="btn btn-warning">
              
              </div>
				</div>
	  </div>
	  <div class="row">
	 <div class="panel-footer text-center">
	                 <a id="exp-next-btn-3" class="btn btn-success" href="http://hr.kannuruniversity.ac.in/JobAppln/awards_fellowship.php">Proceed to Next Section</a>    
								        </div>
	  </div>
            <br>
            
        </div>
    </div>

    

	
	
	</form>
	
                            </div>
                        </div>
                        <div id="menu4" class="tab-pane fade">
                            <div class="inn-title">
                                <h4> 5.Awards  </h4>
                                
                            </div>
                            <div class="bor">
                               <form id="researchform" action="http://hr.kannuruniversity.ac.in/JobAppln/awards_fellowship.php#" method="post">

    <div class="panel panel-jui">
        
        <div class="panel-body">
            <div id="teachingexpcontent">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span  style="color:#FF0000" >Please leave this section blank, if you have not received any honor or award. </span>
                <div class="box box-danger" id="container">
            <div class="box-header with-border">  	 	 
              
			  			   <span>International/National : (Awards given by International Organizations/Government of India/Government of India recognized National Level Bodies) <br> State Level :  (Awards given by State Government) . </span>
			               </div>
           <br>
           <br>
			 			<div class="box-body">
				<div class="form-group">
					<label>Name of Awarding Body</label>
					<input type="text" id="awardBody[]" name="awardBody[]" class="form-control" placeholder="Enter ...">
				</div>
				<div class="form-group"><label>Name of Award/Honor</label><input class="form-control" type="text" id="awardName[]" name="awardName[]" placeholder="Enter..."></div>
				<div class="form-group"><label>Date</label><input type="text" id="awardDate[]" name="awardDate[]" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask=""></div>
			<div class="form-group">
			<label>Level</label>		
			<select name="awardLevel[]" required="">
			<option value="">Select</option>
		    <option value="International">International</option>
	  		<option value="National">National</option>
						<option value="State">State</option>
						</select>
					</div>
				</div>
		
			             <!-- /.box-body -->
          </div>
		 
		    <div class="box-body">
			<div class="row">
                <div class="col-xs-6">
				  <label></label>
                  <input type="button" id="add" value="Add" class="btn btn-primary">
                </div>
                <div class="col-xs-6">
				 <label></label>
                 <input type="button" id="del" value="Delete" class="btn btn-primary">
                </div>               
              </div>
			</div>  
			</div>
	
            
                </div>
            </div>
			</div>
			<div class="row">
	  <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
	  
				</div>
				 <div class="box-footer">
				 
				<input type="submit" name="awardsubmit" value="Save" class="btn btn-warning">
              
              </div>
				</div>
	  </div>
	  <div class="row">
	 <div class="panel-footer text-center">
                <a id="exp-next-btn-3" class="btn btn-success" href="http://hr.kannuruniversity.ac.in/JobAppln/noobjection.php">Proceed to Next Section</a>            </div>
	  </div>
            <br>

	
	</form>
                            </div>
                        </div>
<div id="menu5" class="tab-pane fade">
                            <div class="inn-title">
                                <h4>6. No Objection Certificate</h4>
                                
                            </div>
                            <div class="bor">
                                <form id="user-noc-form" action="http://hr.kannuruniversity.ac.in/JobAppln/noobjection.php" method="post">
    <div class="panel panel-jui">
       

        <div class="panel-body">
            <div id="jx-noc-content"></div>
           <div id="form-area-tab-61">
                <div class="row">
				                    <div class="col-md-10">Please select the check box if NOC is not available (Advance Copy)<div class="form-group field-profile-nocna">

<input type="hidden" name="Profile[nocNA]" value="0"><input type="checkbox" id="profile-nocna" name="nocna" value="0"> <label for="profile-nocna"></label>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div> </div>
                </div>
                <div id="jx-noc-disp-cont" style="display: none;"><div class="nared">I shall produce the No Objection Certificate before/at the time of Interview. </div></div>
                <br>
                <br>
                <div id="noc-NAform-div" style="">
                    <div> Forwarded with the remarks that the facts stated in the above application have been verified
                        and found correct and
                        this Institution/ Organization has no objection to the candidature of the applicant being
                        considered for the post applied for.
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group field-profile-nochead">
<label class="control-label" for="profile-nochead">Name of Head of Institution</label>
<input type="text" id="profile-nochead" class="form-control" name="nochead" maxlength="255" value="">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                            <div class="form-group field-profile-nocdesignation">
<label class="control-label" for="profile-nocdesignation">Designation</label>
<input type="text" id="profile-nocdesignation" class="form-control" name="nocdesignation" value="" maxlength="255">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                            <div class="form-group field-profile-nocaddress">
<label class="control-label" for="profile-nocaddress">Address</label>
<textarea id="profile-nocaddress" class="form-control" name="nocaddress" rows="3"></textarea>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                        </div>
                        <div class="col-xs-6">
                            <div class="form-group field-profile-nocplace">
<label class="control-label" for="profile-nocplace">Place</label>
<input type="text" id="profile-nocplace" class="form-control" name="nocplace" value="">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                            <div class="form-group field-profile-nocdate">
<label class="control-label" for="profile-nocdate">Date</label>
<input type="text" id="profile-nocdate" class="form-control hasDatepicker" name="nocdate" value="" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="">


<div class="invalid-feedback">      This field cannot be blank  </div>
</div>
                        </div>
                    </div>
                </div>
               

            </div>


        </div>
        <div class="panel-footer">
            <div class="form-group text-center">
                                <button type="submit" id="noc-submit-btn" name="noc-submit-btn" class="btn btn-warning">Save</button>                &nbsp;
               
            </div>
        </div>
    </div>
    </form>
                            </div>
                        </div>
                        <div id="menu6" class="tab-pane fade">
                            <div class="inn-title">
                                <h4>Please upload certificates</h4>
                                
                            </div>
                            <div class="bor">
                                <div id="jui-content-wrapper">
        <div id="jui-messages">
                                                        </div>
                <div id="jui-content">
            <div class="">
        <div class="panel panel-jui">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-12"> 
                    <small>(Only images/pdf files of max size 100KB each are accepted)</small>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
						 <table class="table">
                    <tbody>
										 <form action="http://hr.kannuruniversity.ac.in/JobAppln/uploads.php" method="post" enctype="multipart/form-data"></form>
					<tr><td>Photo (Only jpg/jpeg/png files of max size 100KB each are accepted)</td>
					  <td>&nbsp;</td>
					  <td><input id="fileupload7" class="fileupload" type="file" name="photo" required=""></td>
					  <td></td>
					  <td>  <button type="submit" id="Submit" class="btn btn-primary btn-block btn-lg" name="photo-submit">Upload</button></td></tr> 
					   <form action="http://hr.kannuruniversity.ac.in/JobAppln/uploads.php" method="post" enctype="multipart/form-data"></form>
					<tr><td>Sign (Only jpg/jpeg/png files of max size 100KB each are accepted)</td>
					  <td>&nbsp;</td>
					  <td><input id="fileupload8" class="fileupload" type="file" name="sign" required=""></td>
					  <td></td>
					  <td>  <button type="submit" id="Submit" class="btn btn-primary btn-block btn-lg" name="sign-submit">Upload</button></td></tr> 
					   <form action="http://hr.kannuruniversity.ac.in/JobAppln/uploads.php" method="post" enctype="multipart/form-data"></form>
					<tr><td>SSLC / Class 10<sup>th</sup> Certificate (Indicating DOB)</td>
					  <td>&nbsp;</td>
					  <td><input id="fileupload9" class="fileupload" type="file" name="sslccertificate" required=""></td>
					  <td></td>
					  <td>  <button type="submit" id="Submit" class="btn btn-primary btn-block btn-lg" name="sslccertificate-submit">Upload</button></td></tr> 
					 <form action="http://hr.kannuruniversity.ac.in/JobAppln/uploads.php" method="post" enctype="multipart/form-data"></form>
					<tr><td>UG Certificate</td>
					  <td>&nbsp;</td>
					  <td><input id="fileupload1" class="fileupload" type="file" name="ugcertificate" required=""></td>
					  <td></td>
					  <td>  <button type="submit" id="Submit" class="btn btn-primary btn-block btn-lg" name="ug-submit">Upload</button></td></tr> 
					   <form action="http://hr.kannuruniversity.ac.in/JobAppln/uploads.php" method="post" enctype="multipart/form-data"></form>
					   
                    <tr>
                        <td>PG Certificate</td>
                        <td>&nbsp;</td>
                        <td><input id="fileupload2" class="fileupload" type="file" name="pgcertificate" required=""></td>
                        <td></td>
                        <td> <button type="submit" id="Submit" class="btn btn-primary btn-block btn-lg" name="pg-submit">Upload</button></td>		</tr> 
																		<form action="http://hr.kannuruniversity.ac.in/JobAppln/uploads.php" method="post" enctype="multipart/form-data"></form>
											   <tr>
                        <td>Net</td>
                        <td>&nbsp;</td>
                        <td><input id="fileupload5" class="fileupload" type="file" name="netcertificate" required=""></td>
                        <td></td>
                        <td><button type="submit" id="Submit" class="btn btn-primary btn-block btn-lg" name="net-submit">Upload</button></td></tr>
						
												<form action="http://hr.kannuruniversity.ac.in/JobAppln/uploads.php" method="post" enctype="multipart/form-data"></form>					
					 <tr>
                        <td>Community Certificate</td>
                        <td>&nbsp;</td>
                        <td><input id="fileupload6" class="fileupload" type="file" name="castcertificate" required=""></td>
                        <td></td>
                        <td><button type="submit" id="Submit" class="btn btn-primary btn-block btn-lg" name="cast-submit">Upload</button></td></tr>
							
												<form action="http://hr.kannuruniversity.ac.in/JobAppln/uploads.php" method="post" enctype="multipart/form-data"></form>					
					 <tr>
                        <td>PWBD Certificate</td>
                        <td>&nbsp;</td>
                        <td><input id="fileupload7" class="fileupload" type="file" name="pwdcertificate" required=""></td>
                        <td></td>
                        <td><button type="submit" id="Submit" class="btn btn-primary btn-block btn-lg" name="pwd-submit">Upload</button></td></tr>
						
																		<form action="http://hr.kannuruniversity.ac.in/JobAppln/uploads.php" method="post" enctype="multipart/form-data"></form>					
					 <tr>
                        <td>Teaching Experience (Max size 1MB )</td>
                        <td>&nbsp;</td>
                        <td><input id="fileupload8" class="fileupload" type="file" name="teahcertificate" required=""></td>
                        <td></td>
                        <td><button type="submit" id="Submit" class="btn btn-primary btn-block btn-lg" name="teach-submit">Upload</button></td></tr>
						
						<form action="http://hr.kannuruniversity.ac.in/JobAppln/uploads.php" method="post" enctype="multipart/form-data"></form>					
					 <tr>
                        <td>Research Experience (Max size 1MB )</td>
                        <td>&nbsp;</td>
                        <td><input id="fileupload9" class="fileupload" type="file" name="resrcertificate" required=""></td>
                        <td></td>
                        <td><button type="submit" id="Submit" class="btn btn-primary btn-block btn-lg" name="resh-submit">Upload</button></td></tr>
						
													<form action="http://hr.kannuruniversity.ac.in/JobAppln/uploads.php" method="post" enctype="multipart/form-data"></form>					
					 <tr>
                        <td>No objection Certificate (Max size 100KB )</td>
                        <td>&nbsp;</td>
                        <td><input id="fileupload10" class="fileupload" type="file" name="noobj" required=""></td>
                        <td></td>
                        <td><button type="submit" id="Submit" class="btn btn-primary btn-block btn-lg" name="noobj-submit">Upload</button></td></tr>
						
										  </tbody></table>
				  
				  </div>
				  
            </div>
			
			
        </div>
    </div>
<div class="row">
	 <div class="panel-footer text-center">
                <a id="exp-next-btn-3" class="btn btn-success" href="http://hr.kannuruniversity.ac.in/JobAppln/feedetails.php">Proceed to Next Section</a>            </div>
	  </div>
    
                <hr>

    

        
    
    
</div>

        </div>
                            </div>
                        </div>
                        <div id="menu7" class="tab-pane fade">
                            <div class="inn-title">                          <h4>	
Payment</h4>
                                
                            <div class="bor">
                                <form id="user-profile-form" action="http://hr.kannuruniversity.ac.in/JobAppln/feedetails.php#" method="post">
			 
   <div class="panel panel-jui">
        <div class="panel-heading">
            <div class="row">
			  			       
		
		
								<table class="table table-bordered" width="100%">
            <tbody><tr>
                <th>Post</th>
                <td>Assistant Professor</td>
                <td colspan="5" rowspan="3"> <p class="lead">Payment Method :</p>
         <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            <img src="./Recruitment Portal _ Kannur University8_files/sbi.jpg" alt="" width="170">          </p></td>

            </tr>
            <tr>
                <th>Department</th>
                <td>Department of Information Technology</td>
                </tr>
				<tr>
                <th>Application Number</th>
                <th>10915</th>
                </tr>
				
			<tr>
              
                 <th> Fee Category </th>
                 <td>Job Application  - Teaching Departments(SC/ST/PWBD)</td>
                 <th>Application Fee</th>
                 <td>1000</td>
                <td><p><a href="https://www.onlinesbi.com/sbicollect/icollecthome.htm?corpID=806785" target="_blank" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Pay Now</a></p></td>
			</tr>
        </tbody></table>
		                <div class="col-md-10">
                    1. Update Fee details 
                </div>

            </div>
        </div>
        <div class="panel-body">
            <div id="jx-profile-content"></div>
            
			<div class="row">
              <div class="col-md-6">				
                    <div class="form-group field-profile-firstname required">
					<label class="control-label" for="profile-dunum">DU-Number / Bank Ref-Number</label>
					<input type="hidden" name="feeamnt" value="1000">
					<input type="text" id="profile-dunum" class="form-control" name="dunum" maxlength="128" required="true" aria-invalid="false" value="" >

					<div class="invalid-feedback">      This field cannot be blank  </div>
				</div> 
		     </div>
 			<div class="col-md-6">
                <div class="form-group field-profile-gender required">
				<label class="control-label" for="profile-gender">Transaction Date</label>
				 <input type="text" name="transDate" class="form-control" value="" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" required="" data-mask="">
				<div class="invalid-feedback">      This field cannot be blank  </div>
				</div>   
             </div>
		


               
                
            </div>
			
           
            
            

            <hr>
            


        </div>
        <div class="panel-footer">
            <div class="form-group">
                <div class="text-center"><button type="submit" id="profile-payemnt-btn" name="profile-payemnt-btn" class="btn btn-warning">Save</button>                    &nbsp;
                                </div>

            </div>
        </div>
		    </div>
    </form>
                            </div>
                        </div></div>
                        <div id="menu8" class="tab-pane fade">
                            <div class="inn-title">
                                <h4>Contact Info</h4>
                                <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>
                            </div>
                            <div class="bor">
                                <div class="active tab-pane" id="general">
                <!-- Post -->
              
                <!-- /.post -->

                <!-- Post -->
              <div class="row">
    <div class="col-md-12">
              <table class="table table-bordered" width="100%">
            <tbody><tr>
                <td valign="top" width="60%"><table class="table table-bordered" width="100%">
                  <tbody>
                    <tr>
                      <th>Post</th>
                      <td>Assistant Professor</td>
                    </tr>
                    <tr>
                      <th>Department</th>
                      <td>Department of Information Technology</td>
                    </tr>
					<tr>
                      <th>Application Number</th>
                      <td>10915</td>
                    </tr>
					                  </tbody>
                </table></td>
                <td width="20%" align="center" valign="middle"><img src="./Recruitment Portal _ Kannur University9_files/saved_resource" width="150"></td>
  <td width="20%" align="center" valign="middle"><img src="./Recruitment Portal _ Kannur University9_files/saved_resource(1)" width="150"></td>
            </tr>
        </tbody></table>
                                <div class="panel panel-jui">
                <div class="panel-heading">
                    <strong>
                        Summary of points earned for Educational Qualifications and Research Score as per the UGC guidelines
                    </strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped table-bordered">
                            <tbody><tr>
                                <th>S.No.</th>
                                <th>Academic Record</th>
                                <th>Academic Score Claimed (Category wise)</th>
                                <th>Academic Score Earned (As per guidelines)</th>
                            </tr>


                            <tr>
                                <td>1</td>
                                <td>Graduation</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Post Graduation</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
										  <td>3</td>
                                <td>M.Phil</td>
                                <td></td>
                                <td rowspan="2">	 Mphil + PhD (Maximum Marks : 30)<br><br>	</td>
                            </tr>
							 		 <tr>
								<td>4</td>
                                <td>Ph.D</td>
                                <td></td>
                              </tr>
							
                            <tr>
							                            
								<td>5</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
							
														  <tr>
                                <td>7</td>
                                <td> Research Publications(2 marks for each research publications published in Peer-Reviewed or UGC listed journals)</td>
                                <td></td>
                                <td>
								</td>
                            </tr>
                             <tr>
                                <td>8</td>
                                <td>Teaching/Post-Doctoral Experience</td>
                                <td>Teaching Exp : 0 (0 years - 0 months)<br>Research Exp : 0 (0 years - 0 months)<br>Total Exp :(0 years - 0 months)<br>Total Exp Score: 0 </td>
                                <td>0</td>
                            </tr>
                           
 <tr>
								<td>8</td>
                                <td>Awards </td>
                                <td></td>
                                <td> (Maximum Marks :3)</td>
                            </tr>
                            
							
                            <tr>
                                <td></td>
                                <td><strong>Research Score earned as per UGC guidelines </strong></td>
                                <td>0</td>
                                <td><strong>0</strong></td>
                            </tr>
                        </tbody></table>
                       

                    </div>
                </div>
            </div>
               <div class="panel panel-jui">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-10">
                1. Personal details
                          </div>
            <div class="col-md-2 text-right">
                    <span> <a class="btn btn-info rmprint" href="http://hr.kannuruniversity.ac.in/JobAppln/general_info.php">Edit Details</a>                    </span>

            </div>
        </div>
    </div>
    <div class="panel-body">
                    <div id="jx-profile-content"></div>
            <div>
			                <table class="table table-striped" id="profile-display-table" style="width:100%">
                    <tbody><tr>
                        <td>Full Name</td>
                        <td></td>

                        <td>Gender</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td><br>PWD:</td>

                        <td>Nationality</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Date of Birth / Age</td>
                        <td>30-11--0001 /  Age  : </td>
                        <td>Father's/Mother's Name</td>
                        <td></td>

                    </tr>
                    <tr>

                        <td>Marital Status</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>anupama@tutorcomp.com </td>
                        <td>Mobile No</td>
                        <td>9495576751</td>
                    </tr>
                    <tr>
                        <td>Address for Correspondence</td>
                        <td><br>
                            <br>
                            ,
                             <br>
                            0,
                             <br>
                        </td>
                        <td>Permanent Address</td>
                         <td><br>
                            <br>
                            ,
                             <br>
                            0,
                             <br>
                        </td>
                    </tr>
                </tbody></table>
			            </div>
            </div>
    
</div>


<div class="panel panel-jui">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-6">
                2. Academic Qualifications
                  : This section is incomplete               </div>
            <div class="col-md-6">
                <div class="text-right">
                                        <span> <a class="btn btn-info rmprint" href="http://hr.kannuruniversity.ac.in/JobAppln/education_info.php">Edit Details</a> 
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
	<!--Start here-->
	<div id="form-area-tab-22">
                <div class="col-md-6">
                    <div class="form-group field-academic-qualification required">
<label class="control-label" for="academic-qualification">Qualification Pattern</label>

</div>
                </div>
                <div class="col-md-6">
                    <div class="form-group field-academic-stream required">
<label class="control-label" for="academic-stream">Stream</label>


</div>
                </div>
                <div class="row">
                   	<table class="table table-striped" border="1" width="100%" style="page-break-inside: avoid;border: 1px solid black;border-collapse:collapse;">
                        <thead> <tr bordercolor="#666666" bgcolor="#B5DCE8">
                            <th style="width:10%;page-break-inside: avoid;border: 1px solid black;">Examination</th>
                            <th style="width:20%;page-break-inside: avoid;border: 1px solid black;">Name of Degree</th>
                            <th style="width:25%;page-break-inside: avoid;border: 1px solid black;">Subject(s)</th>
                            <th style="width:10%;page-break-inside: avoid;border: 1px solid black;">Overall Percentage<sup>*</sup></th>
                            <th style="width:10%;page-break-inside: avoid;border: 1px solid black;">Year</th>
                            <th style="width:22%;page-break-inside: avoid;border: 1px solid black;">University/Institute</th>
                            <th style="width:3%;page-break-inside: avoid;border: 1px solid black; display: none;">Points</th>
                        </tr></thead>
                        <tbody>
                        <tr>
                          <th>Bachelor's Degree</th>
                             <td> 
                             	<div class="form-group field-academic-ugcollege"></div>                          
                             	<div class="form-group field-academic-ug_other_degree"></div>  
									  </td>
                                   <td> <div class="form-group field-academic-ugsubject"></div></td>
                            <td> <div class="form-group field-academic-ugpercentage"></div></td>
                            <td> <div class="form-group field-academic-ugyear">	</div></td>
                            <td><div class="form-group field-academic-uguniversity"></div></td> 
                        </tr>
                        <tr>
                            <th>Master's/Post Graduate Degree</th>
                                                            <td> <div class="form-group field-academic-pgcollege required">


</div>                                    <div class="form-group field-academic-pg_other_degree">



</div>                                </td>
                                                        <td><div class="form-group field-academic-pgsubject required">



</div></td>
                            <td>  <div class="form-group field-academic-pgpercentage required">


</div></td>
                            <td>    <div class="form-group field-academic-pgyear required">



</div></td>
                            <td> <div class="form-group field-academic-pguniversity required">



</div></td>
                           
                        </tr>


                    </tbody></table>
					
			
			
			
			<table class="table table-striped" border="1" width="100%" style="page-break-inside: avoid;border: 1px solid black;border-collapse:collapse;">
            <thead>
           <tr bordercolor="#666666" bgcolor="#B5DCE8">
              <th colspan="7" style="page-break-inside: avoid;border: 1px solid black;width:25%;text-align:center" height="43"><strong>Mphil and Ph.D</strong></th>
              </tr>
            <tr>
            </tr><tr>
              <th width="25%" style="page-break-inside: avoid;border: 1px solid black;width:25%;">Degree</th>
              <th width="30%" style="page-break-inside: avoid;border: 1px solid black;width:30%;">Date of Registration/Admission</th>             
              <th width="15%" style="page-break-inside: avoid;border: 1px solid black;width:15%;">Date of Submission</th>
              <th width="15%" style="page-break-inside: avoid;border: 1px solid black;width:15%;">Date of Award</th>
			  <th width="15%" style="page-break-inside: avoid;border: 1px solid black;width:15%;">Thesis/Dissertation Title</th>
			  <th width="15%" style="page-break-inside: avoid;border: 1px solid black;width:15%;">University/Institute</th>
			  <th width="15%" style="page-break-inside: avoid;border: 1px solid black;width:15%;">Overall Percentage</th>
            </tr>
            </thead> <tbody>
			
                       </tbody>
          </table>
		
                     
<table class="table table-striped" border="1" width="100%" style="page-break-inside: avoid;border: 1px solid black;border-collapse:collapse;">
            <thead>
           <tr bordercolor="#666666" bgcolor="#B5DCE8">
              <th colspan="3" style="page-break-inside: avoid;border: 1px solid black;width:25%;text-align:center" height="43"><strong>UGC/CSIR NET/JRF</strong></th>
              </tr>
            <tr>
              <th width="25%" style="page-break-inside: avoid;border: 1px solid black;width:25%;">UGC-CSIR NET </th>
              <th width="30%" style="page-break-inside: avoid;border: 1px solid black;width:30%;">NET Subject</th>             
              <th width="15%" style="page-break-inside: avoid;border: 1px solid black;width:15%;">Certificate No./Roll No.</th>
            </tr>
            </thead> <tbody>
			
           
            <tr>
              <td style="page-break-inside: avoid;border: 1px solid black;"></td>
              <td style="page-break-inside: avoid;border: 1px solid black;"></td>             
              <td style="page-break-inside: avoid;border: 1px solid black;"></td>
			 
            </tr>
        
            </tbody>
          </table>
                </div>
                <div class="row">
                    <div class="col-md-12">
                       
                    </div>
                </div>
            </div>
	
	<!--End Here-->
	
    </div>

</div>







<div class="panel panel-jui">
<div class="panel-heading">
        <div class="row">
            <div class="col-md-6">
               3.1 Full-time Teaching Experience
                         </div>
            <div class="col-md-6">
                <div class="text-right">
                                        <span> <a class="btn btn-info rmprint" href="http://hr.kannuruniversity.ac.in/JobAppln/experience_info.php">Edit Details</a> 
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="panel-body">
        <span style="color: red">Note: Kindly do not include the period(s) of break(s) in service(s) while mentioning the dates in column for “From” and “To” </span>
		
		            </div>
</div>



<div class="panel panel-jui">

    <div class="panel-heading">
        <div class="row">
            <div class="col-md-10">
                3.2 Full-time Research/Industry Experience
                <small>
                    (Post-doctoral Fellow, Research Associate, Research Scientist etc.)
                </small>
            </div>
              <div class="col-md-2 text-right" style="display:none;">
               <span> <a class="btn btn-info rmprint" href="http://hr.kannuruniversity.ac.in/JobAppln/experience_info.php">Edit Details</a> 
                    </span>


            </div>

        </div>
    </div>
    <div class="panel-body">
	            </div>
</div>


 


<div class="panel panel-jui">
<div class="panel-heading">
        <div class="row">
            <div class="col-md-6">
               4. Research Papers in Peer-Reviewed or UGC listed Journals
                         </div>
            <div class="col-md-6">
                <div class="text-right">
                                        <span> <a class="btn btn-info rmprint" href="http://hr.kannuruniversity.ac.in/JobAppln/research_ugclis.php">Edit Details</a> 
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="panel-body">
            </div>
</div>

<div class="panel panel-jui">
<div class="panel-heading">
        <div class="row">
            <div class="col-md-6">
               5. Awards
                         </div>
            <div class="col-md-6">
                <div class="text-right">
                                        <span> <a class="btn btn-info rmprint" href="http://hr.kannuruniversity.ac.in/JobAppln/awards_fellowship.php">Edit Details</a> 
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="panel-body">
	 
 
           </div>
</div>

<div class="panel panel-jui">
<div class="panel-heading">
        <div class="row">
            <div class="col-md-6">
             6. No Objection Certificate Details
                         </div>
            <div class="col-md-6">
                <div class="text-right">
                                        <span> <a class="btn btn-info rmprint" href="http://hr.kannuruniversity.ac.in/JobAppln/noobjection.php">Edit Details</a> 
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="panel-body">
       
		
		            </div>
</div>
<div class="panel panel-jui">
<div class="panel-heading">
        <div class="row">
            <div class="col-md-6">
             7. PAYMENT DETAILS
                         </div>
            <div class="col-md-6">
                <div class="text-right">
                                        <span> <a class="btn btn-info rmprint" href="http://hr.kannuruniversity.ac.in/JobAppln/feedetails.php">Edit Details</a> 
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="panel-body">
       
		
		            </div>
</div>
<div class="row">
	 <div class="panel-footer text-center">
                <a id="exp-next-btn-3" class="btn btn-success" href="http://hr.kannuruniversity.ac.in/JobAppln/submission.php">Proceed to Next Section</a>            </div>
	  </div>

</div>
        </div>
      </div>
</div>
</div>
<div id="menu9" class="tab-pane fade">
     <div class="inn-title">
        <h4>Contact Info</h4>
        <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>
     </div>
<div class="bor">
<div class="panel panel-jui">
    <div class="panel-heading">
        <div class="row">
		 <h3> Submit Application </h3>
            <div class="col-md-10">
             
			  <h4> Once you have submitted your application, it is no longer possible to make changes to the application form via the online application system</h4>
            </div>
            <div class="col-md-2">
                
            </div>
        </div>
    </div>
    <div class="panel-body">
       <div id="display-area-tab-51">
        <div class="row">			       
			<div class="alert alert-warning alert-dismissible">
           <h4><i class="icon fa fa-warning"></i> Warning!</h4>
               Minimum  PG marks is not acquired.<br>Please update educational details.<br>Please upload PWBD certificate.<br>Please upload photo.
               <br>Please upload Signature.<br>Please upload UG certificate.<br>Please upload PG certificate.<br>Please upload NET certificate.<br>Payment details are not updated.<br>              </div>
        </div>
       </div>
    </div>    
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

    <!--Import jQuery before materialize.js-->
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
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
        
function profile() {
           var forms = $("#user-profile-form");
           var validation = Array.prototype.filter.call(forms, function(form) {
form.addEventListener('submit', function(event) {
if (form.checkValidity() === false) {
event.preventDefault();
event.stopPropagation();
}else{
event.preventDefault();
//event.stopPropagation()
$.post("profilesubmit.php",
  {
'post':$("#post").val(),   
'firstname':$("#profile-firstname").val(),
'gender':$("#profile-gender").val(),
'category':$("#profile-category").val(),
'profile-countrycode':$("#profile-countrycode").val(),
'profile-mobile':$("#profile-mobile").val(),
'profile-pwd':$("#profile-pwd").val(),
'profile-nationality' :$("#profile-nationality").val(),
'profile-dob':$("#profile-dob").val(),
'marital':$("#marital").val(),
'profile-guardianname':$("#profile-guardianname").val(),
'profile-postaladd1':$("#profile-postaladd1").val(),
'profile-postaladd2':$("#profile-postaladd2").val(),
'profile-postalcity':$("#profile-postalcity").val(),
'profile-postalstate':$("#profile-postalstate").val(),
'profile-postalpin':$("#profile-postalpin").val(),
'profile-postalcountry':$("#profile-postalcountry").val(),
'profile-permanentadd1':$("#profile-permanentadd1").val(),
'profile-permanentadd2':$("#profile-permanentadd2").val(),
'profile-permanentcity':$("#profile-permanentcity").val(),
'profile-permanentstate':$("#profile-permanentstate").val(),
'profile-permanentpin':$("#profile-permanentpin").val(),
'profile-permanentcountry':$("#profile-permanentcountry").val()
    
  },
  function(data, status){
  
$('.nav-tabs a[href="#menu1"]').tab('show')
  });


}
form.classList.add('was-validated');
}, false);
});
              	
    }
        
    $("#academic-mphilna").on("click pnsdumphil", function () {
            var useroption = +$("input[name=\"Academic[mphilNA]\"]:checked").val();
			 var mphilval = +$("#academic-mphilval").val()
			
			 if (isNaN(useroption)) {
				if(mphilval == 1){
                $("input[name=\"Academic[mphilNA]\"][value=\"1\"]").prop("checked", true);
				}else{
				 $("input[name=\"Academic[mphilNA]\"][value=\"2\"]").prop("checked", true);
				}
            }
			if(useroption == 1){
			 $("input[name=\"Academic[mphilNA]\"][value=\"1\"]").prop("checked", true);
			}else if(useroption == 2){
			 $("input[name=\"Academic[mphilNA]\"][value=\"2\"]").prop("checked", true);
			}
			
            useroption = +$("input[name=\"Academic[mphilNA]\"]:checked").val();
            if (useroption == 2) {//mphilName
                $("#academic-mphilname").removeAttr("disabled");
                $(".field-academic-mphilname").show();
                $("#academic-mphilsubject").removeAttr("disabled");
                $(".field-academic-mphilsubject").show();
                $("#academic-mphilcollage").removeAttr("disabled");
                $(".field-academic-mphilcollage").show();
                $("#academic-mphilpercentage").removeAttr("disabled");
                $(".field-academic-mphilpercentage").show();
                $("#academic-mphilyear").removeAttr("disabled");
                $(".field-academic-mphilyear").show();
                $("#academic-mphiluniversity").removeAttr("disabled");
                $(".field-academic-mphiluniversity").show();

                $("#academic-mphilstartdate").removeAttr("disabled");
                $(".field-academic-mphilstartdate").show();
                $("#academic-mphilsubmissiondate").removeAttr("disabled");
                $(".field-academic-mphilsubmissiondate").show();
                $("#academic-mphilawarddate").removeAttr("disabled");
                $(".field-academic-mphilawarddate").show();
                $("#academic-mphilthesistitle").removeAttr("disabled");
                $(".field-academic-mphilthesistitle").show();
            } else {
                $("#academic-mphilname").val("");
                $("#academic-mphilname").prop("disabled", "disabled");
                $(".field-academic-mphilname").hide();
                $("#academic-mphilsubject").val("");
                $("#academic-mphilsubject").prop("disabled", "disabled").val("");
                $(".field-academic-mphilsubject").hide();
                $("#academic-mphilcollage").prop("disabled", "disabled").val("");
                $(".field-academic-mphilcollage").hide();
                $("#academic-mphilpercentage").prop("disabled", "disabled").val("");
                $(".field-academic-mphilpercentage").hide();
                $("#academic-mphilyear").prop("disabled", "disabled").val("");
                $(".field-academic-mphilyear").hide();
                $("#academic-mphiluniversity").prop("disabled", "disabled").val("");
                $(".field-academic-mphiluniversity").hide();
                $("#academic-mphilstartdate").prop("disabled", "disabled").val("");
                $(".field-academic-mphilstartdate").hide();
                $("#academic-mphilsubmissiondate").prop("disabled", "disabled").val("");
                $(".field-academic-mphilsubmissiondate").hide();
                $("#academic-mphilawarddate").prop("disabled", "disabled").val("");
                $(".field-academic-mphilawarddate").hide();
                $("#academic-mphilthesistitle").prop("disabled", "disabled").val("");
                $(".field-academic-mphilthesistitle").hide();

                if (POASTAF == 1) {
                    // $("#academic-mphilpoints").val(0);
                    // $("#mphil-points-value").text("0/5").show();

                }
                if (POASTAF == 2 || POASTAF == 3) {
                    $("#academic-mphilpoints").val(0);
                    $("#mphil-points-value").text("0").show();
                }
            }
            Acadmictotalpoints();
        });
//post values begin
function academic() {
    var forms = $("#academic_quali_form");
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                event.preventDefault();
                //event.stopPropagation()
                $.post("academicsubmit.php", {
                        'post': $("#post").val(),
                        'tenth_board': $("#tenth_board").val(),
                        'tenth_subject': $("#tenth_subject").val(),
                        'tenthResultType': $("#tenthResultType").val(),
                        'tempTenthPercentage': $("#tempTenthPercentage").val(),
                        'tenth_year': $("#tenth_year").val(),
                        'tenth_school': $("#tenth_school").val(),
                        'twelfth_board': $("#twelfth_board").val(),
                        'twelfth_subject': $("#twelfth_subject").val(),
                        'twelfthResultType': $("#twelfthResultType").val(),
                        'tempTwelthPercentage': $("#tempTwelthPercentage").val(),
                        'twelfth_year': $("#twelfth_year").val(),
                        'qualification': $("#qualification").val(),
                        'stream': $("#stream").val(),
                        'ugcollege': $("#ugcollege").val(),
                        'ugsubject': $("#ugsubject").val(),
						'ugpercentage': $("#ugpercentage").val(),
						'ugyear': $("#ugyear").val(),
						'uguniversity': $("#uguniversity").val(),
						'pgcollege': $("#pgcollege").val(),
						'pgsubject': $("#pgsubject").val(),
						'pgpercentage': $("#pgpercentage").val(),
						'pgyear': $("#pgyear").val(),
						'pguniversity': $("#pguniversity").val(),
						'mphilna': $("#mphilna").val(),
						'phdna': $("#phdna").val(),
						'Academic_oTitle': $("#Academic_oTitle").val(),
						'academic_odatesub': $("#academic_odatesub").val(),
						'Academic_oDetails': $("#Academic_oDetails").val(),
						'net': $("#net").val(),
						'netsubject': $("#netsubject").val(),
						'netcertificateno': $("#netcertificateno").val()
                    },
                    function(data, status) {

                        $('.nav-tabs a[href="#menu1"]').tab('show')
                    });


            }
            form.classList.add('was-validated');
        }, false);
    });

}
//post values end
    </script>
</body>

</html>