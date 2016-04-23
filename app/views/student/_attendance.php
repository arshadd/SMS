<?php
$title = "Attendance";

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
<body class="page-header-fixed">
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
            <a href="#">Attendance</a>
          </li>
        </ul>
      </div>
      <!-- END PAGE HEADER-->

      <div class="row">
        <div class="col-md-12">
          <div class="portlet">
            <div class="portlet-body">
              <!--<h4>Search</h4>-->
              <form class="form-inline" role="form">

                <div class="form-group">
                  <label for="section">Date</label>
                  <div id="reportrange" class="btn btn-default">
                    <i class="fa fa-calendar"></i>
                    &nbsp;
              <span>
              </span>
                    <b class="fa fa-angle-down"></b>
                  </div>
                </div>



                <button type="submit" class="btn btn-info">
                  <i class="fa fa-search"></i> Search
                </button>
              </form>
              <!--<hr/>-->
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table id="AttendanceGrid" class="table table-striped table-bordered table-hover">
              <thead>
              <tr>
                <!-- Week 1-->
                <th class='hidden-xs'>
                  Mon<br/>1st
                </th>
                <th class='hidden-xs'>
                  Tue<br/>2nd
                </th>
                <th class='hidden-xs'>
                  Wed<br/>3rd
                </th>
                <th class='hidden-xs'>
                  Thr<br/>4th
                </th>
                <th class="hidden-xs">
                  Fri<br/>5th
                </th>
                <th class="hidden-xs">
                  Sat<br/>6th
                </th>
                <th class="hidden-xs">
                  Sun<br/>7th
                </th>

                <!-- Week 2-->
                <th class='hidden-xs'>
                  Mon<br/>8th
                </th>
                <th class='hidden-xs'>
                  Tue<br/>9th
                </th>
                <th class='hidden-xs'>
                  Wed<br/>10th
                </th>
                <th class='hidden-xs'>
                  Thr<br/>11th
                </th>
                <th class="hidden-xs">
                  Fri<br/>12th
                </th>
                <th class="hidden-xs">
                  Sat<br/>13th
                </th>
                <th class="hidden-xs">
                  Sun<br/>14th
                </th>

                <!-- Week 3-->
                <th class='hidden-xs'>
                  Mon<br/>15th
                </th>
                <th class='hidden-xs'>
                  Tue<br/>16th
                </th>
                <th class='hidden-xs'>
                  Wed<br/>17th
                </th>
                <th class='hidden-xs'>
                  Thr<br/>18th
                </th>
                <th class="hidden-xs">
                  Fri<br/>19th
                </th>
                <th class="hidden-xs">
                  Sat<br/>20th
                </th>
                <th class="hidden-xs">
                  Sun<br/>21st
                </th>

                <!-- Week 4-->
                <th class='hidden-xs'>
                  Mon<br/>22nd
                </th>
                <th class='hidden-xs'>
                  Tue<br/>23rd
                </th>
                <th class='hidden-xs'>
                  Wed<br/>24th
                </th>
                <th class='hidden-xs'>
                  Thr<br/>25th
                </th>
                <th class="hidden-xs">
                  Fri<br/>26th
                </th>
                <th class="hidden-xs">
                  Sat<br/>27th
                </th>
                <th class="hidden-xs">
                  Sun<br/>28th
                </th>

                <!-- Week 5-->
                <th class='hidden-xs'>
                  Mon<br/>29th
                </th>
                <th class='hidden-xs'>
                  Tue<br/>30th
                </th>
                <th class='hidden-xs'>
                  Wed<br/>31st
                </th>


              </tr>
              </thead>
              <tbody>
              <tr>

                <!-- Week 1-->
                <td>
                  <span class="label label-danger">A</span>
                </td>
                <td>
                  <span class="label label-success">P</span>
                </td>
                <td>
                  <span class="label label-success">P</span>
                </td>
                <td>
                  <span class="label label-success">P</span>
                </td>
                <td>
                  <span class="label label-warning">L</span>
                </td>
                <td>
                  <span class="label label-default">O</span>
                </td>
                <td>
                  <span class="label label-default">O</span>
                </td>

                <!-- Week 2-->
                <td>
                  <span class="label label-danger">A</span>
                </td>
                <td>
                  <span class="label label-success">P</span>
                </td>
                <td>
                  <span class="label label-success">P</span>
                </td>
                <td>
                  <span class="label label-success">P</span>
                </td>
                <td>
                  <span class="label label-warning">L</span>
                </td>
                <td>
                  <span class="label label-default">O</span>
                </td>
                <td>
                  <span class="label label-default">O</span>
                </td>

                <!-- Week 3-->
                <td>
                  <span class="label label-danger">A</span>
                </td>
                <td>
                  <span class="label label-success">P</span>
                </td>
                <td>
                  <span class="label label-success">P</span>
                </td>
                <td>
                  <span class="label label-success">P</span>
                </td>
                <td>
                  <span class="label label-warning">L</span>
                </td>
                <td>
                  <span class="label label-default">O</span>
                </td>
                <td>
                  <span class="label label-default">O</span>
                </td>

                <!-- Week 4-->
                <td>
                  <span class="label label-danger">A</span>
                </td>
                <td>
                  <span class="label label-success">P</span>
                </td>
                <td>
                  <span class="label label-success">P</span>
                </td>
                <td>
                  <span class="label label-success">P</span>
                </td>
                <td>
                  <span class="label label-warning">L</span>
                </td>
                <td>
                  <span class="label label-default">O</span>
                </td>
                <td>
                  <span class="label label-default">O</span>
                </td>

                <!-- Week 5-->
                <td>
                  <span class="label label-danger">A</span>
                </td>
                <td>
                  <span class="label label-success">P</span>
                </td>
                <td>
                  <span class="label label-success">P</span>
                </td>

              </tr>

              <!--<?php foreach($Teacher as $employee){?>
                          <tr>
                            <td>
                              <?php echo $employee->TeacherId;?>
                            </td>
                            <td>
                              <?php echo $employee->FirstName;?>
                            </td>
                          </tr>
                         <?php } ?>-->
              </tbody>
            </table>

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

  //,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/moment.min.js" ></script>'
  //,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" ></script>'
);

$pageJsScript  = array(
    '<script type="text/javascript" src="' . base_url() . 'assets/module/util.js" ></script>'
);

$pageJsCalls  = array(
    ''
);

include(VIEW_PATH.'footer.php');
?>




