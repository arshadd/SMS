<?php
$title = "Log SMS";
$body_class ="page-header-fixed";

$pageCss  = array(
    '<link href="' . base_url() . 'assets/plugins/select2/select2_conquer.css" rel="stylesheet" type="text/css" />'
,'<link href="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.css" rel="stylesheet" type="text/css" />'
,'<link href="' . base_url() . 'assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" type="text/css" />'
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
      <h3 class="page-title"><i class="fa fa-external-link-square icon-large"></i>
        Log SMS
      </h3>
      <div class="page-bar">
        <ul class="page-breadcrumb breadcrumb">
          <li>
            <i class="fa fa-cogs"></i>
            <a href="#">Administration</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="<?php echo site_url();?>/administration/settings/manage/index">Settings</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="<?php echo site_url();?>/administration/settings/sms/index">SMS</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="#">SMS Log</a>
          </li>
        </ul>
      </div>
      <!-- END PAGE HEADER-->
      <div class="alert alert-success display-hide">
        <button data-close="alert" class="close"></button>
        Information saved successfully.
      </div>


      <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="row">
        <div class="col-md-12">
          <div class="portlet">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-list-alt"></i>
                SMS Log
              </div>
              <div class="actions">

              </div>
            </div>
            <div class="portlet-body">
              <table id="EmployeeGrid" class="table table-striped table-bordered table-hover table-full-width">
                <thead>
                <tr>
                  <th class='hidden-xs'>Type</th>
                  <th class='hidden-xs'>To</th>
                  <th class='hidden-xs'>Message</th>
                  <th class='hidden-xs'>Send Date</th>
                  <th class='hidden-xs'>Response</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Student</td>
                    <td>0312-2222121</td>
                    <td>Testing Message</td>
                    <td>12 May, 2016</td>
                    <td>Success</td>
                  </tr>
                  <tr>
                    <td>Employee</td>
                    <td>0312-2222121</td>
                    <td>Testing Message</td>
                    <td>12 May, 2016</td>
                    <td>Success</td>
                  </tr>
                  <tr>
                    <td>Batch</td>
                    <td>0312-2222121, 9808232,232323</td>
                    <td>Testing Message</td>
                    <td>12 May, 2016</td>
                    <td>Success</td>
                  </tr>
                  <tr>
                    <td>Employee-Dept</td>
                    <td>0312-2222121</td>
                    <td>Testing Message</td>
                    <td>12 May, 2016</td>
                    <td>Success</td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>

      <!-- END EXAMPLE TABLE PORTLET-->
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
);

$pageJsScript  = array(
    '<script type="text/javascript" src="' . base_url() . 'assets/js/util.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/js/Administration/Settings/General_Settings/SchoolModule.js" ></script>'
);

$pageJsCalls  = array(
    'SchoolModule.init();'
);

include(VIEW_PATH.'footer.php');
?>
