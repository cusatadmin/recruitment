<?php include "header.php" ?>
<form id="user-profile-form"  action="profilesubmit.php"  method="post"  novalidate >
			   <input type="hidden" name="post" id="post" value="3">
			 <!-- <input type="hidden" name="department" value="12">
			  <input type="hidden" name="advt" value="12">
			  <input type="hidden" name="previous" value="0">
			  <input type="hidden" name="previousFormNo" value="">-->
   <div class="panel panel-jui">

        <div class="panel-body">
            <div id="jx-profile-content"></div>

			<div class="row">
              <div class="col-md-3">
                    <div class="form-group field-profile-firstname required">
					<label class="control-label" for="profile-firstname">Name (As in Class 10<sup> th</sup> /S.S.L.C Certificate)</label>
					<input type="text" id="profile-firstname" class="form-control" name="firstname" maxlength="128" required="true" aria-invalid="false" value="" >
<div class="invalid-feedback">
        Please provide Your name.
      </div>

				</div>
		     </div>

			<div class="col-md-3">
                <div class="form-group field-profile-gender required">


				<label class="control-label" for="profile-gender">Gender</label>
				<select name="gender" id="profile-gender"  class="custom-select browser-default" required>
					<option value="" disabled selected>Select Gender</option>
               <option value="male">Male</option>
               <option value="female">Female</option>
               <option value="other">Other</option>
            </select>
				<div class="invalid-feedback">
        Please Select Gender
      </div>


				</div>
             </div>
		<div class="col-md-6">
            <div class="form-group field-profile-category required">

				        <label class="control-label" for="profile-category">Category</label>
			<select id="profile-category"  name="category" class="custom-select browser-default" required>
				<option value="" disabled selected>Select Category</option>

						<option value="Open Competition (Unreserved (UR))">Open Competition (Unreserved (UR))</option>

						<option value="Other Backward Community (Non-Creamy layer)">Other Backward Community (Non-Creamy layer)</option>

						<option value="Scheduled Caste">Scheduled Caste</option>

						<option value="Scheduled Tribe">Scheduled Tribe</option>

						<option value="Ezhava/Thiyya/ Billava (ETB)">Ezhava/Thiyya/ Billava (ETB)</option>

						<option value="Muslim">Muslim</option>

						<option value="Latin Catholic/Anglo Indian (LC/AI)">Latin Catholic/Anglo Indian (LC/AI)</option>

						<option value="Dheevara">Dheevara</option>

						<option value="Viswakarma">Viswakarma</option>
								</select><div class="invalid-feedback">
        Please Select Category
      </div>

			</div>
 	  </div>
         </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group field-profile-countrycode">
<label class="control-label" for="profile-countrycode">Country Code</label>
<span class="form-group field-profile-countrycode required">
<select name="profile-countrycode" id="profile-countrycode"  class="custom-select browser-default" required>
  <?php 	for($i=0; $i<$max; $i++)  {	?>
  <option value="<?php echo $my_array[$i]['country_name'] ?>"><?php echo $my_array[$i]['country_name'] ?></option>
  <?php } ?>
</select>
</span>
<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                </div>
                <div class="col-md-3">
                    <div class="form-group field-profile-mobile required">
<label class="control-label" for="profile-mobile">Mobile No</label>
<input type="text" id="profile-mobile" class="form-control" name="profile-mobile" value="9495576751" maxlength="10" required="true" readonly="true">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                </div>
                <div class="col-md-6">
                    <div class="form-group field-profile-pwd required">
<label class="control-label" for="profile-pwd">PwBD category</label>
<select id="profile-pwd"  name="profile-pwd" required="true">
<option value="Not Applicable">Not Applicable</option>
<option value="vi">Visually Impaired(VI)</option>
<option value="ld">Locomotor Disability(LD)</option>
<option value="hi">Hearing Impaired (HI)</option>
</select>

<div class="invalid-feedback">      This field cannot be blank </div>
</div>                </div>
            </div>
