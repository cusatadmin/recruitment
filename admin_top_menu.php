<?php
	session_start();
	$auth = $_SESSION['admin'];
	if (!$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: login.php?message=$message");
    	exit();
}

	
?>

<div class="container">
                <div class="col-md-9">
                    <ul>
                        <li><a href="admin_page.php" class="pro-act">My Home</a></li>
                        <li><a href="admin_index_page_list.php">Index Page</a></li>
                        <li><a href="guidelines.php">Guidelines</a></li>
                        <li><a href="admin_notifications_live.php" >Live Notifications</a></li>
                        <li><a href="admin_notifications_all.php">All Notifications</a></li>
                        <li><a href="admin_notifications_with_candidates.php">Candidates List</a></li>
                        <li><a href="admin_postname_list.php">Postnames List</a></li>
                        <li><a href="admin_staff_list.php">Staff List</a></li>
                        <li><a href="admin_degree_list.php">Degree List</a></li>
                        <li><a href="admin_dept_list.php">Department List</a></li>
                        <li><a href="admin_payments.php">Payment Details</a></li>
                        <li><a href="admin_excel_export.php">Export to excel</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
</div>