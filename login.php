<!DOCTYPE html>
<html lang="en">

<head>
<script language="javascript">

function uservalidity() {
	  $("#loaderIcon").show();
		  jQuery.ajax({
		  url: "check_valid_user.php",
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

<body>

    

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
                                    <h4>Candidate Login Page</h4>
                                   
                                </div>
                                <div class="tab-inn">

                      <form class="form-inline" action="login_action.php" method="post" name="signup">
                                        
                                        <div class="row">
                                            <div class="input-field col s6">
                                            
                                                <input type="email" name="emailid" id="emailid" value="" autocomplete="off" required onblur="uservalidity()"> <span id="email_availability_status" style="font-size:12px; color:red;"></span>
                                                <label class="">Email ID</label>
                                            
                                            </div>
                                            
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="input-field col s6">
                                            <input type="password" class="validate" id="pass1"  name="pass1" autocomplete="off" onkeyup="pwdStrength();" required>
                                                <label class="">Password<span style="color:blue; font-size:9px"></span></label>
                                               
                                            </div>

                                        </div>

                                       <div class="row">
                                            <div class="input-field col s12">
                                                <i class="waves-effect waves-light btn-large waves-input-wrapper" style="">
                                                <input type="submit" class="waves-button-input" id="submit" name="submit" value="Submit"></i>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="col-md-12 text-success">
								               <div class="tab-inn">
								                 <div class="row">
								                    <div class="col-md-4 col-md-offset-1" >
								                  	<a href="pass_lost.php">
								                    		<button type="button" class="btn btn-danger btn-xs">Forgot Password</button>
								                    	</a>
								              	     </div>
								              	     <div class="col-md-4" >
								                  	<a href="register.php">
								                    		<button type="button" class="btn btn-info btn-xs">New Registration</button>
								                    	</a>
								              	     </div>
								      			   </div>
												    </div>               
                    							 <br>
               								</div>
                                    
							</div>
                		</div> 
                        <div class="col-md-4">
                        </div>
                        
                </div>
               
              </div>
          </div>
        </div>
        <!--- student Add -->
    </section>
    <!--SECTION END-->

<?php include "footer.php"; ?>    <!--END HEADER SECTION-->

    <!--SECTION LOGIN, REGISTER AND FORGOT PASSWORD-->
   

    <!--Import jQuery before materialize.js-->
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>