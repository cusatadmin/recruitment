<?php 
include 'conf/db.php';
// code user email availablity
if(!empty($_POST["emailid"])) {
	$email= $_POST["emailid"];
	$mobile = $_POST["mobile"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

		echo "error : You did not enter a valid email.";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	}
	else {
		$stmt =$conn ->prepare("SELECT emailid,mobile FROM profile WHERE emailid=? and mobile=?");
		$stmt->bind_param("ss",$email,$mobile);
		$stmt->execute();
		$stmt->store_result();
		$num=$stmt->num_rows;
		#$stmt->bind_result($email);
		#$result= $conn -> query($sql);
		#$num=mysqli_num_rows($result);
		$cnt=1;
		if($num > 0)
		{
			echo "<script> document.getElementById('emailid1').focus();</script>";
		echo "<span style='color:red'> Record already exists .</span>";
		 echo "<script>$('#submit').prop('disabled',true);</script>";
		  
		} 
		else{
			
			echo "<span style='color:green'> Record available for Registration .</span>";
		 echo "<script>$('#submit').prop('disabled',false);</script>";
		}
}
}


?>
