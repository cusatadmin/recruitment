<?php 
	session_start();
	$emailid = $_SESSION['emailid'] ;
	$auth = $_SESSION['authuser'];
	//$entry = $_SESSION['entry'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	} 
	include 'conf/db.php';
	
	//echo " ID :".$_POST['acad_id'];
	$entry=$_GET['entry'];
	//echo " ID :".$entry;

	$query = "SELECT * FROM books where book_id='$entry'";
	
	$stmt = $conn->prepare($query);
	//$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();
	
	if ($_POST['submit'] == "Submit") {
	
		$entry = $_POST['entry'];	
		$todays = date('Y-m-d H:i:s');
		$book_title = $_POST['book_title'];
		$book_abstract = $_POST['book_abstract'];
		$book_year = $_POST['book_year'];
		$book_authorship = $_POST['book_authorship'];
		$book_journal_name = $_POST['book_journal_name'];
		$book_score = $_POST['book_score'];
		
		$query = "UPDATE books  set 
				book_emailid = '$emailid',
				book_title = '$book_title',
				book_abstract = '$book_abstract',
				book_year = '$book_year',
				book_authorship = '$book_authorship',
				book_journal_name = '$book_journal_name',
				book_score = '$book_score',
				book_postdate = '$todays'
		where book_id = '$entry'";
		//echo $query;
		$stmt = $conn->prepare($query);
		$stmt->execute();

	  $stmt->close();
	  $conn->close();
	 header("Location: candidate_books.php");
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
                        <h4>Book Published</h4>
                     </div>
                     <div class="tab-inn">
                      <form class="form-inline" action="#" method="post" name="editme" >
                      <input type="hidden" name="entry" value="<?php echo $entry; ?>">
                      
                      
                       <!-- Start Row -->
                         <div class="row">
                            <div class="col-md-2">
                              <div class="text-danger small"><em>Publication Year</em></div>
                              <select name="book_year" id="book_year"  class="custom-select browser-default" required>
                                    <option value="" disabled selected>Select Year</option>
                                    <?php for ($year=1950; $year <= THIS_YEAR; $year++) { ?>
                                    	<option value="<?php echo $year; ?>"  <?php if ($row->book_year==$year) echo "Selected"; ?> ><?php echo $year; ?></option>
                                    <?php } ?>
                                 </select>
                            </div>

                         <!-- Start Row -->
                         <div class="row">
                            <div class="col-md-6">
                             <div class="text-danger small"><em>Authorship</em></div>
                              <input type="text" value="<?php echo $row->book_authorship; ?>" name="book_authorship" id="book_authorship" class="validate" placeholder="Authorship" required>
                            </div>
                           </div>

                         <!-- Start Row -->
                         <div class="row"> 
                            <div class="col-md-6">
                             <div class="text-danger small"><em>Book Title</em></div>
                              <input type="text" value="<?php echo $row->book_title; ?>" name="book_title" id="book_title" class="validate" placeholder="Title" required>
                              </div>
                            <div class="col-md-6">
                            <div class="text-danger small"><em>Name of Publisher</em></div>
                              	<input type="text" value="<?php echo $row->book_journal_name; ?>" name="book_journal_name" id="book_journal_name" class="validate"  placeholder="Publisher Name" required>
                            </div>
                       	</div> <!-- row -->
                    
                         <div class="row">
                            <div class="col-md-10">
                            <div class="text-danger small"><em>Book Astract</em></div>
                              	<input type="text" value="<?php echo $row->book_abstract; ?>" name="book_abstract" id="book_abstract" class="validate"  placeholder="Abstract" required>
                            </div>
                            <div class="col-md-2">
                            <div class="text-danger small"><em>Score Obtained</em></div>
                              	<input type="text" value="<?php echo $row->book_score; ?>" 
                              	name="book_score" id="book_score" class="validate"  
                              	placeholder="Score Obtained" disabled>
                            </div>
						</div> <!-- row -->
                    
                         <div class="row">
                              <div class="input-field col s12">
                                 <p><i class="waves-effect waves-light btn-large waves-input-wrapper" style="">
                                    <input type="submit" class="waves-button-input" id="submit" name="submit" value="Submit">
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