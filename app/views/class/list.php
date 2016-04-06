<?php
    $title = "Classes List";
    
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
          Classes
        </h3>
        <div class="page-bar">
          <ul class="page-breadcrumb breadcrumb">
            <li>
              <i class="fa fa-cogs"></i>
              <a href="#">Acadamic</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li>
              <a href="#">Classes</a>
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
            <div class="portlet-body util-btn-margin-bottom-5">
              <button class="btn btn-primary" onclick="ClassModule.addView();">
                <i class="fa fa-pencil-square-o"></i>&nbsp;Add New Class
              </button>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="portlet">
              <div class="portlet-title">
                <div class="caption">
                  Class List
                </div>
              </div>
              <div class="portlet-body">
                <table id="ClassGrid" class="table table-striped table-bordered table-hover table-full-width">
                  <thead>
                    <tr>
                      <th class='hidden-xs'>Code</th>
                      <th class='hidden-xs'>Class Name</th>
                      <th class='hidden-xs'>Sections</th>
                      <th class='hidden-xs'>Batches</th>
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

  <div class="modal fade" id="mdlCreateClass" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-small">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Create Class</h4>
        </div>
        <div class="portlet-body form">
          <div class="alert alert-success display-hide">
            <button data-close="alert" class="close"></button>
            Class Information saved successfully.
          </div>

          <div class="scroller" style="height: 350px; width:100px" data-always-visible="1" data-rail-visible1="1">
            <div class="portlet-body form">
                <?php include('_createOrEdit.php');?>
            </div>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="mdlDeleteClass" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-small">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Confirm Delete</h4>
        </div>
        <div class="portlet-body form">
          <div class="alert alert-success display-hide">
            <button data-close="alert" class="close"></button>
            Class Information saved successfully.
          </div>

          <div class="scroller" style="height: 180px; width:100px" data-always-visible="1" data-rail-visible1="1">
            <div class="portlet-body form">
                <?php include('_deleteClass.php');?>
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
      ,'<script type="text/javascript" src="' . base_url() . 'assets/module/ClassModule.js" ></script>'
      );
      
    $pageJsCalls  = array(
      'ClassModule.loadGrid();'
      ,'ClassModule.validate();'
    );
    
    include(VIEW_PATH.'footer.php');
?>
