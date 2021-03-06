<?php
	session_start();
	$emailid = $_SESSION['emailid'] ;
	$auth = $_SESSION['admin'];
	$candidate_name = $_SESSION['candidate_name'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}

	include 'conf/db.php';
	include "functions.php";
	
   $query = "SELECT column_name 
	            FROM INFORMATION_SCHEMA.COLUMNS 
				  WHERE TABLE_NAME IN ('notifications', 'applications', 'profile')";				
	$stmt = $conn->prepare($query);
	$stmt->execute(); //working
	$result = $stmt->get_result();
   //$field_names[];
   $i=0;	
	if ($_POST['submit'] == 'Submit') {
	  // Check if any option is selected
     if(isset($_POST["fields"])) 
      {
        // Retrieving each selected option
        foreach ($_POST['fields'] as $fields)  
          //print "You selected $fields<br/>";
          $field_names[$i++] = $fields;
          $last=$i;
      }
      $select_fields = "";
      
      for ($i=0; $i<$last; ++$i) {
      	//echo $i." = ".$field_names[$i];
      	$select_fields =$select_fields.",".$field_names[$i];
      }
       //echo $select_fields; 
        $select_fields = ltrim($select_fields, ',');
		  $query = "SELECT $select_fields from notifications A RIGHT JOIN applications B on A.notifid=B.appn_notifid 
		     JOIN profile C ON B.appn_emailid=C.emailid";
		  //echo $query;
		  
		$stmt = $conn->prepare($query);
		$stmt->execute(); //working
		$result = $stmt->get_result();
		$items = array();

		//Store table records into an array
		while( $row = $result->fetch_assoc() ) {
		  $items[] = $row;
		}
		
		//Define the filename with current date
		$fileName = "itemdata-".date('d-m-Y').".xls";
		
		//Set header information to export data in excel format
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename='.$fileName);
		
		//Set variable to false for heading
		$heading = false;
		
		//Add the MySQL table data to excel file
		if(!empty($items)) {
		  foreach($items as $item) {
		    if(!$heading) {
		     echo implode("\t", array_keys($item)) . "\n";
		     $heading = true;
		   }
		  echo implode("\t", array_values($item)) . "\n";
		}
		}
		exit();
				
			}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<script type="text/css">
		body {
		    background: #e8cbc0;
		    background: -webkit-linear-gradient(to right, #e8cbc0, #636fa4);
		    background: linear-gradient(to right, #e8cbc0, #636fa4);
		    min-height: 100vh;
		}
		
		.bootstrap-select .bs-ok-default::after {
		    width: 0.3em;
		    height: 0.6em;
		    border-width: 0 0.1em 0.1em 0;
		    transform: rotate(45deg) translateY(0.5rem);
		}
		
		.btn.dropdown-toggle:focus {
		    outline: none !important;
		}

</script>
<style>

.table-condensed{
  font-size: 8px; 
}
</style>
<style type="text/css">
	#UserDisplayForm label { display: block; }
	#UserDisplayForm div { display: inline-block; }
</style>
<script type="text/javascript">
		$(function () {
		    $('.selectpicker').selectpicker();
		});
</script>
</head>

<body>

    <!-- MOBILE MENU -->
    <section>
    <?php include "header.php"; ?><p></p><p></p>

</section>
<section>
	<div class="pro-menu">
	<?php include "admin_top_menu.php" ?>
	<div class="stu-db">
	  <div class="container pg-inn">
	    <div class="col-md-8">
		   <h4 align="center">Select the fields to be exported</h4> 
	        <form class="form-inline" action="#" method="POST">
				 <div class="form-group col-xs-8">		
						  
	            <select name = 'fields[]' multiple data-style="bg-white" class="selectpicker">
	          	  <?php 	while ($row = $result->fetch_object()) {	?>
	                <option value="<?php echo $row->column_name; ?>"> 
	                  <?php echo $row->column_name; ?>
	                </option>
	               <?php  } ?>                            
	            </select>

			     </div>
			     <input type="submit" class="btn btn-primary btn-xs" name="submit" id="submit" value="Submit"/>
				</form>											
	       </div>
	     </div>
	   </div>

	 </div>
</section>
<!--SECTION END-->
<?php include "footer.php" ?>

    <!--Import jQuery before materialize.js-->
<script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>