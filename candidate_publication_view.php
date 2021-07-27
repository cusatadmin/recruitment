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

	$query = "SELECT * FROM publications where publication_id='$entry'";
	
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

                            <h4>My Publications</h4>

                            <div class="sdb-tabl-com sdb-pro-table">
                                <table class="table-responsive bordered">
                                    <tbody>
                                        <tr>
                                            <td>Publication Type</td>
                                            <td>:</td>
                                            <td><?php echo $row->publication_type; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Publication Year</td>
                                            <td>:</td>
                                            <td><?php echo $row->publication_year; ?></td>
                                        </tr>
                                        <tr>
                                            <td>ISSN No.</td>
                                            <td>:</td>
                                            <td><?php echo $row->publication_issn_no; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Authorship.</td>
                                            <td>:</td>
                                            <td><?php echo $row->publication_authorship; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Title</td>
                                            <td>:</td>
                                            <td><?php echo $row->publication_title; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Volume No.</td>
                                            <td>:</td>
                                            <td><?php echo $row->publication_volume_no; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Page No.</td>
                                            <td>:</td>
                                            <td><?php echo $row->publication_page_no; ?></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <td>Impact Factor</td>
                                            <td>:</td>
                                            <td><?php echo $row->publication_impact_factor; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Indexing</td>
                                            <td>:</td>
                                            <td>
                                            <?php 
                                            if ($row->publication_sci_indexed) echo "SCI"."<br>";
                                            if ($row->publication_scopus_indexed) echo "Scopus"."<br>"; 
                                            if ($row->publication_ugc_carelisted) echo "UGC Carelist"."<br>";
                                            ?>
                                            
                                            </td>
                                        </tr>
                                            <td>Journal</td>
                                            <td>:</td>
                                            <td><?php echo $row->publication_journal_name; ?></td>
                                        </tr>
                                        </tr>
                                            <td>Score Obtained</td>
                                            <td>:</td>
                                            <td><?php echo $row->publication_score; ?></td>
                                        </tr>
                                        
                                       
                                     </tbody>
                                 </table>
                                 <div class="">

                                    <a href="candidate_publication_edit.php?entry=<?php echo $row->publication_id; ?>" class="waves-effect waves-light btn-large sdb-btn"><i class="fa fa-pencil"></i> Edit Publications</a>
                                    <a href="candidate_publications.php" class="waves-effect waves-light btn-large sdb-btn"><i class="fa fa-pencil"></i> List Publications</a>

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