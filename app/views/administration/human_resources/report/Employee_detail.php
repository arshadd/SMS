<?php
$title = "Student's Detail";
$body_class = "page-header-fixed";

$pageCss = array(
    '<link href="' . base_url() . 'assets/plugins/select2/select2_conquer.css" rel="stylesheet" type="text/css" />'
, '<link href="' . base_url() . 'assets/css/pages/invoice.css" rel="stylesheet" type="text/css" />'
);
include(VIEW_PATH . 'header.php');
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
        Employee's Detail Report
      </h3>
      <div class="page-bar hidden-print">
        <ul class="page-breadcrumb breadcrumb">
          <li>
            <i class="fa fa-cogs"></i>
            <a href="#">Administrator</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="<?php echo site_url(); ?>/administration/hr/manage/index">HR Management</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="<?php echo site_url() . '/administration/hr/report/index'; ?>">Report</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="#">Employee's Detail</a>
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
                      Employee:<span class="required">*</span>
                    </label>
                    <div class="col-md-10">
                      <select id="employee_id" name="employee_id"
                              class="form-control select2me input-xlarge">
                        <option value="">Select</option>
                        <option value="1">Computer - Muhammad Majid (Teaching Staff)</option>
                      </select>
                    </div>
                  </div>

                  <!--<div class="form-group">
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
                  </div>-->

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
      $report_title = "Student's Detail";
      include(VIEW_PATH.'report_header.php');
      ?>


      <div class="form-horizontal">

        <div class="form-body invoice">

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label class="control-label col-xs-4">
                  <img id="photo" name="photo" src="../../../../assets/resource/default/employee.png" style="width: 150px;height: 100px;" alt=""/>
                </label>
                <div class="col-xs-8">
                  <ul class="list-unstyled">
                    <li>
                      <strong>Syed Noman Azeem</strong>
                    </li>
                    <li>
                      <strong>Employee Code:</strong> 001
                    </li>
                    <li>
                      <strong>Date of joining:</strong> 2001 - 2002
                  </ul>
                  </li>
                </div>
              </div>
            </div>
            <div class="col-xs-6">
            </div>
          </div>



          <h4 class="form-section">Personal Detail</h4>

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label class="control-label col-xs-4">
                  <strong>Date of birth:</strong>
                </label>
                <div class="col-xs-8">
                  <label class="control-label">17 June, 2015</label>
                </div>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label class="control-label col-xs-4">
                  <strong>Gender:</strong>
                </label>
                <div class="col-xs-8">
                  <label class="control-label">Male</label>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label class="control-label col-xs-4">
                  <strong>Blood group:</strong>
                </label>
                <div class="col-xs-8">
                  <label class="control-label">O+</label>
                </div>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label class="control-label col-xs-4">
                  <strong>Place birth:</strong>
                </label>
                <div class="col-xs-8">
                  <label class="control-label">Karachi</label>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label class="control-label col-xs-4">
                  <strong>Nationality:</strong>
                </label>
                <div class="col-xs-8">
                  <label class="control-label">Pakistan</label>
                </div>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label class="control-label col-xs-4">
                  <strong>Religion:</strong>
                </label>
                <div class="col-xs-8">
                  <label class="control-label">Islam</label>
                </div>
              </div>
            </div>
          </div>

          <h4 class="form-section">Contact Detail</h4>
          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label class="control-label col-xs-4">
                  <strong>Phone 1:</strong>
                </label>
                <div class="col-xs-8">
                  <label class="control-label">312-225252</label>
                </div>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label class="control-label col-xs-4">
                  <strong>Phone 2:</strong>
                </label>
                <div class="col-xs-8">
                  <label class="control-label">312-23434252</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label class="control-label col-xs-4">
                  <strong>Address 1:</strong>
                </label>
                <div class="col-xs-8">
                  <label class="control-label">House 90#, G-7 Islamabad</label>
                </div>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label class="control-label col-xs-4">
                  <strong>Address 2:</strong>
                </label>
                <div class="col-xs-8">
                  <label class="control-label">House 90#, G-7 Islamabad</label>
                </div>
              </div>
            </div>
          </div>

          <h4 class="form-section">Guardian Detail</h4>
          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label class="control-label col-xs-4">
                  <strong>Father name:</strong>
                </label>
                <div class="col-xs-8">
                  <label class="control-label">Syed Luqman Azeem</label>
                </div>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label class="control-label col-xs-4">
                  <strong>Father contact:</strong>
                </label>
                <div class="col-xs-8">
                  <label class="control-label"></label>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label class="control-label col-xs-4">
                  <strong>Mother name:</strong>
                </label>
                <div class="col-xs-8">
                  <label class="control-label">Perveen</label>
                </div>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label class="control-label col-xs-4">
                  <strong>Mother contact:</strong>
                </label>
                <div class="col-xs-8">
                  <label class="control-label"></label>
                </div>
              </div>
            </div>
          </div>


          <h4 class="form-section">Class & Batch Detail</h4>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label class="control-label col-xs-2">
                  <strong>Class / Batch:</strong>
                </label>
                <div class="col-xs-10">
                  <label class="control-label">Class 1, 2000 - 2001</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label class="control-label col-xs-2">
                  <strong>Roll #:</strong>
                </label>
                <div class="col-xs-10">
                  <label class="control-label">G120005</label>
                </div>
              </div>
            </div>
          </div>


          <h4 class="form-section">Settings</h4>

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label class="control-label col-xs-4">
                  <strong>Biometric #:</strong>
                </label>
                <div class="col-xs-8">
                  <label class="control-label">D334X-3434X-34343343-X34343</label>
                </div>
              </div>
            </div>
            <div class="col-xs-6">

            </div>
          </div>


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

$pagePlugin = array(


);

$pageJsScript = array(
    '<script type="text/javascript" src="' . base_url() . 'assets/js/util.js" ></script>'
, '<script type="text/javascript" src="' . base_url() . 'assets/js/Academics/Class_Batch/Report/ClassBatchReportModule.js" ></script>'
);

$pageJsCalls = array(//'ClassBatchReportModule.init();'
);

include(VIEW_PATH . 'footer.php');
?>
