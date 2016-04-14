<?php
    $title = "Classes Report";
    
    $pageCss  = array(
        '<link href="' . base_url() . 'assets/plugins/select2/select2_conquer.css" rel="stylesheet" type="text/css" />'
        ,'<link href="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.css" rel="stylesheet" type="text/css" />'
        
        ,'<link href="' . base_url() . 'assets/css/pages/invoice.css" rel="stylesheet" type="text/css" />'

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
        <!-- BEGIN PAGE HEADER-->
        <div class="row hidden-print">
          <div class="col-md-12">
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
              Invoice <small>invoice sample</small>
            </h3>
            <ul class="page-breadcrumb breadcrumb">
              <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
              </li>
              <li>
                <a href="#">Pages</a>
                <i class="fa fa-angle-right"></i>
              </li>
              <li>
                <a href="#">Invoice</a>
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
                  <i class="fa fa-cogs"></i>Filter Classes Report
                </div>
               
              </div>
              
              <div class="portlet-body">
                <!--<h4>Search</h4>-->
                <form class="form-inline" role="form">
                  <div class="form-group">
                    <label for="batch">Type:</label>
                    <select id="type" class='form-control'>
                      <option value="list">List</option>
                      <option value="detail">Detail</option>
                      <option value="attendance">Attendance</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="batch">Batch</label>
                    <select id="batch" class='form-control'>
                      <option value="">Select ...</option>
                      <option value="green">2015 - 2016</option>
                      <option value="green">2016 - 2017</option>
                    </select>
                  </div>
                  <button type="button" id="btnGenerateReport" class="btn btn-danger">
                    <i class="fa fa-bar-chart-o"></i> Generate Report
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div id="list">
          <?php include('_list.php');?>
        </div>
        <div id="detail">
          <?php include('_detail.php');?>
        </div>
        <div id="attendance">
          <?php include('_attendance.php');?>
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
    );
    
    $pageJsScript  = array(
      '<script type="text/javascript" src="' . base_url() . 'assets/module/util.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/module/Report/ClassModule.js" ></script>'
      );
      
    $pageJsCalls  = array(
      //'ClassModule.loadGrid2();'
      'ClassModule.init();'
    );
    
    include(VIEW_PATH.'footer.php');
?>
