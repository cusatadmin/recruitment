<form id="academic_quali_form" action="academicsubmit.php" method="post">
<div class="error-summary" style="display:none"><p>Please fix the following errors:</p><ul></ul></div>    <div class="panel panel-jui">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <div class="text-right">
                          <span><div class="form-group field-academic-totalpoints has-success">

<input type="hidden" id="academic-totalpoints" class="form-control" name="Academic[totalPoints]" value="0" aria-invalid="false">

<div class="invalid-feedback">      This field cannot be blank </div>
</div>Points :  <span id="x-total-points-acadmic-du">0</span> </span>
                        <!-- <span> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div id="jx-cont-acad-res"></div>
			            <table class="table table-striped">
                <tbody><tr>
                    <th style="width:10%;">Examination</th>
                    <th style="width:20%;">Name of Board</th>
                    <th style="width:25%;">Subject(s)</th>
                    <th style="width:10%;">Result Type</th>
                    <th style="width:10%;">Division</th>
                    <th style="width:10%;">Year</th>
                    <th style="width:22%;">School</th>
                </tr>
                <tr>

                    <th>Secondary</th>
                    <td> <div class="form-group field-academic-tenth_board required">

<input type="text" id="academic-tenth_board" class="form-control" name="tenth_board" required="true" value="">

<div class="invalid-feedback">      This field cannot be blank </div>
</div></td>
                    <td> <div class="form-group field-academic-tenth_subject required">

<input type="text" id="academic-tenth_subject" class="form-control" name="tenth_subject" maxlength="255" required="true" value="">

<div class="invalid-feedback">      This field cannot be blank </div>
</div></td>
                    <td> <div class="form-group field-academic-tenthresulttype required">

<select id="academic-tenthresulttype"   name="tenthResultType" required="true">
<option value="Percentage">Percentage</option>
<option value="Grade">Grade</option>
</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                    <td>
                        <div id="tenthPercent"><div class="form-group field-academic-temptenthpercentage">

<select id="academic-temptenthpercentage"  name="tempTenthPercentage">
<option value="">Select</option>
<option value="1">1st</option>
<option value="2">2nd</option>
<option value="3">3rd</option>
</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></div>
                        <div id="tenthGrade" style="display: none;"><div class="form-group field-academic-temptenthgrade">

<select id="academic-temptenthgrade"  name="tempTenthGrade">
<option value="">Select</option>
<option value="O">O</option>
<option value="A Only">A Only</option>
<option value="A Plus">A Plus</option>
<option value="A Minus">A Minus</option>
<option value="B Only">B Only</option>
<option value="B Plus">B Plus</option>
<option value="B Minus">B Minus</option>
<option value="C Only">C Only</option>
<option value="C Plus">C Plus</option>
<option value="C Minus">C Minus</option>
<option value="D">D Only</option>
<option value="E">E -Poor</option>
<option value="F">F Only</option>
</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></div>
                    </td>
                    <td> <div class="form-group field-academic-tenth_year required">

<select id="academic-tenth_year"  name="tenth_year" required="true">
<option value="">Select</option>
<?php for ($yr=1960; $yr<=2050; $yr++) { ?>
<option value="<?php echo $yr; ?>"><?php echo $yr; ?></option>
<?php } ?>
</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                    <td> <div class="form-group field-academic-tenth_school required">

<input type="text" id="academic-tenth_school" class="form-control" name="tenth_school" value="" maxlength="255" required="true">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                </tr>
                <tr>

                    <th>Sr. Secondary</th>
                    <td> <div class="form-group field-academic-twelfth_board required">

<input type="text" id="academic-twelfth_board" class="form-control" name="twelfth_board" value="" required="true">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                    <td> <div class="form-group field-academic-twelfth_subject required">

<input type="text" id="academic-twelfth_subject" class="form-control" name="twelfth_subject" value="" maxlength="255" required="true">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                    <td> <div class="form-group field-academic-twelfthresulttype required">

<select id="academic-twelfthresulttype"  name="twelfthResultType" required="true">
<option value="Percentage">Percentage</option>
<option value="Grade">Grade</option>
</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                    <td>
                        <div id="twelthPercent"><div class="form-group field-academic-temptwelthpercentage">

<select id="academic-temptwelthpercentage"  name="tempTwelthPercentage">
<option value="">Select</option>
<option value="1">1st</option>
<option value="2">2nd</option>
<option value="3">3rd</option>

</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></div>
                        <div id="twelthGrade" style="display: none;"><div class="form-group field-academic-temptwelthgrade">

