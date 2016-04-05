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
      Student Information saved successfully.
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="portlet">
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-cogs"></i>Class's Students
            </div>
            <div class="actions">
              <a href="#" class="btn btn-primary" onclick="StudentModule.addView();">
                <i class="fa fa-pencil-square-o"></i> Add New Student
              </a>
              <a href="#" class="btn btn-success" onclick="StudentModule.addView();">
                <i class="fa fa-plus-square"></i> Add Student To Class
              </a>
            </div>
          </div>
          <div class="portlet-body">

            <table id="StudentGrid" class="table table-striped table-bordered table-hover table-full-width">
              <thead>
                <tr>
                  <th class='hidden-xs'>Photo</th>
                  <th class='hidden-xs'>Student Name</th>
                  <th class='hidden-xs'>Admission #</th>
                  <th class='hidden-xs'>Section</th>
                  <th class='hidden-xs'>Batch</th>
                  <th class='hidden-xs'>Roll #</th>
                  <th class="hidden-xs">Manage</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <img alt="" src="<?php echo base_url();?>assets/img/avatar3_small.jpg"/>
                  </td>
                  <td>Ali Raza</td>
                  <td>454545454</td>
                  <td>Green House</td>
                  <td>2015 - 2016</td>
                  <td>ST-09992</td>
                  <td>
                    <a href=""
                      <?php echo base_url();?>/index.php/classes/edit/1" class="btn btn-default btn-xs purple">
                      <i class="fa fa-edit"></i> Edit
                    </a> |
                    <a href="#" class="btn btn-default btn-xs black">
                      <i class="fa fa-trash-o"></i> Delete
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img alt="" src="<?php echo base_url();?>assets/img/avatar3_small.jpg"/>
                  </td>
                  <td>Ali Raza</td>
                  <td>454545454</td>
                  <td>Green House</td>
                  <td>2015 - 2016</td>
                  <td>ST-09992</td>
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
                  <td>
                    <img alt="" src="<?php echo base_url();?>assets/img/avatar3_small.jpg"/>
                  </td>
                  <td>Ali Raza</td>
                  <td>454545454</td>
                  <td>Green House</td>
                  <td>2015 - 2016</td>
                  <td>ST-09992</td>
                  <td >
                    <a href="#" class="btn btn-default btn-xs purple">
                      <i class="fa fa-edit"></i> Edit
                    </a> |
                    <a href="#" class="btn btn-default btn-xs black">
                      <i class="fa fa-trash-o"></i> Delete
                    </a>
                  </td>
                </tr>
                <!--<?php foreach($Student as $employee){?>
                          <tr>
                            <td>
                              <?php echo $employee->StudentId;?>
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


<div class="modal fade" id="mdlCreateStudent" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-small">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Create Student</h4>
      </div>
      <div class="portlet-body form">
        <div class="scroller" style="height: 350px; width:100px" data-always-visible="1" data-rail-visible1="1">
          <div class="portlet-body form">
            <form id="Form_Student" class="form-horizontal" method="post">
              <?php include('_createOrEditStudent.php');?>

            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
