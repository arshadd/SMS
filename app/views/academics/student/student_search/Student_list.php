<?php
    $title = "Student Search";
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
        <h3 class="page-title"><i class="fa fa-user icon-large"></i>
          Search Student
        </h3>
        <div class="page-bar">
          <ul class="page-breadcrumb breadcrumb">
            <li>
              <i class="fa fa-cogs"></i>
              <a href="#">Acadamic</a>
              <i class="fa fa-angle-right"></i>
            </li>
              <li>
                  <a href="<?php echo site_url();?>/academics/student/manage/index">Student</a>
                  <i class="fa fa-angle-right"></i>
              </li>
            <li>
              <a href="#">Search</a>
            </li>
          </ul>
        </div>
        <!-- END PAGE HEADER-->
        <div class="alert alert-success display-hide">
          <button data-close="alert" class="close"></button>
          Student Information saved successfully.
        </div>

         <div class="row">
          <div class="col-md-12">
            <div class="portlet">
              <div class="portlet-title">
                <div class="caption">
                  <i class="fa fa-list-alt"></i>
                  Student List
                </div>
                <div class="actions">
<!--                  <a class="btn btn-default" data-target="#mdlCreateStudent" data-toggle="modal">View Demo</a>
-->
                  <a href="#" class="btn btn-primary"  onclick="StudentModule.addView();">
                    <i class="fa fa-pencil-square-o"></i> Add New Student
                  </a>
                </div>
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
                      <th class="hidden-xs">Manage</th>
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

  </div>
  <!-- END CONTAINER -->

  <div id="mdlCreateStudent" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="true" data-width="950">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title">Create Student</h4>
    </div>
    <div class="modal-body">
      <?php include('Create_edit_student.php');?>
    </div>
   <!-- <div class="modal-footer">
      <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
      <button type="button" data-dismiss="modal" class="btn btn-info">Continue Task</button>
    </div>-->
  </div>




  


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
      '<script type="text/javascript" src="' . base_url() . 'assets/js/util.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/js/Student/StudentModule.js" ></script>'
      );
      
    $pageJsCalls  = array(
        'StudentModule.init();'
    );
    
    include(VIEW_PATH.'footer.php');
?>
