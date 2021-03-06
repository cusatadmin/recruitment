<?php
//http://www.fpdf.de/downloads/addons/30/ini_set('display_errors', 1);

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

	session_start();
	//$emailid = $_SESSION['emailid'] ;
	$emailid = $_GET['emailid'] ;
	//$auth = $_SESSION['authuser'];
	$auth = $_SESSION['authuser'] || $_SESSION['admin'];
	$notifid = $_GET['notifid'];
//echo "NOTIFID=".$notifid."EMAILID=".$emailid;
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
	
// get mooc
	$query4 = "SELECT * FROM moocs where mooc_emailid='$emailid'";
	
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
			$pdf->RotatedText(100,130,'Not to be Submitted',45);
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
		$pdf->Cell(190,5,'PART A',0,1,'C');
		
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
	    
		if ($notif->appn_eligible =="0" ) 
			$appn_eligible="Not Eligible for this post";

	    // Line break
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(30,10,'Personal Profile',0,0,'R');
		$pdf->Cell(100,10,$appn_eligible,0,1,'R');
		
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
		if ($notif->tr_status_desc =="" ) 
			$tr_status_desc="Not Available";
		else 
			$tr_status_desc=$notif->tr_status_desc;
		if ($notif->tr_amount =="" ) 
			$tr_amount="Not Available";
		else 
			$tr_amount=$notif->tr_amount;
			
		if ($notif->tr_ref_no =="" ) 
			$tr_ref_no="Not Available";
		else 
			$tr_ref_no=$notif->tr_ref_no;
			
		if ($notif->tr_req_date =="" ) 
			$tr_req_date="Not Available";
		else 
			$tr_req_date=date("d-m-Y h:i:s a", strtotime($notif->tr_req_date));

		$pdf->SetFont('Arial','',10);
		$pdf->Cell(50,10,'Payment Status',1,0,'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(40,10,$payment_status,1,0,'L');
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(30,10,'Status',1,0,'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(65,10,$tr_status_desc,1,1,'L');
	
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(50,10,'Amount Paid ',1,0,'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(40,10,$tr_amount,1,0,'L');
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(30,10,'Tran. Ref. No.',1,0,'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(65,10,$tr_ref_no,1,1,'L');
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(50,10,'Tran. Date and Time',1,0,'L');
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(135,10,$tr_req_date,1,1,'L');
		
		//addresses
		$pdf->SetWidths(array(90,95));
		$pdf->SetFont('Arial','',10);
		//$pdf->SetFont('Times','B',10);
		$pdf->Row(array("Address for Communication","Permanent Address"));
		$pdf->SetFont('Times','B',10);
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
//-----Page  start - Moocs
if($num_rows4<>0) {
	
		$pdf->AddPage('');
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
		$pdf->Cell(30,10,'Moocs Details',0,1,'R');
		$pdf->SetFont('Times','',10);
		
		$pdf->SetWidths(array(50,85,20,15,15));
		$pdf->Row(array('Course Title','URL','Date Taken','Duration','Score'));
		
		$pdf->SetFont('Times','B',10);
		$pdf->SetWidths(array(50,85,20,15,15));
		while ($mooc = $result4->fetch_object()) {
			$pdf->Row(array($mooc->mooc_title,$mooc->mooc_url,date("d-m-Y", strtotime($mooc->mooc_date)),$mooc->mooc_duration, $mooc->mooc_score));
		}
}		
//-----Page  end - Moocs
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
		
		$pdf->SetWidths(array(45,35,20,15,30,15,30,15,15,40,15));
		$pdf->Row(array('Title','Authorship','Vol No.','Page No.','Publication Type','Year','ISSN No.','Impact Factor','Indexing','Journal','Score'));
		
		$pdf->SetFont('Times','B',10);
		$pdf->SetWidths(array(45,35,20,15,30,15,30,15,15,40,15));
		while ($pub = $result5->fetch_object()) {
			$indexing="";
			if ($pub->publication_sci_indexed) $indexing="SCI"."\n";
			if ($pub->publication_scopus_indexed) $indexing.="Scopus"."\n";
			if ($pub->publication_ugc_carelisted) $indexing.="UGC Carelisted"."\n";
			$pdf->Row(array($pub->publication_title,$pub->publication_authorship,$pub->publication_volume_no,$pub->publication_page_no,$pub->publication_type,$pub->publication_year,$pub->publication_issn_no,$pub->publication_impact_factor,
			$indexing,$pub->publication_journal_name,$pub->publication_score));
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
		$pdf->Cell(100,10,'Documents uploaded ',0,1,'L');
		$pdf->SetFont('Arial','',10);
		$pdf->Ln(50);
		$width=$pdf->GetPageWidth()-20; // Width of Current Page
		$height=$pdf->GetPageHeight()-80; // Height of Current Page
		$i=0;		
		for($i=30;$i<=$height;$i +=10){
			$pdf->Line(20, $i, $width, $i);
		}
		$pdf->Ln(150);
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
