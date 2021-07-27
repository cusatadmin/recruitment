<?php
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
              <?php include "personal.php" ?>
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
                                <?php include "education.php"; ?>
			</div>

                        </div>
                         <div id="menu10" class="tab-pane fade">
                            <div class="inn-title">
                                <h4> 3.2 Research Experience after PhD</h4>
                            </div>

                            <div class="bor ad-cou-deta-h4">




            <?php include "experience.php" ; ?>




			</div>

			</div>


                        <div id="menu3" class="tab-pane fade">
                            <div class="inn-title">
                                <h4> 4. Research Publications in Peer-Reviewed or UGC listed journals</h4>

                            </div>
                            <div class="bor ad-cou-deta-h4">
                              <?php include "research_experience"; ?>

                            </div>
                        </div>
                        <div id="menu4" class="tab-pane fade">
                            <div class="inn-title">
                                <h4> 5.Awards  </h4>

                            </div>
                            <div class="bor">
                               <?php include "research_publications.php"; ?>
                            </div>
                        </div>
<div id="menu5" class="tab-pane fade">
                            <div class="inn-title">
                                <h4>6. No Objection Certificate</h4>

                            </div>
                            <div class="bor">
                                <?php include "award.php"; ?>
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

    </script>
</body>

</html>
