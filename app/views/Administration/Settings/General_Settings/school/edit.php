<?php
    $title = "General Settings";
    
    $pageCss  = array(
        '<link href="' . base_url() . 'assets/plugins/select2/select2_conquer.css" rel="stylesheet" type="text/css" />'
        ,'<link href="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.css" rel="stylesheet" type="text/css" />'
        ,'<link href="' . base_url() . 'assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" type="text/css" />'
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
        <h3 class="page-title"><i class="fa fa-cogs icon-large"></i>
          General Settings
        </h3>
        <div class="page-bar">
          <ul class="page-breadcrumb breadcrumb">
            <li>
              <i class="fa fa-cogs"></i>
              <a href="#">Administration</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li>
              <a href="<?php echo base_url();?>index.php/administration/settings/index">Settings</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li>
              <a href="#">General Settings</a>
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
                  <i class="fa fa-building"></i> General Settings
                </div>
              </div>
              <div class="portlet-body form">
                  <?php include('_createOrEditSchool.php');?>
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
      '<script type="text/javascript" src="' . base_url() . 'assets/module/util.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/module/School/SchoolModule.js" ></script>'
    );
      
    $pageJsCalls  = array(
      'SchoolModule.init();'
    );
    
    include(VIEW_PATH.'footer.php');
?>