<select id="academic-temptwelthgrade"  name="temptwelthgrade">
<option value="">Select</option>
<option value="O">O</option>
<option value="O">O</option>
<option value="A Only">A Only</option>
<option value="A Plus">A Plus</option>
<option value="A Minus">A Minus</option>
<option value="B Only">B Only</option>
<option value="B Plus">B Plus</option>
<option value="B Minus">B Minus</option>
<option value="C Only">C Only</option>
<option value="C Plus">C Plus</option>
<option value="C Minus">C Minus</option>
<option value="D">D Only</option>
<option value="E">E -Poor</option>
<option value="F">F Only</option>
</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></div>
                    </td>
                    <td> <div class="form-group field-academic-twelfth_year required"><span class="form-group field-academic-tenth_year required">
<select id="twelfth_year"  name="twelfth_year" required="true">
  <option value="">Select</option>
  <?php for ($yr=1960; $yr<=2050; $yr++) { ?>
  <option value="<?php echo $yr; ?>"><?php echo $yr; ?></option>
  <?php } ?>
</select>
</span>
<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                    <td> <div class="form-group field-academic-twelfth_school required">

<input type="text" id="academic-twelfth_school" class="form-control" name="twelfth_school" value="" maxlength="255" required="true">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>

                </tr>
            </tbody></table>
			            <div id="form-area-tab-22">
                <div class="col-md-6">
                    <div class="form-group field-academic-qualification required">
<label class="control-label" for="academic-qualification">Qualification Pattern</label>
<select id="academic-qualification"  name="qualification" required="true">
<option value="1">UG + PG + M.Phil./Ph.D.</option>

</select>


<div class="invalid-feedback">      This field cannot be blank  </div>
</div>
                </div>
                <div class="col-md-6">
                    <div class="form-group field-academic-stream required">
<label class="control-label" for="academic-stream">Stream</label>
<select id="academic-stream"  name="stream" required="true">
<option value="">Select</option>
<option value="Faculty of Sciences / Engineering/ Agriculture / Medical / Veterinary Sciences">Faculty of Sciences / Engineering/ Agriculture / Medical / Veterinary Sciences</option>
<option value="Faculty of Languages / Humanities / Arts / Social Sciences / Library / Education / Physical Education / Commerce /  Management &amp; other related disciplines"></option>
</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>
                </div>
                <div class="row">

                    <table class="table" id="table-rec-acad-quali">
                        <tbody><tr>
                            <th style="width:10%;">Examination</th>
                            <th style="width:20%;">Name of Degree</th>
                            <th style="width:25%;">Subject(s)</th>
                            <th style="width:10%;">Overall Percentage<sup>*</sup></th>
                            <th style="width:10%;">Year</th>
                            <th style="width:22%;">University/Institute</th>
                            <th style="width:3%; display: none;">Points</th>
                        </tr>

                        <tr>

                            <th>Bachelor's Degree</th>
                                                            <td> <div class="form-group field-academic-ugcollege">

<select id="academic-ugcollege" name="ugcollege">
<option value="">Select</option>


						<option value="B.A.">B.A.</option>

						<option value="B.A. (Hons)">B.A. (Hons)</option>

						<option value="B.A. (Prog)">B.A. (Prog)</option>

						<option value="B.Com.">B.Com.</option>

						<option value="B.Com. (Hons)">B.Com. (Hons)</option>

						<option value="B.Com. (Prog)">B.Com. (Prog)</option>

						<option value="B.Ed.">B.Ed.</option>

						<option value="LL.B. 3 yr Programme">LL.B. 3 yr Programme</option>

						<option value="B.Sc">B.Sc.</option>

						<option value="B.Sc. (Hons)">B.Sc. (Hons)</option>

						<option value="B.Sc. (Prog)">B.Sc. (Prog)</option>

						<option value="B.Tech.">B.Tech.</option>

						<option value="B.E.">B.E.</option>

						<option value="B.C.A.">B.C.A.</option>

						<option value="Other Science Degree">Other Science Degree</option>

						<option value="Other Arts/Commerce Degree">Other Arts/Commerce Degree</option>

						<option value="LL.B. 5 Yr Integrated Programme">LL.B. 5 Yr Integrated Programme</option>

						<option value="B.El.Ed.">B.El.Ed.</option>
					</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                                    <div class="form-group field-academic-ug_other_degree">

<input type="text" id="academic-ug_other_degree" class="form-control" name="ug_other_degree" value="" style="display: none;">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                                </td>
                                                        <td> <div class="form-group field-academic-ugsubject">

<input type="text" id="academic-ugsubject" class="form-control" name="ugsubject" value="" maxlength="255">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>

                            <td> <div class="form-group field-academic-ugpercentage">

