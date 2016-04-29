<?php
$title = "Student's Attendance Report";
$body_class ="page-header-fixed";

$pageCss  = array(

    '<link href="' . base_url() . 'assets/plugins/select2/select2_conquer.css" rel="stylesheet" type="text/css" />'

, '<link href="' . base_url() . 'assets/css/pages/invoice.css" rel="stylesheet" type="text/css" />'

, '<link href="' . base_url() . 'assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />'
, '<link href="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />'

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
      <h3 class="page-title hidden-print"><i class="fa fa-file-text icon-large"></i>
        Student's Attendance Report
      </h3>
      <div class="page-bar hidden-print">
        <ul class="page-breadcrumb breadcrumb">
          <li>
            <i class="fa fa-cogs"></i>
            <a href="#">Academics</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="<?php echo site_url();?>/academics/student/manage/index">Student</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="<?php echo site_url() . '/academics/student/report/index'; ?>">Report</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="#">Student's Attendance Report</a>
          </li>
        </ul>
      </div>
      <!-- END PAGE HEADER-->



      <div class="row hidden-print">
        <div class="col-md-12">
          <div class="portlet">

            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-cogs"></i>Filter Report
              </div>

            </div>

            <div class="portlet-body">

              <form id="Form_Report" class="form-horizontal" method="post">

                <div class="form-body">
                  <div class="form-group batch-class-selection">
                    <label class="control-label col-md-2">
                      Class / Batch:<span class="required">*</span>
                    </label>
                    <div class="col-md-10">
                      <select id="batch_id" name="batch_id" class="form-control select2me input-xlarge">
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-2">
                      Date Range:<span class="required">*</span>
                    </label>
                    <div class="col-md-10">
                      <div id="reportrange" class="btn btn-default">
                        <i class="fa fa-calendar"></i>
                        &nbsp;
                        <span>
                        </span>
                        <b class="fa fa-angle-down"></b>
                      </div>

                    </div>
                  </div>

                  <div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-9">
                      <button type="submit" class="btn btn-danger">
                        <i class="fa fa-bar-chart-o"></i> Generate Report
                      </button>
                      <label>
                        <div id="loader"><img
                              src="<?php echo base_url() . "/assets/img/input-spinner.gif"; ?>"/>
                        </div>
                      </label>
                    </div>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

      <?php
      $report_title = "Student's Attendance Report";
      include(VIEW_PATH.'report_header.php');
      ?>

      <div class="row">
        <div class="col-xs-12">
          <table id="ClassAttendanceSummaryGrid" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
              <th class="class_name"></th>
              <th class="date_ranges"></th>
            </tr>
            </thead>
          </table>
        </div>
      </div>
      <!--
            <div class="row">
              <div class="col-md-12">
              </div>
            </div>-->

      <div class="row">
        <div class="col-xs-12">
          <div id="ClassAttendanceGrid"></div>
        </div>
      </div>


      <?php
      include(VIEW_PATH.'report_footer.php');
      ?>

    </div>

  </div>

</div>
<!-- END CONTAINER -->

<?php

$pagePlugin  = array(

    '<script type="text/javascript" src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" ></script>'
, '<script type="text/javascript" src="' . base_url() . 'assets/plugins/select2/select2.min.js" ></script>'

,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/moment.min.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" ></script>'

);

$pageJsScript  = array(
    '<script type="text/javascript" src="' . base_url() . 'assets/js/util.js" ></script>'
, '<script type="text/javascript" src="' . base_url() . 'assets/js/Academics/Attendance/Report/AttendanceModule.js" ></script>'

//,'<script type="text/javascript" src="' . base_url() . 'assets/js/Academics/Class_Batch/Report/ClassBatchReportModule.js" ></script>'
);

$pageJsCalls  = array(
    'AttendanceModule.init();'
);

include(VIEW_PATH.'footer.php');
?>
