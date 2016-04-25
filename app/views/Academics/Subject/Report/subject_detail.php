<?php
    $title = "Subject's Detail";
    $body_class ="page-header-fixed";

    $pageCss  = array(
            '<link href="' . base_url() . 'assets/plugins/select2/select2_conquer.css" rel="stylesheet" type="text/css" />'
            ,'<link href="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.css" rel="stylesheet" type="text/css" />'

        ,'<link href="' . base_url() . 'assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />'
        ,'<link href="' . base_url() . 'assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />'

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
          Subject's Detail Report
        </h3>
        <div class="page-bar hidden-print">
          <ul class="page-breadcrumb breadcrumb">
            <li>
              <i class="fa fa-cogs"></i>
              <a href="#">Academics</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li>
              <a href="<?php echo site_url();?>/academics/subject/manage/index">Subject</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li>
              <a href="<?php echo site_url() . '/academics/subject/report/index'; ?>">Report</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li>
              <a href="#">Subject's Detail</a>
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
                        Employee:<span class="required">*</span>
                      </label>
                      <div class="col-md-10">
                        <select id="employee_id" name="employee_id" class="form-control select2me input-xlarge">
                          <option value="">Select</option>
                          <option value="1">Computer - Muhammad Majid (Teaching Staff)</option>
                        </select>
                      </div>
                    </div>

                    <!--<div class="form-group">
                      <label class="control-label col-md-2">
                        Date Range:<span class="required">*</span>
                      </label>
                      <div class="col-md-10">
                        <div id="reportrange" class="btn btn-default">
                          <i class="fa fa-calendar"></i>
                          &nbsp;
												<span>
												</span>
                          <b class="fa fa-angle-down"></b>
                        </div>

                      </div>
                    </div>-->

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


        <div class="row invoice invoice-logo">
          <div class="col-xs-4 invoice-logo-space">
            <img src="<?php echo base_url();?>/assets/img/logo.png" style="width:150px;height:85px;" alt="" />
          </div>
          <div class="col-xs-6">
            <h2>Subject Detail</h2>
          </div>
          <div class="col-xs-2">
            <span>12 March, 2016</span>
            </div>
        </div>
        <hr/>

        <div class="row">
          <div class="col-md-12">

                <table id="ClassGrid" class="table table-striped table-bordered table-hover table-full-width">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Code</th>
                      <th>Class Name</th>
                      <th>Sections</th>
                      <th>Batches</th>
                      <th>Students</th>
                      <th>Male</th>
                      <th>Female</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>G-01</td>
                      <td>Class 1</td>
                      <td>Green House</td>
                      <td>5</td>
                      <td>10</td>
                      <td>7</td>
                      <td>3</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>G-02</td>
                      <td>Class 2</td>
                      <td>Green House</td>
                      <td>5</td>
                      <td>10</td>
                      <td>7</td>
                      <td>3</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>G-03</td>
                      <td>Class 3</td>
                      <td>Green House</td>
                      <td>5</td>
                      <td>10</td>
                      <td>7</td>
                      <td>3</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>G-04</td>
                      <td>Class 4</td>
                      <td>Green House</td>
                      <td>5</td>
                      <td>10</td>
                      <td>7</td>
                      <td>3</td>
                    </tr>
                  </tbody>
                </table>
                
          </div>
        </div>
<!--        <hr/>
-->
        <!--<div class="row invoice">
          <div class="col-xs-12">
            Loop, Inc. 795 Park Ave, Suite 120 San Francisco, CA 94107, Phone: (234) 145-1810
          </div>
        </div>-->

        <div class="row invoice">
          <div class="col-xs-4">
            <div class="well">
              <address>
                <strong>Averrose Academy Inc.</strong><br/>
                Ghauri Town Phase V<br/>
                Islamabad, Pakistan<br/>
                <abbr title="Phone">P:</abbr> (+92) 312-2213-163
                <!--<br/><strong>Noman Azeem</strong>
                <br/>
                <a href="mailto:#">syed.noman.azeem@gmail.com</a>-->
              </address>
            </div>
          </div>
          <div class="col-xs-6 invoice-block">
          </div>
          <div class="col-xs-2 invoice-block">
            <!--<ul class="list-unstyled amounts">
                      <li>
                        <strong>Sub - Total amount:</strong> $9265
                      </li>
                      <li>
                        <strong>Discount:</strong> 12.9%
                      </li>
                      <li>
                        <strong>VAT:</strong> -----
                      </li>
                      <li>
                        <strong>Grand Total:</strong> $12489
                      </li>
                    </ul>-->
            <!--<br/>-->
            <a class="btn btn-lg btn-info hidden-print" onclick="javascript:window.print();">
              Print <i class="fa fa-print"></i>
            </a>
            <!--<a class="btn btn-lg btn-success hidden-print">
               PDF <i class="fa fa-file-text-o"></i>
           </a>-->
          </div>
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

    ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" ></script>'
    ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-modal/js/bootstrap-modal.js"" ></script>'

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