<input type="text" id="academic-ugpercentage" class="form-control" name="ugpercentage" value="">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td> <div class="form-group field-academic-ugyear">
							<input type="hidden" id="academic-castid" name="Academic[castid]" value="0">
							<input type="hidden" id="academic-pwdstat" name="Academic[pwdstat]" value="0">
							<span class="form-group field-academic-tenth_year required">
<select id="ugyear"  name="ugyear" required="true">
  <option value="">Select</option>
  <?php for ($yr=1960; $yr<=2050; $yr++) { ?>
  <option value="<?php echo $yr; ?>"><?php echo $yr; ?></option>
  <?php } ?>
</select>
</span>
<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td><div class="form-group field-academic-uguniversity">

<input type="text" id="academic-uguniversity" class="form-control" name="uguniversity" value="" maxlength="255">
 UG Points :  <span id="ug-acad-value">0</span>
<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td style="display: none;"><div class="form-group field-academic-ugpoints has-success">

<input type="hidden" id="academic-ugpoints" class="form-control" name="ugpoints" value="0" aria-invalid="false">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                               </td>

                        </tr>
                        <tr>
                            <th>Master's/Post Graduate Degree</th>
                                                            <td> <div class="form-group field-academic-pgcollege required">

<select id="academic-pgcollege"  name="pgcollege" required="true">
<option value="">Select</option>

						<option value="M.Com.">M.Com.</option>

						<option value="M.Ed">M.Ed.</option>

						<option value="LL.M. 1 Yr Programme">LL.M. 1 Yr Programme</option>

						<option value="M.Sc.">M.Sc.</option>

						<option value="M.Tech">M.Tech.</option>

						<option value="M.E.">M.E.</option>

						<option value="M.C.A.">M.C.A.</option>

						<option value="Other Science Degree">Other Science Degree</option>

						<option value="Other Arts/Commerce Degree">Other Arts/Commerce Degree</option>

						<option value="LL.M. 2 Yr Programme">LL.M. 2 Yr Programme</option>

						<option value="LL.M. 3 Yr Programme">LL.M. 3 Yr Programme</option>

						<option value="M.A.">M.A.</option>
					</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                                    <div class="form-group field-academic-pg_other_degree">

<input type="text" id="academic-pg_other_degree" class="form-control" name="pg_other_degree" value="" style="display: none;">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                                </td>
                                                        <td><div class="form-group field-academic-pgsubject required">

<input type="text" id="academic-pgsubject" class="form-control" name="pgsubject" value="" maxlength="255" required="true">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td>  <div class="form-group field-academic-pgpercentage required">

<input type="text" id="academic-pgpercentage" class="form-control" name="pgpercentage" value="" required="true">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td>    <div class="form-group field-academic-pgyear required"><span class="form-group field-academic-tenth_year required">
<select id="pgyear"  name="pgyear" required="true">
  <option value="">Select</option>
  <?php for ($yr=1960; $yr<=2050; $yr++) { ?>
  <option value="<?php echo $yr; ?>"><?php echo $yr; ?></option>
  <?php } ?>
</select>
</span>
<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td> <div class="form-group field-academic-pguniversity required">

<input type="text" id="academic-pguniversity" class="form-control" name="pguniversity" value="" maxlength="255" required="true">
PG Points : <span id="pg-acad-value">0</span>
<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td style="display: none;"><div class="form-group field-academic-pgpoints has-success">

<input type="hidden" id="academic-pgpoints" class="form-control" name="pgpoints" value="0" aria-invalid="false">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                                </td>
                        </tr>


                    </tbody></table>
                    <table class="table">
                        <tbody><tr>
                            <th rowspan="2">
                                <div>M.Phil.
                                </div> <div class="form-group field-academic-mphilna required has-success">
<label class="control-label"></label>
<input type="hidden" name="Academic[mphilval]" value="1" id="academic-mphilval">
<div id="academic-mphilna" role="radiogroup" required="true" aria-invalid="false">
<input type="radio"   class="filled-in" name="mphilna" value="false" selected="selected" id="mphilno"><label for="mphilno"> No</label>
 <input type="radio"  class="filled-in"  name="mphilna" value="true" id="mphilyes"><label for="mphilyes"> Yes</label></div>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                            </th>
                            <td colspan="6">
                                <div class="col-md-3 col-xs-6">
  <!--                                  <div class="form-group field-academic-mphilname" style="display: none;">
<label class="control-label" for="academic-mphilname">Please select the degree</label>
<select id="academic-mphilname"  name="Academic[mphilName]" disabled="">
<option value="">Select</option>
<option value="M.Phil.">M.Phil.</option>
</select>-->

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>

                            </td>
                        </tr>
						                        <tr>
                            <td style="width:10%;">
                                <div class="form-group field-academic-mphilstartdate has-success" style="display: none;">
