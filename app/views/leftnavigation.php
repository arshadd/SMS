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
        <li class="start active ">
          <a href="<?php echo base_url();?>">
            <i class="fa fa-home"></i>
            <span class="title">
              Dashboard
            </span>
            <span class="selected">
            </span>
          </a>
        </li>
        <li class="">
          <a href="javascript:;">
            <i class="fa fa-cogs"></i>
            <span class="title">
              Settings
            </span>
            <span class="arrow ">
            </span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="<?php echo base_url();?>index.php/school/edit">
                <span class="badge badge-success">
                  new
                </span>
                School
              </a>
            </li>
          </ul>
        </li>
        <li class="">
          <a href="javascript:;">
            <i class="fa fa-bookmark"></i>
            <span class="title">
              Class
            </span>
            <span class="arrow ">
            </span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="<?php echo base_url();?>index.php/classes/index">
                <span class="badge badge-warning">
                  new
                </span>
                Manage Class
              </a>
            </li>
          </ul>
        </li>
        
        <li class="">
          <a href="javascript:;">
            <i class="fa fa-female"></i>
            <span class="title">
              Employee 
            </span>
            <span class="arrow ">
            </span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="<?php echo base_url();?>index.php/employee/index">
              <span class="badge badge-succcess">
                new
              </span>

                Manage Employee
              </a>
            </li>
          </ul>
        </li>
        
        <li class="">
          <a href="javascript:;">
            <i class="fa fa-group"></i>
            <span class="title">
              Student
            </span>
            <span class="arrow ">
            </span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="<?php echo base_url();?>index.php/student/index">
                <span class="badge badge-danger">
                  new
                </span>
                Manage Student
              </a>
            </li>
          </ul>
        </li>

        <li class="">
          <a href="javascript:;">
            <i class="fa fa-dollar"></i>
            <span class="title">
              Fees
            </span>
            <span class="arrow ">
            </span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="#">
                Fee Types
              </a>
            </li>
            <li>
              <a href="#">
                Manage Fee
              </a>
            </li>
          </ul>
        </li>

        <li class="">
          <a href="javascript:;">
            <i class="fa fa-money"></i>
            <span class="title">
              Expense
            </span>
            <span class="arrow ">
            </span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="#">
                Expense Types
              </a>
            </li>
            <li>
              <a href="#">
                Manage Expense
              </a>
            </li>
          </ul>
        </li>

        

        <li class="">
          <a href="javascript:;">
            <i class="fa fa-table"></i>
            <span class="title">
              Reports
            </span>
            <span class="arrow ">
            </span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="#">
                <span class="title">
                  Class
                </span>
                <span class="arrow ">
                </span>
              </a>
              <ul class="sub-menu">
                <li>
                  <a href="<?php echo base_url();?>index.php/report/classes">
                    Manage Class
                  </a>
                </li>
              </ul>
              
            </li>
            
          </ul>
        </li>
      </ul>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
</div>
<!-- END SIDEBAR -->