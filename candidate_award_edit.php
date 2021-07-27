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
	//echo " ID :".$_POST['acad_id'];
	$entry=$_GET['entry'];
	//echo " ID :".$entry;

	$query = "SELECT * FROM awards where award_id='$entry'";
	
	$stmt = $conn->prepare($query);
	//$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();
	//echo $row->phd_award_date;
	
	if ($_POST['submit'] == "Submit") {
	
		$entry = $_POST['entry'];	
		$todays = date('Y-m-d H:i:s');
		$award_body = $_POST['award_body'];
		$award_name = $_POST['award_name'];
		$award_date = $_POST['award_date'];
		$award_level = $_POST['award_level'];
		$award_score = $_POST['award_score'];
		
		$query = "UPDATE awards  set 
				award_body = '$award_body',
				award_name = '$award_name',
				award_date = '$award_date',
				award_score = '$award_score',
				award_postdate = '$todays'
		where award_id = '$entry'";
		//echo $query;
		$stmt = $conn->prepare($query);
		$stmt->execute();
//Certificate Upload;

    $file_Name = $_FILES['myaward']['name'];
    $file_Size = $_FILES['myaward']['size'];
    $file_TmpName  = $_FILES['myaward']['tmp_name'];
    $file_Type = $_FILES['myaward']['type'];
    $file_Extension = strtolower(end(explode('.',$file_Name)));
	$file_upload_name = "AWD_".$entry."_".$emailid.".".$file_Extension;
	//echo $file_Name;
	//echo $file_upload_name;
	if ($file_Size <>0 ) {
		upload_file($file_Name,$file_Extension,$file_Size,$file_upload_name,$file_TmpName);
		$query = "UPDATE awards  set 
				award_certificate = '$file_upload_name',
				award_postdate = '$todays'
		where award_id = '$entry'";
		//echo $query;entry
		$stmt = $conn->prepare($query);
		$stmt->execute();
	}
	  $stmt->close();
	  $conn->close();
	  header("Location: candidate_awards.php");
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
                        <h4>Awards Received</h4>
                     </div>
                     <div class="tab-inn">
                      <form class="form-inline" action="#" method="post" name="editme"  enctype="multipart/form-data">
                      <input type="hidden" name="entry" value="<?php echo $entry; ?>">
                         <!-- Start Row -->
                         <div class="row">
                              <div class="col-md-6">
                              <div class="text-danger small"><em>Award Body</em></div>
                              <input type="text" value="<?php echo $row->award_body ?>" name="award_body" id="award_body" class="validate" placeholder="award_body" required>
                            </div>
                            <div class="col-md-6">
                            <div class="text-danger small"><em>Name of Award</em></div>
                              <input type="text" value="<?php echo $row->award_name ?>" name="award_name" id="award_name" class="validate" placeholder="award_name" required>
                            </div>
                       	</div> <!-- row -->

                        <div class="row">
                        
                            <div class="col-md-4">
                            <div class="text-danger small"><em>Date Awarded</em></div>
                              	<input type="date" id="award_date" name="award_date" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="" value="<?php echo $row->award_date ?>" >Award Date
                            </div>
                            <div class="col-md-4">
                            <div class="text-danger small"><em>Level of the Award</em></div>
                            	<select name="award_level" id="award_level"  class="custom-select browser-default" required>
                                    <option value="International" <?php if ($row->award_level == "International") echo "Selected"; ?> >International</option>
                                    <option value="National"> <?php if ($row->award_level == "National") echo "Selected"; ?>National</option>
                                    <option value="State" <?php if ($row->award_level == "State") echo "Selected"; ?>>State</option>
                                 </select>
                         	</div>
                         	<div class="col-md-4">
                            <div class="text-danger small"><em>Score Obtained</em></div>
                             <input type="text" value="<?php echo $row->award_score ?>" 
                             name="award_score" id="award_score" class="validate" 
                             placeholder="Score Obtained" disabled>
                            </div>
                         	
                            
                       	</div> <!-- row -->
                        <!-- Start Row -->
                         <div class="row">
                         	<div class="col-md-6">
                            	<div class="text-danger small">
                            		<em>
                            			Upload Award certificate in jpeg format size less than 2 MB
                            		</em>
                           	 	</div>    
                            </div>
                            
                         </div> <!--row end -->  
                             <!-- Start Row -->
                         <div class="row">
                           <div class="col-md-6">
                         	<input type="file" id="myaward" name="myaward">
                           </div>
                            </div> <!--row end -->
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