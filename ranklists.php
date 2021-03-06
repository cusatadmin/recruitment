<?php
	session_start();

	include 'conf/db.php';
	
	// Pagination start
define("ITEM_PER_PAGE", 10);

$page = (int)$_REQUEST['page'];
		if($page=="")
			$page = 1;
	$query = "select count(*) as counted from notifications where display=1" ;
	//echo $query;
	$stmt = $conn->prepare($query);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$row = $result->fetch_object();
	$records_total = $row->counted;
	
   //echo "Records Total=".$records_total;	
	
   $records_from = ($page-1)*ITEM_PER_PAGE;
   $records_limit = ITEM_PER_PAGE;
	$pages_total = ceil($records_total/ITEM_PER_PAGE);	
	$i=0;
	if ($page<$pages_total) {
		$display_next_link = true;
		//$i=$page*ITEM_PER_PAGE;
	}
	else
		$display_next_link = false;

	if($page>1) {
		$display_prev_link = true;
		$i=$page*ITEM_PER_PAGE;
	}
	else
		$display_prev_link = false;
// Pagination end


   $query = "SELECT * from notifications where display=1 order by last_date_online limit $records_from, $records_limit";
	$stmt = $conn->prepare($query);
	//$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;

?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>

    <!-- MOBILE MENU -->
    <section>
    <?php include "header_index.php"; ?><p></p><p></p>

</section>

      <div class="pro-menu">
      
<div class="stu-db">
<div class="col-md-11" align="right">
			<a href="old_ranklists.php">
					<button type="button" class="btn btn-success btn-xs">Rank Lists Prior to 19.4.2021</button>			
			</a>
      </div>
            <div class="container pg-inn">
            
                <div class="col-md-12">
					<div class="inn-title">
                    <h4 align="center">Ranklists</h4>
                    </div>
                            <div class="pro-con-table">
                          <table width="100%" border="1" class="bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="3%">No</th>
                                            <th width="23%">Notification No and Date</th>
                                            <th width="26%">Post Description</th>
                                            <th width="22%">Department</th>
                                            <th width="12%">Last Date</th>
                                            <th width="14%">Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php 	while ($row = $result->fetch_object()) {	?>
                                        <tr>
                                            <td> <?php echo (++$i); ?></td>
                                            <td><?php echo $row->notif_number_date; ?>
                                            <?php if ( !empty($row->filename) ) {  ?>
                                            <a href="<?php echo "files/".$row->filename; ?>" target="_blank"> Download Notification</a> 
                                            <?php } ?>
                                            </td>
                                            <td><?php echo $row->description; ?></td>
                                            <td><?php echo $row->department; ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($row->last_date_online)); ?></td>
                                            <td>
                                            
                                                <?php if ($row->ranklist) { ?>
                                            <a href="<?php echo "files/".$row->ranklist; ?>" target="_blank">
                                            <button type="button" class="btn btn-success btn-xs">RANKLIST</button>
                                            </a>
                                            <?php } else { ?>
                                            <button type="button" class="btn btn-info btn-xs">Not Prepared</button>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                     <?php } ?>   
                                    </tbody>
                                </table>
										<div align="center">  
	                    <?php  if ($display_prev_link) echo "<a href='notifications.php?page=".($page-1)."'>Prev</a>";?>
	                           &nbsp;
	                    <?php  if ($display_next_link) echo "<a href='notifications.php?page=".($page+1)."'>Next</a>"; ?>	          
							</div>
                  </div>
                </div>
            </div>
        </div>
    <!--SECTION END-->

<?php include "footer.php"; ?> 
    <!--Import jQuery before materialize.js-->
<script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>