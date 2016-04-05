<div class="row">
  <div class="col-md-12">

    <div class="alert alert-success display-hide">
      <button data-close="alert" class="close"></button>
      Teacher Information saved successfully.
    </div>

    <div class="tabbable tabbable-custom">
      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#tab_3_1" data-toggle="tab">
            <i class="fa fa-calendar"></i>Class's Teacher
          </a>
        </li>
        <li >
          <a href="#tab_3_2" data-toggle="tab">
            <i class="fa fa-leaf"></i>Teacher's Subject
          </a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_3_1">

          <?php include('_classTeacher.php');?>

        </div>

        <div class="tab-pane " id="tab_3_2">
          <?php include('_teacherSubject.php');?>
        </div>
      </div>

    </div>
  </div>

</div>






