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
      <label class="control-label col-md-3">
        Type:<span class="required">*</span>
      </label>
      <div class="col-md-9">
        <div class="radio-list">
          <label class="radio-inline">
            <div class="radio"><span class=""><input type="radio" name="rdoMarkAll" value="S" ></span></div> Student
          </label>
          <label class="radio-inline">
            <div class="radio"><span class="checked"><input type="radio" name="rdoMarkAll" value="E" ></span></div> Employee
          </label>
          <label class="radio-inline">
            <div class="radio"><span class="checked"><input type="radio" name="rdoMarkAll" value="B" ></span></div> Batch
          </label>
          <label class="radio-inline">
            <div class="radio"><span class="checked"><input type="radio" name="rdoMarkAll" value="ED" ></span></div> Employee Department
          </label>
          <label class="radio-inline">
            <div class="radio"><span class="checked"><input type="radio" name="rdoMarkAll" value="ALL" ></span></div> All Staff
          </label>
        </div>

      </div>
    </div>

    <div class="form-group student">
      <label class="control-label col-md-3">
        Student:
      </label>
      <div class="col-md-6">
        <select class="form-control select2_sample1" id="student_id" multiple>
          <option>Student 1</option>
          <option>Student 2</option>
          <option>Student 3</option>
        </select>
      </div>
    </div>

    <div class="form-group employee">
      <label class="control-label col-md-3">
        Employee:
      </label>
      <div class="col-md-6">
        <select class="form-control select2_sample1" id="employee_id" multiple>
          <option>Employee 1</option>
          <option>Employee 2</option>
          <option>Employee 3</option>
        </select>
      </div>
    </div>

    <div class="form-group department">
      <label class="control-label col-md-3">
        Department:
      </label>
      <div class="col-md-6">
        <select class="form-control select2_sample1" id="department_id" multiple>
          <option>Department 1</option>
          <option>Department 2</option>
          <option>Department 3</option>
        </select>
      </div>
    </div>


    <div class="form-group batch">
      <label class="control-label col-md-3">
        Batch:
      </label>
      <div class="col-md-6">
        <select class="form-control select2_sample1" id="batch_id" multiple>
          <option>Batch 1</option>
          <option>Batch 2</option>
          <option>Batch 3</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3">
        Message:
      </label>
      <div class="col-md-6">
        <textarea id="description" name="description" rows="4" class="form-control"></textarea>
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
