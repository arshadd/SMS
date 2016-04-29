<?php
    $title = "Employee List";
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
          All Employee Report
        </h3>
        <div class="page-bar hidden-print">
          <ul class="page-breadcrumb breadcrumb">
            <li>
              <i class="fa fa-cogs"></i>
              <a href="#">Administration</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li>
              <a href="<?php echo base_url();?>index.php/administration/hr/manage/index">HR Management</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li>
              <a href="<?php echo base_url() . 'index.php/administration/hr/report/index'; ?>">Report</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li>
              <a href="#">All Employee</a>
            </li>
          </ul>
        </div>
        <!-- END PAGE HEADER-->

        <div class="row invoice invoice-logo">
          <div class="col-xs-4 invoice-logo-space">
            <img src="<?php echo base_url();?>/assets/img/logo.png" style="width:150px;height:85px;" alt="" />
          </div>
          <div class="col-xs-6">
            <h2>Employee List</h2>
          </div>
          <div class="col-xs-2">
            <?php
              date_default_timezone_set('Asia/Karachi');
              $today = date("M j,Y H:i:s", mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y")));
            ?>
            <span><?php echo $today;?></span>
          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="col-md-12">

                <table id="ClassGrid" class="table table-striped table-bordered table-hover table-full-width">
                  <thead>
                    <tr style="background-color: #999ba2" >
                      <th>S.No</th>
                      <th>EMP_Code</th>
                      <th>Employee Name</th>
                      <th>Gender</th>
                      <th>Designation</th>
                      <th>Employee Level </th>
                      <th>Date Joining</th>
                      <th>Contact No</th>
                      <th>Address</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Emp-01</td>
                      <td>Abdul Hakeem</td>
                      <td>Male</td>
                      <td>Science Teacher</td>
                      <td>Senior Staff</td>
                      <td>19-Dec-2008</td>
                      <td>xxxx-xxxxxxxx</td>
                      <td>ABC Street,Sector G-7/4, Islamabad</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Emp-02</td>
                      <td>Madeeha Shaha</td>
                      <td>Female</td>
                      <td>Head Mistress</td>
                      <td>Senior Staff</td>
                      <td>01-Jan-2007</td>
                      <td>xxxx-xxxxxxxx</td>
                      <td>XYZ Street,stalite Town, Rawalpindi</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Emp-03</td>
                      <td>Zeeshan Ali</td>
                      <td>Male</td>
                      <td>Teacher</td>
                      <td>Junior Staff</td>
                      <td>5-March-2011</td>
                      <td>xxxx-xxxxxxxx</td>
                      <td>ABC Street,Sector G-7/4, Islamabad</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Emp-04</td>
                      <td>Batool Begum</td>
                      <td>Female</td>
                      <td>Arts Teacher</td>
                      <td>Junior Staff</td>
                      <td>01-March-2014</td>
                      <td>xxxx-xxxxxxxx</td>
                      <td>Xyz Street,House.No.abc, Islamabad</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Emp-05</td>
                      <td>Abdul Hakeem</td>
                      <td>Male</td>
                      <td>Science Teacher</td>
                      <td>Senior Staff</td>
                      <td>19-Aug-2008</td>
                      <td>xxxx-xxxxxxxx</td>
                      <td>ABC Street,Sector G-7/4, Islamabad</td>
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
                <strong>ABC Academy Inc.</strong><br/>
                XYZ<br/>
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
