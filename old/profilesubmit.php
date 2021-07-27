<?php 

include 'conf/db.php';


$firstname=$_POST['firstname'];
$gender=$_POST['gender'];
$category=$_POST['category'];
$countrycode=$_POST['profile-countrycode'];
$mobile=$_POST['profile-mobile'];
$pwd=$_POST['profile-pwd'];
$nationality=$_POST['profile-nationality'];
$dob=$_POST['profile-dob'];
//$dob=date("d-m-Y", strtotime($dob));
$marital=$_POST['marital'];
$guardianname=$_POST['profile-guardianname'];
$postaladd1=$_POST['profile-postaladd1'];
$postaladd2=$_POST['profile-postaladd2'];
$postalcity=$_POST['profile-postalcity'];
$postalstate=$_POST['profile-postalstate'];
$postalpin=$_POST['profile-postalpin'];
$postalcountry=$_POST['profile-postalcountry'];
$permanentadd1=$_POST['profile-permanentadd1'];
$permanentadd2=$_POST['profile-permanentadd2'];
$permanentcity=$_POST['profile-permanentcity'];
$permanentstate=$_POST['profile-permanentstate'];
$permanentpin=$_POST['profile-permanentpin'];
$permanentcountry=$_POST['profile-permanentcountry'];


$query = "INSERT INTO `profile` ( `firstname`, `countrycode`, `nationality`, `gender`, `mobile`, `category`, `pwd`, `marital`, `guardianname`, `postaladd1`, `postaladd2`, `postalcity`, `postalstate`, `postalpin`, `postalcountry`, `permanentadd1`, `permanentadd2`, `permanentcity`, `permanentstate`, `permanentpin`, `permanentcountry`,`dateofbirth`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
	//echo $query;
	$stmt = $conn->prepare($query);
	$stmt->bind_param("ssssssssssssssssssssss", $firstname, $countrycode, $nationality,$gender,$mobile, $category, $pwd, $marital, $guardianname, $postaladd1, $postaladd2, $postalcity, $postalstate, $postalpin, $postalcountry, $permanentadd1, $permanentadd2, $permanentcity, $permanentstate, $permanentpin, $permanentcountry,$dateofbirth);
	$stmt->execute(); //working
	//$qry = "INSERT INTO `profile` ( `firstname`, `countrycode`, `nationality`, `gender`, `mobile`, `category`, `pwd`, `marital`, `guardianname`, `postaladd1`, `postaladd2`, `postalcity`, `postalstate`, `postalpin`, `postalcountry`, `permanentadd1`, `permanentadd2`, `permanentcity`, `permanentstate`, `permanentpin`, `permanentcountry`,`dateofbirth`) VALUES  ";
	//echo $qry.(" ( ' ".$firstname."',' ". $countrycode."',' ".$nationality."',' ".$gender."',' ".$mobile."',' ". $category."',' ". $pwd."',' ". $marital."',' ". $guardianname."',' ". $postaladd1."',' ". $postaladd2."',' ". $postalcity."',' ". $postalstate."',' ". $postalpin."',' ". $postalcountry."',' ". $permanentadd1."',' ". $permanentadd2."',' ".$permanentcity."',' ". $permanentstate."',' ". $permanentpin."',' ". $permanentcountry."','".$dob."' )");
	  $stmt->close();
	  $conn->close();

 header("Location: home.php#home"); 
 ?>