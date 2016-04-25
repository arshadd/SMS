<div class="row">
  <div class="col-md-12">
    <div class="portlet">
      <div class="portlet-body">
        <!--<h4>Search</h4>-->
        <form class="form-inline" role="form">
          <div class="form-group">
            <label for="batch">Batch</label>
            <select id="batch" class='form-control'>
              <option value="">Select ...</option>
              <option value="green">2015 - 2016</option>
              <option value="green">2016 - 2017</option>
            </select>
          </div>
          <div class="form-group">
            <label for="section">Section</label>
            <select id="section" class='form-control'>
              <option value="">Select ...</option>
              <option value="green">Green House</option>
              <option value="green">Blue House</option>
            </select>
          </div>

          <div class="form-group">
            <label for="section">Date</label>
            <input class="form-control form-control-inline input-medium date-picker" id="DateOfJoining" name="DateOfJoining" size="16" type="text" data-date-format="dd-MM-yyyy" />
          </div>

          
          <button type="submit" class="btn btn-info">
            <i class="fa fa-search"></i> Search
          </button>
        </form>
        <!--<hr/>-->
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
        <form id="Form_Employee" class="form-horizontal" method="post">

          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>
                  Student's Name
                </th>
                <th>
                  Attendance
                </th>
                <th>
                  Comments
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  Ali Murad Jamali
                </td>
                <td>
                  <div class="radio-list">
                    <label class="radio-inline">
                      <input type="radio" name="optionsRadios" id="optionsRadios4" value="option1"/> Present
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="optionsRadios" id="optionsRadios5" value="option2"/> Absent
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="optionsRadios" id="optionsRadios6" value="option3" /> Leave
                    </label>
                  </div>
                </td>
                <td>
                  <input type='text' id='comments' name='comments' class='form-control' />
                </td>
              </tr>
              <tr>
                <td>
                  Ali Murad Jamali
                </td>
                <td>
                  <div class="radio-list">
                    <label class="radio-inline">
                      <input type="radio" name="optionsRadios" id="optionsRadios4" value="option1"/> Present
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="optionsRadios" id="optionsRadios5" value="option2"/> Absent
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="optionsRadios" id="optionsRadios6" value="option3" /> Leave
                    </label>
                  </div>
                </td>
                <td>
                  <input type='text' id='comments' name='comments' class='form-control' />
                </td>
              </tr>
              <tr>
                <td>
                  Ali Murad Jamali
                </td>
                <td>
                  <div class="radio-list">
                    <label class="radio-inline">
                      <input type="radio" name="optionsRadios" id="optionsRadios4" value="option1"/> Present
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="optionsRadios" id="optionsRadios5" value="option2"/> Absent
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="optionsRadios" id="optionsRadios6" value="option3" /> Leave
                    </label>
                  </div>
                </td>
                <td>
                  <input type='text' id='comments' name='comments' class='form-control' />
                </td>
              </tr>
            </tbody>
          </table>
              
              
          <div class="form-actions right">
            <!--<button type="button" class="btn btn-default">Cancel</button>-->
            <button type="submit" class="btn btn-success">Save Attendance</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
