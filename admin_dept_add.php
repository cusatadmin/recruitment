<?php
	session_start();
	$auth = $_SESSION['admin'] || $_SESSION['superadmin'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}

   include 'conf/db.php';

   if ($_POST['submit'] == "Add") {
	   
	$todays = date('Y-m-d H:i:s');
	$deptname = $_POST['deptname'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

		$query = "INSERT INTO departments 
				(deptname, phone, email, postdate) VALUES 
					('$deptname', '$phone', '$email', '$todays')";
		//echo $query;
		$stmt = $conn->prepare($query);

		$stmt->execute();
		
	$stmt->close();
	$conn->close();

	header("Location: admin_dept_list.php");
	   
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
                        <h4>Add Department</h4>
                     </div>
                     <div class="tab-inn">
                      <form class="form-inline" action="#" method="post" name="edit" >
                         <!-- Start Row -->
                         <div class="row">
                              <div class="col-md-4">
                              	<div class="text-danger small"><em>Name of the Department</em></div>
                               <input type="text" name="deptname" id="deptname"  value=""> 
                           	 </div>
                             <div class="col-md-4">
                              	<div class="text-danger small"><em>Phone Number</em></div>
                               <input type="text" name="phone" id="phone"  value=""> 
                           	 </div>
                             <div class="col-md-4">
                              	<div class="text-danger small"><em>Email ID</em></div>
                               <input type="text" name="email" id="email"  value=""> 
                           	 </div>
                            
                       	</div> <!-- row -->
						

                         <div class="row">
                              <div class="input-field col s12">
                                 <p><i class="waves-effect waves-light btn-large waves-input-wrapper" style="">
                                    <input type="submit" class="waves-button-input" id="submit" name="submit" value="Add">
                                    
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