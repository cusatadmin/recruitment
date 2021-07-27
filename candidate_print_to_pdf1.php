<?php
//http://www.fpdf.de/downloads/addons/30/ini_set('display_errors', 1);

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

	session_start();
	$emailid = $_SESSION['emailid'] ;
	//$auth = $_SESSION['authuser'];
	$auth = $_SESSION['authuser'] || $_SESSION['admin'];
	$notifid = $_GET['notifid'];

	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	} 

	include 'conf/db.php';
	include "functions.php";
	require('rotation.php');

class PDF extends PDF_Rotate
{
function RotatedText($x,$y,$txt,$angle)
{
    //Text rotated around its origin
    $this->Rotate($angle,$x,$y);
    $this->Text($x,$y,$txt);
    $this->Rotate(0);
}

function RotatedImage($file,$x,$y,$w,$h,$angle)
{
    //Image rotated around its upper-left corner
    $this->Rotate($angle,$x,$y);
    $this->Image($file,$x,$y,$w,$h);
    $this->Rotate(0);
}
}


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
	
	//$query1 = "SELECT * FROM applications t1 INNER JOIN notifications t2 ON t1.appn_notifid = t2.notifid where t2.notifid='$notifid'";
	$query1 = "SELECT * FROM applications t1 INNER JOIN notifications t2 ON t1.appn_notifid = t2.notifid where t1.appn_emailid='$emailid' and t1.appn_notifid='$notifid'";
	//$query1 = "SELECT * FROM notifications where notifid = '$notifid'";
	//echo $query;
	$stmt1 = $conn->prepare($query1);
	//$stmt->bind_param("s", $emailid);
	$stmt1->execute(); //working
	$result1 = $stmt1->get_result();
	$num_rows1 = $result1->num_rows;
	$notif = $result1->fetch_object();

	$photo = "files/".$row->photo;
	$comm_address = $row->postaladd1."\n".$row->postaladd2."\n".$row->postalcity."\n".$row->postalstate."\n".$row->postalpin."\n".$row->postalcountry;
	$perm_address = $row->permanentadd1."\n".$row->permanentadd2."\n".$row->permanentcity."\n".$row->permanentstate."\n".$row->permanentpin."\n".$row->permanentcountry;
	
	// get academic records
	$query2 = "SELECT * FROM academic where acad_emailid='$emailid'";
	//echo $query;
	$stmt2 = $conn->prepare($query2);
	//$stmt->bind_param("s", $emailid);
	$stmt2->execute(); //working
	$result2 = $stmt2->get_result();
	$num_rows2 = $result2->num_rows;
	
	// get Experience records
	$query3 = "SELECT * FROM experience where exp_emailid='$emailid'";
	//echo $query;
	$stmt3 = $conn->prepare($query3);
	//$stmt->bind_param("s", $emailid);
	$stmt3->execute(); //working
	$result3 = $stmt3->get_result();
	$num_rows3 = $result3->num_rows;
	
// get phd 
	$query4 = "SELECT * FROM phd where phd_emailid='$emailid'";
	
	$stmt4 = $conn->prepare($query4);
	//$stmt->bind_param("s", $emailid);
	$stmt4->execute(); //working
	$result4 = $stmt4->get_result();
	$num_rows4 = $result4->num_rows;
//get publications

	$query5 = "SELECT * FROM publications where publication_emailid='$emailid'";
	
	$stmt5 = $conn->prepare($query5);
	//$stmt->bind_param("s", $emailid);
	$stmt5->execute(); //working
	$result5 = $stmt5->get_result();
	$num_rows5 = $result5->num_rows;	

//get Books

	$query = "SELECT * FROM books where book_emailid='$emailid'";	
	$stmt_books = $conn->prepare($query);
	$stmt_books->execute(); //working
	$result_books = $stmt_books->get_result();
	$num_books = $result_books->num_rows;	
	
