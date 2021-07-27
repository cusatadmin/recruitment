<?php
	session_start();
	$emailid = $_SESSION['emailid'] ;
	$auth = $_SESSION['admin'];
	$notif_number_date = $_SESSION['notif_number_date'];
	//echo $notif_number_date;
	
	if ( !$auth) {	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}
	include 'conf/db.php';
	include "functions.php";

	$query = "SELECT * from notifications A RIGHT JOIN applications B on A.notifid=B.appn_notifid JOIN profile C 
					ON B.appn_emailid=C.emailid where notif_number_date=? order by appn_rank";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s", $notif_number_date);
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
    <?php  include "header.php"; ?><p></p><p></p>

</section>

      <div class="pro-menu">
      <?php include "admin_top_menu.php" ?>
        <div class="stu-db">
            <div class="container pg-inn">
                <div class="col-md-12">
                	<h4 align="center">Candidates List</h4>
					<div align="center">
                    <?php echo $notif_number_date."<br>".$row1->department."<br>".$row1->description;
					?>
                    </div>
                    <div class="pro-con-table">
                   
                        <table id="mytable" class="table table-striped table-bordered table-responsive" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="2%">No</th>
                                            <th width="4%">Rank</th>
                                            <th width="22%">Candidate Name</th>
                                            <th width="15%">Registration Number</th>
                                            <th width="16%">Category</th>
                                            <th width="10%">Date of Birth</th>
                                            <th width="18%">Address</th>
                                            <th width="13%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php 	while ($row = $result->fetch_object()) {	?>
                                        <tr>
                                            <td> <?php echo (++$i); ?></td>
                                            <td><?php echo $row->appn_rank; ?></td>
                                            <td><?php echo $row->firstname." ".$row->lastname; ?></td>
                                            <td><?php echo $row->OrderId; ?></td>
                                            <td><?php echo $row->category; ?></td>                                          
                                            <td><?php echo date("d-m-Y", strtotime($row->dateofbirth)); ?></td>
                                            <td>
											<?php echo $row->postaladd1."<br>".$row->postaladd2.
											"<br>".$row->postalcity."<br>".$row->postalpin."<br>".
											$row->postalstate."<br>".$row->postalcountry; ?>
                                            </td>
                                            <td>
                                            <a href="admin_ranking_application.php?id=
											<?php echo $row->notifid; ?>&emailid=<?php echo $row->appn_emailid; ?>">
                                            <button type="button" class="btn btn-primary btn-xs">View</button></a>
											</td>
                                            
                                        </tr>
                                     <?php } ?>   
                                    </tbody>
                                </table>
                     <button type="button" class="btn btn-info btn-xs" onclick="goBack()">Go Back</button>
                    </div>
                    
                </div>
            </div>
        </div>

<?php include "footer.php"; ?> 


</body>

</html>