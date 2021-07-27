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
   
	$deg_query = "SELECT * FROM degrees";
	$stmt_deg = $conn->prepare($deg_query);
	$stmt_deg->execute(); //working
	$result_deg = $stmt_deg->get_result();

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
	$acad_degree = $_POST['acad_degree'];
	$acad_board = $_POST['acad_board'];
	$acad_subject = $_POST['acad_subject'];
	$acad_percentage = $_POST['acad_percentage'];
	$acad_pass_year = $_POST['acad_pass_year'];
	$acad_institute = $_POST['acad_institute'];
	
	$query = "INSERT INTO academic 
				(acad_emailid, acad_degree, acad_board, acad_subject, acad_percentage,acad_pass_year,acad_institute,acad_postdate
				) VALUES 
					('$emailid', '$acad_degree', '$acad_board', '$acad_subject', '$acad_percentage','$acad_pass_year','$acad_institute', '$todays')";	
	//echo $query;	
		$stmt = $conn->prepare($query);

		$stmt->execute();

	$query_maxid = "select MAX(acad_id) AS Max_Id from academic";
	$stmt_maxid = $conn->prepare($query_maxid);
	$stmt_maxid->execute();
	$result_maxid = $stmt_maxid->get_result();
	$row_maxid = $result_maxid->fetch_object();
	$acad_id = $row_maxid->Max_Id;
		
		
	//degree Upload;

    $file_Name = $_FILES['mydegree']['name'];
    $file_Size = $_FILES['mydegree']['size'];
    $file_TmpName  = $_FILES['mydegree']['tmp_name'];
    $file_Type = $_FILES['mydegree']['type'];
    $file_Extension = strtolower(end(explode('.',$file_Name)));
	$file_upload_name = "DEG_".$acad_degree."_".$acad_id."_".$emailid.".".$file_Extension;
	$acad_degree_cert = $file_upload_name;
	//echo $file_Name;
	//echo $file_upload_name;
	if ($file_Size <>0 ) {
		upload_file($file_Name,$file_Extension,$file_Size,$file_upload_name,$file_TmpName);
		$query = "UPDATE academic  set 
				acad_degree_cert = '$file_upload_name',
				acad_postdate = '$todays'
		where acad_id = '$acad_id'";
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
	$file_upload_name = "MRK_".$acad_degree."_".$acad_id."_".$emailid.".".$file_Extension;
	$acad_marklist = $file_upload_name;
	if ($file_Size <>0 ) {
		upload_file($file_Name,$file_Extension,$file_Size,$file_upload_name,$file_TmpName);
		$query = "UPDATE academic  set 
				acad_marklist = '$file_upload_name',
				acad_postdate = '$todays'
		where acad_id = '$acad_id'";
		//echo $query;
		$stmt = $conn->prepare($query);
		$stmt->execute();
	}
	
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
                        <h4>Academic Qualifications (Start from 10th / Plus two or Equivalent)</h4>
                     </div>
                     <div class="tab-inn">
                      <form class="form-inline" action="#" method="post" name="editme" enctype="multipart/form-data">
                      <!-- Start Row -->
                         <div class="row">
                         	<div class="col-md-6">
                            	<div class="text-danger small">
                            		<em>
                            			Degree
                            		</em>
                           	 	</div>    
                            </div>
                            <div class="col-md-6">
                            	<div class="text-danger small">
                            		<em>
                            			Subject
                            		</em>
                           	 	</div>    
                            </div>
                            
                         </div> <!--row end -->
                         <!-- Start Row -->
                         <div class="row">
                         <div class="col-md-6">
                         	<select name="acad_degree" id="acad_degree"  class="custom-select browser-default" required>
                            		<?php 	while ($row_deg = $result_deg->fetch_object()) {	?>
                                    <option value="<?php echo $row_deg->degree; ?>"><?php echo $row_deg->degree; ?></option>
                                    <?php } ?>
                             </select>
                            
                          </div>  
                           <!-- 
                              	<input type="text" value="" name="acad_degree" id="acad_degree" class="validate" placeholder="Degree" required>
                            -->    
                              <div class="col-md-6">
                              	<input type="text" value="" name="acad_subject" id="acad_subject" class="validate" placeholder="Subject(s)" required>
                                
                            </div>
                       	</div> <!-- row -->
                         <!-- Start Row -->
                         <div class="row">
                         	<div class="col-md-6">
                            	<div class="text-danger small">
                            		<em>
                            			Percentage of Marks
                            		</em>
                           	 	</div>    
                            </div>
                            <div class="col-md-6">
                            	<div class="text-danger small">
                            		<em>
                            			Board/University
                            		</em>
                           	 	</div>    
                            </div>
                            
                         </div> <!--row end -->
                        <div class="row">
                        
                            <div class="col-md-6">
                              	<input type="text" value="" name="acad_percentage" id="acad_percentage" class="validate" placeholder="Percentage" required>
                            </div>
                            <div class="col-md-6">
                              	<input type="text" value="" name="acad_board" id="acad_board" class="validate" placeholder="Board/University"  required>
                              </div>
                            
                       	</div> <!-- row -->
                        
                        <!-- Start Row -->
                         <div class="row">
                         	<div class="col-md-6">
                            	<div class="text-danger small">
                            		<em>
                            			Institute Studied
                            		</em>
                           	 	</div>    
                            </div>
                            <div class="col-md-6">
                            	<div class="text-danger small">
                            		<em>
                            			Year of Passing
                            		</em>
                           	 	</div>    
                            </div>
                            
                         </div> <!--row end -->
                         
                         <div class="row">
                            <div class="col-md-6">
                              	<input type="text" value="" name="acad_institute" id="acad_institute" class="validate"  placeholder="Institute Studied" required>
                            </div>
                            <div class="col-md-6">
                              	<input type="text" value="" name="acad_pass_year" id="acad_pass_year" class="validate" placeholder="Year of Passing" required>
                            </div>
                        </div> <!--row end -->  
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
                           </div>
                           <div class="col-md-6">
                         	<input type="file" id="mymarksheet" name="mymarksheet">
                           </div>
                            </div> <!--row end -->  
                             <!-- Start Row -->
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