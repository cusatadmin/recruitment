<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

	//session_start();

	//$auth = $_SESSION['authuser'];
   include 'conf/db.php';
  
 
   if ($_POST['submit'] == "Add") {
	
	$todays = date('Y-m-d H:i:s');
	$short_title = $_POST['short_title'];
	$description = $_POST['description'];
	$query = "INSERT INTO index_page 
			(short_title, description, postdate) VALUES 
				('$short_title','$description','$todays')";	
	//echo $query;
	$stmt = $conn->prepare($query);

	$stmt->execute();
	
	// upload file 	
	$newfilename1 = $_FILES['filename1']['name'];
		
		if ( !empty($newfilename1) ) {
		
			$fileSize = $_FILES['filename1']['size'];
			$fileTmpName  = $_FILES['filename1']['tmp_name'];
			$fileType = $_FILES['filename1']['type'];
			$fileExtension = strtolower(end(explode('.',$newfilename1)));
			$currentDir = getcwd();
			$uploadDirectory = "/documents/";
			$errors = array(); // Store all foreseen and unforeseen errors here.
			$fileExtensions = array('jpeg','jpg','png', 'pdf'); // Get all the file extensions.
			
			$query = "select Max(index_id) as maxid from index_page";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_object();
			$id = $row->maxid;
			$file_upload_name = "doc_1_".$id.".".$fileExtension;
			$uploadPath = $currentDir . $uploadDirectory . $file_upload_name; 
			
			// write to database
			$query = "UPDATE index_page set filename1 = '$file_upload_name' where index_id = '$id'";	
			$stmt = $conn->prepare($query);
			$stmt->execute(); 

			if (! in_array($fileExtension,$fileExtensions)) 
			{
            	$errors[] = "This process does not support this file type. Upload a JPEG or PNG file only.";
        	}

        	if ($fileSize > 20000000) 
			{
            	$errors[] = "You cannot upload this file because its size exceeds the maximum limit of 2 MB.";
        	}
			
			if (empty($errors)) 
			{

				$didUpload = move_uploaded_file($fileTmpName, $uploadPath);
				

            	if ($didUpload)
				{
                	echo "The file " . basename($fileName1) . " has been uploaded.";
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
		 
	//second file
	// upload file 	
	$newfilename2 = $_FILES['filename2']['name'];
		
		if ( !empty($newfilename2) ) {
		
			$fileSize = $_FILES['filename2']['size'];
			$fileTmpName  = $_FILES['filename2']['tmp_name'];
			$fileType = $_FILES['filename2']['type'];
			$fileExtension = strtolower(end(explode('.',$newfilename2)));
			$currentDir = getcwd();
			$uploadDirectory = "/documents/";
			$errors = array(); // Store all foreseen and unforeseen errors here.
			$fileExtensions = array('jpeg','jpg','png', 'pdf'); // Get all the file extensions.
			
			$query = "select Max(index_id) as maxid from index_page";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_object();
			$id = $row->maxid;
			$file_upload_name = "doc_2_".$id.".".$fileExtension;
			$uploadPath = $currentDir . $uploadDirectory . $file_upload_name; 
			
			// write to database
			$query = "UPDATE index_page set filename2 = '$file_upload_name' where index_id = '$id'";	
			$stmt = $conn->prepare($query);
			$stmt->execute(); 

			if (! in_array($fileExtension,$fileExtensions)) 
			{
            	$errors[] = "This process does not support this file type. Upload a JPEG or PNG file only.";
        	}

        	if ($fileSize > 20000000) 
			{
            	$errors[] = "You cannot upload this file because its size exceeds the maximum limit of 2 MB.";
        	}
			
			if (empty($errors)) 
			{

				$didUpload = move_uploaded_file($fileTmpName, $uploadPath);
				

            	if ($didUpload)
				{
                	echo "The file " . basename($fileName2) . " has been uploaded.";
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
		 
	//Third File
	
	// upload file 	
	$newfilename3 = $_FILES['filename3']['name'];
		
		if ( !empty($newfilename1) ) {
		
			$fileSize = $_FILES['filename3']['size'];
			$fileTmpName  = $_FILES['filename3']['tmp_name'];
			$fileType = $_FILES['filename3']['type'];
			$fileExtension = strtolower(end(explode('.',$newfilename3)));
			$currentDir = getcwd();
			$uploadDirectory = "/documents/";
			$errors = array(); // Store all foreseen and unforeseen errors here.
			$fileExtensions = array('jpeg','jpg','png', 'pdf'); // Get all the file extensions.
			
			$query = "select Max(index_id) as maxid from index_page";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_object();
			$id = $row->maxid;
			$file_upload_name = "doc_3_".$id.".".$fileExtension;
			$uploadPath = $currentDir . $uploadDirectory . $file_upload_name; 
			
			// write to database
			$query = "UPDATE index_page set filename3 = '$file_upload_name' where index_id = '$id'";	
			$stmt = $conn->prepare($query);
			$stmt->execute(); 

			if (! in_array($fileExtension,$fileExtensions)) 
			{
            	$errors[] = "This process does not support this file type. Upload a JPEG or PNG file only.";
        	}

        	if ($fileSize > 20000000) 
			{
            	$errors[] = "You cannot upload this file because its size exceeds the maximum limit of 2 MB.";
        	}
			
			if (empty($errors)) 
			{

				$didUpload = move_uploaded_file($fileTmpName, $uploadPath);
				

            	if ($didUpload)
				{
                	echo "The file " . basename($fileName3) . " has been uploaded.";
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

	// header("Location: index_page.php");
	$stmt->close();
	$conn->close();
	   
   }
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<script src="js/bootstrap3-typeahead.min.js" >
	
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

                         <!-- Row start -->
                        <div class="row">
                              <div class="col-md-4">
                              <div class="text-danger small">
                            		<em>
                            			Short Title 
                            		</em>
                           	 </div>
                                <input type="text" value="" name="short_title" id="short_title" class="validate" 
                                 placeholder="Short Title" required> 
                            </div> 

                       	</div> 
                       	<!-- row end -->
                       	<!-- Row start -->
                        <div class="row">
                     <div class="col-md-4">
                              <div class="text-danger small">
                            		<em>
                            			Description
                            		</em>
                           	 </div>
                           	 <textarea class="form-control rounded-0" id="description" name="description" rows="3" cols="80">
                                </textarea>
                                
                              </div> 

                       	</div> 
                       	<!-- row end -->
                       	<!-- Row start -->
                        <div class="row">
										<div class="col-md-3">
		                           <div class="text-danger small">
		                            	<em>
		                            		Upload File 1 (Only PDF File < 2 MB)
		                            	</em>
		                           </div>    
		                        </div>
		                         <div class="col-md-3">
			                         	<div class="text-danger small">
			                         		<em>
			                         			Upload File 2 (Only PDF File < 2 MB)
			                         		</em>
			                        	</div>    
		                         </div>
		                         <div class="col-md-3">
		                            	<div class="text-danger small">
		                            		<em>
		                            			Upload File 3 (Only PDF File < 2 MB)
		                            		</em>
		                           	</div>    
		                         </div>
                        </div> 
                       	<!-- row end -->
                       	<!-- Row start -->
                        <div class="row">
										<div class="col-md-3">
		                              <input type="file" id="filename1" name="filename1" >
		                        </div>
		                         <div class="col-md-3">
			                         	<input type="file" id="filename2" name="filename2" >   
		                         </div>
		                         <div class="col-md-3">
		                            	 <input type="file" id="filename3" name="filename3" >
		                         </div>
                        </div> 
                       	<!-- row end -->
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