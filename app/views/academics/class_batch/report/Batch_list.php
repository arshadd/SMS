<?php
    $title = "Batches List";
    $body_class ="page-header-fixed";

    $pageCss  = array(
        '<link href="' . base_url() . 'assets/plugins/select2/select2_conquer.css" rel="stylesheet" type="text/css" />'
    , '<link href="' . base_url() . 'assets/css/pages/invoice.css" rel="stylesheet" type="text/css" />'
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
        <h3 class="page-title hidden-print"><i class="fa fa-file-text icon-large"></i>
          Class List Report
        </h3>
        <div class="page-bar hidden-print">
          <ul class="page-breadcrumb breadcrumb">
            <li>
              <i class="fa fa-cogs"></i>
              <a href="#">Academics</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li>
              <a href="<?php echo site_url() . '/academics/class_batch/manage/index'; ?>">Class / Batch</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li>
              <a href="<?php echo site_url() . '/academics/class_batch/report/index'; ?>">Report</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li>
              <a href="#">Batch List</a>
            </li>
          </ul>
        </div>
        <!-- END PAGE HEADER-->

        <?php
        $report_title = "Batch List";
        include(VIEW_PATH.'report_header.php');
        ?>

        <div class="row">
          <div class="col-md-12">

                <table id="BatchGrid" class="table table-striped table-bordered table-hover table-full-width">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Batch Name</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Class Teacher</th>
                      <th>Students</th>
                      <th>Male</th>
                      <th>Female</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="8">G-01 Class 1</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>2015 - 2016</td>
                      <td>Mar, 2015</td>
                      <td>Mar, 2017</td>
                      <td>-</td>
                      <td>10</td>
                      <td>7</td>
                      <td>3</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>2016 - 2017</td>
                      <td>Mar, 2016</td>
                      <td>Mar, 2017</td>
                      <td>-</td>
                      <td>10</td>
                      <td>7</td>
                      <td>3</td>
                    </tr>
                    <tr>
                      <td colspan="8">G-02 Class 2</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>2015 - 2016</td>
                      <td>Mar, 2015</td>
                      <td>Mar, 2016</td>
                      <td>-</td>
                      <td>10</td>
                      <td>7</td>
                      <td>3</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>2016 - 2017</td>
                      <td>Mar, 2016</td>
                      <td>Mar, 2017</td>
                      <td>-</td>
                      <td>10</td>
                      <td>7</td>
                      <td>3</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>2017 - 2018</td>
                      <td>Mar, 2017</td>
                      <td>Mar, 2018</td>
                      <td>-</td>
                      <td>10</td>
                      <td>7</td>
                      <td>3</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>2015 - 2017</td>
                      <td>Mar, 2016</td>
                      <td>Mar, 2017</td>
                      <td>-</td>
                      <td>10</td>
                      <td>7</td>
                      <td>3</td>
                    </tr>

                  </tbody>
                </table>
                
          </div>
        </div>

        <?php
        include(VIEW_PATH.'report_footer.php');
        ?>

      </div>

    </div>
    
  </div>
  <!-- END CONTAINER -->

  <?php

    $pagePlugin  = array(

    );
    
    $pageJsScript  = array(
        '<script type="text/javascript" src="' . base_url() . 'assets/js/util.js" ></script>'
        ,'<script type="text/javascript" src="' . base_url() . 'assets/js/Academics/Class_Batch/Report/ClassBatchReportModule.js" ></script>'
      );
      
    $pageJsCalls  = array(
      //'ClassBatchReportModule.init();'
    );
    
    include(VIEW_PATH.'footer.php');
?>