<label class="control-label" for="academic-mphilstartdate">Date of Registration/Admission</label>
<input type="text" id="academic-mphilstartdate" class="form-control hasDatepicker" name="mphilstartdate" value="01/01/1970" placeholder="Date of Registration" disabled="" aria-invalid="false">
<!-- <input type="text" id="academic-mphilstartdate" name="Academic[mphilStartDate]" class="form-control" value="<?//php echo dateFormat($results[0]->mphilStartDate);?>" data-inputmask="'alias': 'dd/mm/yyyy'" placeholder="Date of Registration" disabled="" data-mask>-->


<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>                            <td style="width:10%;"> <div class="form-group field-academic-mphilsubmissiondate" style="display: none;">
<label class="control-label" for="academic-mphilsubmissiondate">Date of Submission</label>
<input type="text" id="academic-mphilsubmissiondate" class="form-control hasDatepicker" name="mphilsubmissiondate" value="01/01/1970" placeholder="Date of Submission" disabled="">


<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>                            <td style="width:10%;"> <div class="form-group field-academic-mphilawarddate has-success" style="display: none;">
<label class="control-label" for="academic-mphilawarddate">Date of Award</label>
<input type="text" id="academic-mphilawarddate" class="form-control hasDatepicker" name="Academic[mphilAwardDate]" value="01/01/1970" placeholder="Date of Award" disabled="" aria-invalid="false">


<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td style="width:30%;"> <div class="form-group field-academic-mphilthesistitle" style="display: none;">
<label class="control-label" for="academic-mphilthesistitle">Thesis/Dissertation Title</label>
<textarea id="academic-mphilthesistitle" class="form-control" name="mphilthesistitle" rows="3" disabled=""></textarea>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td> <div class="form-group field-academic-mphiluniversity" style="display: none;">
<label class="control-label" for="academic-mphiluniversity">University/Institute</label>
<input type="text" id="academic-mphiluniversity" class="form-control" name="mphiluniversity" value="" maxlength="255" disabled="">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                                <div class="form-group field-academic-mphilpercentage" style="display: none;">
<label class="control-label" for="academic-mphilpercentage">Overall Percentage<!--/Grade Points <span style="font-size:10px">(Out of 10)</span>--></label>
<input type="text" id="academic-mphilpercentage" class="form-control" name="mphilpercentage" value="" disabled="">
Mphil Ponits : <span id="mphil-points-value">0</span>
<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td style="display: none;"> <div class="form-group field-academic-mphilpoints has-success">

<input type="hidden" id="academic-mphilpoints" class="form-control" name="mphilpoints" value="0" aria-invalid="false">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                               </td>

                        </tr>

						                        <tr>
                            <th rowspan="2" style="width:10%;">
                                <div>Ph.D.
                                </div> <div class="form-group field-academic-phdna required">
<label class="control-label"></label>
<input type="hidden" name="Academic[phdNA]" value="1" id="academic-phdval"><div id="academic-phdna" role="radiogroup" required="true">
<input type="radio" name="phdna" value="false" selected="selected"  id="phdno"= class="filled-in"><label for="phdno"> No</label>
<input type="radio" name="phdna" value="true" selected="selected" id="phdyes" class="filled-in"><label for="phdyes"> Yes</label></div>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                            </th>
                            <td style="width:10%;">
                                <div class="form-group field-academic-phdregdate has-success" style="display: none;">
<label class="control-label" for="academic-phdregdate">Date of Registration</label>
<input type="text" id="academic-phdregdate" class="form-control hasDatepicker" name="phdregdate" value="01/01/1970" placeholder="Date of Registration" aria-invalid="false">


<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>                            <td style="width:10%;"> <div class="form-group field-academic-phdsubdate" style="display: none;">
<label class="control-label" for="academic-phdsubdate">Date of Submission</label>
<input type="text" id="academic-phdsubdate" class="form-control hasDatepicker" name="phdsubdate" value="01/01/1970" placeholder="Date of Submission">


<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>                            <td style="width:10%;"> <div class="form-group field-academic-phdawarddate has-success" style="display: none;">
<label class="control-label" for="academic-phdawarddate">Date of Award</label>
<input type="text" id="academic-phdawarddate" class="form-control hasDatepicker" name="phdawarddate" value="01/01/1970" placeholder="Date of Award" aria-invalid="false">


<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td style="width:30%;"> <div class="form-group field-academic-phdthesistitle" style="display: none;">
<label class="control-label" for="academic-phdthesistitle">Thesis/Dissertation Title</label>
<textarea id="academic-phdthesistitle" class="form-control" name="phdthesistitle" rows="3" disabled="disabled"></textarea>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td style="width:20%;"><div class="form-group field-academic-phduniversity" style="display: none;">
<label class="control-label" for="academic-phduniversity">University/Institute</label>
<input type="text" id="academic-phduniversity" class="form-control" name="phduniversity" value="" maxlength="255" disabled="">
Ph.D Points : <span id="phd-points-value" class="dudnone">0</span>
<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td style="width:5%; display: none;"> <div class="form-group field-academic-phdpoints has-success">

