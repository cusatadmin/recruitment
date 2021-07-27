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
	//$query = "SELECT * from notifications";
	
	$query = "SELECT * FROM books where book_emailid='$emailid'";
	
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
<script type="text/javascript">
function confirmSubmit(degree)
	{	
		var msg;	
		msg= "Are you sure you want to delete the data  " + degree + " Entry";	
		var agree=confirm(msg);	
		if (agree)	
			return true ;	
		else	
			return false ;	
	}

</script>
<style>

.table-condensed{
  font-size: 8px;
}
</style>
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
                <?php //include "candidate_left_menu.php" ?>
                <div class="col-md-12">
					<div class="inn-title">
                    	<h4 align="center">My Published Books</h4>
                    </div>
						<div class="text-danger" align="center">(Required only if Applicable)</div>
                            <div class="pro-con-table">
                                <table class="bordered table-responsive  table-condensed">
                                    <thead class="small">
                                        <tr>
                                        	<th>Title</th>
                                            <th>Authorship</th>                                                                          
                                            <th>Publication Year</th>                                            
                                            <th>Publisher</th>
                                            
                                            <th><a href="candidate_books_add.php">
                                            <button type="button" class="btn btn-primary btn-xs">Add New</button>
                                            </a></th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php 	while ($row = $result->fetch_object()) {	?>
                                        <tr>
                                        	<td><a href="candidate_book_view.php?entry=<?php echo $row->publication_id; ?>">
											<?php echo $row->book_title; ?></a></td> 
                                            <td><?php echo $row->book_authorship; ?></td>
                                            <td><?php echo $row->book_year; ?></td>
                                            <td><?php echo $row->book_journal_name; ?></td>
                                           
                                            <td>
                                            <a href="candidate_book_view.php?entry=<?php echo $row->book_id; ?>">
                                            <button type="button" class="btn btn-success btn-xs">View</button></a>
                                            <a href="candidate_book_edit.php?entry=<?php echo $row->book_id; ?>">
                                            <button type="button" class="btn btn-info btn-xs">Edit</button></a>
                                            <a href="candidate_book_delete.php?entry=<?php echo $row->book_id; ?>" 
                                            onClick="return confirmSubmit('<?php echo $row->book_id ?>')">
                                            <button type="button" class="btn btn-danger btn-xs">Delete</button></a></td>
                                        </tr>
                                     <?php } ?>
                                  </tbody>
                                </table>

                    </div>
                </div>
            </div>
        </div>
    <!--SECTION END-->
<?php include "footer.php" ?>

    <!--Import jQuery before materialize.js-->
<script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>