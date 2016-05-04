<?php
    $title = "Class Exam Result Report";
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
          Class Exam Report
        </h3>
        <div class="page-bar hidden-print">
          <ul class="page-breadcrumb breadcrumb">
            <li>
              <i class="fa fa-cogs"></i>
              <a href="#">Academics</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li>
              <a href="<?php echo site_url();?>/academics/exam/manage/index">Exam</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li>
              <a href="<?php echo site_url() . '/academics/exam/report/index'; ?>">Report</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li>
              <a href="#">Class Exam</a>
            </li>
          </ul>
        </div>
        <!-- END PAGE HEADER-->

        <div class="row hidden-print">
          <div class="col-md-12">
            <div class="portlet">

              <div class="portlet-title">
                <div class="caption">
                  <i class="fa fa-cogs"></i>Filter Report
                </div>

              </div>

              <div class="portlet-body">

                <form id="Form_Report" class="form-horizontal" method="post">

                  <div class="form-body">
                    <div class="form-group batch-class-selection">
                      <label class="control-label col-md-2">
                        Class / Batch:<span class="required">*</span>
                      </label>
                      <div class="col-md-10">
                        <select id="batch_id" name="batch_id" class="form-control select2me input-xlarge">
                        </select>
                      </div>
                    </div>


                      <div class="form-group">
                        <label class="control-label col-md-2">
                          Exam:<span class="required">*</span>
                        </label>
                        <div class="col-md-10">
                          <select id="exam_id" name="exam_id" class="form-control select2me input-medium">
                            <option>1st Term</option>
                            <option>2nd Term</option>
                            <option>3rd Term</option>
                            <option>Half Yearly</option>
                            <option>Final Exam</option>
                          </select>
                        </div>
                      </div>


                    <div class="form-actions fluid">
                      <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-danger">
                          <i class="fa fa-bar-chart-o"></i> Generate Report
                        </button>
                        <label>
                          <div id="loader"><img
                                src="<?php echo base_url() . "/assets/img/input-spinner.gif"; ?>"/>
                          </div>
                        </label>
                      </div>
                    </div>

                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>

        <?php
        $report_title = "Class Exam Report";
        include(VIEW_PATH.'report_header.php');
        ?>

        <div class="row">
          <div class="col-xs-12">
            <table id="ClassAttendanceSummaryGrid" class="table table-striped table-bordered table-hover">
              <thead>
              <tr>
                <th class="class_name">Class - Green House / 2000 - 2001 (Mar 2000 - April 2001)</th>
                <th class="date_ranges">1st Term</th>
              </tr>
              </thead>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">

                <table id="ClassGrid" class="table table-striped table-bordered table-hover table-full-width">
                  <thead>
                    <tr>
                      <th></th>
                      <th colspan="3">Student Details</th>
                      <th colspan="6">Subject Details</th>
                      <th>Total</th>
                   </tr>
                    <tr>
                      <th>S.No</th>
                      <th>Student</th>
                      <th>Roll</th>
                      <th>Admission #</th>

                      <th>Math</th>
                      <th>English</th>
                      <th>Math 2</th>
                      <th>English 2</th>
                      <th>Science</th>
                      <th>G. Science</th>

                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Syed Kashif Ali</td>
                      <td>GA1212</td>
                      <td>S121212</td>

                      <td>25</td>
                      <td>36</td>
                      <td>25</td>
                      <td>36</td>
                      <td>25</td>
                      <td>36</td>


                      <td>55</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Nadeem Khan</td>
                      <td>GA1212</td>
                      <td>S121212</td>


                      <td>25</td>
                      <td>36</td>
                      <td>25</td>
                      <td>36</td>
                      <td>25</td>
                      <td>36</td>


                      <td>55</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Sajid Ali</td>
                      <td>GA1212</td>
                      <td>S121212</td>

                      <td>25</td>
                      <td>36</td>
                      <td>25</td>
                      <td>36</td>
                      <td>25</td>
                      <td>36</td>


                      <td>55</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Jamal Khan</td>
                      <td>GA1212</td>
                      <td>S121212</td>

                      <td>25</td>
                      <td>36</td>
                      <td>25</td>
                      <td>36</td>
                      <td>25</td>
                      <td>36</td>

                      <td>55</td>
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
