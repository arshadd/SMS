<div class="row">
  <div class="col-md-12">
    <div class="alert alert-success display-hide">
      <button data-close="alert" class="close"></button>
      Batch Information saved successfully.
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="portlet">
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-cogs"></i>Class's Batches
            </div>
            <div class="actions">
              <a href="#" class="btn btn-primary" onclick="BatchModule.addView();">
                <i class="fa fa-pencil-square-o"></i> Add New Batch
              </a>
            </div>
          </div>
          <div class="portlet-body">
            <table id="BatchGrid" class="table table-striped table-bordered table-hover table-full-width">
              <thead>
                <tr>
                  <th class='hidden-xs'>Batch Name</th>
                  <th class='hidden-xs'>Default</th>
                  <th class="hidden-xs">Manage</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>2014 - 2015</td>
                  <td>
                    <span class="label label-danger">No</span>
                  </td>
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
                  <td>2015 - 2016</td>
                  <td>
                    <span class="label label-danger">No</span>
                  </td>
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
                  <td>2016 - 2017</td>
                  <td>
                    <span class="label label-success">Yes</span>
                  </td>
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

  </div>
</div>

<div class="modal fade" id="mdlCreateBatch" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-small">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Create Batch</h4>
      </div>
      <div class="portlet-body form">
        <div class="scroller" style="height: 350px; width:100px" data-always-visible="1" data-rail-visible1="1">
          <div class="portlet-body form">
            <form id="Form_Batch" class="form-horizontal" method="post">
              <?php include('_createOrEditBatch.php');?>

            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
