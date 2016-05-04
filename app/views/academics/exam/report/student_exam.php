<?php
    $title = "Student Exam Result Report";
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
          Student Exam Report
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
              <a href="#">Student Exam</a>
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
                        Student:<span class="required">*</span>
                      </label>
                      <div class="col-md-10">
                        <select id="student_id" name="student_id" class="form-control select2me input-xlarge">
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
        $report_title = "Student-wise report for 1st Term";
        include(VIEW_PATH.'report_header.php');
        ?>



        <div class="row">
          <div class="col-xs-6">
            <div class="form-group">
              <label class="control-label col-xs-4">
                <img id="photo" name="photo" src="../../../../assets/resource/default/student.png" style="width: 150px;height: 100px;" alt=""/>
              </label>
              <div class="col-xs-8">
                <ul class="list-unstyled">
                  <li>
                    <strong>Syed Noman Azeem</strong>
                  </li>
                  <li>
                    <strong>Class:</strong> Grade 1
                  </li>
                  <li>
                    <strong>Batch:</strong> 2001 - 2002
                  </li>
                  <li>
                    <strong>Admission #:</strong> S1478
                  </li>
                  <li>
                    <strong>Roll No:</strong> G120008
                  </li>
                </ul>

              </div>
            </div>
          </div>
          <div class="col-xs-6">
          </div>
          </div>



        <div class="row">
          <div class="col-xs-12">

                <table id="ClassGrid" class="table table-striped table-bordered table-hover table-full-width">
                  <thead>
                    <tr>
                      <th>Subject</th>
                      <th>Marks Obtained</th>
                      <th>Max Marks</th>
                      <th>Grade</th>
                      <th>Percent (%)</th>
                      <th>Remarks</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Math</td>
                      <td>36</td>
                      <td>100</td>
                      <td>D+</td>
                      <td>36%</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Math 2</td>
                      <td>36</td>
                      <td>100</td>
                      <td>D+</td>
                      <td>36%</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Science</td>
                      <td>36</td>
                      <td>100</td>
                      <td>D+</td>
                      <td>36%</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>General Science</td>
                      <td>36</td>
                      <td>100</td>
                      <td>D+</td>
                      <td>36%</td>
                      <td></td>
                    </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Total</th>
                    <th>177</th>
                    <th>400</th>
                    <th>D+</th>
                    <th>36 %</th>
                    <th></th>
                  </tr>
                  </tfoot>
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
