<div class="row">
  <div class="col-md-12">
    <div class="portlet-body form">
      <form id="Form_Teacher" class="form-horizontal" method="post">

        <div class='form-body'>
          <div class='alert alert-danger display-hide'>
            <button data-close='alert' class='close'></button>
            You have some form errors. Please check below.
          </div>

          <input type="hidden" id="employees_subjects_id" name="employees_subjects_id" class="form-control"/>

          <div class='form-group'>
            <label class='control-label col-md-3'>
              Employee name:<span class='required'>*</span>
            </label>
            <div class='col-md-9'>
              <select id="employee_id" name="employee_id" class="form-control select2me"></select>
            </div>
          </div>


          <div class='form-group'>
            <label class='control-label col-md-3'>
              Subject name:<span class='required'>*</span>
            </label>
            <div class='col-md-9'>
              <select id="subject_id1" name="subject_id1" class="form-control select2me"></select>
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

      </form>
    </div>
  </div>
</div>