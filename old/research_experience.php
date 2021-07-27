 <form id="researchform" action="http://hr.kannuruniversity.ac.in/JobAppln/research_ugclis.php#" method="post">

    <div class="panel panel-jui">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-10">

                </div>
                <div class="col-md-2 text-right" style="display:none;">
                    Research Score:  : <span id="total-points-teachexp-du"> </span>


                </div>

            </div>
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-md-12">

                <div class="box box-danger" id="container">

            			<div class="box-body">
			 <div class="row">
			  <div class="col-md-3">
				<div class="form-group">
					<label>Publication Type</label>

					<select id="researcharticle-pubtype"  name="pubType[]" required="true">
<option value="">Select</option>
<option value="Peer Reviewed">Peer Reviewed</option>
<option value="UGC Listed">UGC Listed</option>
</select>
				</div>
				<div class="form-group"><label>Title of the Paper</label><textarea id="researcharticle-title" class="form-control" name="title[]" row="2" required="true"></textarea></div>
				<div class="form-group"><label>Journal Name</label><input type="text" id="researcharticle-journalno" class="form-control" name="journalNo[]" maxlength="255" required="true"></div>


				</div>
				<div class="col-md-3">
				<div class="form-group"><label>Year</label>
				  <span class="form-group field-academic-tenth_year required">
				  <select id="researcharticle-year"  name="researcharticle-year" required="true">
				    <option value="">Select</option>
				    <?php for ($yr=1960; $yr<=2050; $yr++) { ?>
				    <option value="<?php echo $yr; ?>"><?php echo $yr; ?></option>
				    <?php } ?>
				    </select>
				  </span></div>
				<div class="form-group"><label>Vol. No.</label><input type="text" id="researcharticle-volume" class="form-control" name="volume[]" maxlength="10" required="true"></div>
				<div class="form-group"><label>Page No.</label><input type="text" id="researcharticle-pageno" class="form-control" name="pageNo[]" maxlength="10" required="true"></div>

				</div>
				<div class="col-md-3">
				<div class="form-group"><label>ISSN No.</label><input type="text" id="researcharticle-issnisbnno" class="form-control" name="issnIsbnNo[]" maxlength="100" required="true"></div>
				<div class="form-group"><label>Impact Factor</label><select id="researcharticle-impactfactor"  name="impactFactor[]" required="true">
<option value="">Select</option>
<option value="no">No Impact factor</option>
<option value="1">less than 1</option>
<option value="2">between 1 and 2</option>
<option value="5">between 2 and 5</option>
<option value="10">between 5 and 10</option>
<option value="11">above 10</option>
</select></div>
				<div class="form-group"><label>SCOPUS Indexed</label><select id="researcharticle-scopus"  name="scopus[]" required="true">
<option value="">Select</option>
<option value="yes">Yes</option>
<option value="no">No</option>
</select></div>

				</div>
				<div class="col-md-3">
				<div class="form-group"><label>Authorship</label><select id="researcharticle-author"  name="author[]" required="true">
<option value="">Select</option>
<option value="1">Single Author</option>
<option value="2">One of the two author/ First and  Principal/Corresponding author</option>
<option value="3">Other/Joint Author</option>
</select></div>


				</div>
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
			<div class="panel-heading">

        </div>





                </div>
            </div>
			<div class="row">
	  <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">

				</div>
				 <div class="box-footer">

				<input type="submit" name="submit" value="Save" class="btn btn-warning">

              </div>
				</div>
	  </div>
	  <div class="row">
	 <div class="panel-footer text-center">
	                 <a id="exp-next-btn-3" class="btn btn-success" href="http://hr.kannuruniversity.ac.in/JobAppln/awards_fellowship.php">Proceed to Next Section</a>
								        </div>
	  </div>
            <br>

        </div>
    </div>





	</form>