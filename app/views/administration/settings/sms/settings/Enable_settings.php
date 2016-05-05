<form id="Form_School"  enctype="multipart/form-data" class="form-horizontal" method="post">

  <div class="form-body">

    <div class="alert alert-success display-hide">
      <button class="close" data-close="alert"></button>
      <span>
         School information saved successfully.
      </span>
    </div>
    <div class="alert alert-danger display-hide">
      <button class="close" data-close="alert"></button>
      <span>
         You have some form errors. Please check below.
      </span>
    </div>

    <input type="hidden" id="school_id" name="school_id" class="form-control" />

    <div class="form-group">
      <label class="control-label col-md-2">
      </label>
      <div class="col-md-6">
        <div class="checkbox-list">
          <label class="checkbox-inline">
            <input type="checkbox" name="rdoMarkAll" value="P"/> Student Admission
          </label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2">
      </label>
      <div class="col-md-6">
        <div class="checkbox-list">
          <label class="checkbox-inline">
            <input type="checkbox" name="rdoMarkAll" value="P"/> Exam Schedule / Result
          </label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2">
      </label>
      <div class="col-md-6">
        <div class="checkbox-list">
          <label class="checkbox-inline">
            <input type="checkbox" name="rdoMarkAll" value="P"/> Attendance
          </label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2">
      </label>
      <div class="col-md-6">
        <div class="checkbox-list">
          <label class="checkbox-inline">
            <input type="checkbox" name="rdoMarkAll" value="P"/> Events
          </label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2">
      </label>
      <div class="col-md-6">
        <div class="checkbox-list">
          <label class="checkbox-inline">
            <input type="checkbox" name="rdoMarkAll" value="P"/> Fee Submission
          </label>
        </div>
      </div>
    </div>

  </div>


    <div class="form-actions fluid">
      <div class="col-md-offset-3 col-md-9">
        <!--<a href="#" data-dismiss="modal" class="btn btn-default">
          <i class="fa fa-mail-reply"></i> Close
        </a>-->
        <button class="btn btn-success" type="submit">
          <i class="fa fa-save"></i> Save
        </button>
        <label ><div id="loader"><img  src="<?php echo base_url()."/assets/img/input-spinner.gif" ;?>"/></div></label>

      </div>
    </div>
  </div>

</form>
