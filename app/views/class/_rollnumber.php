<div class="row">
  <div class="col-md-12">
    <div class="portlet">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-cogs"></i>Search
        </div>
      </div>
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

    <div class="alert alert-success display-hide">
      <button data-close="alert" class="close"></button>
      Teacher Information saved successfully.
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="portlet">
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-cogs"></i>Class's Roll number
            </div>
            <!--<div class="actions">
              <a href="#" class="btn btn-primary" onclick="TeacherModule.addView();">
                <i class="fa fa-pencil-square-o"></i> Add New Teacher
              </a>
            </div>-->
          </div>
          <div class="portlet-body">
            <table id="TeacherGrid" class="table table-striped table-bordered table-hover table-full-width">
              <thead>
                <tr>
                  <th class='hidden-xs'>Section Name</th>
                  <th class='hidden-xs'>Batch Name</th>
                  <th class='hidden-xs'>Roll Number Rule</th>
                  <th class="hidden-xs">Manage</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Green House</td>
                  <td>2016 - 2017</td>
                  <td>G1{yyyy}{counter}</td>
                  <td>
                    <a href='<?php echo base_url();?>/index.php/classes/edit/1' class="btn btn-default btn-xs purple">
                      <i class="fa fa-edit"></i> Edit
                    </a> |
                    <a href="#" class="btn btn-default btn-xs black">
                      <i class="fa fa-trash-o"></i> Delete
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>Blue House</td>
                  <td>2016 - 2017</td>
                  <td>G1{yyyy}{counter}</td>
                  <td>
                    <a href="#" class="btn btn-default btn-xs purple">
                      <i class="fa fa-edit"></i> Edit
                    </a> |
                    <a href="#" class="btn btn-default btn-xs black">
                      <i class="fa fa-trash-o"></i> Delete
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>Red House</td>
                  <td>2016 - 2017</td>
                  <td>G1{yyyy}{counter}</td>

                  <td >
                    <a href="#" class="btn btn-default btn-xs purple">
                      <i class="fa fa-edit"></i> Edit
                    </a> |
                    <a href="#" class="btn btn-default btn-xs black">
                      <i class="fa fa-trash-o"></i> Delete
                    </a>
                  </td>
                </tr>
                <!--<?php foreach($Teacher as $employee){?>
                          <tr>
                            <td>
                              <?php echo $employee->TeacherId;?>
                            </td>
                            <td>
                              <?php echo $employee->FirstName;?>
                            </td>
                          </tr>
                         <?php } ?>-->
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>

  </div>
</div>