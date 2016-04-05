<?php
    $title = "TITLE";
    
    $pageCss  = array(
         '<link rel="stylesheet" type="text/css" href="'. base_url() . 'assets/plugins/select2/select2_conquer.css" />'
    ,'<link rel="stylesheet" type="text/css" href=""'. base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.css" />'
    ,'<link rel="stylesheet" type="text/css" href=""'. base_url() . 'assets/plugins/bootstrap-datepicker/css/datepicker.css" />'
    );
    
    include("header.php");
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
            Student
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb breadcrumb">
                @*<li>
                        <i class="fa fa-cogs"></i>
                        <a href="#">Acadamic</a>
                        <i class="fa fa-angle-right"></i>
                    </li>*@
                <li>
                    <a href="#">Student Attendance</a>
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
                <div class="portlet-body util-btn-margin-bottom-5">
                    <div class='form-group'>
                        <div class='col-md-4'>
                            <select id='ClassesList' name='ClassesList' class='form-control select2me'>
                                <option value=''>Select a class</option>
                            </select>
                        </div>
                    </div>
                    <input class="form-control form-control-inline input-medium date-picker" id="WorkDay" name="WorkDay" size="16" type="text" /> 
                    <button class="btn btn-primary" onclick="StudentAttendanceModule.addView();"><i class="fa fa-pencil-square-o"></i>&nbsp;Take Attendance</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            Student Attendance List
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table id="example2" class="table table-striped table-bordered table-hover table-full-width">
                            <thead>
                                <tr>
                                    <th class='hidden-xs'>StudentAttendanceId</th>
                                    <th class='hidden-xs'>StudentClassId</th>
                                    <th class='hidden-xs'>StudentName</th>
                                    <th class='hidden-xs'>ClassName</th>
                                    <th class='hidden-xs'>WorkDay</th>
                                    <th class='hidden-xs'>AttendanceStatus</th>
                                    
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
  </div>
  <!-- END CONTAINER -->
    
<?php

    $pagePlugin  = array(
      '<script type="text/javascript" src="' . base_url() . 'assets/plugins/jqvmap/jqvmap/jquery.vmap.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" ></script>'

      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/custom-datatable/jquery.dataTables.min.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jquery.peity.min.js" ></script>'
      
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jquery.pulsate.min.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jquery-knob/js/jquery.knob.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/flot/jquery.flot.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/flot/jquery.flot.resize.js" ></script>'

      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/select2/select2.min.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/gritter/js/jquery.gritter.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" ></script>'

      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" ></script>'
    );
    
    $pageJsScript  = array(
      '<script type="text/javascript" src="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/module/util.js" ></script>'
        ,'<script type="text/javascript" src="' . base_url() . 'assets/scripts/StudentAttendance.js" ></script>'
      );
      
    $pageJsCalls  = array(
      'StudentAttendanceModule.init();'
    );
    
    include("footer.php");
?>
