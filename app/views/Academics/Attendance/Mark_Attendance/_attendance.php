<?php
$title = "Attendance";
$body_class ="page-header-fixed";

$pageCss  = array(
    '<link href="' . base_url() . 'assets/plugins/select2/select2_conquer.css" rel="stylesheet" type="text/css" />'
,'<link href="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.css" rel="stylesheet" type="text/css" />'
,'<link href="' . base_url() . 'assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" type="text/css" />'

,'<link href="' . base_url() . 'assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />'
,'<link href="' . base_url() . 'assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />'

,'<link href="' . base_url() . 'assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />'
,'<link href="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />'

);


include(VIEW_PATH.'header.php');
?>

<!-- BEGIN BODY -->

<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">

  <?php $this->load->view('topheader') ?>

</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">

  <?php $this->load->view('leftnavigation') ?>

  <div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <h3 class="page-title">
        <i class="fa fa-check-square-o icon-large"></i>
        Attendance
      </h3>
      <div class="page-bar">
        <ul class="page-breadcrumb breadcrumb">
          <li>
            <i class="fa fa-cogs"></i>
            <a href="#">Academics</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="<?php echo base_url();?>index.php/academics/attendance/index">Attendance Register</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="#">Attendance</a>
          </li>
        </ul>
      </div>
      <!-- END PAGE HEADER-->


      <div class="row">
        <div class="col-md-12">
          <div class="portlet">
            <div class="portlet-body text-center">
              <form id="Form_Class_Attendances_Search"  class="form-inline" >

                <div class='alert alert-success display-hide'>
                  <button data-close='alert' class='close'></button>
                </div>

                <div class="alert alert-danger display-hide">
                  <button class="close" data-close="alert"></button>
              <span>
                 You have some form errors. Please check below.
              </span>
                </div>

                <div class="form-group">
                  <label for="section">Attendance Date :</label>

                  <input class="form-control input-medium date-picker" id="attendance_date" name="attendance_date" size="16" type="text" data-date-format="dd-MM-yyyy" /></div>

                <button type="submit" class="btn btn-info">
                  <i class="fa fa-search"></i> Search
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="portlet">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-reorder"></i> Mark Attendance
              </div>
              <div class="tools">

              </div>
            </div>


            <div class="portlet-body form">
              <form id="Form_Attendance" class="form-horizontal" method="post">

                <table id="AttendanceGrid" class="table table-striped table-bordered table-hover table-full-width">
                  <thead>
                  <tr>
                    <th class='hidden-xs' colspan="4">Today: <label class="badge badge-warning" id="lblAttendanceDate">0</label></th>
                    <th class='hidden-xs'>
                      <div class="radio-list">
                        <label class="radio-inline">
                          <input type="radio" name="rdoMarkAll" value="P"/> Mark All Present
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="rdoMarkAll" value="A"/> Mark All Absent
                        </label>
                      </div>
                    </th>
                    <th class='hidden-xs'>Present: <label class="badge badge-success" id="lblPresent">0</label>, Absentees: <label class="badge badge-danger" id="lblAbsent">0</label></th>
                  </tr>
                  <tr>
                    <th class='hidden-xs'>#</th>
                    <th class='hidden-xs'>Photo</th>
                    <th class='hidden-xs'>Full Name</th>
                    <th class='hidden-xs'>Roll #</th>

                    <th class='hidden-xs'>Attendance</th>
                    <th class='hidden-xs'>Comments</th>
                  </tr>
                  </thead>
                  <tbody>
                  <!--<tr>
                    <td>
                      Ali Murad Jamali
                    </td>
                    <td>
                      Ali Murad Jamali
                    </td>
                    <td>
                      <div class="radio-list">
                        <label class="radio-inline">
                          <input type="radio" name="optionsRadios" id="optionsRadios1" value="P"/> Present
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="optionsRadios" id="optionsRadios2" value="A"/> Absent
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="optionsRadios" id="optionsRadios3" value="L" /> Leave
                        </label>
                      </div>
                    </td>
                    <td>
                      <input type='text' id='comments' name='comments' class='form-control' />
                    </td>
                  </tr>-->
                  </tbody>
                </table>

                <div class="form-actions right">
                  <button type="button" id="btnSaveAttendance" class="btn btn-success">Save Attendance</button>
                  <label>
                    <div id="loader"><img src="<?php echo base_url() . '/assets/img/input-spinner.gif'; ?>"/></div>
                  </label>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

</div>
<!-- END CONTAINER -->


<?php

$pagePlugin  = array(
    '<script type="text/javascript" src="' . base_url() . 'assets/plugins/custom-datatable/jquery.dataTables.min.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/select2/select2.min.js" ></script>'

,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js" ></script>'

,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-modal/js/bootstrap-modal.js"" ></script>'

  ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/moment.min.js" ></script>'
  ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" ></script>'
);

$pageJsScript  = array(
    '<script type="text/javascript" src="' . base_url() . 'assets/js/util.js" ></script>'
  , '<script type="text/javascript" src="' . base_url() . 'assets/js/Class/ClassAttendanceModule.js" ></script>'

);

$pageJsCalls  = array(
  'ClassAttendanceModule.init();'
);

include(VIEW_PATH.'footer.php');
?>