<div class="row">
                <div class="col-md-3">
                    <div class="form-group field-profile-nationality required">
<label class="control-label" for="profile-nationality">Nationality</label>
<select id="profile-nationality"  name="profile-nationality" required="true" aria-invalid="false">
<option value="Indian">Indian</option>
<option value="Overseas Citizen of India(OCI)">Overseas Citizen of India(OCI)</option>
</select>
<div class="invalid-feedback">      This field cannot be blank </div>
</div>                </div>
                <div class="col-md-3"><div class="form-group">
                <label>Date of Birth</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
				                    <input type="date" id="profile-dob" name="profile-dob" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask="" required="">
				  								</select><div class="invalid-feedback">
        This field cannot be blank
      </div>
                </div>
              </div>
                </div>
                <div class="col-md-3" style="display: none">
                    <div class="form-group field-profile-age">
<label class="control-label" for="profile-age">Age on Date (01-01-2019)</label>
<input type="text" id="profile-age" class="form-control" name="profile-age" value="" readonly="" maxlength="50">

<div class="invalid-feedback">      This field cannot be blank </div>
</div>                </div>
                <div class="col-md-3">
                    <div class="form-group field-marital">
<label class="control-label" for="marital">Marital Status</label>
<select id="marital"  name="marital">
<option value="">Select</option>
<option value="1">Single</option>
<option value="2">Married</option>
</select>

<div class="invalid-feedback">      This field cannot be blank </div>
</div>                </div>
                <div class="col-md-3">
                    <div class="form-group field-profile-guardianname required">
<label class="control-label" for="profile-guardianname">Father's/Mother's  Name</label>
<input type="text" id="profile-guardianname" class="form-control" name="profile-guardianname" value="" maxlength="128" required="true">
								</select>
<div class="invalid-feedback">      This field cannot be blank </div>
</div>                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h4> Address for Correspondence </h4>
                    <div class="form-group field-profile-postaladd1 required">
<label class="control-label" for="profile-postaladd1">Address Line 1</label>
<input type="text" id="profile-postaladd1" class="form-control" name="profile-postaladd1" value="" maxlength="128" required="true">
								</select><div class="invalid-feedback">
        This field cannot be blank
</div>

</div>                    <div class="form-group field-profile-postaladd2 required">
<label class="control-label" for="profile-postaladd2">Address Line 2</label>
<input type="text" id="profile-postaladd2" class="form-control" name="profile-postaladd2" value="" maxlength="128"required="true">
								</select><div class="invalid-feedback">
        This field cannot be blank
</div>

</div>
  <div class="row">
                            <div class="col-md-6"><div class="form-group field-profile-postalcity required">
<label class="control-label" for="profile-postalcity">City</label>
<input type="text" id="profile-postalcity" class="form-control" name="profile-postalcity" value="" maxlength="128" required="true">
								</select><div class="invalid-feedback">
        This field cannot be blank
</div>

</div></div>

                            <div class="col-md-6"> <div class="form-group field-profile-postalstate required">
<label class="control-label" for="profile-postalstate">State</label>
</select>
								<span class="form-group field-profile-gender required">
								<select name="profile-postalstate" size="1"  class="custom-select browser-default" id="profile-postalstate" required>
								  <?php 	for($i=0; $i<$maxstates; $i++)  {	?>
								  <option value="<?php echo $mystates[$i]['state'] ?>"><?php echo $mystates[$i]['state'] ?></option>
								  <?php } ?>
								  </select>
								</span>
								<div class="invalid-feedback">
        This field cannot be blank
</div>
</div></div>


                            <div class="col-md-6"><div class="form-group field-profile-postalpin required">
<label class="control-label" for="profile-postalpin">Pin</label>
<input type="number" id="profile-postalpin" class="form-control" name="profile-postalpin" value="" maxlength="20" required="true">

