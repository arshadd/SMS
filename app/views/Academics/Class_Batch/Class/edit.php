<?php
$title = "Batch Summary";

$pageCss = array(
    '<link href="' . base_url() . 'assets/plugins/select2/select2_conquer.css" rel="stylesheet" type="text/css" />'
, '<link href="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.css" rel="stylesheet" type="text/css" />'

, '<link href="' . base_url() . 'assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />'
, '<link href="' . base_url() . 'assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />'

, '<link href="' . base_url() . 'assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />'
, '<link href="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />'
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
            <h3 class="page-title">
                Class / Batch
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-cogs"></i>
                        <a href="#">Class / Batch</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#" id="lnkBatchList">Batch List</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Class Management</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <div class="alert alert-success display-hide">
                <button data-close="alert" class="close"></button>
                Class Information saved successfully.
            </div>

            <!-- BEGIN PAGE CONTENT-->

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-building"></i> Class / Batch Details
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-horizontal">
                                <div class="form-body">
                                    <div class='form-group'>
                                        <label class='control-label col-md-3'>
                                            Class / Batch:
                                        </label>
                                        <div class='col-md-6'>
                                            <label class="control-label"><b><span id="class_batch_name"></span></b></label>

                                            <!--<label class="control-label"><span id="class_batch_name" class="label label-success"></span></label>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row ">
                <div class="col-md-12">
                    <!--BEGIN TABS-->
                    <div class="tabbable tabbable-custom">
                        <ul class="nav nav-tabs">

                            <li class="active">
                                <a href="#tab_1_4" data-toggle="tab">
                                    <i class="fa fa-sitemap"></i> Subjects
                                </a>
                            </li>
                            <li class="">
                                <a href="#tab_1_5" data-toggle="tab">
                                    <i class="fa fa-female"></i> Teachers
                                </a>
                            </li>
                            <li class="">
                                <a href="#tab_1_6" data-toggle="tab">
                                    <i class="fa fa-group"></i> Students
                                </a>
                            </li>

                            <!--<li>
                              <a href="#tab_1_7" data-toggle="tab">
                                <i class="fa fa-superscript"></i> Roll Number
                              </a>
                            </li>

                            <li>
                              <a href="#tab_1_8" data-toggle="tab">
                                <i class="fa fa-calendar"></i> Timetable
                              </a>
                            </li>-->
                            <li class="">
                                <a href="#tab_1_9" data-toggle="tab">
                                    <i class="fa fa-thumb-tack"></i> Attendance
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            <!--end tab-pane-->
                            <div class="tab-pane active" id="tab_1_4">

                                <?php include('_subject.php'); ?>

                            </div>

                            <!--end tab-pane-->
                            <div class="tab-pane " id="tab_1_5">

                                <?php include('_teacherSubject.php'); ?>

                            </div>

                            <!--end tab-pane-->
                            <div class="tab-pane " id="tab_1_6">

                                <?php include('_student.php'); ?>

                            </div>
                            <!--end tab-pane-->

                            <div class="tab-pane" id="tab_1_7">

                                <!--                  --><?php /*include('_rollnumber.php');*/ ?>

                            </div>
                            <!--end tab-pane-->


                            <!--end tab-pane-->
                            <div class="tab-pane" id="tab_1_8">
                                <!--                  --><?php /*include('_timetable.php');*/ ?>

                            </div>
                            <!--end tab-pane-->
                            <div class="tab-pane " id="tab_1_9">

                                <?php include('_attendance.php'); ?>

                            </div>
                            <!--end tab-pane-->
                        </div>
                    </div>
                    <!--END TABS-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>

    </div>
    <!-- END CONTAINER -->

    <?php

    $pagePlugin = array(
        '<script type="text/javascript" src="' . base_url() . 'assets/plugins/custom-datatable/jquery.dataTables.min.js" ></script>'
    , '<script type="text/javascript" src="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.js" ></script>'
    , '<script type="text/javascript" src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" ></script>'
    , '<script type="text/javascript" src="' . base_url() . 'assets/plugins/select2/select2.min.js" ></script>'

    , '<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" ></script>'
    , '<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-modal/js/bootstrap-modal.js"" ></script>'

    , '<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/moment.min.js" ></script>'
    , '<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker.js" ></script>'
    , '<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" ></script>'
    );

    $pageJsScript = array(

        '<script type="text/javascript" src="' . base_url() . 'assets/module/util.js" ></script>'

    , '<script type="text/javascript" src="' . base_url() . 'assets/module/Class/BatchModule.js" ></script>'
    , '<script type="text/javascript" src="' . base_url() . 'assets/module/Class/ClassSubjectModule.js" ></script>'
    , '<script type="text/javascript" src="' . base_url() . 'assets/module/Class/ClassEmployeeModule.js" ></script>'

    , '<script type="text/javascript" src="' . base_url() . 'assets/module/Class/ClassStudentModule.js" ></script>'
    , '<script type="text/javascript" src="' . base_url() . 'assets/module/Class/ClassAttendanceModule.js" ></script>'

    );

    $pageJsCalls = array(
        //'ClassModule.validate();'

      'BatchModule.edit();'
    , 'ClassSubjectModule.init();'
    , 'ClassEmployeeModule.init();'

    , 'ClassStudentModule.init();'
    , 'ClassAttendanceModule.init();'
    );

    include(VIEW_PATH . 'footer.php');
    ?>