<input type="hidden" id="academic-phdpoints" class="form-control" name="phdpoints" value="0" aria-invalid="false">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                                </td>

                        </tr>


                        <tr style="display: none;">
                            <th>Other/Additional Qualification</th>
                            <td colspan="2">
                                <div class="form-group field-academic-otitle">
<label class="control-label" for="academic-otitle">Name of Degree / Certificate</label>
<textarea id="academic-otitle" class="form-control" name="Academic_oTitle" rows="3"></textarea>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td><div class="form-group field-academic-odatesub">
<label class="control-label" for="academic-odatesub">Date of Award</label>
<input type="text" id="academic-odatesub" class="form-control hasDatepicker" name="academic_odatesub" value="" readonly="" placeholder="Date of Award">


<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td><div class="form-group field-academic-odetails">
<label class="control-label" for="academic-odetails">Details</label>
<textarea id="academic-odetails" class="form-control" name="Academic_oDetails" rows="3"></textarea>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                            </td>
                            <td><div class="form-group field-academic-ouniversity">
<label class="control-label" for="academic-ouniversity">University/Institute</label>
<input type="text" id="academic-ouniversity" class="form-control" name="Academic_oUniversity" value="" rows="3">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                                <div class="form-group field-academic-opercentage">
<label class="control-label" for="academic-opercentage">Overall Percentage/Grade Points <span style="font-size:10px">(Out of 10)</span></label>
<input type="text" id="academic-opercentage" class="form-control" name="Academic_oPercentage" value="">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                            </td>
                            <td style="display: none;"></td>
                        </tr>

                        <tr>
                            <th colspan="2">Whether Qualified UGC/CSIR NET/JRF <br></th>

                            <td></td>
                            <td> <div class="form-group field-academic-net required">
<label class="control-label" for="academic-net">UGC-CSIR NET</label>
<select id="academic-net"  name="net" required="true">
<option value="">Select</option>
<option value="1">NET with JRF</option>
<option value="2">NET</option>
<option value="3">SLET/SET</option>
<option value="4">None/Not Applicable</option>
<option value="5">Ph.D. from Foreign University</option>
</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                            <td>

                                <div id="pns-net-subject"><div class="form-group field-academic-netsubject">
