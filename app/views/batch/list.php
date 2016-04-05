<?php
    $title = "TITLE";
    
    $pageCss  = array(
        '<link href="' . base_url() . 'assets/plugins/select2/select2_conquer.css" rel="stylesheet" type="text/css" />'
        ,'<link href="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.css" rel="stylesheet" type="text/css" />'
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
          Batch
        </h3>
        <div class="page-bar">
          <ul class="page-breadcrumb breadcrumb">
            <li>
              <i class="fa fa-cogs"></i>
              <a href="#">Acadamic</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li>
              <a href="#">Batch</a>
            </li>
          </ul>
        </div>
        <!-- END PAGE HEADER-->
        <?php include('_list.php');?>

      </div>
    </div>
    
  </div>
  <!-- END CONTAINER -->

  <div class="modal fade" id="mdlCreateBatch" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-small">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Create Batch</h4>
        </div>
        <div class="portlet-body form">
          <div class="scroller" style="height: 350px; width:100px" data-always-visible="1" data-rail-visible1="1">
            <div class="portlet-body form">
              <form id="Form_Batch" class="form-horizontal" method="post">
                <?php include('_createOrEdit.php');?>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  
<?php

    $pagePlugin  = array(
      '<script type="text/javascript" src="' . base_url() . 'assets/plugins/custom-datatable/jquery.dataTables.min.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/select2/select2.min.js" ></script>'
    );
    
    $pageJsScript  = array(
      '<script type="text/javascript" src="' . base_url() . 'assets/module/util.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/module/BatchModule.js" ></script>'
      );
      
    $pageJsCalls  = array(
      'BatchModule.loadGrid2();'
      ,'BatchModule.validate();'
    );
    
    include(VIEW_PATH.'footer.php');
?>
