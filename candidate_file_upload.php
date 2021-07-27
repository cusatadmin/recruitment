<?php
	session_start();
	$emailid = $_SESSION['emailid'] ;
	$auth = $_SESSION['authuser'];
	include 'conf/db.php';
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}
	$degree = $_POST['degree'];
	//echo $degree;
    $currentDir = getcwd();
    $uploadDirectory = "/files/";

    $errors = array(); // Store all foreseen and unforeseen errors here.

    $fileExtensions = array('jpeg','jpg','png', 'pdf'); // Get all the file extensions.

    $fileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName  = $_FILES['myfile']['tmp_name'];
    $fileType = $_FILES['myfile']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));
	
//	if ($degree == "SSLC") 
	//	$file_upload_name = $emailid."_SSLC.".$fileExtension;
	
	switch ($degree) {	
				case "Photo":
					$file_upload_name = $emailid."_Photo.".$fileExtension;
					$profile_field_name = "photo";
					$_SESSION['photo'] = $file_upload_name;
					break;		
				case "net":
					$file_upload_name = $emailid."_NET.".$fileExtension;
					$profile_field_name = "net";
					break;
				case "community":
					$file_upload_name = $emailid."_CC.".$fileExtension;
					$profile_field_name = "community";
					break;
				case "pwbd":
					$file_upload_name = $emailid."_PWDB.".$fileExtension;
					$profile_field_name = "pwbd";
					break;
				case "noc":
					$file_upload_name = $emailid."_NOC.".$fileExtension;
					$profile_field_name = "noc";
					break;
				case "info_data":
					$file_upload_name = $emailid."_info_data.".$fileExtension;
					$profile_field_name = "info_data";
					break;				
				case "other":
					$file_upload_name = $emailid."_OTH.".$fileExtension;
					$profile_field_name = "other";
					break;	
				default:
					$file_upload_name = $emailid."_NONE.".$fileExtension;
					break;		
			} // switch

	//$uploadPath = $currentDir . $uploadDirectory . $emailid."_".basename($fileName);
	
    $uploadPath = $currentDir . $uploadDirectory . $file_upload_name; 
	
	// write to database
	if ( !empty($fileName) ) {
		$query = "UPDATE profile set $profile_field_name = '$file_upload_name' where emailid = '$emailid'";
		//echo $query;
	
		$stmt = $conn->prepare($query);
		$stmt->execute(); 
	}

	 $stmt->close();
	 $conn->close();
	  

   // echo $uploadPath;

    if (isset($fileName)) {

        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "This process does not support this file type. Upload a JPEG or PNG file only.";
        }

        if ($fileSize > 2000000) {
            $errors[] = "You cannot upload this file because its size exceeds the maximum limit of 2 MB.";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                echo "The file " . basename($fileName) . " has been uploaded.";
            } else {
                echo "An error occurred. Try again or contact your system administrator.";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
        }
    }
header("Location: candidate_uploads.php");

?>