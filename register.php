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
function valid_mobile()
	{
		if(document.signup.mobile1.value!= document.signup.mobile2.value)
			{
				document.getElementById("mismatch4").innerHTML='Mobile and Re- entered mobile are different';
				document.signup.mobile2.value='';
				document.signup.mobile1.focus();
			}
		else
			{
				document.getElementById("mismatch4").innerHTML='';
			}
		return true;
	}
function valid_password()
	{
		if(document.signup.pass1.value!= document.signup.pass2.value)
			{
				document.getElementById("mismatch5").innerHTML='Re-Typed Password incorrect';
				document.signup.pass2.value='';
				document.signup.pass1.focus();
			}
		else
			{
				document.getElementById("mismatch5").innerHTML='';
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

function emailAvailability() {
	  $("#loaderIcon").show();
		  jQuery.ajax({
		  url: "check_email_availability.php",
		  data:'emailid1='+$("#emailid1").val(),
		  type: "POST",
		  success:function(data){
	  $("#email_availability_status").html(data);
	  $("#loaderIcon").hide();
	  },
		  error:function (){}
	  });
	}
	
function record_exists() {
		$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_record_exists.php",
				data: 'emailid='+$("#emailid1").val()+'&mobile='+$("#mobile1").val(),
				type: "POST",
				success:function(data){
					$("#check_record_status").html(data);
					$("#loaderIcon").hide();
					},
				error:function (){}
				});
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
                                    <h4>Register New Candidate</h4>
                                    <p>Here you can edit your website basic details URL, Phone, Email, Address, User and password and more</p>
                                </div>
                                <div class="tab-inn">

                      <form class="form-inline" action="register_action.php" method="post" name="signup" enctype="multipart/form-data"  onsubmit="return validateForm()" >
                                        <div class="row">
                                            <div class="input-field col s6">
                                            <div class="text-danger small"><em>First name</em></div>
                                                <input type="text" value="" name="firstname" id="firstname" class="validate" required placeholder="First name">                                                
                                            </div>
                                            <div class="input-field col s6">
                                            <div class="text-danger small"><em>Last name</em></div>
                                                <input type="text" value=""  name="lastname" id="lastname" class="validate" required placeholder="Last name">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                            	<div class="text-danger small"><em>Enter a Valid Email ID</em></div>
                                                <input type="email" name="emailid1" id="emailid1" class="validate" value="" autocomplete="off" required placeholder="Email ID"> 
                                                <span id="email_availability_status" style="font-size:12px; color:red;"></span>
                                            
                                            </div>
                                            <div class="input-field col s6">
                                            <div class="text-danger small"><em>Re-enter the Email ID</em></div>
                                                <input type="email" name="emailid2" id="emailid2" class="validate" value="" autocomplete="off" required onblur="valid_email();" placeholder="Confirm Email ID">
                                                <span id="mismatch3" name="mismatch3" style="font-size:12px; color:red;"></span>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="input-field col s6">
                                            	<div class="text-danger small"><em>Enter your Mobile Number</em></div>
                                                <input type="text" name="mobile1" id="mobile1" class="validate" value="" autocomplete="off" required onblur="record_exists();" placeholder="Mobile Number"> 
                                                <span id="check_record_status" style="font-size:12px; color:red;"></span>
                                            
                                            </div>
                                            <div class="input-field col s6">
                                            <div class="text-danger small"><em>Re-enter your Mobile Number</em></div>
                                                <input type="text" name="mobile2" id="mobile2" class="validate" value="" autocomplete="off" required  placeholder="Confirm Mobile Number">
                                                <span id="mismatch4" name="mismatch4" style="font-size:12px; color:red;"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="input-field col s6">
                                            <div class="text-danger small"><em>Enter Password</em></div>
                                            <input type="password" class="validate" id="pass1"  name="pass1" autocomplete="off" onkeyup="pwdStrength();" required placeholder="Password">
                                              <div class="text-danger small">(At least 8 Characters must contain one Capital letter and one number)</div>
                                                <b><span id="strength1" style="font-size:12px; color:red;"></span></b>
                                            </div>
                                            <div class="input-field col s6">
                                            <div class="text-danger small"><em>Re-enter the Password</em></div>
                                            <input type="password" class="validate" id="pass2"  name="pass2" autocomplete="off" required onblur="valid_password();" placeholder="Re-enter Password">
                                            <span id="mismatch5" name="mismatch5" style="font-size:12px; color:red;"></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                        <div class="input-field col s6"><span>Upload Photo : <br>
                                        Size - Width : 3.5 cm Height 4.5 cm - Format - jpeg
                                        </span>
                                         </div>
											<div class="file-field input-field col s6">
                                            <div class="input-field col s6">
												<div class="btn admin-upload-btn">
													<span>Photo</span>
													<input type="file" name="photo">
												</div>
                                               </div>
                                                
											</div>
                                        </div>
                                        
                                         <div class="row">
                                         <div class="input-field col s6">
                                         
                                         </div>
                                            <div class="input-field col s6">
                                            <div class="">
                                            <img src="cool-php-captcha-master/captcha.php" id="captcha" /><br/>
       										 <!-- CHANGE TEXT LINK -->
       											<a href="#" onclick="
           									 	document.getElementById('captcha').src='cool-php-captcha-master/captcha.php?'+Math.random();
           										 document.getElementById('captcha-form').focus();"
            										id="change-image">Not readable? Change text.</a><br/><br/>
                                            </div>
                                            <span class="text-danger small"><em>Enter the word displayed above</em></span>
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