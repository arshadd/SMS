<div class='form-body'>
  <div class='alert alert-danger display-hide'>
    <button data-close='alert' class='close'></button>
    You have some form errors. Please check below.
  </div>

  <input type='hidden' id='EmployeeId' name='EmployeeId' class='form-control' />
  <div class='form-group'>
    <label class='control-label col-md-3'>
      Class Name:
    </label>
    <div class='col-md-9'>
      <select id='Status' name='Status' class='form-control'>
        <option>Class 1</option>
        <option>Class 2</option>
      </select>
    </div>
  </div>
  <div class='form-group'>
    <label class='control-label col-md-3'>
      Code:<span class='required'>*</span>
    </label>
    <div class='col-md-9'>
      <input type='text' id='Code' name='Code' class='form-control' />
    </div>
  </div>
  <div class='form-group'>
    <label class='control-label col-md-3'>
      Section Name:<span class='required'>*</span>
    </label>
    <div class='col-md-9'>
      <input type='text' id='FirstName' name='FirstName' class='form-control' />
    </div>
  </div>

  


  <div class='form-actions fluid'>
    <div class='col-md-offset-3 col-md-9'>
      <a href="#" data-dismiss="modal" class="btn btn-default">
        <i class="fa fa-mail-reply"></i> Close
      </a>
      <button class='btn btn-success' type='submit'>
        <i class='fa fa-save'></i> Save
      </button>
    </div>
  </div>
</div>