//get awards

	$query6 = "SELECT * FROM awards where award_emailid='$emailid'";
	
	$stmt6 = $conn->prepare($query6);
	//$stmt->bind_param("s", $emailid);
	$stmt6->execute(); //working
	$result6 = $stmt6->get_result();
	$num_rows6 = $result6->num_rows;
	
	$pdf=new PDF('P','mm','A4');
	$pdf->AddPage();
	
	if ($notif->appn_payment_status<>2)
		{
			$pdf->SetFont('Arial','',30);
			$pdf->SetTextColor(255,192,203);
			$pdf->RotatedText(45,130,'S  A  M  P  L  E       C  O  P  Y',45);
			$pdf->SetTextColor(0,0,0);
		}
	
	$pdf->SetTopMargin(5);
	$pdf->SetFont('Arial','B',14);
	    $pdf->Cell(190,5,'COCHIN UNIVERSITY OF SCIENCE AND TECHNOLOGY',0,1,'C');
		// Logo
		//
		$pdf->Cell(30,5,'',0,1,'C');
		$pdf->SetFont('Arial','B',12);
	    //$pdf->Image('images/cusat_logo.jpg',97,15,15,15);
		$pdf->Image('images/cusat_logo.jpg',10,5,25,30,'JPG');
		
		//$pdf->Image($photo1,170,23,25,30,'JPG');
		$pdf->Image($photo,170,20,25,30,'JPG');
		//$pdf->Ln(10);
		$pdf->Cell(190,5,'Recruitment Cell',0,1,'C');
	    // Arial bold 15
		//$pdf->Cell(30,10,'',0,1,'C');
		$pdf->Ln(20);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(50,5,'Notification Number',0,0,'L');
		$pdf->Cell(120,5,$notif->notif_number_date,0,1,'L');
		$pdf->Cell(50,5,'Notification Description',0,0,'L');
	    $pdf->Cell(120,5,$notif->description,0,1,'L');
		$pdf->Cell(50,5,'Department',0,0,'L');
	    $pdf->Cell(120,5,$notif->department,0,1,'L');
		
	    // Line break
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(30,10,'Personal Profile',0,1,'R');
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(50,10,'Registration Number',1,0,'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(135,10,$notif->OrderId,1,1,'L');
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(50,10,'Name',1,0,'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(135,10,$row->firstname." ".$row->lastname,1,1,'L');
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(50,10,'Email ID',1,0,'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(135,10,$row->emailid,1,1,'L');
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(50,10,'Sex',1,0,'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(135,10,$row->gender,1,1,'L');
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(50,10,'Date of Birth',1,0,'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(135,10,date("d-m-Y", strtotime($row->dateofbirth)),1,1,'L');
		
		if ($row->marital==0) $marital="Single"; else $marital="Married"; 
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(50,10,'Marital Status',1,0,'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(135,10,$marital,1,1,'L');
	
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(50,10,'Name of Guardian',1,0,'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(135,10,$row->guardianname,1,1,'L');
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(50,10,'Nationality',1,0,'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(135,10,$row->nationality,1,1,'L');
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(50,10,'Category',1,0,'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(135,10,$row->category,1,1,'L');
		
		if ($row->pwd=="vi") $pwbd="Visually Impaired(VI)"; 
			elseif ($row->pwd=="ld")  $pwbd="Locomotor Disability(LD)";	
			elseif ($row->pwd=="hi")  $pwbd="Hearing Impaired (HI)";	
			else $pwbd="Not Applicable";
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(50,10,'Whether PWBD',1,0,'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(135,10,$pwbd,1,1,'L');
//payment status
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(50,10,'Application Fees',1,0,'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(135,10,$notif->amount." (".$notif->currencyName.")",1,1,'L');
		
		if ($notif->appn_payment_status==2)
			$payment_status="Paid";
		elseif ($notif->appn_payment_status==1) 
			$payment_status="Processing";
			else
				$payment_status="Not Paid";

		$pdf->SetFont('Arial','',10);
		$pdf->Cell(50,10,'Payment Status',1,0,'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(135,10,$payment_status,1,1,'L');
		//addresses
		$pdf->SetWidths(array(90,95));
		$pdf->SetFont('Arial','',10);
		//$pdf->SetFont('Times','B',10);
		$pdf->Row(array("Address for Communication","Permanent Address"));
		
		$pdf->Row(array($comm_address,$perm_address));
		
//-----Page  start - Qualifications
		$pdf->AddPage();
		if ($notif->appn_payment_status<>2)
		{
			$pdf->SetFont('Arial','',30);
			$pdf->SetTextColor(255,192,203);
			$pdf->RotatedText(45,130,'S  A  M  P  L  E       C  O  P  Y',45);
			$pdf->SetTextColor(0,0,0);
		}
		$pdf->Ln(5);
		$pdf->SetTopMargin(5);
		$pdf->SetFont('Arial','B',12);	
		$pdf->Cell(30,10,'Academic record',0,1,'R');
		$pdf->SetFont('Times','',10);
		
		
		$pdf->SetWidths(array(25,35,12,15,50,50));
		$pdf->Row(array('Degree','Main/Core Subjects','% of marks','Year of passing','University/Institution/Board','School/College/Institution'));
		
		$pdf->SetFont('Times','B',10);
		$pdf->SetWidths(array(25,35,12,15,50,50));
		while ($acad = $result2->fetch_object()) {
			$pdf->Row(array($acad->acad_degree,$acad->acad_subject,$acad->acad_percentage,$acad->acad_pass_year,$acad->acad_board,$acad->acad_institute));
		}

//-----Page  end - Qualifications		

//-----Page  start - Experiences

if($num_rows3<>0) {
	
		$pdf->AddPage();
		if ($notif->appn_payment_status<>2)
		{
			$pdf->SetFont('Arial','',30);
			$pdf->SetTextColor(255,192,203);
			$pdf->RotatedText(45,130,'S  A  M  P  L  E       C  O  P  Y',45);
			$pdf->SetTextColor(0,0,0);
		}
		$pdf->Ln(5);
		$pdf->SetTopMargin(5);
		$pdf->SetFont('Arial','B',12);	
		$pdf->Cell(30,10,'Experience',0,1,'R');
		$pdf->SetFont('Times','',10);
		
		$pdf->SetWidths(array(25,50,20,20,70));
		$pdf->Row(array('Category','Designation','From','To','Employer'));
		
		$pdf->SetFont('Times','B',10);
		$pdf->SetWidths(array(25,50,20,20,70));
		while ($exp = $result3->fetch_object()) {
			$pdf->Row(array($exp->exp_category,$exp->exp_designation,date("d-m-Y", strtotime($exp->exp_from_date)),date("d-m-Y", strtotime($exp->exp_to_date)),$exp->exp_employer));
		}
}		
//-----Page  end - Experiences
//-----Page  start - Books
if($num_books<>0) {
	
		$pdf->AddPage();
		if ($notif->appn_payment_status<>2)
		{
			$pdf->SetFont('Arial','',30);
			$pdf->SetTextColor(255,192,203);
			$pdf->RotatedText(45,130,'S  A  M  P  L  E       C  O  P  Y',45);
			$pdf->SetTextColor(0,0,0);
		}
		$pdf->Ln(5);
		$pdf->SetTopMargin(5);
		$pdf->SetFont('Arial','B',12);	
		$pdf->Cell(30,10,'Books Published',0,1,'R');
		$pdf->SetFont('Times','',10);
		
		$pdf->SetWidths(array(50,55,10,55,15));
		$pdf->Row(array('Title','Authorship','Year','Publisher','Score'));
		
		$pdf->SetFont('Times','B',10);
		$pdf->SetWidths(array(50,55,10,55,15));
		while ($books_list = $result_books->fetch_object()) {
			$pdf->Row(array($books_list->book_title,$books_list->book_authorship,$books_list->book_year,$books_list->book_journal_name,$books_list->book_score));
		}
}		
//-----Page  end - Books
//-----Page  start - Awards
if($num_rows6<>0) {
	
		$pdf->AddPage();
		if ($notif->appn_payment_status<>2)
		{
			$pdf->SetFont('Arial','',30);
			$pdf->SetTextColor(255,192,203);
			$pdf->RotatedText(45,130,'S  A  M  P  L  E       C  O  P  Y',45);
			$pdf->SetTextColor(0,0,0);
		}
		$pdf->Ln(5);
		$pdf->SetTopMargin(5);
		$pdf->SetFont('Arial','B',12);	
		$pdf->Cell(30,10,'Awards',0,1,'R');
		$pdf->SetFont('Times','',10);
		
		$pdf->SetWidths(array(50,55,20,45,15));
		$pdf->Row(array('Awarding Body','Name of Award','Date Awarded','Award Level', 'Score'));
		
		$pdf->SetFont('Times','B',10);
		$pdf->SetWidths(array(50,55,20,45,15));
		while ($award = $result6->fetch_object()) {
			$pdf->Row(array($award->award_body,$award->award_name,date("d-m-Y", strtotime($award->award_date)),$award->award_level,$award->award_score));
		}
}		
//-----Page  end - Awards

//-----Page  start - Phd
if($num_rows4<>0) {
	
		$pdf->AddPage('L');
		if ($notif->appn_payment_status<>2)
		{
			$pdf->SetFont('Arial','',30);
			$pdf->SetTextColor(255,192,203);
			$pdf->RotatedText(45,130,'S  A  M  P  L  E       C  O  P  Y',45);
			$pdf->SetTextColor(0,0,0);
		}
		$pdf->Ln(5);
		$pdf->SetTopMargin(5);
		$pdf->SetFont('Arial','B',12);	
		$pdf->Cell(30,10,'Ph.D. Details',0,1,'R');
		$pdf->SetFont('Times','',10);
		
		$pdf->SetWidths(array(25,40,70,35,20,20,70));
		$pdf->Row(array('Category','Subject','Title','Companion','Awarded','Registered','Publications'));
		
		$pdf->SetFont('Times','B',10);
		$pdf->SetWidths(array(25,40,70,35,20,20,70));
		while ($phd = $result4->fetch_object()) {
			$pdf->Row(array($phd->phd_category,$phd->phd_subject,$phd->phd_title,$phd->phd_companion,date("d-m-Y", strtotime($phd->phd_award_date)),date("d-m-Y", strtotime($phd->phd_registration_date)),$phd->phd_publications));
		}
}		
//-----Page  end - Phd

//-----Page  start - Publications
if($num_rows5<>0) {
	
		$pdf->AddPage('L');
		if ($notif->appn_payment_status<>2)
		{
			$pdf->SetFont('Arial','',30);
			$pdf->SetTextColor(255,192,203);
			$pdf->RotatedText(45,130,'S  A  M  P  L  E       C  O  P  Y',45);
			$pdf->SetTextColor(0,0,0);
		}
		$pdf->Ln(5);
		$pdf->SetTopMargin(5);
		$pdf->SetFont('Arial','B',12);	
		$pdf->Cell(50,10,'Publications Details',0,1,'R');
		$pdf->SetFont('Times','',10);
		
		$pdf->SetWidths(array(45,35,20,15,30,20,30,15,15,50));
		$pdf->Row(array('Title','Authorship','Vol No.','Page No.','Publication Type','Publication Year','ISSN No.','Impact Factor','Indexing','Journal'));
		
		$pdf->SetFont('Times','B',10);
		$pdf->SetWidths(array(45,35,20,15,30,20,30,15,15,50));
		while ($pub = $result5->fetch_object()) {
			$indexing="";
			if ($pub->publication_sci_indexed) $indexing="SCI"."\n";
			if ($pub->publication_scopus_indexed) $indexing.="Scopus"."\n";
			if ($pub->publication_ugc_carelisted) $indexing.="UGC Carelisted"."\n";
			$pdf->Row(array($pub->publication_title,$pub->publication_authorship,$pub->publication_volume_no,$pub->publication_page_no,$pub->publication_type,$pub->publication_year,$pub->publication_issn_no,$pub->publication_impact_factor,
			$indexing,$pub->publication_journal_name));
		}
	}
//-----Page end - Publications	

	//-----Page  start - Checklist
		$pdf->AddPage();
		if ($notif->appn_payment_status<>2)
		{
			$pdf->SetFont('Arial','',30);
			$pdf->SetTextColor(255,192,203);
			$pdf->RotatedText(45,130,'S  A  M  P  L  E       C  O  P  Y',45);
			$pdf->SetTextColor(0,0,0);
		}
		$pdf->Ln(5);
		$pdf->SetTopMargin(5);
		$pdf->SetFont('Arial','B',12);	
		$pdf->Cell(100,10,'Checklist - Tick if you have uploaded the following',0,1,'L');
		$pdf->SetFont('Arial','',10);
		
		$pdf->SetXY(40,20);$pdf->Rect(30,22,5,5);
		$pdf->Cell(150,10,'1. Downloaded this PDF file for printing',0,1,'L');
			
		$pdf->SetXY(40,30);$pdf->Rect(30,32,5,5);			
		$pdf->Cell(150,10,'2. Photo Uploaded*',0,1,'L');
		
		$pdf->SetXY(40,40);$pdf->Rect(30,42,5,5);	
		$pdf->Cell(150,10,'3. SSLC / Class 10th Certificate (Indicating DOB)*',0,1,'L');
		
		$pdf->SetXY(40,50);$pdf->Rect(30,52,5,5);	
		$pdf->Cell(150,10,'4. UG Certificate',0,1,'L');
		$pdf->SetXY(100,50);$pdf->Rect(110,52,5,5);	
		$pdf->SetXY(115,50);$pdf->Cell(20,10,'Required',0,0,'L');
		$pdf->SetXY(135,50);$pdf->Rect(140,52,5,5);
		$pdf->SetXY(145,50);$pdf->Cell(30,10,'Not Required',0,1,'L');
		
		$pdf->SetXY(40,60);$pdf->Rect(30,62,5,5);	
		$pdf->Cell(150,10,'5. PG Certificate',0,0,'L');
		$pdf->SetXY(100,60);$pdf->Rect(110,62,5,5);	
		$pdf->SetXY(115,60);$pdf->Cell(20,10,'Required',0,0,'L');
		$pdf->SetXY(135,60);$pdf->Rect(140,62,5,5);
		$pdf->SetXY(145,60);$pdf->Cell(30,10,'Not Required',0,1,'L');
		
		$pdf->SetXY(40,70);$pdf->Rect(30,72,5,5);	
		$pdf->Cell(150,10,'6. PhD Certificate',0,0,'L');
		$pdf->SetXY(100,70);$pdf->Rect(110,72,5,5);	
		$pdf->SetXY(115,70);$pdf->Cell(20,10,'Required',0,0,'L');
		$pdf->SetXY(135,70);$pdf->Rect(140,72,5,5);
		$pdf->SetXY(145,70);$pdf->Cell(30,10,'Not Required',0,1,'L');
		
		$pdf->SetXY(40,80);$pdf->Rect(30,82,5,5);	
		$pdf->Cell(150,10,'7. PWBD Certificate',0,1,'L');
		$pdf->SetXY(100,80);$pdf->Rect(110,82,5,5);	
		$pdf->SetXY(115,80);$pdf->Cell(20,10,'Required',0,0,'L');
		$pdf->SetXY(135,80);$pdf->Rect(140,82,5,5);
		$pdf->SetXY(145,80);$pdf->Cell(30,10,'Not Required',0,1,'L');
		
		$pdf->SetXY(40,90);$pdf->Rect(30,92,5,5);	
		$pdf->Cell(150,10,'8. Community Certificate',0,1,'L');
		$pdf->SetXY(100,90);$pdf->Rect(110,92,5,5);	
		$pdf->SetXY(115,90);$pdf->Cell(20,10,'Required',0,0,'L');
		$pdf->SetXY(135,90);$pdf->Rect(140,92,5,5);
		$pdf->SetXY(145,90);$pdf->Cell(30,10,'Not Required',0,1,'L');
		
		$pdf->SetXY(40,100);$pdf->Rect(30,102,5,5);	
		$pdf->Cell(150,10,'9. Teaching Experience Certificate',0,1,'L');
		$pdf->SetXY(100,100);$pdf->Rect(110,102,5,5);	
		$pdf->SetXY(115,100);$pdf->Cell(20,10,'Required',0,0,'L');
		$pdf->SetXY(135,100);$pdf->Rect(140,102,5,5);
		$pdf->SetXY(145,100);$pdf->Cell(30,10,'Not Required',0,1,'L');
		
		$pdf->SetXY(40,110);$pdf->Rect(30,112,5,5);	
		$pdf->Cell(150,10,'10. Research Experience Certificate',0,1,'L');
		$pdf->SetXY(100,110);$pdf->Rect(110,112,5,5);	
		$pdf->SetXY(115,110);$pdf->Cell(20,10,'Required',0,0,'L');
		$pdf->SetXY(135,110);$pdf->Rect(140,112,5,5);
		$pdf->SetXY(145,110);$pdf->Cell(30,10,'Not Required',0,1,'L');
		
		$pdf->SetXY(40,120);$pdf->Rect(30,122,5,5);	
		$pdf->Cell(150,10,'11. No Objection Certificate',0,1,'L');
		$pdf->SetXY(100,120);$pdf->Rect(110,122,5,5);	
		$pdf->SetXY(115,120);$pdf->Cell(20,10,'Required',0,0,'L');
		$pdf->SetXY(135,120);$pdf->Rect(140,122,5,5);
		$pdf->SetXY(145,120);$pdf->Cell(30,10,'Not Required',0,1,'L');
		
		$pdf->SetXY(40,130);$pdf->Rect(30,132,5,5);	
		$pdf->Cell(150,10,'12. Any Other Documents',0,1,'L');
		$pdf->SetXY(100,130);$pdf->Rect(110,132,5,5);	
		$pdf->SetXY(115,130);$pdf->Cell(20,10,'Required',0,0,'L');
		$pdf->SetXY(135,130);$pdf->Rect(140,132,5,5);
		$pdf->SetXY(145,130);$pdf->Cell(30,10,'Not Required',0,1,'L');
		
		
		$pdf->SetFont('Times','BU',10);
		$pdf->Cell(180,8,'Declaration',0,1,'C');
		$pdf->SetFont('Times','',10);
		$declaration = "I, ".$row->firstname." ".$row->lastname.", have read the notification and all other related instructions. All information and data furnished are true to the best of my knowledge and belief. ";
		
		$pdf->Write(5,$declaration);
		$pdf->Ln(9);
//$todays = date('Y-m-d H:i:s');
		$pdf->Cell(50,5,"Place : ".$row->postalcity,0,1);
		$pdf->Cell(50,5,"Date : ".date('d-m-Y'),0,0);
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(130,5,"Signature of applicant",0,1,'R');
		$pdf->SetFont('Times','I',8);
		$pdf->Cell(180,5,"(in hard copy)",0,1,'R');
		$pdf->Ln(2);
		$pdf->SetFont('Times','BU',10);
		$pdf->Cell(50,5,"List of Enclosures ",0,1);
		//$pdf->SetFont('Times','',10);
		$pdf->Cell(50,5,"(to be filled in the hard copy)",0,1);

//-----Page  end - Checklist		
	

		$pdf->Output();

	$pdf->Close();

//Create file

//functions here


?>
