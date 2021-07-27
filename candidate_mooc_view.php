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
	
	//echo " ID :".$_POST['acad_id'];
	$entry=$_GET['entry'];
	$_SESSION['entry'] = $entry;
	//echo " ID :".$entry;

	$query = "SELECT * FROM moocs where mooc_id='$entry'";
	
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
               <?php include "candidate_left_menu.php" ?>
               
               <div class="col-md-9">

                            <h4>My Online Course</h4>

                            <div class="sdb-tabl-com sdb-pro-table">
                                <table class="table-responsive bordered">
                                    <tbody>
                                        <tr>
                                            <td>Title of the Course</td>
                                            <td>:</td>
                                            <td><?php echo $row->mooc_title; ?></td>
                                        </tr>
                                        <tr>
                                            <td>URL of Course</td>
                                            <td>:</td>
                                            <td><a href="<?php echo $row->mooc_url; ?>" target="_blank">
												<?php echo $row->mooc_url; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Date of Course</td>
                                            <td>:</td>
                                            <td><?php echo date("d-m-Y", strtotime($row->mooc_date)); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Duration(in hours)</td>
                                            <td>:</td>
                                            <td><?php echo $row->mooc_duration; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Score Obtained</td>
                                            <td>:</td>
                                            <td><?php echo $row->mooc_score; ?></td>
                                        </tr>
                                                                          
                                     </tbody>
                                 </table>
                                 <div class="">

                                    <a href="candidate_mooc_edit.php?entry=<?php echo $row->mooc_id; ?>" class="waves-effect waves-light btn-large sdb-btn"><i class="fa fa-pencil"></i> Edit</a>
                                    <a href="candidate_moocs.php" class="waves-effect waves-light btn-large sdb-btn"><i class="fa fa-pencil"></i> List Courses</a>

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