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
	
	$query = "SELECT * FROM profile where emailid=?";
	//echo $query;
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();

?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>
 input[type=file]{ 
        color:transparent;
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

                <div class="col-md-12">
				  <div class="inn-title">
                    <h4 align="center">My Uploads</h4>
                  </div>

                        <div class="pro-con-table">
                      <table class="bordered table-responsive">
                            	<thead>
                                	<tr>
                                    	<td width="270"><div align="center"><strong>Description</strong></div></td>
                                        <td width="180"><div align="center"><strong>Uploaded File</strong></div></td>
                                        <td width="218"><div align="center"><strong>Select File</strong></div></td>
                                        <td width="108"><div align="center"><strong>Upload</strong></div></td>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                 <!-- file Upload start -->
                                <form id="file-form" action="candidate_file_upload.php" method="post" enctype="multipart/form-data">
                                	<input name="degree" id="degree" value="Photo" type="hidden">
                                    <tr>
                                        <td>Photo Size - Width : 3.5 cm Height 4.5 cm - Format - jpeg</td>
                                        <td>
                                            <a href="<?php echo "files/".$row->photo; ?>" target="_blank"><?php echo $row->photo; ?> </a>
                                        </td>
                                        <td><input type="file" id="myfile" name="myfile" >
                                        </td>
                                        <td>
                                        <input type="submit" id="submit" name="submit" value="Upload Photo Now" class="btn btn-primary btn-xs">
                                        </td>
                                    </tr>
                                  </form>
                                    <!-- file Upload end -->

                                    <!-- file Upload start -->
                                    <form id="file-form" action="candidate_file_upload.php" method="post" enctype="multipart/form-data">
                                    <input name="degree" id="degree" value="net" type="hidden">
                                    <tr>
                                        <td>NET Certificate</td>
                                        <td>
                                            <a href="<?php echo "files/".$row->net; ?>" target="_blank"><?php echo $row->net; ?></a>
                                        </td>
                                        <td><input type="file"
                                         id="myfile" name="myfile">
                                        </td>
                                        <td>
                                        <input type="submit" id="submit" name="submit" value="Upload File Now" class="btn btn-primary btn-xs" >
                                        </td>
                                    </tr>
                                    </form>
                                    <!-- file Upload end -->
                                    <!-- file Upload start -->
                                    <form id="file-form" action="candidate_file_upload.php" method="post" enctype="multipart/form-data">
                                    <input name="degree" id="degree" value="community" type="hidden">
                                    <tr>
                                        <td>Community Certificate</td>
                                        <td>
                                            <a href="<?php echo "files/".$row->community; ?>" target="_blank"><?php echo $row->community; ?></a>
                                        </td>
                                        <td><input type="file" id="myfile" name="myfile">
                                        </td>
                                        <td>
                                        <input type="submit" id="submit" name="submit" value="Upload File Now" class="btn btn-primary btn-xs" >
                                        </td>
                                    </tr>
                                    </form>
                                    <!-- file Upload end -->
                                    <!-- file Upload start -->
                                    <form id="file-form" action="candidate_file_upload.php" method="post" enctype="multipart/form-data">
                                    <input name="degree" id="degree" value="pwbd" type="hidden">
                                    <tr>
                                        <td>PWBD Certificate</td>
                                        <td>
                                            <a href="<?php echo "files/".$row->pwbd; ?>" target="_blank"><?php echo $row->pwbd; ?></a>
                                        </td>
                                        <td><input type="file" id="myfile" name="myfile">
                                        </td>
                                        <td>
                                        <input type="submit" id="submit" name="submit" value="Upload File Now" class="btn btn-primary btn-xs" >
                                        </td>
                                    </tr>
                                    </form>
                                    <!-- file Upload end -->

                                    <!-- file Upload start -->
                                    <form id="file-form" action="candidate_file_upload.php" method="post" enctype="multipart/form-data">
                                    <input name="degree" id="degree" value="noc" type="hidden">
                                    <tr>
                                        <td>No Objection Certificate</td>
                                        <td>
                                            <a href="<?php echo "files/".$row->noc; ?>" target="_blank"><?php echo $row->noc; ?></a>
                                        </td>
                                        <td><input type="file" id="myfile" name="myfile">
                                        </td>
                                        <td>
                                        <input type="submit" id="submit" name="submit" value="Upload File Now" class="btn btn-primary btn-xs" >
                                        </td>
                                    </tr>
                                    </form>
                                    <!-- file Upload end -->
                                    <!-- file Upload start -->
                                    <form id="file-form" action="candidate_file_upload.php" method="post" enctype="multipart/form-data">
                                    <input name="degree" id="degree" value="info_data" type="hidden">
                                    <tr>
                                        <td>PART B - Information Data Sheet 
                                        <br>(only for Associate Professor / Professor Posts)
                                        <br><a href="Associate_Professor_Part_B.docx">
                                            <button type="button" class="btn btn-success btn-xs">Download PART B</button>
                                        </a>
                                        <br>Upload the Downloaded file after filling   
                                        </td>
                                        <td>
                                            <a href="<?php echo "files/".$row->info_data; ?>" target="_blank"><?php echo $row->info_data; ?></a>
                                        </td>
                                        <td><input type="file" id="myfile" name="myfile">
                                        
                                        </td>
                                        <td>
                                        
                                        <input type="submit" id="submit" name="submit" value="Upload File Now" class="btn btn-primary btn-xs" >
                                        </td>
                                    </tr>
                                    </form>
                                    <!-- file Upload end -->
                                    <!-- file Upload start -->
                                    <form id="file-form" action="candidate_file_upload.php" method="post" enctype="multipart/form-data">
                                    <input name="degree" id="degree" value="info_data" type="hidden">
                                    <tr>
                                        <td>PART B - Information Data Sheet 
                                        <br>(only for Assistant Professor Posts)
                                        <br><a href="Assistant_Professor_Part_B.docx">
                                            <button type="button" class="btn btn-success btn-xs">Download PART B</button>
                                        </a>
                                        <br>Upload the Downloaded file after filling   
                                        </td>
                                        <td>
                                            <a href="<?php echo "files/".$row->info_data; ?>" target="_blank"><?php echo $row->info_data; ?></a>
                                        </td>
                                        <td><input type="file" id="myfile" name="myfile">
                                        
                                        </td>
                                        <td>
                                        
                                        <input type="submit" id="submit" name="submit" value="Upload File Now" class="btn btn-primary btn-xs" >
                                        </td>
                                    </tr>
                                    </form>
                                    <!-- file Upload end -->
                                    <!-- file Upload start -->
                                    <form id="file-form" action="candidate_file_upload.php" method="post" enctype="multipart/form-data">
                                    <input name="degree" id="degree" value="other" type="hidden">
                                    <tr>
                                        <td>Any Other Documents</td>
                                        <td>
                                            <a href="<?php echo "files/".$row->other; ?>" target="_blank"><?php echo $row->other; ?></a>
                                        </td>
                                        <td><input type="file" id="myfile" name="myfile">
                                        </td>
                                        <td>
                                        <input type="submit" id="submit" name="submit" value="Upload File Now" class="btn btn-primary btn-xs" >
                                        </td>
                                    </tr>
                                    </form>
                                    <!-- file Upload end -->
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