<div class="invalid-feedback">      This field cannot be blank </div>
</div></div>
                            <div class="col-md-6">
                                <div class="form-group field-profile-postalcountry required">
<label class="control-label" for="profile-postalcountry">Country</label>
<span class="form-group field-profile-gender required">
<select name="profile-postalcountry" id="profile-postalcountry"  class="custom-select browser-default" required>
  <?php 	for($i=0; $i<$max; $i++)  {	?>
  <option value="<?php echo $my_array[$i]['country_name'] ?>"><?php echo $my_array[$i]['country_name'] ?></option>
  <?php } ?>
</select>
</span>
</select><div class="invalid-feedback">
        This field cannot be blank
</div>
</div></div></div>
                </div>
                <div class="col-md-6">
                    <h4>Permanent Address &nbsp;
                        <small>
                             <input type="checkbox" id="addresscheck" name="addresscheck" value="1"><label for="addresscheck"> &nbsp;Copy Address of Correspondence</label>
                        </small>
                    </h4>

                    <div class="form-group field-profile-permanentadd1 required">
<label class="control-label" for="profile-permanentadd1">Address Line 1</label>
<input type="text" id="profile-permanentadd1" class="form-control" name="profile-permanentadd1" value="" maxlength="128" required="true">

<div class="invalid-feedback">      This field cannot be blank </div>
</div>                    <div class="form-group field-profile-permanentadd2 required">
<label class="control-label" for="profile-permanentadd2">Address Line 2</label>
<input type="text" id="profile-permanentadd2" class="form-control" name="profile-permanentadd2" value="" maxlength="128" required="true">

<div class="invalid-feedback">      This field cannot be blank </div>
</div>                    <div class="row">

                            <div class="col-md-6"><div class="form-group field-profile-permanentcity required">
<label class="control-label" for="profile-permanentcity">City</label>
<input type="text" id="profile-permanentcity" class="form-control" name="profile-permanentcity" value="" maxlength="128" required="true">

<div class="invalid-feedback">      This field cannot be blank </div>
</div></div>
                            <div class="col-md-6">  <div class="form-group field-profile-permanentstate required">
<label class="control-label" for="profile-permanentstate">State</label>
<span class="form-group field-profile-gender required">
<select name="profile-permanentstate" id="profile-permanentstate"  class="custom-select browser-default" required>
  <?php 	for($i=0; $i<$maxstates; $i++)  {	?>
  <option value="<?php echo $mystates[$i]['state'] ?>"><?php echo $mystates[$i]['state'] ?></option>
  <?php } ?>
</select>
</span>
<div class="invalid-feedback">      This field cannot be blank </div>
</div></div>


                            <div class="col-md-6"> <div class="form-group field-profile-permanentpin required">
<label class="control-label" for="profile-permanentpin">Pin</label>
<input type="number" id="profile-permanentpin" class="form-control" name="profile-permanentpin" value="" maxlength="20" required="true">

<div class="invalid-feedback">      This field cannot be blank </div>
</div></div>
                     <div class="col-md-6"> <div class="form-group field-profile-permanentcountry required">
<label class="control-label" for="profile-permanentcountry">Country</label>
<span class="form-group field-profile-gender required">
<select name="profile-permanentcountry" id="profile-permanentcountry"  class="custom-select browser-default" required>
  <?php 	for($i=0; $i<$max; $i++)  {	?>
  <option value="<?php echo $my_array[$i]['country_name'] ?>"><?php echo $my_array[$i]['country_name'] ?></option>
  <?php } ?>
</select>
</span>
<div class="invalid-feedback">      This field cannot be blank </div>
							</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="form-group">
               <div class="text-center">
                 <button type="submit" id="profile-submit-btn" name="profile-submit-btn"  onclick="profile()"  class="btn btn-success" >Proceed to Next Section</button>
               <button  id="profile-cancel-btn"  name="profile-cancel-btn"class="btn btn-default" href="">Cancel</button>
               </div>
             </div>
        </div>
		</div>
    </form>