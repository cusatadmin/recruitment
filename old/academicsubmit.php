<?php 
include 'conf/db.php';
$tenth_board = $_POST['tenth_board'];
$tenth_subject = $_POST['tenth_subject'];
$tenthResultType = $_POST['tenthResultType'];
$tempTenthPercentage = $_POST['tempTenthPercentage'];
$tenth_year = $_POST['tenth_year'];
$tenth_school = $_POST['tenth_school'];
$twelfth_board = $_POST['twelfth_board'];
$twelfth_subject = $_POST['twelfth_subject'];
$twelfthResultType = $_POST['twelfthResultType'];
$tempTwelthPercentage = $_POST['tempTwelthPercentage'];
$twelfth_year = $_POST['twelfth_year'];
$qualification = $_POST['qualification'];
$stream = $_POST['stream'];
$ugcollege = $_POST['ugcollege'];
$ugsubject = $_POST['ugsubject'];
$ugpercentage = $_POST['ugpercentage'];
$ugyear = $_POST['ugyear'];
$uguniversity = $_POST['uguniversity'];
$pgcollege = $_POST['pgcollege'];
$pgsubject = $_POST['pgsubject'];
$pgpercentage = $_POST['pgpercentage'];
$pgyear = $_POST['pgyear'];
$pguniversity = $_POST['pguniversity'];
$mphilna = $_POST['mphilna'];
$phdna = $_POST['phdna'];
$Academic_oTitle = $_POST['Academic_oTitle'];
$academic_odatesub = $_POST['academic_odatesub'];
$Academic_oDetails = $_POST['Academic_oDetails'];
$net = $_POST['net'];
$netsubject = $_POST['netsubject'];
$netcertificateno = $_POST['netcertificateno'];

$query = "INSERT INTO `academic` ( `tenth_board`, `tenth_subject`, `tenthResultType`, `tempTenthPercentage`, `tenth_year`, `tenth_school`, `twelfth_board`, `twelfth_subject`, `twelfthResultType`, `tempTwelthPercentage`, `twelfth_year`, `qualification`, `stream`, `ugcollege`, `ugsubject`, `ugpercentage`, `ugyear`, `uguniversity`, `pgcollege`, `pgsubject`,`pgpercentage`,pgyear,pguniversity, mphilna, phdna, Academic_oTitle,academic_odatesub,Academic_oDetails,net, netsubject,netcertificateno) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?,?,?)";
	//echo $query;
	$stmt = $conn->prepare($query);
	$stmt->bind_param("sssssssssssssssssssssssssssssss", $tenth_board, $tenth_subject, $tenthResultType,$tempTenthPercentage,$tenth_year, $tenth_school, $twelfth_board, $twelfth_subject, $twelfthResultType, $tempTwelthPercentage, $twelfth_year, $qualification, $stream, $ugcollege, $ugsubject, $ugpercentage, $ugyear, $uguniversity, $pgcollege, $pgsubject,$pgpercentage,$pgyear,$pguniversity,$mphilna,$phdna,$Academic_oTitle,$academic_odatesub,$Academic_oDetails,$net,$netsubject,$netcertificateno);
	$stmt->execute(); //working

	  $stmt->close();
	  $conn->close();

 header("Location: admin-add-courses.html#menu1"); 
 ?>