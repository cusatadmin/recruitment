<?php 
	session_start();

	$auth = $_SESSION['admin'];
	
	include 'conf/db.php';
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}
	//echo " ID :".$_POST['acad_id'];
	$entry=$_GET['entry'];
	$_SESSION['entry'] = $entry;
	//echo " ID :".$entry;

	$query = "SELECT * FROM index_page where index_id='$entry'";
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
   
   <script language="javascript">

	
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

	


</script>
   </head>
<body>
      <!-- MOBILE MENU -->
      <section>
         <?php 
				include "header.php"; 
			?>
         <p></p>
         <p></p>
      </section>
      <section>
         <div class="pro-menu">
         <?php 
		 	include "admin_top_menu.php";
		 ?>
		<div class="stu-db">
            <div class="container pg-inn">

               <div class="col-md-12">

                            <h4>Index Page View</h4>

                            <div class="sdb-tabl-com sdb-pro-table">
                                <table class="table-responsive bordered">
                                    <tbody>
                                        <tr>
                                            <td>Short Title</td>
                                            <td>:</td>
                                            <td><?php echo $row->short_title; ?>
																<span id="user-status" style="font-size:12px;"></span>                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Display Order</td>
                                            <td>:</td>
                                            <td><?php echo $row->priority; ?>                                            
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Description</td>
                                            <td>:</td>
                                            <td><?php echo $row->description; ?></td>
                                        </tr>
                                        <tr>
                                            <td>File Uploaded (if any)</td>
                                            <td>:</td>
                                            <td>
                                            <?php 
                                            if ( !empty($row->filename1) ) { ?>
                                            <a href="<?php echo "documents/".$row->filename1; ?>" target="_blank"> 
                                            &nbsp;View Uploaded File</a> 
                                            <?php } else echo "File Not Uploaded";
                                            
                                            ?>

                                            
                                            </td>
                                        </tr>
                                        
                                       
                                     </tbody>
                                 </table>
                                    
                                    <a href="admin_index_page_edit.php" class="btn waves-effect waves-light">
                                    <i class="fa fa-pencil">Edit</i> </a>
                                    
                                    <a href="admin_index_page_delete.php?entry=<?php echo $row->index_id; ?>">
                                     <button type="button" class="btn btn-danger btn-xs" 
                                     onclick="return confirm('Are you sure you want to delete this item?');">
                                     Delete </button>
 
                                    </a>
                                    
                                    <a href="admin_index_page_list.php" class="btn waves-effect waves-orange">
                                    <i class="fa fa-square">List</i> </a>


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