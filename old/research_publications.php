<form id="researchform" action="http://hr.kannuruniversity.ac.in/JobAppln/awards_fellowship.php#" method="post">

    <div class="panel panel-jui">

        <div class="panel-body">
            <div id="teachingexpcontent">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span  style="color:#FF0000" >Please leave this section blank, if you have not received any honor or award. </span>
                <div class="box box-danger" id="container">
            <div class="box-header with-border">

			  			   <span>International/National : (Awards given by International Organizations/Government of India/Government of India recognized National Level Bodies) <br> State Level :  (Awards given by State Government) . </span>
			               </div>
           <br>
           <br>
			 			<div class="box-body">
				<div class="form-group">
					<label>Name of Awarding Body</label>
					<input type="text" id="awardBody[]" name="awardBody[]" class="form-control" placeholder="Enter ...">
				</div>
				<div class="form-group"><label>Name of Award/Honor</label><input class="form-control" type="text" id="awardName[]" name="awardName[]" placeholder="Enter..."></div>
				<div class="form-group"><label>Date</label><input type="text" id="awardDate[]" name="awardDate[]" class="form-control" data-inputmask="&#39;alias&#39;: &#39;dd/mm/yyyy&#39;" data-mask=""></div>
			<div class="form-group">
			<label>Level</label>
			<select name="awardLevel[]" required="">
			<option value="">Select</option>
		    <option value="International">International</option>
	  		<option value="National">National</option>
						<option value="State">State</option>
						</select>
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
			</div>


                </div>
            </div>
			</div>
			<div class="row">
	  <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">

				</div>
				 <div class="box-footer">

				<input type="submit" name="awardsubmit" value="Save" class="btn btn-warning">

              </div>
				</div>
	  </div>
	  <div class="row">
	 <div class="panel-footer text-center">
                <a id="exp-next-btn-3" class="btn btn-success" href="http://hr.kannuruniversity.ac.in/JobAppln/noobjection.php">Proceed to Next Section</a>            </div>
	  </div>
            <br>


	</form>