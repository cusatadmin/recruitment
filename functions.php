<?php
define('SENDER', 'cusatfacultyrecruit@gmail.com');
define('PASSWORD', 'cusatfac'); 
define('NAME','Recruitment Cell, CUSAT');
define('SUBJECT','Recruitment Cell, CUSAT');

require "PHPMailer/class.phpmailer.php";
require "PHPMailer/class.smtp.php";



function sendmail($emailto, $message_body) {
				
	$mail = new PHPMailer();
	$mail->IsSMTP(); // send via SMTP
	$mail->SMTPAuth = true; // turn on SMTP authentication
	$mail->SMTPSecure = "ssl"; 
	$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
	$mail->Port = 465; 
	$mail->Username = SENDER ; // SMTP username
	$mail->Password = PASSWORD; // SMTP password
	$mail->From = SENDER;
	$mail->FromName = NAME;
	$mail->AddAddress($emailto,$emailto);
	$mail->AddReplyTo(SENDER,NAME);
	$mail->WordWrap = 100; // set word wrap
	$mail->Subject = SUBJECT;	
	$mail->Body = $message_body;
	if($mail->Send())
		return(true);
	else
		return(false);

}

function generatePassword($length=9, $strength=8) {
	$vowels = 'aeuy';
	$consonants = 'bdghjmnpqrstvz';
	if ($strength & 1) {
		$consonants .= 'BDGHJLMNPQRSTVWXZ';
	}
	if ($strength & 2) {
		$vowels .= "AEUY";
	}
	if ($strength & 4) {
		$consonants .= '23456789';
	}
	if ($strength & 8) {
		$consonants .= '@#$%';
	}
 
	$password = '';
	$alt = time() % 2;
	for ($i = 0; $i < $length; $i++) {
		if ($alt == 1) {
			$password .= $consonants[(rand() % strlen($consonants))];
			$alt = 0;
		} else {
			$password .= $vowels[(rand() % strlen($vowels))];
			$alt = 1;
		}
	}
	return $password;
}

function agecalc(&$dob,&$years,&$months) {
	date_default_timezone_set('Asia/Calcutta');
	$dob_a = explode("-", $dob);

	$dob_d = $dob_a[0];
	$dob_m = $dob_a[1];
	$dob_y = $dob_a[2];

	$today_d = "01";
	$today_m = "01";
	$today_y = "2013";

	$years = $today_y - $dob_y;
	$months = $today_m - $dob_m;


	if ($today_m.$today_d < $dob_m.$dob_d) {
		$years--;
		$months = 12 + $today_m - $dob_m;

	}

	if ($today_d < $dob_d) {
		$months--;
	}

	$firstMonths=array(1,3,5,7,8,10,12);
	$secondMonths=array(4,6,9,11);
	$thirdMonths=array(2);

	if($today_m - $dob_m == 1) {
		if(in_array($dob_m, $firstMonths)) {
			array_push($firstMonths, 0);
		}elseif(in_array($dob_m, $secondMonths)) {
			array_push($secondMonths, 0);
		}elseif(in_array($dob_m, $thirdMonths)) {
			array_push($thirdMonths, 0);
			}
		}
}


function send_sms($username,$otp, $mobilenumber) {

	  $user="admincusat"; //your username 
	  $password="435a15"; //your password 
	  $sendername="CUSATK"; //Your senderid 
	  $url="http://sapteleservices.com/SMS_API/sendsms.php"; 
//Your username is {v} and OTP is {v}. Please login to http://ldap.cusat.ac.in and submit remaining details to complete the registration process. CIRM, CUSAT.
	  //$message = "Your Username is {$username} and Password is {$otp}. Please login to http://ldap.cusat.ac.in and submit remaining details to  complete the registration process. CIRM, CUSAT.";
	  //$message = "Your Username is {$username} and Password is {$otp}. Please login and submit remaining details to complete the registration process. IRAA, CUSAT.";
	  $message = "Welcome to CUSAT CAT-2019 examinations. A mail has been sent to {$username}. Please reset your password by clicking the link given in the mail. Submit the remaining details and complete the registration process. Director, IRAA, CUSAT.";
	  $message = urlencode($message);
	  // http://sapteleservices.com/SMS_API/sendsms.php?username=admincusat&password=435a15&mobile=8589006393&sendername=GREENG&message=test&routetype=2
	  $ch = curl_init();
	   
	  if (!$ch){
		  die("Couldn't initialize a cURL handle");
	  } 
	  $ret = curl_setopt($ch, CURLOPT_URL,$url); 
	  curl_setopt ($ch, CURLOPT_POST, 1);
	   
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	   //username=admincusat&password=435a15&mobile=8589006393&sendername=GREENG&message=test&routetype=2
	  
	  //curl_setopt ($ch, CURLOPT_POSTFIELDS,"username=$user&password=$password&mobile=$mobilenumbers& message=$message&sendername=$senderid&routetype=2");
	  curl_setopt ($ch, CURLOPT_POSTFIELDS,"username=$user&password=$password&mobile=$mobilenumber& message=$message&sendername=$sendername&routetype=1");
	   
	  $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	   
	  //If you are behind proxy then please uncomment below line and provide your proxy ip with port. 
	  // $ret = curl_setopt($ch, CURLOPT_PROXY, "PROXY IP ADDRESS:PORT");
	   
	  $curlresponse = curl_exec($ch); // execute 
	  
	  if(curl_errno($ch))
	   echo 'curl error : '. curl_error($ch);
	  if (empty($ret)) {
	   
	  // some kind of an error happened die(curl_error($ch));
	   
	  curl_close($ch); // close cURL handler } else {
	   
	  $info = curl_getinfo($ch); 
	  curl_close($ch); // close cURL handler
	   
	  echo $curlresponse; //
	  echo "Message Sent Succesfully" ;
	   
	  }

}

function getUserIP()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'Unknown IP Address';

    return $ipaddress;
}
function delete_file($file_upload_name) {
	$uploadPath = "files/".$file_upload_name;
	unlink($uploadPath);	
}
function upload_file($fileName,$fileExtension,$fileSize,$file_upload_name,$fileTmpName) {
	
	 $fileExtensions = array('jpeg','jpg','png', 'pdf');
	 $currentDir = getcwd();
     $uploadDirectory = "/files/";
	 $errors = array();
	 $uploadPath = $currentDir . $uploadDirectory . $file_upload_name;
	// echo $uploadPath;

    if (isset($fileName)) {

        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "This process does not support this file type. Upload a JPEG or PNG file only.";
        }

        if ($fileSize > 2000000) {
            $errors[] = "You cannot upload this file because its size exceeds the maximum limit of 2 MB.";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                echo "The file " . basename($fileName) . " has been uploaded.";
            } else {
                echo "An error occurred. Try again or contact your system administrator.";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
        }
    }
	
}

?>