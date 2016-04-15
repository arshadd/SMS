<div >
  <div class="row invoice invoice-logo">
    <div class="col-xs-4 invoice-logo-space">
      <img src="<?php echo base_url();?>/assets/img/logo.png" style="width:300px;height:85px;" alt="" />
    </div>
    <div class="col-xs-8">
      <h3>Class Attendance Report</h3>
      <!--<p>
        Class Attendance
        <! --<span class="muted">
          Classes List
        </span>-- >
      </p>-->
    </div>
  </div>
  <hr/>

  <div class="row">
    <div class="col-md-12">
      <table id="ClassAttendanceSummaryGrid" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="class_name"></th>
            <th class="date_ranges"></th>
            <th></th>
          </tr>
        </thead>
      </table>


    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
        <div id="ClassAttendanceGrid"></div>
    </div>
  </div>

  <div class="row invoice">
    <div class="col-xs-4">
      <!--<div class="well">
        <address>
          <strong>Loop, Inc.</strong><br/>
          795 Park Ave, Suite 120<br/>
          San Francisco, CA 94107<br/>
          <abbr title="Phone">P:</abbr> (234) 145-1810
        </address>
        <address>
          <strong>Full Name</strong>
          <br/>
          <a href="mailto:#">first.last@email.com</a>
        </address>
      </div>-->
    </div>
    <div class="col-xs-4"></div>
    <div class="col-xs-4 invoice-block">
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
                Submit Your Invoice <i class="fa fa-check"></i>
              </a>-->
    </div>
  </div>

</div>