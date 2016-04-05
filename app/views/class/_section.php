<div class="row">
  <div class="col-md-12">

    <div class="alert alert-success display-hide">
      <button data-close="alert" class="close"></button>
      Section Information saved successfully.
    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="portlet">
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-cogs"></i>Class's Sections
            </div>
            <div class="actions">
              <a href="#" class="btn btn-primary" onclick="SectionModule.addView();">
                <i class="fa fa-pencil-square-o"></i> Add New Section
              </a>
            </div>
          </div>
          <div class="portlet-body">
            <table id="SectionGrid" class="table table-striped table-bordered table-hover table-full-width">
              <thead>
                <tr>
                  <th class='hidden-xs'>Code</th>
                  <th class='hidden-xs'>Section Name</th>
                  <th class="hidden-xs">Manage</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>SEC-01</td>
                  <td>Green House</td>
                  <td>
                    <a href=""
                      <?php echo base_url();?>/index.php/Section/edit/1" class="btn btn-default btn-xs purple">
                      <i class="fa fa-edit"></i> Edit
                    </a> |
                    <a href="#" class="btn btn-default btn-xs black">
                      <i class="fa fa-trash-o"></i> Delete
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>SEC-02</td>
                  <td>Blue House</td>
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
                  <td>SEC-03</td>
                  <td>Red House</td>
                  <td >
                    <a href="#" class="btn btn-default btn-xs purple">
                      <i class="fa fa-edit"></i> Edit
                    </a> |
                    <a href="#" class="btn btn-default btn-xs black">
                      <i class="fa fa-trash-o"></i> Delete
                    </a>
                  </td>
                </tr>
                <!--<?php foreach($Section as $employee){?>
                          <tr>
                            <td>
                              <?php echo $employee->SectionId;?>
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

<div class="modal fade" id="mdlCreateSection" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-small">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Create Section</h4>
      </div>
      <div class="portlet-body form">
        <div class="scroller" style="height: 350px; width:100px" data-always-visible="1" data-rail-visible1="1">
          <div class="portlet-body form">
            <form id="Form_Section" class="form-horizontal" method="post">
              <?php include('_createOrEditSection.php');?>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>