<?php
session_start();
$emailid = $_SESSION['emailid'] ;
?>
	<div class="col-md-12">				
		<a href="admin_view_application.php" >
			<button type="button" class="btn btn-info btn-xs">Application</button>					
		</a>
		<a href="admin_candidate_profile.php" >
			<button type="button" class="btn btn-info btn-xs">Profile</button>					
		</a>
		<a href="admin_academic.php" >
			<button type="button" class="btn btn-info btn-xs">Qualifications</button> 
		</a>
		<a href="admin_experience.php">
			<button type="button" class="btn btn-info btn-xs">Experiences</button>
		</a>
		<a href="admin_publications.php" >
			<button type="button" class="btn btn-info btn-xs">Publications</button>
		</a>
		<a href="admin_books.php" >
			<button type="button" class="btn btn-info btn-xs">Books</button>
		</a>
		<a href="admin_moocs.php" >
			<button type="button" class="btn btn-info btn-xs">Mooc</button>
		</a>
		<a href="admin_awards.php" >
			<button type="button" class="btn btn-info btn-xs">Awards</button>
		</a>
		<a href="admin_uploads.php" >
			<button type="button" class="btn btn-info btn-xs">Uploads</button>
		</a>
	</div>

