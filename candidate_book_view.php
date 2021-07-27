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

	$query = "SELECT * FROM books where book_id='$entry'";
	
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

                            <h4>My books</h4>

                            <div class="sdb-tabl-com sdb-pro-table">
                                <table class="table-responsive bordered">
                                    <tbody>
                                        <tr>
                                            <td>Title of the book</td>
                                            <td>:</td>
                                            <td><?php echo $row->book_title; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Abstract</td>
                                            <td>:</td>
                                            <td><?php echo $row->book_abstract; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Authorship</td>
                                            <td>:</td>
                                            <td><?php echo $row->book_authorship; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Publication Year</td>
                                            <td>:</td>
                                            <td><?php echo $row->book_year; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Publisher</td>
                                            <td>:</td>
                                            <td><?php echo $row->book_journal_name; ?></td>
                                        </tr>       
                                        <tr>
                                            <td>Score Obtained</td>
                                            <td>:</td>
                                            <td><?php echo $row->book_score; ?></td>
                                        </tr>                                
                                     </tbody>
                                 </table>
                                 <div class="">

                                    <a href="candidate_book_edit.php?entry=<?php echo $row->book_id; ?>" class="waves-effect waves-light btn-large sdb-btn"><i class="fa fa-pencil"></i> Edit books</a>
                                    <a href="candidate_books.php" class="waves-effect waves-light btn-large sdb-btn"><i class="fa fa-pencil"></i> List books</a>

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