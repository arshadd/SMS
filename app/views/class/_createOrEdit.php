<div class="row">
  <div class="col-md-12">
    <div class="portlet-body form">
      <form id="Form_Employee" class="form-horizontal" method="post">

        <div class="form-body">

          <?php if (isset($error) && $error): ?>
            <div class="alert alert-danger display">
              <button class="close" data-close="alert"></button>
              <span>
                 You have some form errors. Please check below.
              </span>
            </div>
          <?php endif; ?>


          <?php if (isset($class) && $class): ?>


          <input type="hidden" id="ClassId" name="ClassId" value="<?php echo $class->class_id?>" class="form-control" />
          <div class="form-group">
            <label class="control-label col-md-3">
              Code:<span class="required">*</span>
            </label>
            <div class="col-md-9">
              <input type="text" id="Code" name="Code" value="<?php echo $class->code?>" class="form-control" />
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">
              Class Name:<span class="required">*</span>
            </label>
            <div class="col-md-9">
              <input type="text" id="ClassName" name="ClassName" value="<?php echo $class->name?>" class="form-control" />
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">
              Section Name:<span class="required">*</span>
            </label>
            <div class="col-md-9">
              <input type="text" id="SectionName" name="SectionName" value="<?php echo $class->section_name?>" class="form-control" />
            </div>
          </div>

          <!--<div class="form-group">
            <label class="control-label col-md-3">
              Grading System :
            </label>
            <div class="col-md-9">
              <select id="Status" name="Status" class="form-control">
                <option>Normal</option>
                <option>GPA</option>
                <option>CWA</option>
                <option>CCE</option>
                <option>ICSE</option>
              </select>
            </div>
          </div>
-->

          <div class="form-actions fluid">
            <div class="col-md-offset-3 col-md-9">
              <a href="#" data-dismiss="modal" class="btn btn-default">
                <i class="fa fa-mail-reply"></i> Close
              </a>
              <button class="btn btn-success" type="submit">
                <i class="fa fa-save"></i> Save
              </button>
            </div>
          </div>


          <?php else :?>

            <div class="alert alert-danger display">
              <button class="close" data-close="alert"></button>
                <span>
                   Invalid parameter.
                </span>
            </div>

          <?php endif; ?>
        </div>
      </form>
    </div>
  </div>
</div>