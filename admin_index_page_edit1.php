<?php
session_start();
$auth = $_SESSION['admin'];
	
	include 'conf/db.php';
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}

	$entry = $_SESSION['entry'];
	
 	$query = "SELECT * FROM index_page where index_id='$entry'";
	//echo $query;
	$stmt = $conn->prepare($query);
	//$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();
	
   if ($_POST['submit'] == "Submit") {

	$todays = date('Y-m-d H:i:s');
	$short_title = $_POST['short_title'];
	$description = $_POST['description'];
	$editor1 = $_POST['editor1'];
	
	$query = "UPDATE index_page  set 
				short_title = '$short_title',
				description = '$description',
				long_description = '$editor1',			
				postdate = '$todays'
		where index_id = '$entry'";
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
                	echo "The file " . basename($filename1) . " has been uploaded.";
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

	
	 header("Location: admin_index_page_list.php");
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
	<script src="ckeditor/ckeditor.js"></script>
	<script src="ckeditor/js/sample.js"></script>
	<link rel="stylesheet" href="ckeditor/css/samples.css">
	<link rel="stylesheet" href="ckeditor/toolbarconfigurator/lib/codemirror/neo.css">
	<meta name="viewport" content="width=device-width,initial-scale=1">

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
                        <h4>Add Front Page Components</h4>
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
                                <input type="text" value="<?php echo $row->short_title; ?>" name="short_title" id="short_title" class="validate" 
                                 placeholder="Short Title" required> 
                            </div> 

                       	</div> 
                       	<!-- row end -->

								<!-- Row start -->
                        <div class="row">
	                        <div class="text-danger small">
                            		<em>
                            			Long Description 
                            		</em>
                          	</div>
                          	<textarea name="editor1" id="editor1" rows="10" cols="80">
            						<?php echo $row->long_description; ?>
        							</textarea>
						        <script>

						            CKEDITOR.replace( 'editor1' );
						        </script>

                       	<!-- row end -->

                       	<!-- Row start -->
                       	
                    <div class="row">
                     <div class="col-md-4">
                              <div class="text-danger small">
                            		<em>
                            			Description
                            		</em>
                           	 </div>
                           	 <textarea class="form-control rounded-0" id="description" name="description" 
                             cols="80" value="<?php echo $row->description; ?>"><?php echo $row->description; ?>
                                </textarea>
                                
                              </div> 

                       	</div> 
                       	<!-- row end -->
                       	<!-- Row start -->
                        <div class="row">
										<div class="col-md-3">
		                           <div class="text-danger small">
		                            	<em>
		                            		Upload File  (Only PDF File < 5 MB)
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
		                         
                        </div> 
                       	<!-- row end -->
                         <!-- Row start -->
                         <div class="row">

                              <div class="input-field col s12">
                                 <p><i class="waves-effect waves-light btn-large waves-input-wrapper" style="">
                                    <input type="submit" class="waves-button-input" id="submit" name="submit" value="Submit">
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
      
<script>
	initSample();
</script>
</body>
</html>