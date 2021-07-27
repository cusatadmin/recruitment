<?php
	session_start();
	$auth = $_SESSION['admin'] || $_SESSION['superadmin'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}

   include 'conf/db.php';
	$entry=$_GET['entry'];
	//echo " ID :".$entry;

	$query = "SELECT * FROM postnames where postid='$entry'";
	
	$stmt = $conn->prepare($query);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();
   
   if ($_POST['submit'] == "Submit") {
	$entry = $_POST['entry'];
	$todays = date('Y-m-d H:i:s');
	$postname = $_POST['postname'];

		$query = "UPDATE postnames SET
					postname = '$postname',
					postdate = '$todays'
				  where postid = '$entry'";

		//echo $query;
		$stmt = $conn->prepare($query);

		$stmt->execute();
		
	$stmt->close();
	$conn->close();

	header("Location: admin_postname_list.php");
	   
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
         <?php include "admin_top_menu.php" ?>
		<div class="stu-db">
            <div class="container pg-inn">

               <div class="col-md-8">
                  <div class="box-inn-sp admin-form">
                     <div class="inn-title">
                        <h4>Add Degree</h4>
                     </div>
                     <div class="tab-inn">
                      <form class="form-inline" action="#" method="post" name="edit" >
                      <input type="hidden" name="entry" value="<?php echo $entry; ?>">
                         <!-- Start Row -->
                         <div class="row">
                              <div class="col-md-4">
                              <div class="text-danger small"><em>Name of the Post</em></div>
                               <input type="text" name="postname" id="postname"  value="<?php echo $row->postname; ?>"> 
                            </div>
                            
                       	</div> <!-- row -->
						

                         <div class="row">
                              <div class="input-field col s12">
                                 <p><i class="waves-effect waves-light btn-large waves-input-wrapper" style="">
                                    <input type="submit" class="waves-button-input" id="submit" name="submit" value="Submit">
                                    
                                    </i>
                                 </p><button type="button" class="btn btn-info btn-xs" onclick="goBack()">Go Back</button>
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
     <?php include "footer.php"; ?> 
</body>
</html>