<?php $attributes = array("class" => "form-horizontal", "Id" => "Form_School");
      echo form_open_multipart("school/save", $attributes);?>

  <div class="form-body">
    <!-- Error Message will show up here -->
    <?php if (isset($error) && $error): ?>
      <div class="alert alert-danger display">
        <button data-close="alert" class="close"></button>
        <?php echo $error?>
      </div>
    <?php endif; ?>

    <?php if (isset($success) && $success): ?>
    <div class="alert alert-success display">
      <button data-close="alert" class="close"></button>
      <?php echo $success?>
    </div>
    <?php endif; ?>

    
    
    <input type="hidden" id="SchoolId" name="SchoolId" value="<?php echo $school->school_id ;?>" class="form-control" />
    <div class="form-group">
      <label class="control-label col-md-3">
        Name:<span class="required">*</span>
      </label>
      <div class="col-md-6">
        <input type="text" id="Name" name="Name" value="<?php echo $school->name ;?>" class="form-control" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3">
        Description:<span class="required">*</span>
      </label>
      <div class="col-md-6">
        <textarea id="Description" name="Description" rows="4" class="form-control"><?php echo $school->description ;?></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3">
        Address:<span class="required">*</span>
      </label>
      <div class="col-md-6">
        <input type="text" id="Address" name="Address" value="<?php echo $school->address ;?>" class="form-control" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3">
        Phone:<span class="required">*</span>
      </label>
      <div class="col-md-6">
        <input type="text" id="Phone" name="Phone" value="<?php echo $school->phone ;?>" class="form-control" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3">
        Email:
      </label>
      <div class="col-md-6">
        <input type="text" id="Email" name="Email" value="<?php echo $school->email ;?>" class="form-control" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3">
        Website:
      </label>
      <div class="col-md-6">
        <input type="text" id="Website" name="Website" value="<?php echo $school->website ;?>" class="form-control" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">
        Photo:
        <span class="required">
          *
        </span>
      </label>
      <div class="col-md-6">
        <div class="thumbnail" style="width: 310px;">
          <img id="Logo" name="Logo" src="<?php echo base_url().$school->logo ;?>" alt="" />
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
      </div>
    </div>
  </div>
  
</form>
