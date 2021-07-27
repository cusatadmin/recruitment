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
   
	
	$query = "SELECT * FROM profile where emailid=?";
	
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();
	if ( $num_rows==0) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	} 
	if ($_POST['submit'] == "Add") {
			
		$todays = date('Y-m-d H:i:s');
		$publication_type = $_POST['publication_type'];
		$publication_year = $_POST['publication_year'];
		$publication_issn_no = $_POST['publication_issn_no'];
		$publication_authorship = $_POST['publication_authorship'];
		$publication_title = $_POST['publication_title'];
		$publication_volume_no = $_POST['publication_volume_no'];
		$publication_impact_factor = $_POST['publication_impact_factor'];
		$publication_page_no = $_POST['publication_page_no'];
		$publication_sci_indexed = $_POST['SCI'];
		$publication_scopus_indexed = $_POST['scopus'];
		$publication_ugc_carelisted = $_POST['ugccarelist'];
		$publication_journal_name = $_POST['publication_journal_name'];
		$publication_score = $_POST['publication_score'];
		
		
		$query = "INSERT INTO publications 
				(publication_emailid, 
				publication_type, 
				publication_year, 
				publication_issn_no,  
				publication_authorship, 
				publication_title, 
				publication_volume_no,
				publication_impact_factor,
				publication_page_no,
				publication_sci_indexed,
				publication_scopus_indexed,
				publication_ugc_carelisted,
				publication_journal_name,
				publication_score,
				publication_postdate) 
			VALUES 
				('$emailid',
				'$publication_type', 
				'$publication_year', 
				'$publication_issn_no', 
				'$publication_authorship', 
				'$publication_title', 
				'$publication_volume_no', 
				'$publication_impact_factor',
				'$publication_page_no',
				'$publication_sci_indexed',
				'$publication_scopus_indexed',
				'$publication_ugc_carelisted',
				'$publication_journal_name',
				'$publication_score',
				'$todays')";	
		//echo $query;
		$stmt = $conn->prepare($query);

		$stmt->execute();
		
	$stmt->close();
	$conn->close();

	header("Location: candidate_publications.php");
	//echo $message."</br/>";
	
	
	
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
                        <h4>Research Publications</h4>
                     </div>
                     <div class="tab-inn">
                      <form class="form-inline" action="#" method="post" name="editme" >
                         <!-- Start Row -->
                         <div class="row">
                         
                          	<div class="col-md-4">
                            <div class="text-danger small"><em>Type of Publication</em></div>
                            	<select name="publication_type" id="publication_type"  class="custom-select browser-default" required>
                                    <option value="" disabled selected>Select Category</option>
                                    <option value="Peer Reviewed" >Peer Reviewed</option>
                                    <option value="UGC Listed">UGC Listed</option>
                                 </select>
                         	</div>
                              <div class="col-md-4">
                              <div class="text-danger small"><em>Year of Publication</em></div>
                              <select name="publication_year" id="publication_year"  class="custom-select browser-default" required>
                                    <option value="" disabled selected>Select Year</option>
                                    <?php for ($year=1950; $year <= THIS_YEAR; $year++) { ?>
                                    	<option value="<?php echo $year; ?>" ><?php echo $year; ?></option>
                                    <?php } ?>
                                 </select>
                            </div>
                            <div class="col-md-4">
                             <div class="text-danger small"><em>ISSN No.</em></div>
                              <input type="text" value="" name="publication_issn_no" id="publication_issn_no" class="validate" placeholder="ISSN No." required>
                            </div>
                       	</div> <!-- row -->
                        <div class="row">
                        
                            <div class="col-md-4">
                             <div class="text-danger small"><em>Authorship</em></div>
                              <input type="text" value="" name="publication_authorship" id="publication_authorship" class="validate" placeholder="Authorship" required>
                            </div>
                            <div class="col-md-8">
                             <div class="text-danger small"><em>Publication Title</em></div>
                              <input type="text" value="" name="publication_title" id="publication_title" class="validate" placeholder="Title" required>
                              </div>
                            
                       	</div> <!-- row -->
						<div class="row">
                        
                            <div class="col-md-6">
                            <div class="text-danger small"><em>Publication Volume No.</em></div>
                              <input type="text" value="" name="publication_volume_no" id="publication_volume_no" class="validate" placeholder="Volume No." required>
                            </div>
                            <div class="col-md-6">
                            <div class="text-danger small"><em>Publication Page No.</em></div>
                              <input type="text" value="" name="publication_page_no" id="publication_page_no" class="validate" placeholder="Page No." required>
                              </div>
                            
                       	</div> <!-- row -->
                        
                        <div class="row">
                        
                           <div class="col-md-4">
                           <div class="text-danger small"><em>Impact factor</em></div>
                           <select name="publication_impact_factor" id="publication_impact_factor"  class="custom-select browser-default" required>
                                    <option value="No Imact Factor" disabled selected>Select Impact Factor</option>
                                    <option value="No Imact Factor" >No Imact Factor</option>
                                    <option value="less than 1">less than 1</option>
                                    <option value="between 1 and 2">between 1 and 2</option>
                                    <option value="between 2 and 5">between 2 and 5</option>
                                    <option value="between 5 and 10">between 5 and 10</option>
                                    <option value="above 10">above 10</option>
                             </select>
                         	</div>
                            <div class="col-md-6">
                            <div class="text-danger small"><em>Whether Scopus Indexed</em></div>

                              <input type="checkbox" id="SCI" name="SCI" value="1">
                              <label for="SCI">SCI Indexed</label>
                               <input type="checkbox" id="scopus" name="scopus" value="1">
                              <label for="scopus">Scopus Indexed</label>
                              <input type="checkbox" id="ugccarelist" name="scopus" value="1">
                              <label for="ugccarelist">UGC Carelisted</label>
                              </div>
                              <!--
                            <div class="col-md-2">
                           		<div class="text-danger small"><em>Score Obtained</em></div>
                           		<input type="text" value="" name="publication_score" id="publication_score" class="validate"  placeholder="Score Obtained">
                           	</div> 
                              -->
                       	</div> <!-- row -->
                        
                         <div class="row">
                            <div class="col-md-8">
                            <div class="text-danger small"><em>Name of Journal Published</em></div>
                              	<input type="text" value="" name="publication_journal_name" id="publication_journal_name" class="validate"  placeholder="Journal Name" required>
                            </div>

                              <div class="input-field col s12">
                                 <p><i class="waves-effect waves-light btn-large waves-input-wrapper" style="">
                                    <input type="submit" class="waves-button-input" id="submit" name="submit" value="Add">
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