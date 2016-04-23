<?php
    $title = "Student's Management";
    $body_class ="page-header-fixed";

    $pageCss  = array(
        '<link href="' . base_url() . 'assets/plugins/select2/select2_conquer.css" rel="stylesheet" type="text/css" />'
        ,'<link href="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.css" rel="stylesheet" type="text/css" />'
        ,'<link href="' . base_url() . 'assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" type="text/css" />'

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
          Employees
        </h3>
        <div class="page-bar">
          <ul class="page-breadcrumb breadcrumb">
            <li>
              <i class="fa fa-cogs"></i>
              <a href="#">Employee</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li>
              <a href="~/Employee/List">Employee Detail</a>
            </li>
          </ul>
        </div>
        <!-- END PAGE HEADER-->
        <div class="alert alert-success display-hide">
          <button data-close="alert" class="close"></button>
          Employee Information saved successfully.
        </div>


        <!-- BEGIN PAGE CONTENT-->
        <div class="row profile">
          <div class="col-md-12">
            <!--BEGIN TABS-->
            <div class="tabbable tabbable-custom">
              <ul class="nav nav-tabs">
                <li class="active">
                  <a href="#tab_1_1" data-toggle="tab">
                    <i class="fa fa-leaf"></i>Overview
                  </a>
                </li>
                <li>
                  <a href="#tab_1_2" data-toggle="tab">
                    <i class="fa fa-bookmark"></i> Class
                  </a>
                </li>
                <li>
                  <a href="#tab_1_3" data-toggle="tab">
                    <i class="fa fa-sitemap"></i> Subjects
                  </a>
                </li>
                <li>
                  <a href="#tab_1_4" data-toggle="tab">
                    <i class="fa fa-group"></i> Students
                  </a>
                </li>
                <li>
                  <a href="#tab_1_5" data-toggle="tab">
                    <i class="fa fa-calendar"></i> Timetable
                  </a>
                </li>
                <li>
                  <a href="#tab_1_6" data-toggle="tab">
                    <i class="fa fa-thumb-tack"></i> Attendance
                  </a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1_1">

                  <?php include('_createOrEditStudent.php');?>

                </div>
                <!--tab_1_2-->
                <div class="tab-pane" id="tab_1_2">

                  <?php include('_class.php');?>

                </div>
                <!--end tab-pane-->
                <div class="tab-pane" id="tab_1_3">

                  <?php include('_subject.php');?>

                </div>
                <!--end tab-pane-->
                <div class="tab-pane" id="tab_1_4">

                  <?php include('_student.php');?>

                </div>

                <!--end tab-pane-->
                <div class="tab-pane" id="tab_1_5">

                  <?php include('_timetable.php');?>

                </div>

                <!--end tab-pane-->
                <div class="tab-pane" id="tab_1_6">

                  <?php include('_attendance.php');?>

                </div>
                <!--end tab-pane-->
              </div>
            </div>
            <!--END TABS-->
          </div>
        </div>
        <!-- END PAGE CONTENT-->

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

      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/moment.min.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js" ></script>'


    );
    
    $pageJsScript  = array(
        '<script type="text/javascript" src="' . base_url() . 'assets/module/util.js" ></script>'
        ,'<script type="text/javascript" src="' . base_url() . 'assets/module/EmployeeModule.js" ></script>'
        ,'<script type="text/javascript" src="' . base_url() . 'assets/module/AttendanceModule.js" ></script>'

      );
      
    $pageJsCalls  = array(
      'EmployeeModule.loadGrid2();'
      ,'EmployeeModule.validate();'
      
      ,'AttendanceModule.loadGrid2();'      
      ,'AttendanceModule.validate();'

    );
    
    include(VIEW_PATH.'footer.php');
?>
