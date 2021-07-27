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
	include "functions.php";
	$query = "SELECT * FROM applications where appn_emailid='$emailid'";

	$result = $conn->query($query);// Generate resultset
   $myappn=array();
   while($row = $result->fetch_array(MYSQLI_ASSOC)){
   	$myappn[]=array("appn_notifid"=>$row['appn_notifid']);
   }
   $maxappns=sizeof($myappn);

	
	$query = "SELECT * from notifications ";
	$stmt = $conn->prepare($query);
	//$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$i=0;
?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>

    <!-- MOBILE MENU -->
    <section>
    <?php include "header.php"; ?><p></p><p></p>

</section>

    <section>
      <div class="pro-menu">
      <?php include "candidate_top_menu.php" ?>
<div class="stu-db">
            <div class="container pg-inn">
				
                <div class="col-md-12">
					<div class="inn-title">
                    	<h4 align="center">Vacancy Notifications</h4>
                    </div>
                            <div class="pro-con-table">
                                <table width="100%" class="bordered responsive-table">
                                    <thead>
                                        <tr>
                                            <th width="3%">No</th>
                                            <th width="22%">Notification</th>
                                            <th width="32%">Post Description</th>
                                            <th width="29%">Department</th>
                                            <th width="9%">Last Date</th>
                                            <th width="7%">Applied</th>
                                            <th width="3%">View</th>
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
                                            <?php
                                            	$applied=0;
                                            	for ($i=0; $i<=$maxappns; $i++)
                                            		if ($myappn[$i]['appn_notifid'] == $row->notifid)	
                                              		$applied = 1;
                                              if ($applied)  		
                                              	echo "Yes";
                                              else 
                                              	echo "No";		
                                            ?>
                                            </td>
                                            <td>
                                            <a href="notifications_view.php?entry=<?php echo $row->notifid; ?>">
                                            <button type="button" class="btn btn-info btn-xs">View</button>
                                            </a>
                                            </td>
                                        </tr>
                                     <?php } ?>
                                    </tbody>
                                </table>
                  </div>
                </div>
            </div>
        </div>
    </section>
<?php include "footer.php" ?>
    <!--Import jQuery before materialize.js-->
<script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>