  
   <?php 
	session_start();

	$entry = $_SESSION['entry'];
	
	include 'conf/db.php';
//get departments
    $query1 = "SELECT * from departments order by deptname";
	$stmt1 = $conn->prepare($query1);
	//$stmt->bind_param("s", $emailid);
	$stmt1->execute(); //working
	$result1 = $stmt1->get_result();
	$num_rows1 = $result1->num_rows;

//get postname
    $query2 = "SELECT * from postnames ";
	$stmt2 = $conn->prepare($query2);
	$stmt2->execute(); //working
	$result2 = $stmt2->get_result();
	//echo " ID :".$_POST['acad_id'];
	//$entry=$_GET['entry'];
	//echo " ID :".$entry;

	$query = "SELECT * FROM notifications where notifid='$entry'";
	//echo $query;
	$stmt = $conn->prepare($query);
	//$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();
	
	if ($_POST['submit'] == "Submit") {
	
		$entry = $_POST['entry'];	
		$todays = date('Y-m-d H:i:s');
		$nonteach = $_POST['nonteach'];
		$regular = $_POST['regular'];
		$postname = $_POST['postname'];
		$notif_number_date = $_POST['notif_number_date'];
		$notification_date = $_POST['notification_date'];
		$last_date_online = $_POST['last_date_online'];
		$last_date_hardcopy = $_POST['last_date_hardcopy'];
		$department = $_POST['department'];
		$description = $_POST['description'];
		$fees_general = $_POST['fees_general'];
		$fees_scst = $_POST['fees_scst'];
		$fees_foreign = $_POST['fees_foreign'];
		$experiences = $_POST['experiences'];
		$phds = $_POST['phds'];
		$publications = $_POST['publications'];
		$awards = $_POST['awards'];
		$closed = $_POST['closed'];
		
		$query = "UPDATE notifications  set 
				nonteach = '$nonteach',
				regular = '$regular',
				postname = '$postname',
				notif_number_date = '$notif_number_date',
				notification_date = '$notification_date',
				last_date_online = '$last_date_online',
				last_date_hardcopy = '$last_date_hardcopy',
				department = '$department',
				description = '$description',
				fees_general = '$fees_general',
				fees_scst = '$fees_scst',
				fees_foreign = '$fees_foreign',				
				experiences = '$experiences',
				phds = '$phds',
				publications = '$publications',
				awards = '$awards',	
				closed = '$closed',			
				postdate = '$todays'
		where notifid = '$entry'";
		//echo $query;
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
// upload file
	    $fileName = $_FILES['myfile']['name'];
		
		if ( !empty($fileName) ) {
		
			$fileSize = $_FILES['myfile']['size'];
			$fileTmpName  = $_FILES['myfile']['tmp_name'];
			$fileType = $_FILES['myfile']['type'];
			$fileExtension = strtolower(end(explode('.',$fileName)));
			$currentDir = getcwd();
			$uploadDirectory = "/files/";
			$errors = array(); // Store all foreseen and unforeseen errors here.
			$fileExtensions = array('jpeg','jpg','png', 'pdf'); // Get all the file extensions.		
			
			$file_upload_name = "NOTIFICATION_".$entry.".".$fileExtension;
			$uploadPath = $currentDir . $uploadDirectory . $file_upload_name; 
			
			// write to database
			$query = "UPDATE notifications set filename = '$file_upload_name' where notifid = '$entry'";	
			$stmt = $conn->prepare($query);
			$stmt->execute(); 

			if (! in_array($fileExtension,$fileExtensions)) 
			{
            	$errors[] = "This process does not support this file type. Upload a JPEG or PNG file only.";
        	}

        	if ($fileSize > 2000000) 
			{
            	$errors[] = "You cannot upload this file because its size exceeds the maximum limit of 2 MB.";
        	}
			
			if (empty($errors)) 
			{
            	$didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            	if ($didUpload)
				{
                	echo "The file " . basename($fileName) . " has been uploaded.";
           		} else {
                	echo "An error occurred. Try again or contact your system administrator.";
           		}
        	} else {
            	foreach ($errors as $error) {
                	echo $error . "These are the errors" . "\n";
            	}
        	}
		} // if !empty
		 //upload end here





	  $stmt->close();
	  $conn->close();
	  header("Location: notifications_view.php?entry=$entry");
	}

   ?>

<!DOCTYPE html>
<html lang="en">
   <head>
   <style>
 input[type=file]{ 
        color:transparent;
    }
