<form id="resexpform" action="#" method="post">
			<div class="error-summary" style="display:none"><p>Please fix the following errors:</p><ul></ul></div>    <div class="panel panel-jui">
			<span>Please leave the table blank if you do not have relevant experience. </span>
			  <div class="box box-danger" id="rescontainer">
            <div class="box-header with-border">
              <h3 class="box-title">Research Experience after PhD</h3>
            </div>
             			<div class="box-body">
			    <div class="form-group">
                  <label>University/Institute/Industry</label>
                  <input type="text" name="resinstitution[]" class="form-control" placeholder="Enter ...">
                </div>
			  <div class="form-group">
			  <label>Designation</label>
                  <input type="text" name="rdesignation[]" class="form-control" placeholder="Enter ...">
                </div>
				 <div class="form-group">
			  <label>Pay scale/consolidated salary</label>
                  <input type="text" name="rsalary[]" class="form-control" placeholder="Enter ...">
                </div>
				<div class="form-group">
			<label>Work equivalent to Asst. Professor or higher</label><span class="style1">*</span>
			<select  name="rwrkeq[]" required="">
			<option value="">Select</option>
		    <option value="Yes">Yes</option>
	  		<option value="No">No</option>
			</select>
			</div>

				<div class="row">
                <div class="col-xs-6">
				  <label>From</label>
                  <input type="text" class="form-control" name="resfromdate[]" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" required="" data-mask="">
                </div>
                <div class="col-xs-6">
				 <label>To</label>
                  <input type="text" class="form-control" name="restodate[]" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" required="" data-mask="">
				  <input type="hidden" id="rescount" name="rescount" value="1" class="form-control">
                </div>

              </div>
			</div>
			            <!-- /.box-body -->
          </div>
		  <div class="box-body">
			<div class="row">
                <div class="col-xs-6">
				  <label></label>
                  <input type="button" id="addres" value="Add" class="btn btn-primary">
                </div>
                <div class="col-xs-6">
				 <label></label>
                 <input type="button" id="delres" value="Delete" class="btn btn-primary">
                </div>
              </div>
			</div>

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">

				</div>
				 <div class="box-footer">

				<input type="submit" name="ressubmit" value="Save" class="btn btn-warning">


              </div>
				</div>

                </div>
				</form>