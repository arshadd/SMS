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
              Batches List
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
                  <th class='hidden-xs'>Start Date</th>
                  <th class='hidden-xs'>End Date</th>
                  <th class="hidden-xs">Manage</th>
                </tr>
              </thead>
              <tbody>
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

              <?php include('_createOrEditBatch.php');?>

          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="mdlDeleteBatch" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-small">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="scroller" style="height: 180px; width:100px" data-always-visible="1" data-rail-visible1="1">
        <div class="portlet-body form">
          <form id="Form_Batch" class="form-horizontal" method="post">

          <div class="form-body">
            <div class="alert alert-info display">
              <span>
                 Are you sure want to delete?
              </span>
            </div>
            <input type="hidden" id="class_id" name="class_id" class="form-control"/>
            <div class="form-actions fluid">
              <div class="col-md-offset-3 col-md-9">
                <a href="#" data-dismiss="modal" class="btn btn-default">
                  <i class="fa fa-mail-reply"></i> Close
                </a>
                <button class="btn btn-success" id="btnDelete" type="button">
                  <i class="fa fa-trash-o"></i> Delete
                </button>
                <label>
                  <div id="loader"><img src="<?php echo base_url() . '/assets/img/input-spinner.gif'; ?>"/></div>
                </label>
              </div>
            </div>
          </div>
            </form>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


