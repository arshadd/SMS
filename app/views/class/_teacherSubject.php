<div class="row">
  <div class="col-md-12">
    <div class="portlet">
      <!--<div class="portlet-title">
        <div class="caption">
          <i class="fa fa-cogs"></i>Search
        </div>
      </div>-->
      <div class="portlet-body text-center">
        <form id="Form_Teacher_Search"  class="form-inline" role="form">
          <div class="form-group">
            <label for="teacher_class_id">Class:</label>
            <select id="teacher_class_id" name="teacher_class_id" class='form-control input-medium' disabled="disabled">
            </select>
          </div>

          <div class="form-group">
            <label for="teacher_batch_id">Batch:</label>
            <select id="teacher_batch_id"  name="teacher_batch_id" class='form-control input-medium'>
            </select>
          </div>

          <!--<button type="submit" class="btn btn-info">
            <i class="fa fa-search"></i> Search
          </button>-->
        </form>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12">

    <div class="alert alert-success display-hide">
      <button data-close="alert" class="close"></button>
      Subject Information saved successfully.
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="portlet">

          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-cogs"></i>Teacher's Subjects
            </div>
            <div class="actions">
              <a href="#" class="btn btn-primary" id="btnAddSubject" onclick="SubjectModule.addView();">
                <i class="fa fa-pencil-square-o"></i> Add New Subject
              </a>
            </div>
          </div>

          <div class="portlet-body">
            <table id="TeacherGrid" class="table table-striped table-bordered table-hover table-full-width">
              <thead>
              <tr>
                <th class='hidden-xs'>Code</th>
                <th class='hidden-xs'>Subject Name</th>
                <th class='hidden-xs'>Max Weekly Classes</th>
                <th class='hidden-xs'>Credit Hours</th>
                <th class="hidden-xs">Manage</th>
              </tr>
              </thead>
              <tbody>

              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div id="mdlCreateTeacher" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="true" data-width="400">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Create Teacher</h4>
  </div>
  <div class="modal-body">
    <?php include('_createOrEditTeacher.php');?>
  </div>
</div>

<div id="mdlDeleteTeacher" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="true" data-width="400">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Confirm Delete</h4>
  </div>
  <div class="modal-body">
    <form class="form-horizontal" method="post">
      <div class="form-body">
        <div class="alert alert-info display">
              <span>
                 Are you sure want to delete?
              </span>
        </div>
        <input type="hidden" id="class_id" name="class_id" class="form-control"/>
        <div class="form-actions fluid">
          <div class="col-md-offset-3 col-md-9">
            <a href="#" data-dismiss="modal" class="btn btn-default">
              <i class="fa fa-mail-reply"></i> Close
            </a>
            <button class="btn btn-success" id="btnDelete" type="button">
              <i class="fa fa-trash-o"></i> Delete
            </button>
            <label>
              <div id="loader"><img src="<?php echo base_url() . '/assets/img/input-spinner.gif'; ?>"/></div>
            </label>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

