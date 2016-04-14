<div class="row">
  <div class="col-md-12">
    <div class="portlet">
      <div class="portlet-body text-center">
        <form id="Form_Class_Attendances_Search"  class="form-inline" >

          <div class='alert alert-success display-hide'>
            <button data-close='alert' class='close'></button>
            Student attendance saved successfully.
          </div>
          <div class='alert alert-danger display-hide'>
            <button data-close='alert' class='close'></button>
            You have some form errors. Please check below.
          </div>


          <div class="form-group">
            <label for="attendance_class_id">Class:</label>
            <select id="attendance_class_id" name="attendance_class_id" class='form-control input-medium' disabled="disabled">
            </select>
          </div>

          <div class="form-group">
            <label for="attendance_batch_id">Batch:</label>
            <select id="attendance_batch_id" name="attendance_batch_id" class='form-control input-medium'>
            </select>
          </div>

          <div class="form-group">
            <label for="section">Date</label>
            <input class="form-control input-medium date-picker" id="attendance_date" name="attendance_date" size="16" type="text" data-date-format="dd-MM-yyyy" />
          </div>

          <button type="submit" class="btn btn-info">
            <i class="fa fa-search"></i> Search
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="portlet">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-reorder"></i> Mark Attendance
        </div>
        <div class="tools">
          <a href="#" class="collapse"></a>
          <a href="#portlet-config" data-toggle="modal" class="config"></a>
          <a href="#" class="reload"></a>
          <a href="#" class="remove"></a>
        </div>
      </div>


      <div class="portlet-body form">
        <form id="Form_Attendance" class="form-horizontal" method="post">

          <table id="AttendanceGrid" class="table table-striped table-bordered table-hover table-full-width">
            <thead>
            <tr>
              <th class='hidden-xs' colspan="4">Today: <label class="badge badge-warning" id="lblAttendanceDate">0</label></th>
              <th class='hidden-xs'>
                <div class="radio-list">
                  <label class="radio-inline">
                    <input type="radio" name="rdoMarkAll" value="P"/> Mark All Present
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="rdoMarkAll" value="A"/> Mark All Absent
                  </label>
                  </div>
              </th>
              <th class='hidden-xs'>Present: <label class="badge badge-success" id="lblPresent">0</label>, Absentees: <label class="badge badge-danger" id="lblAbsent">0</label></th>
            </tr>
            <tr>
              <th class='hidden-xs'>#</th>
              <th class='hidden-xs'>Photo</th>
              <th class='hidden-xs'>Full Name</th>
              <th class='hidden-xs'>Roll #</th>

              <th class='hidden-xs'>Attendance</th>
              <th class='hidden-xs'>Comments</th>
            </tr>
            </thead>
            <tbody>
            <!--<tr>
              <td>
                Ali Murad Jamali
              </td>
              <td>
                Ali Murad Jamali
              </td>
              <td>
                <div class="radio-list">
                  <label class="radio-inline">
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="P"/> Present
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="A"/> Absent
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="L" /> Leave
                  </label>
                </div>
              </td>
              <td>
                <input type='text' id='comments' name='comments' class='form-control' />
              </td>
            </tr>-->
            </tbody>
          </table>

          <div class="form-actions right">
            <button type="button" id="btnSaveAttendance" class="btn btn-success">Save Attendance</button>
            <label>
              <div id="loader"><img src="<?php echo base_url() . '/assets/img/input-spinner.gif'; ?>"/></div>
            </label>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
