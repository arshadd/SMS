<div class="row">
  <div class="col-md-12">

    <div class="alert alert-success display-hide">
      <button data-close="alert" class="close"></button>
      Student Information saved successfully.
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="portlet">
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-cogs"></i>Class's Students
            </div>
            <div class="actions">
              <a href="<?php echo site_url();?>/academics/student/manage/search" class="btn btn-primary">
                <i class="fa fa-user"></i> Student Management
              </a>
            </div>
            <!--<div class="actions">
              <a href="#" class="btn btn-primary" onclick="StudentModule.addView();">
                <i class="fa fa-pencil-square-o"></i> Add New Student
              </a>
              <a href="#" class="btn btn-success" onclick="StudentModule.addView();">
                <i class="fa fa-plus-square"></i> Add Student To Class
              </a>
            </div>-->
          </div>
          <div class="portlet-body">

            <table id="StudentGrid" class="table table-striped table-bordered table-hover table-full-width">
              <thead>
              <tr>
                <th class='hidden-xs'>Photo</th>
                <th class='hidden-xs'>Full Name</th>
                <th class='hidden-xs'>Gender</th>
                <th class='hidden-xs'>Admission #</th>
                <th class='hidden-xs'>Class</th>
                <th class="hidden-xs">Batch</th>
                <th class="hidden-xs">Roll #</th>
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


<div class="modal fade" id="mdlCreateStudent" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-small">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Create Student</h4>
      </div>
      <div class="portlet-body form">
        <div class="scroller" style="height: 350px; width:100px" data-always-visible="1" data-rail-visible1="1">
          <div class="portlet-body form">
            <form id="Form_Student" class="form-horizontal" method="post">
              <?php include('_createOrEditStudent.php');?>

            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
