<?php
    $title = "Student List";
    
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
          Students
        </h3>
        <div class="page-bar">
          <ul class="page-breadcrumb breadcrumb">
            <li>
              <i class="fa fa-cogs"></i>
              <a href="#">Acadamic</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li>
              <a href="#">Student</a>
            </li>
          </ul>
        </div>
        <!-- END PAGE HEADER-->
        <div class="alert alert-success display-hide">
          <button data-close="alert" class="close"></button>
          Student Information saved successfully.
        </div>
        <!--<div class="row">
          <div class="col-md-12">
            <div class="portlet-body util-btn-margin-bottom-5">
              <button class="btn btn-primary" onclick="StudentModule.addView();">
                <i class="fa fa-pencil-square-o"></i>&nbsp;Add New Student
              </button>
            </div>
          </div>
        </div>-->

        <div class="row">
          <div class="col-md-12">
            <div class="portlet">
              <div class="portlet-title">
                <div class="caption">
                  <i class="fa fa-list-alt"></i>
                  Student List
                </div>
                <div class="actions">
                  <a href="#" class="btn btn-primary" onclick="StudentModule.addView();">
                    <i class="fa fa-pencil-square-o"></i> Add New Student
                  </a>
                </div>
              </div>
              <div class="portlet-body">
                <table id="StudentGrid" class="table table-striped table-bordered table-hover table-full-width">
                  <thead>
                    <tr>
                      <th class='hidden-xs'>Photo</th>
                      <th class='hidden-xs'>Code</th>
                      <th class='hidden-xs'>Full Name</th>
                      <th class='hidden-xs'>Gender</th>
                      <th class='hidden-xs'>Department</th>
                      <th class='hidden-xs'>Designation</th>
                      <th class="hidden-xs">Manage</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <img alt="" src="<?php echo base_url();?>assets/img/avatar3_small.jpg"/>
                      </td>
                      <td>EMP-01</td>
                      <td>
                        <a href="
                          <?php echo base_url();?>/index.php/student/edit/1">Noman Azeem
                        </a>
                      </td>
                      <td>Male</td>
                      <td>Computer</td>
                      <td>Engineer</td>
                      <td>
                        <a href="
                          <?php echo base_url();?>/index.php/student/edit/1" class="btn btn-default btn-xs purple">
                          <i class="fa fa-edit"></i> Manage Student
                        </a> |
                        <a href="#" class="btn btn-default btn-xs black">
                          <i class="fa fa-trash-o"></i> Delete
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <img alt="" src="<?php echo base_url();?>assets/img/avatar3_small.jpg"/>
                      </td>
                      <td>EMP-02</td>
                      <td>
                        <a href="
                          <?php echo base_url();?>/index.php/student/edit/1">Arshad Iqbal
                        </a>
                      </td>
                      <td>Male</td>
                      <td>Computer</td>
                      <td>Engineer</td>
                      <td>
                        <a href="
                          <?php echo base_url();?>/index.php/student/edit/1" class="btn btn-default btn-xs purple">
                          <i class="fa fa-edit"></i> Manage Student
                        </a> |
                        <a href="#" class="btn btn-default btn-xs black">
                          <i class="fa fa-trash-o"></i> Delete
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="hidden-xs">
                        <img alt="" src="<?php echo base_url();?>assets/img/avatar3_small.jpg"/>
                      </td>
                      <td class="hidden-xs">EMP-03</td>
                      <td>
                        <a href="
                          <?php echo base_url();?>/index.php/student/edit/1">Salman Azeem
                        </a>
                      </td>
                      <td class="hidden-xs">Male</td>
                      <td class="hidden-xs">Computer</td>
                      <td class="hidden-xs">Engineer</td>
                      <td >
                        <a href="
                          <?php echo base_url();?>/index.php/student/edit/1" class="btn btn-default btn-xs purple">
                          <i class="fa fa-edit"></i> Manage Student
                        </a> |
                        <a href="#" class="btn btn-default btn-xs black">
                          <i class="fa fa-trash-o"></i> Delete
                        </a>
                      </td>
                    </tr>
                    <!--<?php foreach($students as $student){?>
                          <tr>
                            <td>
                              <?php echo $student->StudentId;?>
                            </td>
                            <td>
                              <?php echo $student->FirstName;?>
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

  <div class="modal fade" id="mdlCreateStudent" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-wide">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Create Student</h4>
        </div>
        <div class="portlet-body form">
          <div class="scroller" style="height: 550px; width:100px" data-always-visible="1" data-rail-visible1="1">
            <div class="portlet-body form">
              <form id="Form_Student" class="form-horizontal" method="post">
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
      ,'<script type="text/javascript" src="' . base_url() . 'assets/module/StudentModule.js" ></script>'
      );
      
    $pageJsCalls  = array(
      'StudentModule.loadGrid2();'
      ,'StudentModule.validate();'
    );
    
    include(VIEW_PATH.'footer.php');
?>
