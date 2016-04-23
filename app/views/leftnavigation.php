<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
  <div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
      <!-- BEGIN SIDEBAR MENU -->
      <ul class="page-sidebar-menu">
        <li class="sidebar-toggler-wrapper">
          <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
          <div class="sidebar-toggler">
          </div>
          <div class="clearfix">
          </div>
          <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        </li>
        <li>
          <form class="search-form" role="form" action="#" method="get">
            <div class="input-icon right">
              <i class="fa fa-search"></i>
              <input type="text" class="form-control input-medium input-sm" name="query" placeholder="Search..."/>
            </div>
          </form>
        </li>
        <li class="start" data-menu="dashboard">
          <a href="<?php echo base_url();?>">
            <i class="fa fa-home"></i>
            <span class="title">
              Dashboard
            </span>
            <!--<span class="selected"></span>-->
          </a>
        </li>

        <li class="" data-menu="administration">
          <a href="javascript:">
            <i class="fa fa-cogs"></i>
            <span class="title">
              Administration
            </span>
          </a>
          <ul class="sub-menu">
            <li class="" data-menu-item="settings">
              <a href="<?php echo base_url();?>index.php/administration/settings/index">
                <i class="fa fa-cog"></i>
                Setting
              </a>
            </li>
            <li  class="" data-menu-item="user">
              <a href="<?php echo base_url();?>index.php/administration/user/index">
                <i class="fa fa-user"></i>
                User Management
              </a>
            </li>
            <li  class="" data-menu-item="hr">
              <a href="<?php echo base_url();?>index.php/administration/hr/index">
                <i class="fa fa-group"></i>
                Human Resource
              </a>
            </li>
          </ul>
        </li>

        <li class="" data-menu="academics">
          <a href="javascript:">
            <i class="fa fa-book"></i>
            <span class="title">
              Academics
            </span>
          </a>
          <ul class="sub-menu">
            <li  class="" data-menu-item="edit">
              <a href="#">
                <i class="fa fa-user"></i>
                My Profile
              </a>
            </li>
            <li class="" data-menu-item="class_batch">
              <a href="<?php echo base_url();?>index.php/academics/class_batch/index">
                <i class="fa fa-bookmark"></i>
                Class / Batch
              </a>
            </li>
            <li class="" data-menu-item="batch_summary">
              <a href="#">
                <i class="fa fa-list-alt"></i>
                Batch Summary
              </a>
            </li>
            <li class="" data-menu-item="attendance">
              <a href="<?php echo base_url();?>index.php/academics/attendance/index">
                <i class="fa fa-check-square-o"></i>
                Attendance
              </a>
            </li>
            <li  class="" data-menu-item="subject">
              <a href="#">
                <i class="fa fa-building"></i>
                Subject
              </a>
            </li>
            <li class="" data-menu-item="student">
              <a href="<?php echo base_url();?>index.php/academics/student/index">
                <i class="fa fa-group"></i>
                Student
              </a>
            </li>
            <li  class="" data-menu-item="timetable">
              <a href="#">
                <i class="fa fa-calendar"></i>
                Timetable
              </a>
            </li>
          </ul>
        </li>

        <li class="" data-menu="sitemap">
          <a href="<?php echo base_url();?>index.php/sitemap/index">
            <i class="fa fa-sitemap"></i>
            <span class="title">
              Sitemap
            </span>
          </a>
        </li>

        <!--<li class="" data-menu="school">
          <a href="javascript:;">
            <i class="fa fa-cogs"></i>
            <span class="title">
              Settings
            </span>

          </a>
          <ul class="sub-menu">
            <li  class="" data-menu-item="edit">
              <a href="<?php /*echo base_url();*/?>index.php/school/edit">
                <span class="badge badge-success">
                  new
                </span>
                School
              </a>
            </li>
            <li  class="" data-menu-item="edit">
              <a href="<?php echo base_url();?>index.php/employee_departments/index">
                <span class="badge badge-success">
                  new
                </span>
                Departments
              </a>
            </li>
          </ul>
        </li>
        <li class="" data-menu="classes">
          <a href="javascript:;">
            <i class="fa fa-bookmark"></i>
            <span class="title">
              Class / Batch
            </span>

          </a>
          <ul class="sub-menu">
            <li class="" data-menu-item ="index">
              <a href="<?php /*echo base_url();*/?>index.php/classes/index">
                <span class="badge badge-warning">
                  new
                </span>
                Manage Class
              </a>
            </li>
          </ul>
        </li>
        
        <li class="" data-menu="employees">
          <a href="javascript:;">
            <i class="fa fa-female"></i>
            <span class="title">
              Employee 
            </span>

          </a>
          <ul class="sub-menu">
            <li class="" data-menu-item ="index">
              <a href="<?php /*echo base_url();*/?>index.php/employees/index">
              <span class="badge badge-succcess">
                new
              </span>
                Manage Employee
              </a>
            </li>
          </ul>
        </li>
        
        <li class="" data-menu="student">
          <a href="javascript:;">
            <i class="fa fa-group"></i>
            <span class="title">
              Student
            </span>

          </a>
          <ul class="sub-menu">
            <li class="" data-menu-item="index">
              <a href="<?php /*echo base_url();*/?>index.php/student/index">
                <span class="badge badge-danger">
                  new
                </span>
                Manage Student
              </a>
            </li>
          </ul>
        </li>
        <li class="" data-menu="employeeattendance">
          <a href="javascript:;">
            <i class="fa fa-female"></i>
            <span class="title">
              Attendance
            </span>

          </a>
          <ul class="sub-menu">
            <li class="" data-menu-item ="index">
              <a href="<?php /*echo base_url();*/?>index.php/employeeattendance/index">
              <span class="badge badge-succcess">
                new
              </span>
                Employee
              </a>
            </li>
          </ul>
        </li>
        <li class="" data-menu="fees">
          <a href="javascript:;">
            <i class="fa fa-dollar"></i>
            <span class="title">
              Fees
            </span>

          </a>
          <ul class="sub-menu">
            <li  class="" data-menu-item ="asdfsdd">
              <a href="#">
                Comming soon
              </a>
            </li>
          </ul>
        </li>

        <li class="" data-menu="expense">
          <a href="javascript:;">
            <i class="fa fa-money"></i>
            <span class="title">
              Expense
            </span>

          </a>
          <ul class="sub-menu">
            <li class="" data-menu-item ="dd">
              <a href="#">
                Comming soorn
              </a>
            </li>
          </ul>
        </li>

        <li id="lnkReport" class="" data-menu="report">
          <a href="javascript:;">
            <i class="fa fa-table"></i>
            <span class="title">
              Reports
            </span>

          </a>
          <ul class="sub-menu">
            <li class="" data-menu-item ="attendance">
              <a href="<?php /*echo base_url();*/?>index.php/report/attendance">
                Attendances
              </a>
            </li>
          </ul>
        </li>-->


      </ul>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
</div>
<!-- END SIDEBAR -->