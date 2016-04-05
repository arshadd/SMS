<div class="row">
  <div class="col-md-12">

    <div class="portlet">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-reorder"></i>Employee Information
        </div>
        <div class="tools">
          <a href="javascript:;" class="collapse"></a>
          <a href="#portlet-config" data-toggle="modal" class="config"></a>
          <a href="javascript:;" class="reload"></a>
          <a href="javascript:;" class="remove"></a>
        </div>
      </div>
      <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form action="#" class="form-horizontal">
          <div class="form-body">
            <h3 class="form-section">Account Info</h3>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label col-md-3">
                    Username:<span class='required'>*</span>
                  </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Username"/>
                    <span class="help-block">
                      This is inline help
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                  
              </div>
            </div>

            <h3 class="form-section">Personal Info</h3>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label col-md-3">
                    Photo:<span class='required'>*</span>
                  </label>
                  <div class="col-md-9">
                    <div class="thumbnail" style="width: 210px;">
                      <img src="<?php echo base_url();?>/assets/img/no-image.png" alt="" />
                    </div>
                    <div class="margin-top-10 fileupload fileupload-new" data-provides="fileupload" id="fileupload">
                      <div class="input-group input-group-fixed">
                        <span class="input-group-btn">
                          <span class="uneditable-input">
                            <i class="fa fa-file fileupload-exists"></i>
                            <span class="fileupload-preview">
                            </span>
                          </span>
                        </span>
                        <span class="btn btn-default btn-file">
                          <span class="fileupload-new">
                            <i class="fa fa-paper-clip"></i> Select file
                          </span>
                          <span class="fileupload-exists">
                            <i class="fa fa-undo"></i> Change
                          </span>
                          <input type="file" class="default" id="Photo" name="Photo" />

                        </span>
                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">
                          <i class="fa fa-trash-o"></i> Remove
                        </a>
                      </div>
                    </div>
                    <span class="help-block">
                      Provide photo
                    </span>

                    <span class="label label-danger">
                      NOTE!
                    </span>
                    <span>
                      Attached image
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <!--/row-->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label col-md-3">
                    Full Name:<span class='required'>*</span>
                  </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Chee Kin"/>
                    <span class="help-block">
                      This is inline help
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label col-md-3">
                    Father Name:<span class='required'>*</span>
                  </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Chee Kin"/>
                    <span class="help-block">
                      This is inline help
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <!--/row-->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label col-md-3">
                    Gender:<span class='required'>*</span>
                  </label>
                  <div class="col-md-9">
                    <div class="radio-list">
                      <label class="radio-inline">
                        <input type="radio" name="optionsRadios2" value="Male"/>
                        Male
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="optionsRadios2" value="Female" checked=""/>
                        Female
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label col-md-3">
                    Date of Birth:<span class='required'>*</span>
                  </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="dd/mm/yyyy"/>
                  </div>
                </div>
              </div>
            </div>
            <!--/row-->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label col-md-3">
                    Phone:<span class='required'>*</span>
                  </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder=""/>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label col-md-3">Email</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder=""/>
                  </div>
                </div>
              </div>
            </div>
            <!--/row-->

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label col-md-3">
                    Department:<span class='required'>*</span>
                  </label>
                  <div class="col-md-9">
                    <select class="select2_category form-control" data-placeholder="Choose a Department" tabindex="1">
                      <option value="Department 1">Department 1</option>
                      <option value="Department 2">Department 2</option>
                      <option value="Department 3">Department 5</option>
                      <option value="Department 4">Department 4</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label col-md-3">
                    Designation:<span class='required'>*</span>
                  </label>
                  <div class="col-md-9">
                    <select class="select2_category form-control" data-placeholder="Choose a Designation" tabindex="1">
                      <option value="Designation 1">Designation 1</option>
                      <option value="Designation 2">Designation 2</option>
                      <option value="Designation 3">Designation 5</option>
                      <option value="Designation 4">Designation 4</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <!--/row-->

            <h3 class="form-section">Address</h3>
            <!--/row-->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label col-md-3">
                    Address 1:<span class='required'>*</span>
                  </label>
                  <div class="col-md-9">
                    <textarea id="address1" rows="4" class="form-control"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label col-md-3">Address 2</label>
                  <div class="col-md-9">
                    <textarea id="address2" rows="4" class="form-control"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <!--/row-->
          </div>
          <div class="form-actions fluid">
            <div class="row">
              <div class="col-md-6">
                <div class="col-md-offset-3 col-md-9">
                  <button type="submit" class="btn btn-success">Save</button>
                  <button type="button" class="btn btn-default">Cancel</button>
                </div>
              </div>
              <div class="col-md-6">
              </div>
            </div>
          </div>
        </form>
        <!-- END FORM-->
      </div>
    </div>
  </div>

</div>