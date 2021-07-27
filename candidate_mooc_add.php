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
		$mooc_title = $_POST['mooc_title'];
		$mooc_url = $_POST['mooc_url'];
		$mooc_date = $_POST['mooc_date'];
		$mooc_duration = $_POST['mooc_duration'];
		$mooc_score = $_POST['mooc_score'];
				
		$query = "INSERT INTO moocs 
				(mooc_emailid, 
				mooc_title, 
				mooc_url, 
				mooc_date, 
				mooc_duration,
				mooc_score,
				mooc_postdate) 
			VALUES 
				('$emailid',
				'$mooc_title', 
				'$mooc_url', 
				'$mooc_date', 
				'$mooc_duration',
				'$mooc_score',
				'$todays')";	
		//echo $query;
		$stmt = $conn->prepare($query);

		$stmt->execute();
		
	$stmt->close();
	$conn->close();

	header("Location: candidate_moocs.php");
	//echo $message."</br/>";
	
	
	
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
                        <h4>Online Courses</h4>
                     </div>
                     <div class="tab-inn">
                      <form class="form-inline" action="#" method="post" name="editme" >
                         <!-- Start Row -->
                         <div class="row"> 
                            <div class="col-md-6">
                             <div class="text-danger small"><em>Title of Course</em></div>
                              <input type="text" value="" name="mooc_title" id="mooc_title" placeholder="Mooc Title" required>
                              </div>
                            <div class="col-md-6">
                            <div class="text-danger small"><em>Course URL</em></div>
                              	<input type="text" value="" name="mooc_url" id="mooc_url" placeholder="https://mooc.cusat.ac.in/video.ogg" required>
                            </div>
                       	</div> 
                        <!-- row -->
                     <!-- Start Row -->
                         <div class="row"> 
                            <div class="col-md-3">
                             <div class="text-danger small"><em>Date of Course Taken</em></div>
                              
                              <input type="date" id="mooc_date" name="mooc_date" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="" value="" >
                              
                              </div>
                            <div class="col-md-3">
                            <div class="text-danger small"><em>Duration of Course (in hours)</em></div>
                              	<input type="text" value="" name="mooc_duration" id="mooc_duration" placeholder="Duration in hours" required>
                            </div>
                            <!--
                             <div class="col-md-3">
                            <div class="text-danger small"><em>Score Obtained</em></div>
                              	<input type="text" value="" name="mooc_score" id="mooc_score" placeholder="Score Obtained" required>
                            </div>
                            -->
                       	</div> 
                        <!-- row -->
                         
                    
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