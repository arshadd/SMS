<?php
$title = "Subject List";
$body_class ="page-header-fixed";

$pageCss  = array(
    '<link href="' . base_url() . 'assets/plugins/select2/select2_conquer.css" rel="stylesheet" type="text/css" />'
, '<link href="' . base_url() . 'assets/css/pages/invoice.css" rel="stylesheet" type="text/css" />'
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
        Subject Report
      </h3>
      <div class="page-bar hidden-print">
        <ul class="page-breadcrumb breadcrumb">
          <li>
            <i class="fa fa-cogs"></i>
            <a href="#">Academics</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="<?php echo site_url();?>/academics/subject/manage/index">Subject</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="<?php echo site_url() . '/academics/subject/report/index'; ?>">Report</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="#">All Subject</a>
          </li>
        </ul>
      </div>
      <!-- END PAGE HEADER-->

      <?php
      $report_title = "Subject List";
      include(VIEW_PATH.'report_header.php');
      ?>

      <div class="row">
        <div class="col-md-12">

          <table id="ClassGrid" class="table table-striped table-bordered table-hover table-full-width">
            <thead>
            <tr>
              <th>S.No</th>
              <th>Name</th>
              <th>Gender</th>
              <th>Admission #</th>
              <th>Class</th>
              <th>Batch</th>
              <th>Roll #</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>1</td>
              <td>Syed Kashif Ali</td>
              <td>Male</td>
              <td>S123</td>
              <td>Class 1</td>
              <td>Green House</td>
              <td>G11223</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Syed Nadeem</td>
              <td>Male</td>
              <td>S123</td>
              <td>Class 1</td>
              <td>Green House</td>
              <td>G11223</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Aleem Khan</td>
              <td>Male</td>
              <td>S123</td>
              <td>Class 1</td>
              <td>Green House</td>
              <td>G11223</td>
            </tr>
            <tr>
              <td>4</td>
              <td>Nadeem Ali</td>
              <td>Male</td>
              <td>S123</td>
              <td>Class 1</td>
              <td>Green House</td>
              <td>G11223</td>
            </tr>
            </tbody>
          </table>

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

);

$pageJsScript  = array(
    '<script type="text/javascript" src="' . base_url() . 'assets/js/util.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/js/Academics/Class_Batch/Report/ClassBatchReportModule.js" ></script>'
);

$pageJsCalls  = array(
  //'ClassBatchReportModule.init();'
);

include(VIEW_PATH.'footer.php');
?>
