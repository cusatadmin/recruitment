<!DOCTYPE html>
<html lang="en">

<head>
<script language="javascript">

function uservalidity() {
	  $("#loaderIcon").show();
		  jQuery.ajax({
		  url: "pass_lost_check_valid_user.php",
		  data:'emailid='+$("#emailid").val(),
		  type: "POST",
		  success:function(data){
	  $("#email_availability_status").html(data);
	  $("#loaderIcon").hide();
	  },
		  error:function (){}
	  });
	}


</script>

    <section>
		<?php include "header_index.php"; ?>
    </section>
</head>


<body onload="document.getElementById('emailid').focus()">

    

    <!--HEADER SECTION-->


    <section>

        <!--- student Add -->
				<div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-6">
                        
						<div class="box-inn-sp admin-form">
                                <div class="inn-title">
                                    <h4>Candidate Forget Password Page</h4>
                                   
                                </div>
                                <div class="tab-inn">

                      <form class="form-inline" action="pass_lost_action.php" method="post" name="signup" >
                                        <div class="row">
                                            <div class="input-field col s6">
                                            Email Address
                                                <input type="email" name="emailid" id="emailid" value="" autocomplete="off" required> <span id="email_availability_status" style="font-size:12px; color:red;"></span>
                                            
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6"> 
                                            Date of Birth
                                            <input type="date" id="dateofbirth" name="dateofbirth" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="" >
                                                
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
                <div class="col-md-4">
                        </div>
              </div>
          </div>
        </div>
        <!--- student Add -->


<?php include "footer.php"; ?>    <!--END HEADER SECTION-->

    <!--SECTION LOGIN, REGISTER AND FORGOT PASSWORD-->
   

    <!--Import jQuery before materialize.js-->
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>