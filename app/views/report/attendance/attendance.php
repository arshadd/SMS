<?php
$title = "Classes Report";

$pageCss = array(
    '<link href="' . base_url() . 'assets/plugins/select2/select2_conquer.css" rel="stylesheet" type="text/css" />'
, '<link href="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.css" rel="stylesheet" type="text/css" />'


,'<link href="' . base_url() . 'assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />'
,'<link href="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />'

, '<link href="' . base_url() . 'assets/css/pages/invoice.css" rel="stylesheet" type="text/css" />'

);


include(VIEW_PATH . 'header.php');
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
            <!-- BEGIN PAGE HEADER-->
            <div class="row hidden-print">
                <div class="col-md-12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        Invoice
                        <small>invoice sample</small>
                    </h3>
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="#">Report</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Attendance</a>
                        </li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
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

                                    <!--<h4>Search</h4>-->
                                    <div class='alert alert-success display-hide'>
                                        <button data-close='alert' class='close'></button>
                                        Student attendance saved successfully.
                                    </div>
                                    <div class='alert alert-danger display-hide'>
                                        <button data-close='alert' class='close'></button>
                                        You have some form errors. Please check below.
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">
                                            Report Type:<span class="required">*</span>
                                        </label>
                                        <div class="col-md-10">
                                            <select id="type" class="form-control input-medium">
                                                <option value="class">Class</option>
                                                <option value="student">Student</option>
                                                <option value="employee">Employee</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">
                                            Class:<span class="required">*</span>
                                        </label>
                                        <div class="col-md-2">
                                            <select id="class_id" name="class_id" class="form-control input-medium">
                                            </select>
                                        </div>

                                        <label class="control-label col-md-2">
                                            Batch:<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6">
                                            <select id="batch_id" name="batch_id" class="form-control input-medium">
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

                                    <!--<div class="form-group">
                                        <label class="control-label col-md-2">
                                            Student:<span class="required">*</span>
                                        </label>
                                        <div class="col-md-10">
                                            <select id="student_id" name="student_id" class="form-control input-medium">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">
                                            Employee:<span class="required">*</span>
                                        </label>
                                        <div class="col-md-10">
                                            <select id="employee_id" name="employee_id" class="form-control input-medium">
                                            </select>
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

            <div id="class">
                <?php include('_classAttendance.php'); ?>
            </div>
            <div id="student">
                <?php include('_studentAttendance.php'); ?>
            </div>
            <div id="employee">
                <?php include('_employeeAttendance.php'); ?>
            </div>


        </div>
    </div>

</div>
<!-- END CONTAINER -->

<?php

$pagePlugin = array(
    '<script type="text/javascript" src="' . base_url() . 'assets/plugins/custom-datatable/jquery.dataTables.min.js" ></script>'
, '<script type="text/javascript" src="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.js" ></script>'
, '<script type="text/javascript" src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" ></script>'
, '<script type="text/javascript" src="' . base_url() . 'assets/plugins/select2/select2.min.js" ></script>'

,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/moment.min.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" ></script>'

);

$pageJsScript = array(
    '<script type="text/javascript" src="' . base_url() . 'assets/module/util.js" ></script>'
, '<script type="text/javascript" src="' . base_url() . 'assets/module/Report/AttendanceModule.js" ></script>'
);

$pageJsCalls = array(
    'AttendanceModule.init();'
);

include(VIEW_PATH . 'footer.php');
?>