</style>
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
         <?php include "admin_top_menu.php" ?>
		<div class="stu-db">
            <div class="container pg-inn">
               <div class="col-md-12">
                  <div class="box-inn-sp admin-form">
                     <div class="inn-title">
                        <h4>Add Notifications</h4>
                     </div>
                     <div class="tab-inn">
                      <form class="form-inline" action="#" method="post" name="editme"  enctype="multipart/form-data">
                      <input type="hidden" name="entry" value="<?php echo $entry; ?>">
                      <!-- Start Row -->
                         <div class="row">
                         	<div class="col-md-4">
                            	<div class="text-danger small">
                            		<em>
                            			Select Category
                            		</em>
                           	 	</div>    
                            </div>
                            <div class="col-md-4">
                            	<div class="text-danger small">
                            		<em>
                            			Select Type
                            		</em>
                           	 	</div>    
                            </div>
                            <div class="col-md-4">
                            	<div class="text-danger small">
                            		<em>
                            			Select/Add Post name
                            		</em>
                           	 	</div>    
                            </div>
                         </div> <!--row end -->
                         <!-- Start Row -->
                         <div class="row">
                         	<div class="col-md-4">
                          		<select name="nonteach" id="nonteach"  class="custom-select browser-default" required>
                                    <option value="0" <?php if ($row->nonteach==0) echo 'Selected'?>>Teaching</option>
                                    <option value="1" <?php if ($row->nonteach==1) echo 'Selected'?>>Non-Teaching</option>
                                 </select>
                              </div>
                              <div class="col-md-4">
                              	<select name="regular" id="regular"  class="custom-select browser-default" required>
                                    <option value="0" <?php if (!$row->regular) echo 'Selected'?>>Contract</option>
                                    <option value="1" <?php if ($row->regular) echo 'Selected'?>>Regular</option>
                                 </select>
                            </div>
                            <div class="col-md-4">
                                 
                                 <select name="postname" id="postname" class="custom-select browser-default" required>
								 <?php 	while ($row2 = $result2->fetch_object()) {	?>
                                <option value="<?php echo $row2->postname; ?>"  <?php  if ($row->postname ==  $row2->postname) echo "selected"; ?> >
                                  <?php echo $row2->postname; ?>
                                  </option>
                                <?php  } ?>
                              </select>
                            </div>
                       	</div> <!-- row -->
                         <!-- Start Row -->
                         
                         <div class="row">
                         	<div class="col-md-4">
                            	<div class="text-danger small">
                            		<em>
                            			Department
                            		</em>
                           	 	</div>    
                            </div>
                         	<div class="col-md-4">
                            	<div class="text-danger small">
                            		<em>
                            			 Notification Number
                            		</em>
                           	 	</div>    
                            </div>
                            
                            <div class="col-md-4">
                            	<div class="text-danger small">
                            		<em>
                            			Notification Date
                            		</em>
                           	 	</div>    
                            </div>
                         </div> <!--row end -->
                        <div class="row">
                        	<div class="col-md-4">
                            
                             <select name="department" id="department" class="custom-select browser-default" required>
								 <?php 	while ($row1 = $result1->fetch_object()) {	?>
                                <option value="<?php echo $row1->deptname; ?>"  <?php  if ($row->department ==  $row1->deptname) echo "selected"; ?> >
                                  <?php echo $row1->deptname; ?>
                                  </option>
                                <?php  } ?>
                              </select>
                              
                              </div> 
                              
                            <div class="col-md-4">
                              <input type="text" value="<?php echo $row->notif_number_date; ?>" name="notif_number_date" id="notif_number_date" class="validate"  placeholder="Notification Number" required>
                            </div>
                            
                            <div class="col-md-4">
                              	<input type="date" id="notification_date" name="notification_date" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="" value="<?php echo $row->notification_date; ?>" >
                            </div>
                                
                       	</div> <!-- row -->
                        <!-- Start Row -->
                         <div class="row">
                         	<div class="col-md-4">
                            	<div class="text-danger small">
                            		<em>
                            			Description
                            		</em>
                           	 	</div>    
                            </div>
                         	<div class="col-md-4">
                            	<div class="text-danger small">
                            		<em>
                            			Last Date for online submission
                            		</em>
                           	 	</div>    
                            </div>
                            <div class="col-md-4">
                            	<div class="text-danger small">
                            		<em>
                            			Last Date for hardcopy submission
                            		</em>
                           	 	</div>    
                            </div>
                         </div> <!--row end -->
                         <div class="row">
                        	<div class="col-md-4">
                              <input type="text" value="<?php echo $row->description; ?>" name="description" id="description" class="validate"  placeholder="Description" required>
                            </div> 
                            <div class="col-md-4">
                              	<input type="date" id="last_date_online" name="last_date_online" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="" value="<?php echo $row->last_date_online; ?>" >
                            </div>
                            <div class="col-md-4">
                              	<input type="date" id="last_date_hardcopy" name="last_date_hardcopy" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="" value="<?php echo $row->last_date_hardcopy; ?>" >
                              </div>  
                                
                       	</div> <!-- row -->
                        
 						<!-- Start Row -->
                         <div class="row">
                         	<div class="col-md-4">
                            	<div class="text-danger small">
                            		<em>
                            			Application Fee for General Candidates (INR)
                            		</em>
                           	 	</div>    
                            </div>
                            <div class="col-md-4">
                            	<div class="text-danger small">
                            		<em>
                            			Application Fee for SC/ST Candidates (INR)
                            		</em>
                           	 	</div>    
                            </div>
                            <div class="col-md-4">
                            	<div class="text-danger small">
                            		<em>
                            			Application Fee for Foreign Candidates (USD)
                            		</em>
                           	 	</div>    
                            </div>
                         </div> <!--row end -->
                        <div class="row">
                        	<div class="col-md-4">
                              <input type="text" value="<?php echo $row->fees_general; ?>" name="fees_general" id="fees_general" class="validate"  placeholder="fees_general" required>
                           </div>
                            <div class="col-md-4">
                              <input type="text" value="<?php echo $row->fees_scst; ?>" name="fees_scst" id="fees_scst" class="validate"  placeholder="fees_scst" required>
                            </div>
                            <div class="col-md-4">
                              <input type="text" value="<?php echo $row->fees_foreign; ?>" name="fees_foreign" id="fees_foreign" class="validate"  placeholder="fees_foreign" required>
                              </div>  
                                
                       	</div> <!-- row -->
                        <!-- Start Row -->
                         <div class="row">
                         	<div class="col-md-4">
                            	<div class="text-danger small">
                            		<em>
                            			Upload Notification (Only PDF File < 2 MB)
                            		</em>
                           	 	</div>    
                            </div>
                            <div class="col-md-8 center">
                            	<div class="text-danger small">
                            		<em>
                            			Required Pages other than Personal Profile and Academic Qualifications
                            		</em>
                           	 	</div>    
                            </div>
                         </div> <!--row end -->
                         
                        <!-- Row start -->
                        <div class="row">
                        	<div class="col-md-4">
                              <input type="file" id="myfile" name="myfile" >
                           </div>   
                           <div class="col-md-2">
                            	<input type="checkbox" id="experiences" name="experiences" value="1"
                            	 <?php if ($row->experiences==1) echo 'checked="checked"';?>>
                              <label for="experiences">Experiences</label>
                            </div>
                            <div class="col-md-2">
                               <input type="checkbox" id="phds" name="phds" value="1"
                                <?php if ($row->phds==1) echo 'checked="checked"';?>>
                              <label for="phds">Ph.D.</label>
                            </div>
                            <div class="col-md-2">
                              <input type="checkbox" id="publications" name="publications" value="1"
                               <?php if ($row->publications==1) echo 'checked="checked"';?>>
                              <label for="publications">Publications</label>
                            </div>
                            <div class="col-md-2">
                           	 <input type="checkbox" id="awards" name="awards" value="1"
                           	  <?php if ($row->awards==1) echo 'checked="checked"';?>>
                              <label for="awards">Awards</label>                           
                           </div>                         
                       	</div> <!-- row end -->
                       	<!-- Row start -->
                        <div class="row">
                            <div class="col-md-6">
                              <input type="checkbox" id="closed" name="closed" value="1"
                               <?php if ($row->closed==1) echo 'checked="checked"';?>>
                              <label for="closed">Close this Notification (closed notifications will be hidden in the website)</label>
                            </div>
                         
                       	</div> <!-- row end -->
                        
                         <div class="row">

                              <div class="input-field col s12">
                                 <p><i class="waves-effect waves-light btn-large waves-input-wrapper" style="">
                                    <input type="submit" class="waves-button-input" id="submit" name="submit" value="Submit">
                                    </i>
                                 </p>
                                 <button type="button" class="btn btn-info btn-xs" onclick="goBack()">Go Back</button>
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
   <?php include "footer.php"; ?> 
</body>
</html>