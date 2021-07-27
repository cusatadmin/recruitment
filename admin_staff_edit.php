<?php
	session_start();
	$auth = $_SESSION['admin'] || $_SESSION['superadmin'];
	
	if ( !$auth) {
	
		$message = "Invalid Username/Password";
		header("Location: message.php?message=$message");
    	exit();
	}

   include 'conf/db.php';
	$entry=$_GET['entry'];
	//echo " ID :".$entry;

	$query = "SELECT * FROM users where userid='$entry'";
	
	$stmt = $conn->prepare($query);
	//$stmt->bind_param("s", $emailid);
	$stmt->execute(); //working
	$result = $stmt->get_result();
	$num_rows = $result->num_rows;
	$row = $result->fetch_object();
   
   if ($_POST['submit'] == "Submit") {
	$entry = $_POST['entry'];
	$todays = date('Y-m-d H:i:s');
	$pass = $_POST['pass2'];
	$role = $_POST['role'];
	if ($pass <> "") {
		$password = password_hash($pass, PASSWORD_DEFAULT);
		$query = "UPDATE users SET
					password = '$password',
					role = '$role',
					postdate = '$todays'
				  where userid = '$entry'";
	} else {
		$query = "UPDATE users SET
					role = '$role',
					postdate = '$todays'
				  where userid = '$entry'";
	}
		echo $query;
		$stmt = $conn->prepare($query);

		$stmt->execute();
		
	$stmt->close();
	$conn->close();

	header("Location: admin_staff_list.php");
	   
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
  
   </head>
<body>
      <!-- MOBILE MENU -->
      <section>
         <?php include "header.php"; ?>
         <p></p>
         <p></p>
      </section>
      <section>
         <div class="pro-menu">
         <?php include "admin_top_menu.php" ?>
		<div class="stu-db">
            <div class="container pg-inn">

               <div class="col-md-8">
                  <div class="box-inn-sp admin-form">
                     <div class="inn-title">
                        <h4>Add Staff</h4>
                     </div>
                     <div class="tab-inn">
                      <form class="form-inline" action="#" method="post" name="edit" >
                      <input type="hidden" name="entry" value="<?php echo $entry; ?>">
                         <!-- Start Row -->
                         <div class="row">
                              <div class="col-md-4">
                              <div class="text-danger small"><em>User Name</em></div>
                               <input type="text" name="username" id="username"  value="<?php echo $row->username; ?>"  readonly> 
                            </div>
                            <div class="col-md-4">
                             <div class="text-danger small"><em>Role</em></div>
                             <select name="role" id="role"  class="custom-select browser-default" required>
                             	<option value="staff" <?php if ($row->role=="staff") echo "selected"; ?>>Staff</option>
                             	<option value="admin" <?php if ($row->role=="admin") echo "selected"; ?>>Admin</option>
                              	<option value="superadmin" <?php if ($row->role=="superadmin") echo "selected"; ?>>Super Admin</option>         
                           	</select>
                            </div>
                       	</div> <!-- row -->
						<!--row start -->
                         <div class="row">
                             <div class="input-field col s4">
                             <div class="text-danger small"><em>Enter Password</em></div>
                                <input type="password" class="validate" id="pass1"  name="pass1" autocomplete="off" onkeyup="pwdStrength();"  placeholder="Password">
                              <div class="text-danger small">(At least 8 Characters must contain one Capital letter and one number)</div>
                                 <b><span id="strength1" style="font-size:12px; color:red;"></span></b>
                              </div>
                              <div class="input-field col s4">
                               <div class="text-danger small"><em>Re-enter the Password</em></div>
                                <input type="password" class="validate" id="pass2"  name="pass2" autocomplete="off"  onblur="valid_password();" placeholder="Re-enter Password">
                               <span id="mismatch4" name="mismatch4" style="font-size:12px; color:red;"></span>
                               </div>
                          </div>
                        <!-- row end --->

                         <div class="row">
                              <div class="input-field col s12">
                                 <p><i class="waves-effect waves-light btn-large waves-input-wrapper" style="">
                                    <input type="submit" class="waves-button-input" id="submit" name="submit" value="Submit">
                                    
                                    </i>
                                 </p><button type="button" class="btn btn-info btn-xs" onclick="goBack()">Go Back</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
      </div>
	</div>
    </section>  
   <!--SECTION END-->
     <?php include "footer.php"; ?> 
</body>
</html>