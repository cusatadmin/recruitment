<!DOCTYPE html>
<html lang="en">

<head>


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
                                    <h4>Staff Login Page</h4>
                                   
                                </div>
                                <div class="tab-inn">

                      <form class="form-inline" action="staff_login_action.php" method="post" name="signup">
                                        
                                        <div class="row">
                                            <div class="input-field col s6">
                                            
                                                <input type="text" name="username" id="username" autocomplete="off" required> 
                                                <label class="">Username</label>
                                            
                                            </div>
                                            
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="input-field col s6">
                                            <input type="password" id="passkey"  name="passkey" autocomplete="off" required>
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