<?php
	session_start();
	$emailid = $_SESSION['emailid'] ;
	$auth = $_SESSION['authuser'];
   include 'conf/db.php';
   //get departments
    $query1 = "SELECT * from departments order by deptname ";
	$stmt1 = $conn->prepare($query1);
	//$stmt->bind_param("s", $emailid);
	$stmt1->execute(); //working
	$result1 = $stmt1->get_result();
	$num_rows1 = $result1->num_rows;
   
   	$query2 = "select * from postnames";
	$stmt2 = $conn->prepare($query2);
	$stmt2->execute();
	$result2 = $stmt2->get_result();
 
   if ($_POST['submit'] == "Add") {
	
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

	
		$query = "INSERT INTO notifications 
				(nonteach, regular, postname, notif_number_date, notification_date,  last_date_online, last_date_hardcopy, 
				department,description,fees_general,fees_scst,fees_foreign, 
				experiences,phds,publications,awards,postdate) VALUES 
					('$nonteach','$regular', '$postname', '$notif_number_date','$notification_date', '$last_date_online', '$last_date_hardcopy', 
					'$department', '$description', '$fees_general', '$fees_scst', '$fees_foreign', 
					'$experiences','$phds','$publications','$awards','$todays')";	
		//echo $query;
		$stmt = $conn->prepare($query);

		$stmt->execute();
		
		// insert into postname table
		$query2 = "select * from postnames where postname='$postname'";
		$stmt2 = $conn->prepare($query2);
		$stmt2->execute();
		$result2 = $stmt2->get_result();

		//echo "postnames=".$num_rows2;
		if ($num_rows2==0) {
			$query3 = "insert into postnames (postname) values ('$postname')";
			$stmt3 = $conn->prepare($query3);
			$stmt3->execute();
			echo $query3;
		 
		}
		
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
			
			$query = "select Max(notifid) as maxid from notifications";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_object();
			$id = $row->maxid;
			$file_upload_name = "NOTIFICATION_".$id.".".$fileExtension;
			$uploadPath = $currentDir . $uploadDirectory . $file_upload_name; 
			
			// write to database
			$query = "UPDATE notifications set filename = '$file_upload_name' where notifid = '$id'";	
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
	

	 header("Location: notifications_view.php?entry=$id");
	$stmt->close();$stmt2->close();$stmt3->close();
	$conn->close();
	   
   }
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<script src="js/bootstrap3-typeahead.min.js" >
	
	</script>

<script>
    $(document).ready(function () {
        $('#postname').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "fetch_posts.php",
					data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>
<style>
 input[type=file]{ 
        color:transparent;
    }
</style>
   </head>
<body>
      <!-- MOBILE MENU -->
      <section>
         <?php include "header_notif_add.php"; ?>
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
                      <form class="form-inline" action="#" method="post" name="editme" enctype="multipart/form-data">
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
                         <!-- Row start -->
                         <div class="row">
                         	<div class="col-md-4">
                          		<select name="nonteach" id="nonteach"  class="custom-select browser-default" required>
                                    <option value="0" disabled selected>Select Category</option>
                                    <option value="0">Teaching</option>
                                    <option value="1">Non-Teaching</option>
                                 </select>
                              </div>

                              <div class="col-md-4">
                              	<select name="regular" id="regular"  class="custom-select browser-default" required>
                                    <option value="0" disabled selected>Select Type</option>
                                    <option value="0">Contract</option>
                                    <option value="1">Regular</option>
                                 </select>
                            </div>
                            <div class="col-md-4">
                                  <select name="postname" id="postname" class="custom-select browser-default" required>
                                  <option value="0" disabled selected>Select Postname</option>
								 <?php 	while ($row2 = $result2->fetch_object()) {	?>
                                <option value="<?php echo $row2->postname; ?>" >
                                  <?php echo $row2->postname; ?>
                                  </option>
                                <?php  } ?>
                              </select>
									<!--	<input type="text" name="postname" id="postname" class="typeahead" autocomplete="off" placeholder="Post Name"/>
                         -->
                            </div>
                       	</div> <!-- row end -->
                        
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

                         
                          <!-- Row start -->
                        <div class="row">
                        
                           
                            <div class="col-md-4">
                              <select name="department" id="department" class="custom-select browser-default" required>
								 <?php 	while ($row1 = $result1->fetch_object()) {	?>
                                <option value="<?php echo $row1->deptname; ?>">
                                  <?php echo $row1->deptname; ?>
                                  </option>
                                <?php  } ?>
                              </select>
                              </div> 
                               <div class="col-md-4">
                              <input type="text" value="" name="notif_number_date" id="notif_number_date" class="validate"  placeholder="Notification Number" required>
                            </div>
                            <div class="col-md-4">
                              	<input type="date" id="notification_date" name="notification_date" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="" value="" >
                            </div> 
                                
                       	</div> <!-- row end -->
                        
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

                         <!-- Row start -->
                         <div class="row">
                        <div class="col-md-4">
                              <input type="text" value="" name="description" id="description" class="validate"  placeholder="Description" required>
                            </div>
                            <div class="col-md-4">
                              	<input type="date" id="last_date_online" name="last_date_online" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="" value="" >
                            </div>
                            <div class="col-md-4">
                              <!--	<input type="date" id="last_date_hardcopy" name="last_date_hardcopy" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="" value="" > -->
                                
                                <input type="date" id="last_date_hardcopy" name="last_date_hardcopy" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask="" required="" value="" >
                              </div>  
                              
                                
                       	</div> <!-- row end -->
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
						 <!-- Row start -->
                        <div class="row">
                        	<div class="col-md-4">
                              <input type="text" value="" name="fees_general" id="fees_general" class="validate"  placeholder="fees_general" required>
                           </div>
                            <div class="col-md-4">
                              <input type="text" value="" name="fees_scst" id="fees_scst" class="validate"  placeholder="fees_scst" required>
                            </div>
                            <div class="col-md-4">
                              <input type="text" value="" name="fees_foreign" id="fees_foreign" class="validate"  placeholder="fees_foreign" required>
                              </div>  
                                
                       	</div> <!-- row end -->
                       	 <!-- Start Row -->
                         <div class="row">
                         	<div class="col-md-4">
                            	<div class="text-danger small">
                            		<em>
                            			Upload Notification (Only PDF File < 2 MB)
                            		</em>
                           	 	</div>    
                            </div>
                            
                         </div> <!--row end -->
                       	
                         <!-- Row start -->
                        <div class="row">
                        	<div class="col-md-4">
                            	
                              <input type="file" id="myfile" name="myfile" >
                           </div>  
									
                            
                            
                            
                           
                                                     
                       	</div> <!-- row end -->
                         <!-- Row start -->
                         <div class="row">

                              <div class="input-field col s12">
                                 <p><i class="waves-effect waves-light btn-large waves-input-wrapper" style="">
                                    <input type="submit" class="waves-button-input" id="submit" name="submit" value="Add">
                                    </i>
                                 </p>
                                 <button type="button" class="btn btn-danger btn-xs" onclick="goBack()">Go Back</button>
                              </div>
                           </div> <!-- row end -->
                          
                        </form>
                        
                     </div>
                  </div>
               </div>
            </div>
      </div>
	</div>
    </section>  
   <!--SECTION END-->
   <?php include "footer.php"; ?> 
      

</body>
</html>