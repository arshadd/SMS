<?php
    $title = "Classes List";
    
    $pageCss  = array(
        '<link href="' . base_url() . 'assets/plugins/select2/select2_conquer.css" rel="stylesheet" type="text/css" />'
        ,'<link href="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.css" rel="stylesheet" type="text/css" />'

    ,'<link href="' . base_url() . 'assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />'
    ,'<link href="' . base_url() . 'assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />'

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
              <a href="#">Class List</a>
            </li>
          </ul>
        </div>
        <!-- END PAGE HEADER-->
        <div class="alert alert-success display-hide">
          <button data-close="alert" class="close"></button>
          Class Information saved successfully.
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="portlet">
              <div class="portlet-title">
                <div class="caption">
                  Class List
                </div>
                <div class="actions">
                  <a href="#" class="btn btn-primary" onclick="ClassModule.addView();">
                    <i class="fa fa-pencil-square-o"></i> Add New Class
                  </a>
                </div>
              </div>
              <div class="portlet-body">
                <table id="ClassGrid" class="table table-striped table-bordered table-hover table-full-width">
                  <thead>
                    <tr>
                      <th class='hidden-xs'>Code</th>
                      <th class='hidden-xs'>Class Name</th>
                      <th class='hidden-xs'>Sections</th>
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

  <div id="mdlCreateClass" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="true" data-width="400">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title">Create Class</h4>
    </div>
    <div class="modal-body">
      <?php include('_createOrEditClass.php');?>
    </div>
  </div>

  <div id="mdlDeleteClass" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="true" data-width="400">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title">Confirm Delete</h4>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" method="post">
        <div class="form-body">
          <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
                <span>
                   You have some form errors. Please check below.
                </span>
          </div>

          <div class="alert alert-info display">
              <span>
                 Are you sure want to delete?
              </span>
          </div>
          <input type="hidden" id="class_id" name="class_id" class="form-control"/>
          <div class="form-actions fluid">
            <div class="col-md-offset-3 col-md-9">
              <a href="#" data-dismiss="modal" class="btn btn-default">
                <i class="fa fa-mail-reply"></i> Close
              </a>
              <button class="btn btn-success" id="btnDelete" type="button">
                <i class="fa fa-trash-o"></i> Delete
              </button>
              <label>
                <div id="loaderDelete"><img src="<?php echo base_url() . '/assets/img/input-spinner.gif'; ?>"/></div>
              </label>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php

    $pagePlugin  = array(
      '<script type="text/javascript" src="' . base_url() . 'assets/plugins/custom-datatable/jquery.dataTables.min.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/select2/select2.min.js" ></script>'

    ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" ></script>'
    ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-modal/js/bootstrap-modal.js"" ></script>'

    );
    
    $pageJsScript  = array(
      '<script type="text/javascript" src="' . base_url() . 'assets/module/util.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/module/Class/ClassModule.js" ></script>'
      );
      
    $pageJsCalls  = array(
      'ClassModule.init();'
    );
    
    include(VIEW_PATH.'footer.php');
?>
