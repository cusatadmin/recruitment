<?php 
	session_start();
	$emailid = $_SESSION['emailid'] ;
	$auth_admin = $_SESSION['admin'];
	$auth_candidate = $_SESSION['authuser'];
	
	include 'conf/db.php';
	
	//echo " ID :".$_POST['acad_id'];
	$entry=$_GET['entry'];
	$_SESSION['entry'] = $entry;
	//echo " ID :".$entry;
	
	if ($_POST['submit'] == "Submit") {
	
		$entry = $_POST['entry'];
		$ranklist_date	= $_POST['ranklist_date'];
		
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
			
			$file_upload_name = "RANK_".$entry.".".$fileExtension;
			$uploadPath = $currentDir . $uploadDirectory . $file_upload_name; 
			
			// write to database
			$query = "UPDATE notifications set 
							ranklist = '$file_upload_name',
							ranklist_date = '$ranklist_date' 
					where notifid = '$entry'";	
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
	

	$query = "SELECT * FROM notifications where notifid='$entry'";
	//echo $query;
	$stmt = $conn->prepare($query);
	//$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();
	
	

   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
<style type="text/css">
	.fa_red {
	color: #CC0033
}
</style>   
      <style>
 input[type=file]{ 
        color:transparent;
    }
</style>
   <script language="javascript">
	
	function post_this_job($sid) {
		$("#loaderIcon").show();
			jQuery.ajax({
				url: "post_this_job.php",
				data:'notifid='+$sid,
				type: "POST",
				success:function(data){
					$("#user-status").html(data);
					$("#loaderIcon").hide();
					},
				error:function (){}
				});
	}
	
	function remove_post_this_job($sid) {
		$("#loaderIcon").show();
			jQuery.ajax({
				url: "remove_post_this_job.php",
				data:'notifid='+$sid,
				type: "POST",
				success:function(data){
					$("#user-status").html(data);
					$("#loaderIcon").hide();
					},
				error:function (){}
				});
	}
function apply_this_job($sid) {
		$("#loaderIcon").show();
			jQuery.ajax({
				url: "apply_this_job.php",
				data:'notifid='+$sid,
				type: "POST",
				success:function(data){
					$("#user-status").html(data);
					$("#loaderIcon").hide();
					},
				error:function (){}
				});
	}
	


</script>
   </head>
<body>
      <!-- MOBILE MENU -->
      <section>
         <?php 
		 	if ($auth_admin || $auth_candidate)
		 		include "header.php"; 
			else
				include "header_index.php"; 
			?>
         <p></p>
         <p></p>
      </section>
      <section>
         <div class="pro-menu">
         <?php 
		 if ($auth_admin==1)
		 	include "admin_top_menu.php";
		 elseif ($auth_candidate==1)
		 	include "candidate_top_menu.php";
		 ?>
		<div class="stu-db">
            <div class="container pg-inn">

               <div class="col-md-12">

                            <h4>Notification View</h4>

                            <div class="sdb-tabl-com sdb-pro-table">
                                <table class="table-responsive bordered">
                                    <tbody>
                                        <tr>
                                            <td>Notification Number</td>
                                            <td>:</td>
                                            <td><?php echo $row->notif_number_date; ?>
																<span id="user-status" style="font-size:12px;"></span>                                            <?php if ( !empty($row->filename) ) { ?>
                                             <br \>
                                            <a href="<?php echo "files/".$row->filename; ?>" target="_blank"> Download Notification</a> 
                                            <?php } ?>
                                            </td>
                                        </tr> <tr>
                                            <td>Notification Date</td>
                                            <td>:</td>
                                            <td><?php echo date("d-m-Y",strtotime($row->notification_date)); ?>
																<span id="user-status" style="font-size:12px;"></span>                                            
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Regular/Contract</td>
                                            <td>:</td>
                                            <td><?php if ($row->regular) echo "Regular"; else echo "Contract"; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Post Name</td>
                                            <td>:</td>
                                            <td><?php echo $row->postname; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Department</td>
                                            <td>:</td>
                                            <td><?php echo $row->department; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Description</td>
                                            <td>:</td>
                                            <td><?php echo $row->description; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Last date for Online Submission</td>
                                            <td>:</td>
                                            <td><?php echo date("d-m-Y",strtotime($row->last_date_online)); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Last date for Hardcopy Submission</td>
                                            <td>:</td>
                                            <td><?php echo date("d-m-Y",strtotime($row->last_date_hardcopy)); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Fee for General Candidates (INR)</td>
                                            <td>:</td>
                                            <td><?php echo $row->fees_general; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Fee for SC/ST Candidates (INR)</td>
                                            <td>:</td>
                                            <td><?php echo $row->fees_scst; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Fee for Foreign Candidates (USD)</td>
                                            <td>:</td>
                                            <td><?php echo $row->fees_foreign; ?></td>
                                        </tr>
                                        
                                       <?php if ($auth_admin==1) { ?>
                                       <form class="form-inline" action="#" method="post" name="uploadrank"  enctype="multipart/form-data">
                                        <tr>
                                        
                      <input type="hidden" name="entry" value="<?php echo $entry; ?>">
                                            <td>Upload Ranklist (PDF file less than 2 MB)</td>
                                            <td>:</td>
                                            <td><input type="file" id="myfile" name="myfile" >
                                            <?php if ($row->ranklist) { ?>
                                            <a href="<?php echo "files/".$row->ranklist; ?>" target="_blank">
											View Ranklist </a>
                                            <?php } ?>
                                            </td>

                                        </tr> 
                                         <tr>
                                            <td>Date until Ranklist to be displayed in WebSite</td>
                                            <td>:</td>
                                            <td>
                                            <div class="col-md-4">
												<input type="date" id="ranklist_date" name="ranklist_date" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="" value="<?php echo $row->ranklist_date; ?>" >
                                            </div>
                                            <div class="col-md-4">

                                            <input type="submit" class="waves-button-input" id="submit" name="submit" value="Submit">

                                            </div>
                                            </td>
                                        </tr>
                                        
                                        </form>
                                       <?php } ?>
                                     </tbody>
                                 </table>
                                 <?php 
		 							if ($auth_admin==1) { ?>
		 								 <?php if ($row->display==1) { ?>
												<a href="#" class="btn waves-effect waves-green" 
												onClick="remove_post_this_job('<?php echo $row->notifid; ?>')">
                                    <i class="fa fa-check-square fa_red">Remove Post</i></a>
                               <?php }  else { ?>
                               		<a href="#" class="btn waves-effect waves-green" 
												onClick="post_this_job('<?php echo $row->notifid; ?>')">
                                    <i class="fa fa-check-square">Post Notification</i></a>
                               <?php } ?>
                                    <a href="notifications_edit.php" class="btn waves-effect waves-light">
                                    <i class="fa fa-pencil">Edit Notifications</i> </a>
                                    
                                    <a href="notifications_edit.php">
                                     <button type="button" class="btn btn-danger btn-xs" 
                                     onclick="return confirm('Are you sure you want to delete this item?');">
                                     Delete Notifications</button>
 
                                    </a>
                                    
                                    <a href="admin_notifications_live.php" class="btn waves-effect waves-orange">
                                    <i class="fa fa-square">List Notifications</i> </a>

                                <?php } else { if($auth_candidate) { ?>
                                <a href="#" class="btn waves-effect waves-green" 
												onClick="apply_this_job('<?php echo $row->notifid; ?>')">
                                    <i class="fa fa-check-square">Apply this Post</i></a>
                                
                                <?php } 
                                } ?>
                              <button type="button" class="btn btn-info btn-xs" onclick="goBack()">Go Back</button>
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