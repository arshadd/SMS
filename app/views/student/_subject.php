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
      Subject Information saved successfully.
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="portlet">

          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-cogs"></i>Employee's Subjects
            </div>
            <!--<div class="actions">
              <a href="#" class="btn btn-primary" onclick="SubjectModule.addView();">
                <i class="fa fa-pencil-square-o"></i> Add New Subjects
              </a>
            </div>-->
          </div>
      
          <div class="portlet-body">
            <table id="SubjectGrid" class="table table-striped table-bordered table-hover table-full-width">
              <thead>
                <tr>
                  <th class='hidden-xs'>Class' Name</th>
                  <th class='hidden-xs'>Section's Name</th>
                  <th class='hidden-xs'>Subject's Name</th>
                  <th class="hidden-xs">Manage</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Class 1</td>
                  <td>Green House</td>
                  <td>
                    <span class="label label-default">Science</span>
                  </td>
                  <td>
                    <a href="<?php echo base_url();?>/index.php/classes/edit/1" class="btn btn-default btn-xs purple">
                      <i class="fa fa-edit"></i> Edit
                    </a> |
                    <a href="#" class="btn btn-default btn-xs black">
                      <i class="fa fa-trash-o"></i> Delete
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>Class 1</td>
                  <td>Blue House</td>
                  <td>
                    <span class="label label-success">Math</span>
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
                  <td>Class 2</td>
                  <td>Red House</td>
                  <td>
                    <span class="label label-danger">English</span>
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
                <tr>
                  <td>Class 3</td>
                  <td>Blue House</td>
                  <td>
                    <span class="label label-warning">Urdu</span>
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
                <!--<?php foreach($Subject as $employee){?>
                          <tr>
                            <td>
                              <?php echo $employee->SubjectId;?>
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


<div class="modal fade" id="mdlCreateSubject" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-small">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Create Subject</h4>
      </div>
      <div class="portlet-body form">
        <div class="scroller" style="height: 350px; width:100px" data-always-visible="1" data-rail-visible1="1">
          <div class="portlet-body form">
            <form id="Form_Subject" class="form-horizontal" method="post">
              <?php include('_createOrEditSubject.php');?>

            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
