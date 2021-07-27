<?php
	session_start();
	$emailid = $_SESSION['emailid'] ;
	$firstname = $_SESSION['firstname'] ;
	$lastname = $_SESSION['lastname'] ;
	$auth = $_SESSION['authuser'];
	$photo = $_SESSION['photo'];
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: login.php?message=$message");
    	exit();
	} 

	
?>
<style>
input[type='file'] {
  color: transparent;
}
</style>

<div class="col-md-3">

                    <div class="pro-user-bio">

                         <h4><?php echo $firstname." ".$lastname; ?></h4>
 						<p><?php echo $emailid; ?></p>
                        <p><a href="logout.php">Logout</a></p>
                    </div>
</div>
                
