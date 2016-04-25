<div class="row">
  <div class="col-md-12">

    <div class="alert alert-success display-hide">
      <button data-close="alert" class="close"></button>
      Teacher Information saved successfully.
    </div>

    <div class="tabbable tabbable-custom">
      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#tab_2_1" data-toggle="tab">
            <i class="fa fa-calendar"></i>View Attendance
          </a>
        </li>
        <li >
          <a href="#tab_2_2" data-toggle="tab">
            <i class="fa fa-leaf"></i>Mark Attendance
          </a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_2_1">


          <?php include('_viewAttendance.php');?>

        </div>

        <div class="tab-pane " id="tab_2_2">
          <?php include('_markAttendance.php');?>
        </div>
      </div>

    </div>
  </div>

</div>