<label class="control-label" for="academic-netsubject">NET Subject</label>
<select id="academic-netsubject" name="netsubject">
<option value=""></option>
<option value="">Select</option>

						<option value="Adult Education/ Continuing Education/ Andragogy/ Non Formal Education">Adult Education/ Continuing Education/ Andragogy/ Non Formal Education</option>

						<option value="Adult Education/ Continuing Education/ Andragogy/ Non Formal Education">Adult Education/ Continuing Education/ Andragogy/ Non Formal Education</option>

						<option value="Agricultural Biotechnology">Agricultural Biotechnology</option>

						<option value="Agricultural Business Management">Agricultural Business Management</option>

						<option value="Agricultural Chemicals">Agricultural Chemicals</option>

						<option value="Agricultural Economics">Agricultural Economics</option>

						<option value="Agricultural Entomology">Agricultural Entomology</option>

						<option value="Agricultural Extension">Agricultural Extension</option>

						<option value="Agricultural Meteorology">Agricultural Meteorology</option>

						<option value="Agricultural Microbiology">Agricultural Microbiology</option>

						<option value="Agricultural Statistics">Agricultural Statistics</option>

						<option value="Agricultural Structure and Process Engineering">Agricultural Structure and Process Engineering</option>

						<option value="Agroforestry">Agroforestry</option>

						<option value="Agronomy">Agronomy</option>

						<option value="Animal Biochemistry">Animal Biochemistry</option>

						<option value="Animal Biotechnology">Animal Biotechnology</option>

						<option value="Animal Genetics &amp;amp; Breeding">Animal Genetics &amp;amp; Breeding</option>

						<option value="Animal Nutrition">Animal Nutrition</option>

						<option value="Animal Physiolog">Animal Physiology</option>

						<option value="Animal Reproduction &amp;amp; Gynaecology">Animal Reproduction &amp;amp; Gynaecology</option>

						<option value="Anthropology">Anthropology</option>

						<option value="Aquaculture">Aquaculture</option>

						<option value="Arab Culture and Islamic Studies">Arab Culture and Islamic Studies</option>

						<option value="Arabic">Arabic</option>

						<option value="Archaeology">Archaeology</option>

						<option value="Assamese">Assamese</option>

						<option value="Bengali">Bengali</option>

						<option value="Bioinformatics">Bioinformatics</option>

						<option value="Bodo">Bodo</option>

						<option value="Buddhist, Jaina, Gandhian and Peace Studies">Buddhist, Jaina, Gandhian and Peace Studies</option>

						<option value="Chemical Sciences">Chemical Sciences</option>

						<option value="Chinese">Chinese</option>

						<option value="Commerce">Commerce</option>

						<option value="Comparative Literature">Comparative Literature</option>

						<option value="Comparative Study of Religions">Comparative Study of Religions</option>

						<option value="Computer Applications &amp;amp; IT">Computer Applications &amp;amp; IT</option>

						<option value="Computer Science and Applications">Computer Science and Applications</option>

						<option value="Criminology">Criminology</option>

						<option value="Dairy Chemistry">Dairy Chemistry</option>

						<option value="Dairy Microbiology">Dairy Microbiology</option>

						<option value="Dairy Technology">Dairy Technology</option>

						<option value="Defence and Strategic Studies">Defence and Strategic Studies</option>

						<option value="Dogri">Dogri</option>

						<option value="Earth Sciences">Earth Sciences</option>

						<option value="Economic Botany &amp;amp; Plant Genetic Resources">Economic Botany &amp;amp; Plant Genetic Resources</option>

						<option value="Economics">Economics</option>

						<option value="Education">Education</option>

						<option value="Electronic Science">Electronic Science</option>

						<option value="Engineering Sciences">Engineering Sciences</option>

						<option value="English">English</option>

						<option value="Environmental Science">Environmental Science</option>

						<option value="Environmental Sciences">Environmental Sciences</option>

						<option value="Farm Machinery &amp;amp; Power">Farm Machinery &amp;amp; Power</option>

						<option value="Fish Genetics &amp;amp; Breeding">Fish Genetics &amp;amp; Breeding</option>

						<option value="Fish Health">Fish Health</option>

						<option value="Fish Nutrition">Fish Nutrition</option>

						<option value="Fish Processing Technology">Fish Processing Technology</option>

						<option value="Fisheries Resource Management">Fisheries Resource Management</option>

						<option value="Floriculture &amp;amp; Landscaping">Floriculture &amp;amp; Landscaping</option>

						<option value="Folk Literature">Folk Literature</option>

						<option value="Food Technology">Food Technology</option>

						<option value="Forensic Science">Forensic Science</option>

						<option value="French">French</option>

						<option value="Fruit Science">Fruit Science</option>

						<option value="Genetics &amp;amp; Plant Breeding">Genetics &amp;amp; Plant Breeding</option>

						<option value="Geography">Geography</option>

						<option value="German">German</option>

						<option value="Gujarati">Gujarati</option>

						<option value="Hindi">Hindi</option>

						<option value="History">History</option>

						<option value="Home Science">Home Science</option>

						<option value="Home Science">Home Science</option>

						<option value="Human Rights and Duties">Human Rights and Duties</option>

						<option value="Indian Culture">Indian Culture</option>

						<option value="International and Area Studies">International and Area Studies</option>

						<option value="Japanese">Japanese</option>

						<option value="Kannada">Kannada</option>

						<option value="Kashmiri">Kashmiri</option>

						<option value="Konkani">Konkani</option>

						<option value="Labour Welfare/Personnel Management/Industrial Relations/ Labour and Social Welfare/Human Resource Management">Labour Welfare/Personnel Management/Industrial Relations/ Labour and Social Welfare/Human Resource Management</option>

						<option value="Land &amp;amp; Water Management Engineering">Land &amp;amp; Water Management Engineering</option>

						<option value="Law">Law</option>

						<option value="Library and Information Science">Library and Information Science</option>

						<option value="Life Sciences">Life Sciences</option>

						<option value="Linguistics">Linguistics</option>

						<option value="Livestock Product Technology">Livestock Product Technology</option>

						<option value="Livestock Production Management">Livestock Production Management</option>

						<option value="Maithili">Maithili</option>

						<option value="Malayalam">Malayalam</option>

						<option value="Management">Management</option>

						<option value="Manipuri">Manipuri</option>

						<option value="Manipuri">Manipuri</option>

						<option value="Mass Communication and Journalism">Mass Communication and Journalism</option>

						<option value="Mathematical Sciences">Mathematical Sciences</option>

						<option value="Museology &amp;amp; Conservation">Museology &amp;amp; Conservation</option>

						<option value="Music">Music</option>

						<option value="Nematology">Nematology</option>

						<option value="Nepali">Nepali</option>

						<option value="Odia">Odia</option>

						<option value="Pali">Pali</option>

						<option value="Performing Arts ? Dance/Drama/Theatre">Performing Arts ? Dance/Drama/Theatre</option>

						<option value="Persian">Persian</option>

						<option value="Philosophy">Philosophy</option>

						<option value="Physical Education">Physical Education</option>

						<option value="Physical Sciences">Physical Sciences</option>

						<option value="Plant Biochemistry">Plant Biochemistry</option>

						<option value="Plant Pathology">Plant Pathology</option>

						<option value="Plant Physiology">Plant Physiology</option>

						<option value="Political Science">Political Science</option>

						<option value="Population Studies">Population Studies</option>

						<option value="Poultry Science">Poultry Science</option>

						<option value="Prakrit">Prakrit</option>

						<option value="Psychology">Psychology</option>

						<option value="Public Administration">Public Administration</option>

						<option value="Punjabi">Punjabi</option>

						<option value="Rajasthani">Rajasthani</option>

						<option value="Russian">Russian</option>

						<option value="Sanskrit">Sanskrit</option>

						<option value="Sanskrit Traditional Subjects">Sanskrit Traditional Subjects</option>

						<option value="Seed Science &amp;amp; Technology">Seed Science &amp;amp; Technology</option>

						<option value="Social Medicine &amp;amp; Community Health">Social Medicine &amp;amp; Community Health</option>

						<option value="Social Work">Social Work</option>

						<option value="Sociology">Sociology</option>

						<option value="Soil Sciences">Soil Sciences</option>

						<option value="Spanish">Spanish</option>

						<option value="Spices, Plantation &amp;amp; Medicinal &amp;amp; Aromatic Plants">Spices, Plantation &amp;amp; Medicinal &amp;amp; Aromatic Plants</option>

						<option value="Tamil">Tamil</option>

						<option value="Telugu">Telugu</option>

						<option value="Tourism Administration and Management">Tourism Administration and Management</option>

						<option value="ribal and Regional Language/Literature">Tribal and Regional Language/Literature</option>

						<option value="Urdu">Urdu</option>

						<option value="Vegetable Science">Vegetable Science</option>

						<option value="Veterinary Anatomy">Veterinary Anatomy</option>

						<option value="Veterinary Medicine">Veterinary Medicine</option>

						<option value="Veterinary Microbiology">Veterinary Microbiology</option>

						<option value="Veterinary Parasitology">Veterinary Parasitology</option>

						<option value="Veterinary Pathology">Veterinary Pathology</option>

						<option value="Veterinary Pharmacology">Veterinary Pharmacology</option>

						<option value="Veterinary Public Health">Veterinary Public Health</option>

						<option value="Veterinary Surgery">Veterinary Surgery</option>

						<option value="Visual Arts">Visual Arts</option>

						<option value="Women Studies">Women Studies </option>
					</select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div> </div>
                                <div id="pns-net-exe-block" style="display: none"><span style="color:red; ">
                                                                            </span>
                                </div>


                            </td>
                            <td>
                                <div id="pns-net-certificate"> <div class="form-group field-academic-netcertificateno">
