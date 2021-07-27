<?php
include 'conf/db.php';
include "functions.php";
  	$paswd=$_GET['key'];
  	$emailid=$_GET['emailid'];
	$todays = date('Y-m-d H:i:s');
	//echo $id.$paswd;
	$query = "SELECT * from profile where emailid=? and password_lost=?";
	$stmt = $conn->prepare($query); 
	$stmt->bind_param("ss", $emailid, $paswd);
	$stmt->execute();	
	$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();
	if ( $num_rows==0) {
		$message = "Invalid Emailid/Password";
		header("Location: message.php?message=$message");
    	exit();
	} 
	
	
?>



<!DOCTYPE html>
<html lang="en">

<head>
<script type="text/javascript">

function valid_email()
	{
		if(document.signup.emailid1.value!= document.signup.emailid2.value)
			{
				document.getElementById("mismatch3").innerHTML='Email and Re- entered email are different';
				document.signup.emailid2.value='';
				document.signup.emailid1.focus();
			}
		else
			{
				document.getElementById("mismatch3").innerHTML='';
			}
		return true;
	}
function valid_password()
	{
		if(document.signup.pass1.value!= document.signup.pass2.value)
			{
				document.getElementById("mismatch4").innerHTML='Re-Typed Password incorrect';
				document.signup.pass2.value='';
				document.signup.pass1.focus();
			}
		else
			{
				document.getElementById("mismatch4").innerHTML='';
			}
	return true;
}
</script>

<script language="javascript">

function pwdStrength() {
	var number = /([0-9])/;
	var alphabets = /([A-Z])/;
	//var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
	if($('#pass1').val().length<8) {
		$('#strength1').removeClass();
		$('#strength1').addClass('weak-password');
		$('#strength1').html("Weak password (not allowed)");
		document.getElementById("strength1").style.color = "#E73415";
		document.getElementById("submit").disabled = true;
	} else {  	
		if($('#pass1').val().match(number) && $('#pass1').val().match(alphabets) ) {            
			$('#strength1').removeClass();
			$('#strength1').addClass('strong-password');
			$('#strength1').html(" Password valid");
			document.getElementById("strength1").style.color = "#185209";
			document.getElementById("submit").disabled = false;
		} 
	}
}


function validateForm(){
            document.getElementById('log').innerHTML = '';
            var string1 = removeSpaces(document.getElementById('mainCaptcha').value);
            var string2 = removeSpaces(document.getElementById('txtInput').value);
            if (string1 != string2 || string2 == ""){
                Captcha();
                document.getElementById('log').innerHTML += '<span style="font-size:16px; padding: 25px;">Entered Invalid Captcha</span> ';
                return false;
            } 
        }
function Captcha(){
            var alpha = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','1','2','3','4','5','6','7','8','9','0');
            var i;
            for (i=0;i<6;i++){
                var a = alpha[Math.floor(Math.random() * alpha.length)];
                var b = alpha[Math.floor(Math.random() * alpha.length)];
                var c = alpha[Math.floor(Math.random() * alpha.length)];
                var d = alpha[Math.floor(Math.random() * alpha.length)];
                var e = alpha[Math.floor(Math.random() * alpha.length)];
                var f = alpha[Math.floor(Math.random() * alpha.length)];
                var g = alpha[Math.floor(Math.random() * alpha.length)];
            }
            var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f + ' ' + g;
            document.getElementById("mainCaptcha").value = code
            var colors = ["#FFFFFF", "#FFFFFF", "#FFFFFF", "#FFFFFF", "#FFFFFF", "#FFFFFF", "#FFFFFF", "#FFFFFF", ];
            var rand = Math.floor(Math.random() * colors.length);
            $('#mainCaptcha').css("background-color", colors[rand]);
 
        }
function removeSpaces(string){
            return string.split(' ').join('');
        }
		
</script>



    <section>
		<?php include "header_index.php"; ?>
    </section>
</head>

<body>

    

    <!--HEADER SECTION-->


    <section>

        <!--- student Add -->
				<div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-8">
                        
						<div class="box-inn-sp admin-form">
                                <div class="inn-title">
                                    <h4>Password Reset Page</h4>
                                    
                                </div>
                                <div class="tab-inn">

                      <form class="form-inline" action="reset_password_action.php" method="post" name="signup" enctype="multipart/form-data"  onsubmit="return validateForm()" >
                                        <input type="hidden" name="otp" id="otp" value="<?php echo $paswd; ?>">
                                         <div class="row">
                                            <div class="input-field col s6">
                                            
                                                <input type="email" name="emailid" id="emailid" value="" autocomplete="off" required onblur="uservalidity()"> <span id="email_availability_status" style="font-size:12px; color:red;"></span>
                                                <label class="">Email ID</label>
                                            
                                            </div>
                                            
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="input-field col s6">
                                            <div class="">Enter New Password</div>
                                            <input type="password" class="validate" id="pass1"  name="pass1" autocomplete="off" onkeyup="pwdStrength();" required placeholder="Password">
                                              <div class="">(At least 8 Characters must contain one Capital letter and one number)</div>
                                                <b><span id="strength1" style="font-size:12px; color:red;"></span></b>
                                            </div>
                                            <div class="input-field col s6">
                                            <div class="">Re-enter the Password</div>
                                            <input type="password" class="validate" id="pass2"  name="pass2" autocomplete="off" required onblur="valid_password();" placeholder="Re-enter Password">
                                            <span id="mismatch4" name="mismatch4" style="font-size:12px; color:red;"></span>
                                            </div>
                                        </div>

                                        
                                         <div class="row">

                                            <div class="input-field col s6">
                                            <div class="">
                                            <img src="cool-php-captcha-master/captcha.php" id="captcha" /><br/>
       										 <!-- CHANGE TEXT LINK -->
       											<a href="#" onclick="
           									 	document.getElementById('captcha').src='cool-php-captcha-master/captcha.php?'+Math.random();
           										 document.getElementById('captcha-form').focus();"
            										id="change-image">Not readable? Change text.</a><br/><br/>
                                            </div>
                                            <span>Enter the word displayed above</span>
                                              <input type="text" name="captcha" id="captcha-form" autocomplete="off" /><br/>       
                                            </div>
                                       </div> 
                                        
                                       <div class="row">
                                            <div class="input-field col s12">
                                                <i class="waves-effect waves-light btn-large waves-input-wrapper" style="">
                                                <input type="submit" class="waves-button-input" id="submit" name="submit" value="Submit"></i>
                                            </div>
                                        </div>
                                    </form>
							</div>
                		</div>
                </div>
                <div class="col-md-1">
                        </div>
              </div>
          </div>
        </div>
        <!--- student Add -->
    </section>
    <!--SECTION END-->

<?php include "footer.php"; ?>    <!--END HEADER SECTION-->


   

    <!--Import jQuery before materialize.js-->
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>