<?php
	session_start();
	$emailid = $_SESSION['emailid'] ;
	$firstname = $_SESSION['firstname'] ;
	$lastname = $_SESSION['lastname'] ;
	$auth = $_SESSION['authuser'];
	$photo = $_SESSION['photo'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}

	
?>
<script>
function goBack() {
  window.history.back();
}
</script>
<div class="container">
		<div class="col-md-12 col-md-offset-1">
        <div class="col-md-1">
           <img src="<?php echo "files/".$photo; ?>" width="100" height="150" alt="Missing Image"  id="image" onerror="this.src='/images/default.jpg'">
        </div>
				<div class="col-md-9">
                    <ul>	
                        <li><a href="candidate_notifications.php">CUSAT Notifications</a></li>
                        <li><a href="candidate_guidelines.php">Guidelines</a></li>
                        <li><a href="candidate_page.php">My Dashboard</a></li>                        
                        <li><a href="candidate_profile.php">Profile</a></li>
                        <li><a href="candidate_academic.php">Academic</a></li>
                        <li><a href="candidate_experience.php">Experience</a></li>                                               
						<li><a href="candidate_publications.php">Publications</a></li>  
                        <li><a href="candidate_books.php">Books</a></li>
                        <li><a href="candidate_moocs.php">MOOC Course</a></li>
                        <li><a href="candidate_awards.php">Awards</a></li>
                        <li><a href="candidate_uploads.php">Uploads</a></li>
                        <li><a href="candidate_pay_submit.php">Pay & Submit</a></li>
                        <li><a href="candidate_change_password.php">Change Password</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        
                    </ul>
                </div>
                <div class="col-md-9 center">
                <h2 style="color: #FF9"><?php echo $firstname." ".$lastname; ?></h2>                
                </div>
         </div>
</div>