<label class="control-label" for="academic-netcertificateno">Certificate No./Roll No.</label>
<input type="text" id="academic-netcertificateno" class="form-control" name="netcertificateno" maxlength="30" value="">
 NET Points : <span id="ugcnet-points-value">0</span>
<div class="invalid-feedback">      This field cannot be blank  </div>
</div></div>
                            </td>
                            <td style="display: none;"><div class="form-group field-academic-netpoints has-success">

<input type="hidden" id="academic-netpoints" class="form-control" name="netpoints" value="0" aria-invalid="false">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div>                               </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <div id="net-fr" style="display: none;">
                                    <table class="table table-bordered">
                                        <tbody><tr>
                                            <th>World University Ranking</th>
                                            <th>Rank</th>
                                            <th>Year</th>
                                        </tr>
                                        <tr>
                                            <td>Quacquarelli Symonds (QS)</td>
                                            <td><div class="form-group field-academic-qs_rank">
<label class="control-label" for="academic-qs_rank"></label>
<input type="text" id="academic-qs_rank" class="form-control" name="qs_rank" value="">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                                            <td><div class="form-group field-academic-qs_rank_year">
<label class="control-label" for="academic-qs_rank_year"></label>
<select id="academic-qs_rank_year" class="form-control" name="qs_rank_year">
<option value="">Select</option>
<option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option></select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                                        </tr>
                                        <tr>
                                            <td>Times Higher Education (THE)</td>
                                            <td><div class="form-group field-academic-the_rank">
