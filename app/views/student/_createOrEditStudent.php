<form id="Form_School"  enctype="multipart/form-data" class="form-horizontal" method="post">

  <div class="form-body">

    <div class="alert alert-success display-hide">
      <button class="close" data-close="alert"></button>
      <span>
         School information saved successfully.
      </span>
    </div>
    <div class="alert alert-danger display-hide">
      <button class="close" data-close="alert"></button>
      <span>
         You have some form errors. Please check below.
      </span>
    </div>




    <input type="hidden" id="school_id" name="school_id" class="form-control" />

    <h4 >Person Info</h4>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label class="control-label col-md-3">
            Code:<span class="required">*</span>
          </label>
          <div class="col-md-6">
            <input type="text" id="code" name="code" class="form-control" />
          </div>
        </div>
      </div>
    </div>
    <h4 class="form-section">Person Info</h4>


    <div class="form-group">
      <label class="control-label col-md-3">
        Name:<span class="required">*</span>
      </label>
      <div class="col-md-6">
        <input type="text" id="name" name="name" class="form-control" />
      </div>
    </div>
    <h3 class="form-section">Person Info</h3>
    <div class="form-group">
      <label class="control-label col-md-3">
        Description:
      </label>
      <div class="col-md-6">
        <textarea id="description" name="description" rows="4" class="form-control"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3">
        Address:<span class="required">*</span>
      </label>
      <div class="col-md-6">
        <input type="text" id="address" name="address" class="form-control" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3">
        Phone:<span class="required">*</span>
      </label>
      <div class="col-md-6">
        <input type="text" id="phone" name="phone" class="form-control" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3">
        Email:
      </label>
      <div class="col-md-6">
        <input type="text" id="email" name="email" class="form-control" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3">
        Website:
      </label>
      <div class="col-md-6">
        <input type="text" id="website" name="website" class="form-control" />
      </div>
    </div>

    <!-- <div class="form-group">
       <label class="control-label col-md-3">
         Logo:
       </label>
       <div class="col-md-6">
         <div class="thumbnail" style="width: 310px;">
           <img id="logo" name="logo" alt="" />
         </div>
         <button class="btn btn-warning" id="btnUpload" type="button">
           <i class="fa fa-upload"></i> File Upload
         </button>
       </div>
     </div>-->

    <div class="form-group">
      <label class="control-label col-md-3">
        Photo:
        <span class="required">
          *
        </span>
      </label>
      <div class="col-md-6">
        <div class="thumbnail" style="width: 150px;">
          <img id="logo" name="logo" alt="" />
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
          Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only
        </span>
      </div>
    </div>

    <div class="form-actions fluid">
      <div class="col-md-offset-3 col-md-9">
        <a href="#" data-dismiss="modal" class="btn btn-default">
          <i class="fa fa-mail-reply"></i> Close
        </a>
        <button class="btn btn-success" type="submit">
          <i class="fa fa-save"></i> Save
        </button>
        <label ><div id="loader"><img  src="<?php echo base_url()."/assets/img/input-spinner.gif" ;?>"/></div></label>

      </div>
    </div>
  </div>

</form>
