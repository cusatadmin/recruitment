<?php
//http://www.fpdf.de/downloads/addons/30/ini_set('display_errors', 1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
	//require('mc_table.php');
	require_once('fpdf17/fpdf.php');
	require_once('fpdi/fpdi.php');
	
	$query = "SELECT * FROM profile where emailid=?";
	
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();

	if ( $num_rows==0) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	} 
	
	// get notifications
	
	$query1 = "SELECT * FROM applications t1 INNER JOIN notifications t2 ON t1.appn_notifid = t2.notifid where t1.appn_emailid='$emailid'";
	//echo $query;
	$stmt1 = $conn->prepare($query1);
	//$stmt->bind_param("s", $emailid);
	$stmt1->execute(); //working
	$result1 = $stmt1->get_result();
	$num_rows1 = $result1->num_rows;
	$notif = $result1->fetch_object();

   // echo $dob;
	$today_date = date('d-m-Y');
	//$perm_add = truncate($perm_add, 250);
	//$perm_add = substr($perm_add, 0, strpos(wordwrap($perm_add, 100), "\n"));
	
	
  // initiate FPDI
  $pdf = new FPDI();

  /* <Virtual loop> */
  $pdf->AddPage();
  $pdf->setSourceFile("application_form.pdf");

  $tplIdx = $pdf->importPage(1);
  $pdf->useTemplate($tplIdx);
  // now write some text above the imported page
 // $pdf->SetXY(75,63); $pdf->MultiCell(120,5,$notif->notif_number_date);
  $pdf->SetFont('Arial','','10');
 $pdf-> SetTextColor(46,55,236);
 //$pdf->SetXY(150,5);
  $pdf->Image("files/".$row->photo,172,18,30,35);
 // $pdf->Image('images/S_006.jpg',155,117,32,12);
  //$pdf->Image($photo_path,155,67,35,40);
  //$pdf->Image($sign_path,155,117,32,12);
 
  //$pdf->SetXY(75,66); $pdf->Write(0,$notif->notif_number_date);
  $pdf->SetXY(75,63); $pdf->MultiCell(120,5,$notif->notif_number_date);
  $pdf->SetXY(75,80); $pdf->Write(0,"XXXXXXXXXXXXXX");
  $pdf->SetXY(75,88.5); $pdf->Write(0,$row->firstname." ".$row->lastname);
  $pdf->SetXY(75,98); $pdf->Write(0,$row->emailid);
  $pdf->SetXY(75,106); $pdf->Write(0,$row->gender);
  $pdf->SetXY(75,113.5); $pdf->Write(0,$row->gender);
  //$pdf->SetXY(75,90.5); $pdf->MultiCell(70,5,$perm_add);
  //$pdf->SetXY(75,93); $pdf->Write(0,$perm_add);
  
  $pdf->SetXY(75,123.5); $pdf->Write(0,date("d-m-Y", strtotime($row->dateofbirth)));
 
 //second page
 $pdf->AddPage();
$tplIdx = $pdf->importPage(2);
  $pdf->useTemplate($tplIdx);
  // now write some text above the imported page
  $pdf->SetFont('Arial','','10');
 $pdf-> SetTextColor(46,55,236);
 
 // $pdf->Image('images/P_006.jpg',155,67,35,40);
 // $pdf->Image('images/S_006.jpg',155,117,32,12);
  //$pdf->Image($photo_path,155,67,35,40);
  //$pdf->Image($sign_path,155,117,32,12);
 
  $pdf->SetXY(75,67); $pdf->Write(0,$notif->notif_number_date);
  $pdf->SetXY(75,73.4); $pdf->Write(0,$row->firstname." ".$row->lastname);
  
  $pdf->SetXY(75,80.5); $pdf->Write(0,$row->emailid);
  $pdf->SetXY(75,87.1); $pdf->Write(0,$row->gender);
  //$pdf->SetXY(75,90.5); $pdf->MultiCell(70,5,$perm_add);
  //$pdf->SetXY(75,93); $pdf->Write(0,$perm_add);
  
  $pdf->SetXY(75,126); $pdf->Write(0,date("d-m-Y", strtotime($row->dateofbirth)));
	$pdf->Output();

	$pdf->Close();

$message = "!!! SUCCESSFULLY PRINTED !!!";
//header("Location: exit.php?message=$message");

//Create file

//functions here
function truncate($str, $width) {
    return strtok(wordwrap($str, $width, "...\n"), "\n");
}

?>