<label class="control-label" for="academic-the_rank"></label>
<input type="text" id="academic-the_rank" class="form-control" name="the_rank" value="">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                                            <td><div class="form-group field-academic-the_rank_year">
<label class="control-label" for="academic-the_rank_year"></label>
<select id="academic-the_rank_year" class="form-control" name="the_rank_year">
<option value="">Select</option>
<option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option></select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                                        </tr>
                                        <tr>
                                            <td>Academic Ranking of World Universities (AWRU)</td>
                                            <td><div class="form-group field-academic-awru_rank">
<label class="control-label" for="academic-awru_rank"></label>
<input type="text" id="academic-awru_rank" class="form-control" name="Academic[awru_rank]" value="">

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                                            <td><div class="form-group field-academic-awru_rank_year">
<label class="control-label" for="academic-awru_rank_year"></label>
<select id="academic-awru_rank_year" class="form-control" name="Academic[awru_rank_year]">
<option value="">Select</option>
<option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option></select>

<div class="invalid-feedback">      This field cannot be blank  </div>
</div></td>
                                        </tr>

                                    </tbody></table>
                                </div>
                            </td>

                        </tr>
                                                <tr>
                            <td colspan="7">
                                <strong><sup> * </sup>Candidate with Grade Point Average result should convert it into
                                    overall percentage.</strong>
                            </td>
                        </tr>
                                            </tbody></table>
                </div>
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <br>
            <div class="form-group text-center">
                <button type="submit" id="submitAcadmic" class="btn btn-warning" name="acadmic_submit">Save</button> &nbsp;
            </div>
        </div>
		<div class="panel-footer text-center">
                <a id="exp-next-btn-3" class="btn btn-success" href="experience_info.php">Proceed to Next Section</a>            </div>
    </div>
    </form>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div class="inn-title">
                                <h4>3.1 Teaching Experience after grant of PhD</h4>

                            </div>

                            <div class="bor ad-cou-deta-h4">
                                <form id="teachingexpform" action="http://hr.kannuruniversity.ac.in/JobAppln/experience_info.php#" method="post">
                                <div class="error-summary" style="display:none"><p>Please fix the following errors:</p><ul></ul></div>    <div class="panel panel-jui">

                    <span>Please leave the table blank if you do not have relevant experience. </span>
                <div class="box box-danger" id="container">


			 			<div class="box-body">
				<div class="form-group">
					<label>Name of Institution</label>
					<input type="text" id="institution[]" name="institution[]" class="form-control" placeholder="Enter ...">
				</div>
				<div class="form-group"><label>Designation</label><input class="form-control" type="text" id="desig[]" name="desig[]" placeholder="Enter..."></div>
			<div class="form-group">
			<label>Status</label><span class="style1">*</span>
			<select  name="status[]" required="">
			<option value="">Select</option>
		    <option value="Permanent">Permanent</option>
	  		<option value="Ad-hoc">Ad-hoc</option>
			<option value="Temporary">Temporary</option>
	  		<option value="Contractual">Contractual</option></select>
					</div>
				<div class="form-group"><label>Pay Scale/Consolidated salary</label><input class="form-control" type="text" id="payScale[]" name="payScale[]" placeholder="Enter..."></div>
				<div class="form-group">
			<label>Programme</label><span class="style1">*</span>
			<select  name="prgrm[]" required="">
			<option value="">Select</option>
		    <option value="Undergraduate">Undergraduate</option>
	  		<option value="Postgraduate">Postgraduate</option>
			<option value="Other">Other</option>
	  		</select>
					</div>
					<div class="form-group"><label>Course/Subject</label><input class="form-control" type="text" id="course[]" name="course[]" placeholder="Enter..."></div>
			<div class="form-group">
			<label>Work equivalent to Asst. Professor or higher</label><span class="style1">*</span>
			<select name="wrkeq[]" required="">
			<option value="">Select</option>
		    <option value="Yes">Yes</option>
	  		<option value="No">No</option>
			</select>
			</div>
				<div class="row">
					<div class="col-xs-6"><label>From</label><input type="text" id="from[]" name="from[]" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask=""></div>
					<div class="col-xs-6"><label>To</label><input type="text" id="to[]" name="to[]" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask=""><input type="hidden" id="count" name="count" value="1" class="form-control"><hr></div>
				</div>
			</div>
			             <!-- /.box-body -->
          </div>

		    <div class="box-body">
			<div class="row">
                <div class="col-xs-6">
				  <label></label>
                  <input type="button" id="add" value="Add" class="btn btn-primary">
                </div>
                <div class="col-xs-6">
				 <label></label>
                 <input type="button" id="del" value="Delete" class="btn btn-primary">
                </div>
              </div>
			</div>
			<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">

				</div>
				 <div class="box-footer">

				<input type="submit" name="teachsubmit" value="Save" class="btn btn-warning">


              </div>
				</div>
			</div>
			</form>