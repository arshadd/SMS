<div class='form-body'>
  <div class='alert alert-danger display-hide'>
    <button data-close='alert' class='close'></button>
    You have some form errors. Please check below.
  </div>

  <input type='hidden' id='EmployeeId' name='EmployeeId' class='form-control' />
  <div class='form-group'>
    <label class='control-label col-md-3'>
      Code:<span class='required'>*</span>
    </label>
    <div class='col-md-9'>
      Code
    </div>
  </div>

  <div class='form-group'>
    <label class='control-label col-md-3'>
      Class Name:<span class='required'>*</span>
    </label>
    <div class='col-md-9'>
      Class 1
    </div>
  </div>

  <div class='form-group'>
    <label class='control-label col-md-3'>
      Description:<span class='required'>*</span>
    </label>
    <div class='col-md-9'>
      Testing Description
    </div>
  </div>

  <div class='form-group'>
    <label class='control-label col-md-3'>
      Grading System :
    </label>
    <div class='col-md-9'>
        Normal
    </div>
  </div>

  <div class='form-actions fluid'>
    <div class='col-md-offset-3 col-md-9'>
      <a href="#" data-dismiss="modal" class="btn btn-default">
        <i class="fa fa-mail-reply"></i> Close
      </a>
      <a href="<?php echo base_url();?>/index.php/classes/edit/1" class="btn btn-success">
        <i class="fa fa-pencil"></i> Edit
      </a>
    </div>
  </div>
  
  
</div>





