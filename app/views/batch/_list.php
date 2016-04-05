<div class="alert alert-success display-hide">
  <button data-close="alert" class="close"></button>
  Batch Information saved successfully.
</div>
<div class="row">
  <div class="col-md-12">
    <div class="portlet-body util-btn-margin-bottom-5">
      <button class="btn btn-primary" onclick="BatchModule.addView();">
        <i class="fa fa-pencil-square-o"></i>&nbsp;Add New Batch
      </button>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="portlet">
      <div class="portlet-title">
        <div class="caption">
          Batch List
        </div>
      </div>
      <div class="portlet-body">
        <table id="BatchGrid" class="table table-striped table-bordered table-hover table-full-width">
          <thead>
            <tr>
              <th class='hidden-xs'>Class Name</th>
              <th class='hidden-xs'>Batch Name</th>
              <th class='hidden-xs'>Default</th>
              <th class="hidden-xs">Manage</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Class 1</td>
              <td>2014 - 2015</td>
              <td>No</td>
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
              <td>Class 1</td>
              <td>2015 - 2016</td>
              <td>No</td>
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
              <td>Class 2</td>
              <td>2014 - 2015</td>
              <td>No</td>
              <td >
                <a href="#" class="btn btn-default btn-xs purple">
                  <i class="fa fa-edit"></i> Edit
                </a> |
                <a href="#" class="btn btn-default btn-xs black">
                  <i class="fa fa-trash-o"></i> Delete
                </a>
              </td>
            </tr>
            <!--<?php foreach($Batch as $employee){?>
                          <tr>
                            <td>
                              <?php echo $employee->BatchId;?>
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