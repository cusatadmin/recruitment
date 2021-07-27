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
	include "functions.php";
	
	$deg_query = "SELECT * FROM degrees";
	$stmt_deg = $conn->prepare($deg_query);
	$stmt_deg->execute(); //working
	$result_deg = $stmt_deg->get_result();
	
	//echo " ID :".$_POST['acad_id'];
	$entry=$_GET['entry'];
	$query = "SELECT * FROM academic where acad_id='$entry'";
	
	$stmt = $conn->prepare($query);
	//$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();
	
	if ($_POST['submit'] == "Submit") {
	
		$entry = $_POST['entry'];	
		$acad_degree = $_POST['acad_degree'];
		$acad_subject = $_POST['acad_subject'];
		$acad_percentage = $_POST['acad_percentage'];
		$acad_board = $_POST['acad_board'];
		$acad_institute = $_POST['acad_institute'];
		$acad_pass_year = $_POST['acad_pass_year'];
		$todays = date('Y-m-d H:i:s');
		
		//degree Upload;

    $file_Name = $_FILES['mydegree']['name'];
    $file_Size = $_FILES['mydegree']['size'];
    $file_TmpName  = $_FILES['mydegree']['tmp_name'];
    $file_Type = $_FILES['mydegree']['type'];
    $file_Extension = strtolower(end(explode('.',$file_Name)));
	$file_upload_name = "DEG_".$acad_degree."_".$entry."_".$emailid.".".$file_Extension;
	//$file_upload_name = "D_".$emailid."_".$acad_degree."_".$row->acad_id.".".$file_Extension;
	$acad_degree_cert = $file_upload_name;
	//echo $file_Name;
	//echo $file_upload_name;
	if ($file_Size <>0 ) {
		upload_file($file_Name,$file_Extension,$file_Size,$file_upload_name,$file_TmpName);
		$query = "UPDATE academic  set 
				acad_degree_cert = '$acad_degree_cert',
				acad_postdate = '$todays'
		where acad_id = '$entry'";
		//echo $query;
		$stmt = $conn->prepare($query);
		$stmt->execute();
	}
	//Marksheet Upload;

    $file_Name = $_FILES['mymarksheet']['name'];
    $file_Size = $_FILES['mymarksheet']['size'];
    $file_TmpName  = $_FILES['mymarksheet']['tmp_name'];
    $file_Type = $_FILES['mymarksheet']['type'];
    $file_Extension = strtolower(end(explode('.',$file_Name)));
	$file_upload_name = "MRK_".$acad_degree."_".$entry."_".$emailid.".".$file_Extension;
	//$file_upload_name = "M_".$emailid."_".$acad_degree."_".$row->acad_id.".".$file_Extension;
	$acad_marklist = $file_upload_name;
	if ($file_Size <>0 ) {
		upload_file($file_Name,$file_Extension,$file_Size,$file_upload_name,$file_TmpName);
		$query = "UPDATE academic  set 
				acad_marklist = '$acad_marklist',
				acad_postdate = '$todays'
		where acad_id = '$entry'";
		//echo $query;
		$stmt = $conn->prepare($query);
		$stmt->execute();
	}
	
		
		$query = "UPDATE academic  set 
				acad_degree = '$acad_degree',
				acad_subject = '$acad_subject',
				acad_percentage = '$acad_percentage',
				acad_board = '$acad_board',
				acad_institute = '$acad_institute',
				acad_pass_year = '$acad_pass_year',
				acad_postdate = '$todays'
		where acad_id = '$entry'";
		//echo $query;
		$stmt = $conn->prepare($query);
		$stmt->execute();

	  $stmt->close();
	  $conn->close();
	  header("Location: candidate_academic.php");
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
                        <h4>Academic Qualifications</h4>
                     </div>
                     <div class="tab-inn">
                      <form class="form-inline" action="#" method="post" name="editme" enctype="multipart/form-data" >
                      		<input type="hidden" name="entry" value="<?php echo $entry; ?>">
                         <!-- Start Row -->
                         <div class="row">
                         
                          	<div class="col-md-6">
                            <div class="text-danger small"><em>Degree</em></div>
                            	<select name="acad_degree" id="acad_degree"  class="custom-select browser-default" required>
                            		<?php 	while ($row_deg = $result_deg->fetch_object()) {	?>
                                    <option value="<?php echo $row_deg->degree; ?>" 
										<?php if ($row->acad_degree==$row_deg->degree) echo "Selected";?>>
									<?php echo $row_deg->degree; ?></option>
                                    <?php } ?>
                             	</select>
                            <!--
                            
                              	<input type="text" value="<?php echo $row->acad_degree; ?>" name="acad_degree" id="acad_degree" class="validate" placeholder="Degree" required> -->
                         	</div>
                              <div class="col-md-6">
                              <div class="text-danger small"><em>Subject</em></div>
                              	<input type="text" value="<?php echo $row->acad_subject; ?>" name="acad_subject" id="acad_subject" class="validate" placeholder="Subject(s)" required>
                            </div>
                       	</div> <!-- row -->
                        
                        <div class="row">
                        
                            <div class="col-md-6">
                            <div class="text-danger small"><em>Percentage</em></div>
                              	<input type="text" value="<?php echo $row->acad_percentage; ?>" name="acad_percentage" id="acad_percentage" class="validate" placeholder="Percentage" required>
                            </div>
                            <div class="col-md-6">
                            <div class="text-danger small"><em>Board/University</em></div>
                              	<input type="text" value="<?php echo $row->acad_board; ?>" name="acad_board" id="acad_board" class="validate" placeholder="Board/University"  required>
                              </div>
                            
                       	</div> <!-- row -->
                         <div class="row">
                            <div class="col-md-6">
                            <div class="text-danger small"><em>Institute Studied</em></div>
                              	<input type="text" value="<?php echo $row->acad_institute; ?>" name="acad_institute" id="acad_institute" class="validate"  placeholder="Institute Studied" required>
                            </div>
                            <div class="col-md-6">
                            <div class="text-danger small"><em>Year of Passing</em></div>
                              	<input type="text" value="<?php echo $row->acad_pass_year; ?>" name="acad_pass_year" id="acad_pass_year" class="validate" placeholder="Year of Passing" required>
                            </div>
                              <!-- Start Row -->
                         <div class="row">
                         	<div class="col-md-6">
                            	<div class="text-danger small">
                            		<em>
                            			Upload the degree certificate in jpeg format size less than 2 MB
                            		</em>
                           	 	</div>    
                            </div>
                            <div class="col-md-6">
                            	<div class="text-danger small">
                            		<em>
                            			Upload the Marklist in jpeg format size less than 2 MB 
                            		</em>
                           	 	</div>    
                            </div>
                            
                         </div> <!--row end -->  
                             <!-- Start Row -->
                         <div class="row">
                          <div class="col-md-6">
                         	<input type="file" id="mydegree" name="mydegree">
                            <a href="<?php echo "files/".$row->acad_degree_cert; ?>" target="_blank"><?php echo $row->acad_degree_cert; ?> </a>
                            
                           </div>
                           <div class="col-md-6">
                         	<input type="file" id="mymarksheet" name="mymarksheet">
                            <a href="<?php echo "files/".$row->acad_marklist; ?>" target="_blank"><?php echo $row->acad_marklist; ?> </a>
                           </div>
                            </div> <!--row end -->  
                             <!-- Start Row -->
                         <div class="row">
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