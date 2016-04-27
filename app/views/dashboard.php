<?php
    $title = "Dashboard";
    $body_class ="page-header-fixed";

    $pageCss  = array(
        '<link href="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />'
        ,'<link href="' . base_url() . 'assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />'
        ,'<link href="' . base_url() . 'assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />'
        ,'<link href="' . base_url() . 'assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" />'
        ,'<link href="' . base_url() . 'assets/css/pages/tasks.css" rel="stylesheet" type="text/css" />'
    );
    
    include("header.php");
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

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
      <div class="page-content-wrapper">
        <div class="page-content">
          
          <!-- BEGIN PAGE HEADER-->
          <div class="row">
            <div class="col-md-12">
              <!-- BEGIN PAGE TITLE & BREADCRUMB-->
              <h3 class="page-title">
                <i class="fa fa-home icon-large"></i>
                Dashboard <small>statistics and more</small>
              </h3>
              <ul class="page-breadcrumb breadcrumb">
                <li>
                  <i class="fa fa-home"></i>
                  <a href="index.html">Home</a>
                  <i class="fa fa-angle-right"></i>
                </li>
                <li>
                  <a href="#">Dashboard</a>
                </li>
                <li class="pull-right">
                  <!--<div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range">
                    <i class="fa fa-calendar"></i>
                    <span>
                    </span>
                    <i class="fa fa-angle-down"></i>
                  </div>-->
                </li>
              </ul>
              <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
          </div>
          <!-- END PAGE HEADER-->
          <!-- BEGIN OVERVIEW STATISTIC BARS-->
          <div class="row stats-overview-cont">


            <div class="col-md-2 col-sm-4">
              <div class="stats-overview stat-block">
                  <div class="details">
                   <h4><i class="fa fa-shield icon-large"></i> Classes</h4>
                    <div class="numbers">
                      1360
                    </div>
                  </div>
              </div>
            </div>

            <div class="col-md-2 col-sm-4">
              <div class="stats-overview stat-block">
                <div class="details">
                  <h4><i class="fa fa-gavel icon-large"></i> Batches</h4>
                  <div class="numbers">
                    1360
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-2 col-sm-4">
              <div class="stats-overview stat-block">
                <div class="details">
                  <h4><i class="fa fa-user icon-large"></i> Students</h4>
                  <div class="numbers">
                    1360
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-2 col-sm-4">
              <div class="stats-overview stat-block">
                <div class="details">
                  <h4><i class="fa fa-group icon-large"></i> Employees</h4>
                  <div class="numbers">
                    1360
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-2 col-sm-4">
              <div class="stats-overview stat-block">
                <div class="details">
                  <h4><i class="fa fa-building icon-large"></i> Subjects</h4>
                  <div class="numbers">
                    1360
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-2 col-sm-4">
              <div class="stats-overview stat-block">
                <div class="details">
                  <h4><i class="fa fa-folder icon-large"></i> Department</h4>
                  <div class="numbers">
                    1360
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- END OVERVIEW STATISTIC BARS-->
          <div class="clearfix">
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <!-- BEGIN PORTLET-->
              <div class="portlet">
                <div class="portlet-title">
                  <div class="caption">
                    <i class="fa fa-bar-chart-o"></i> Student Registration
                  </div>
                 <!-- <div class="actions">
                    <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-default btn-sm active">
                        <input type="radio" name="options" class="toggle">New </label>
                      <label class="btn btn-default btn-sm">
                        <input type="radio" name="options" class="toggle">Returning </label>
                    </div>
                  </div>-->
                </div>
                <div class="portlet-body">
                  <div id="site_statistics_loading">
                    <img src="<?php echo base_url();?>assets/img/loading.gif" alt="loading"/>
                  </div>
                  <div id="site_statistics_content" class="display-none">
                    <div id="site_statistics" class="chart">
                    </div>
                  </div>
                </div>
              </div>
              <!-- END PORTLET-->
            </div>

            <div class="col-md-6 col-sm-12">
              <!-- BEGIN PORTLET-->
              <div class="portlet">
                <div class="portlet-title">
                  <div class="caption">
                    <i class="fa fa-money"></i>Fees Dues
                  </div>
                  <!--<div class="actions">
                    <div class="btn-group">
                      <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        Filter By <i class="fa fa-angle-down"></i>
                      </a>
                      <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                        <label>
                          <input type="checkbox"/> Finance
                        </label>
                        <label>
                          <input type="checkbox" checked=""/> Membership
                        </label>
                        <label>
                          <input type="checkbox"/> Customer Support
                        </label>
                        <label>
                          <input type="checkbox" checked=""/> HR
                        </label>
                        <label>
                          <input type="checkbox"/> System
                        </label>
                      </div>
                    </div>
                  </div>-->
                </div>
                <div class="portlet-body">
                  <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>
                          Student
                        </th>
                        <th>
                          Admission #
                        </th>
                        <th>
                          Amount #
                        </th>
                        <th>
                          Class / Batch
                        </th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>
                          <a href="#"> Elis Yong</a>
                        </td>
                        <td>
                         S123
                        </td>
                        <td>
                          4560.60$
                            <!--<span class="label label-warning label-sm">
                              Paid
                            </span>-->
                        </td>
                        <td>
                          Class 1 / 2000 - 2001
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="#">Daniel Kim</a>
                        </td>
                        <td>
                          S123
                        </td>
                        <td>
                          360.60$
                        </td>
                        <td>
                          Class 1 / 2000 - 2001
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="#">Edward Cooper</a>
                        </td>
                        <td>
                          S2552
                        </td>
                        <td>
                          960.50$
                            <!--<span class="label label-success label-sm">
                              Pending
                            </span>-->
                        </td>
                        <td>
                          Class 1 / 2000 - 2001
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="#">Paris Simpson</a>
                        </td>
                        <td>
                          S5885
                        </td>
                        <td>
                          1101.60$
                            <!--<span class="label label-success label-sm">
                              Pending
                            </span>-->
                        </td>
                        <td>
                          Class 1 / 2000 - 2001
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="#">Elis Yong</a>
                        </td>
                        <td>
                          S125
                        </td>
                        <td>
                          4560.60$
                           <!-- <span class="label label-warning label-sm">
                              Paid
                            </span>-->
                        </td>
                        <td>
                          Class 1 / 2000 - 2001
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="#">Paris Simpson</a>
                        </td>
                        <td>
                         S125
                        </td>
                        <td>
                          1101.60$
                            <!--<span class="label label-success label-sm">
                              Pending
                            </span>-->
                        </td>
                        <td>
                          Class 1 / 2000 - 2001
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="#">Paris Simpson</a>
                        </td>
                        <td>
                          S588
                        </td>
                        <td>
                          1101.60$
                            <!--<span class="label label-success label-sm">
                              Pending
                            </span>-->
                        </td>
                        <td>
                          Class 1 / 2000 - 2001
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="#">Paris Simpson</a>
                        </td>
                        <td>
                          S258
                        </td>
                        <td>
                          1101.60$
                            <!--<span class="label label-success label-sm">
                              Pending
                            </span>-->
                        </td>
                        <td>
                          Class 1 / 2000 - 2001
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="#">Paris Simpson</a>
                        </td>
                        <td>
                          S587
                        </td>
                        <td>
                          1101.60$
                           <!-- <span class="label label-success label-sm">
                              Pending
                            </span>-->
                        </td>
                        <td>
                          Class 1 / 2000 - 2001
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- END PORTLET-->
            </div>


          </div>
          <div class="clearfix">
          </div>
          <div class="row ">
            <div class="col-md-6 col-sm-6">
              <div class="portlet">
                <div class="portlet-title">
                  <div class="caption">
                    <i class="fa fa-bell"></i>Recent Employee
                  </div>
                  <!--<div class="actions">
                    <div class="btn-group">
                      <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        Filter By <i class="fa fa-angle-down"></i>
                      </a>
                      <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                        <label>
                          <input type="checkbox"/> Finance
                        </label>
                        <label>
                          <input type="checkbox" checked=""/> Membership
                        </label>
                        <label>
                          <input type="checkbox"/> Customer Support
                        </label>
                        <label>
                          <input type="checkbox" checked=""/> HR
                        </label>
                        <label>
                          <input type="checkbox"/> System
                        </label>
                      </div>
                    </div>
                  </div>-->
                </div>
                <div class="portlet-body">
                  <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>
                            From
                          </th>
                          <th>
                            Contact
                          </th>
                          <th>
                            Amount
                          </th>
                          <th>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <a href="#">Ikea</a>
                          </td>
                          <td>
                            Elis Yong
                          </td>
                          <td>
                            4560.60$
                            <span class="label label-warning label-sm">
                              Paid
                            </span>
                          </td>
                          <td>
                            <a href="#" class="btn btn-default btn-xs">View</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="#">Apple</a>
                          </td>
                          <td>
                            Daniel Kim
                          </td>
                          <td>
                            360.60$
                          </td>
                          <td>
                            <a href="#" class="btn btn-default btn-xs">View</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="#">37Singals</a>
                          </td>
                          <td>
                            Edward Cooper
                          </td>
                          <td>
                            960.50$
                            <span class="label label-success label-sm">
                              Pending
                            </span>
                          </td>
                          <td>
                            <a href="#" class="btn btn-default btn-xs">View</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="#">Google</a>
                          </td>
                          <td>
                            Paris Simpson
                          </td>
                          <td>
                            1101.60$
                            <span class="label label-success label-sm">
                              Pending
                            </span>
                          </td>
                          <td>
                            <a href="#" class="btn btn-default btn-xs">View</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="#">Ikea</a>
                          </td>
                          <td>
                            Elis Yong
                          </td>
                          <td>
                            4560.60$
                            <span class="label label-warning label-sm">
                              Paid
                            </span>
                          </td>
                          <td>
                            <a href="#" class="btn btn-default btn-xs">View</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="#">Google</a>
                          </td>
                          <td>
                            Paris Simpson
                          </td>
                          <td>
                            1101.60$
                            <span class="label label-success label-sm">
                              Pending
                            </span>
                          </td>
                          <td>
                            <a href="#" class="btn btn-default btn-xs">View</a>
                          </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="portlet">
                <div class="portlet-title">
                  <div class="caption">
                    <i class="fa fa-bell"></i>Recent Students
                  </div>
                  <!--<div class="actions">
                    <div class="btn-group">
                      <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        Filter By <i class="fa fa-angle-down"></i>
                      </a>
                      <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                        <label>
                          <input type="checkbox"/> Finance
                        </label>
                        <label>
                          <input type="checkbox" checked=""/> Membership
                        </label>
                        <label>
                          <input type="checkbox"/> Customer Support
                        </label>
                        <label>
                          <input type="checkbox" checked=""/> HR
                        </label>
                        <label>
                          <input type="checkbox"/> System
                        </label>
                      </div>
                    </div>
                  </div>-->
                </div>
                <div class="portlet-body">
                  <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>
                          From
                        </th>
                        <th>
                          Contact
                        </th>
                        <th>
                          Amount
                        </th>
                        <th>
                        </th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>
                          <a href="#">Ikea</a>
                        </td>
                        <td>
                          Elis Yong
                        </td>
                        <td>
                          4560.60$
                            <span class="label label-warning label-sm">
                              Paid
                            </span>
                        </td>
                        <td>
                          <a href="#" class="btn btn-default btn-xs">View</a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="#">Apple</a>
                        </td>
                        <td>
                          Daniel Kim
                        </td>
                        <td>
                          360.60$
                        </td>
                        <td>
                          <a href="#" class="btn btn-default btn-xs">View</a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="#">37Singals</a>
                        </td>
                        <td>
                          Edward Cooper
                        </td>
                        <td>
                          960.50$
                            <span class="label label-success label-sm">
                              Pending
                            </span>
                        </td>
                        <td>
                          <a href="#" class="btn btn-default btn-xs">View</a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="#">Google</a>
                        </td>
                        <td>
                          Paris Simpson
                        </td>
                        <td>
                          1101.60$
                            <span class="label label-success label-sm">
                              Pending
                            </span>
                        </td>
                        <td>
                          <a href="#" class="btn btn-default btn-xs">View</a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="#">Ikea</a>
                        </td>
                        <td>
                          Elis Yong
                        </td>
                        <td>
                          4560.60$
                            <span class="label label-warning label-sm">
                              Paid
                            </span>
                        </td>
                        <td>
                          <a href="#" class="btn btn-default btn-xs">View</a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="#">Google</a>
                        </td>
                        <td>
                          Paris Simpson
                        </td>
                        <td>
                          1101.60$
                            <span class="label label-success label-sm">
                              Pending
                            </span>
                        </td>
                        <td>
                          <a href="#" class="btn btn-default btn-xs">View</a>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="clearfix">
          </div>

          <div class="row ">
            <div class="col-md-6 col-sm-6">
              <!-- BEGIN PORTLET-->
              <div class="portlet calendar">
                <div class="portlet-title">
                  <div class="caption">
                    <i class="fa fa-calendar"></i>Event Calendar
                  </div>
                </div>
                <div class="portlet-body">
                  <div id="calendar">
                  </div>
                </div>
              </div>
              <!-- END PORTLET-->
            </div>
            <div class="col-md-6 col-sm-6">
              <!-- BEGIN PORTLET-->
              <div class="portlet">
                <div class="portlet-title">
                  <div class="caption">
                    <i class="fa fa-comments"></i>Conversations
                  </div>
                  <div class="tools">
                    <a href="#" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="#" class="reload"></a>
                    <a href="#" class="remove"></a>
                  </div>
                </div>
                <div class="portlet-body" id="chats">
                  <div class="scroller" style="height: 435px;" data-always-visible="1" data-rail-visible1="1">
                    <ul class="chats">
                      <li class="in">
                        <img class="avatar img-responsive" alt="" src="<?php echo base_url();?>assets/img/avatar1.jpg"/>
                        <div class="message">
                          <span class="arrow">
                          </span>
                          <a href="#" class="name">Bob Nilson</a>
                          <span class="datetime">
                            at Jul 25, 2012 11:09
                          </span>
                          <span class="body">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                          </span>
                        </div>
                      </li>
                      <li class="out">
                        <img class="avatar img-responsive" alt="" src="<?php echo base_url();?>assets/img/avatar2.jpg"/>
                        <div class="message">
                          <span class="arrow">
                          </span>
                          <a href="#" class="name">Lisa Wong</a>
                          <span class="datetime">
                            at Jul 25, 2012 11:09
                          </span>
                          <span class="body">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                          </span>
                        </div>
                      </li>
                      <li class="in">
                        <img class="avatar img-responsive" alt="" src="<?php echo base_url();?>assets/img/avatar1.jpg"/>
                        <div class="message">
                          <span class="arrow">
                          </span>
                          <a href="#" class="name">Bob Nilson</a>
                          <span class="datetime">
                            at Jul 25, 2012 11:09
                          </span>
                          <span class="body">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                          </span>
                        </div>
                      </li>
                      <li class="out">
                        <img class="avatar img-responsive" alt="" src="<?php echo base_url();?>assets/img/avatar3.jpg"/>
                        <div class="message">
                          <span class="arrow">
                          </span>
                          <a href="#" class="name">Richard Doe</a>
                          <span class="datetime">
                            at Jul 25, 2012 11:09
                          </span>
                          <span class="body">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                          </span>
                        </div>
                      </li>
                      <li class="in">
                        <img class="avatar img-responsive" alt="" src="<?php echo base_url();?>assets/img/avatar3.jpg"/>
                        <div class="message">
                          <span class="arrow">
                          </span>
                          <a href="#" class="name">Richard Doe</a>
                          <span class="datetime">
                            at Jul 25, 2012 11:09
                          </span>
                          <span class="body">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                          </span>
                        </div>
                      </li>
                      <li class="out">
                        <img class="avatar img-responsive" alt="" src="<?php echo base_url();?>assets/img/avatar1.jpg"/>
                        <div class="message">
                          <span class="arrow">
                          </span>
                          <a href="#" class="name">Bob Nilson</a>
                          <span class="datetime">
                            at Jul 25, 2012 11:09
                          </span>
                          <span class="body">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                          </span>
                        </div>
                      </li>
                      <li class="in">
                        <img class="avatar img-responsive" alt="" src="<?php echo base_url();?>assets/img/avatar3.jpg"/>
                        <div class="message">
                          <span class="arrow">
                          </span>
                          <a href="#" class="name">Richard Doe</a>
                          <span class="datetime">
                            at Jul 25, 2012 11:09
                          </span>
                          <span class="body">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                          </span>
                        </div>
                      </li>
                      <li class="out">
                        <img class="avatar img-responsive" alt="" src="<?php echo base_url();?>assets/img/avatar1.jpg"/>
                        <div class="message">
                          <span class="arrow">
                          </span>
                          <a href="#" class="name">Bob Nilson</a>
                          <span class="datetime">
                            at Jul 25, 2012 11:09
                          </span>
                          <span class="body">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. sed diam nonummy nibh euismod tincidunt ut laoreet.
                          </span>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="chat-form">
                    <div class="input-cont">
                      <input class="form-control" type="text" placeholder="Type a message here..."/>
                    </div>
                    <div class="btn-cont">
                      <span class="arrow">
                      </span>
                      <a href="#" class="btn btn-primary icn-only">
                        <i class="fa fa-check"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END PORTLET-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END CONTENT -->
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

      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jquery.peity.min.js" ></script>'
      
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jquery.pulsate.min.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jquery-knob/js/jquery.knob.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/flot/jquery.flot.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/flot/jquery.flot.resize.js" ></script>'

      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/moment.min.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/gritter/js/jquery.gritter.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" ></script>'

      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jquery.sparkline.min.js" ></script>'
    );
    
    $pageJsScript  = array(
        '<script type="text/javascript" src="' . base_url() . 'assets/js/util.js" ></script>'

      ,'<script type="text/javascript" src="' . base_url() . 'assets/scripts/index.js" ></script>'
      ,'<script type="text/javascript" src="' . base_url() . 'assets/scripts/tasks.js" ></script>'
      );
      
    $pageJsCalls  = array(
      'Index.init();'
      ,'Index.initJQVMAP(); // init index page custom scripts'
      ,'Index.initCalendar(); // init index page custom scripts'
      ,'Index.initCharts(); // init index page custom scripts'
      ,'Index.initChat();'
      ,'Index.initMiniCharts();'
      ,'Index.initPeityElements();'
      ,'Index.initKnowElements();'
      ,'Index.initDashboardDaterange();'
      ,'Tasks.initDashboardWidget();'
    );
    
    include("footer.php");
?>
