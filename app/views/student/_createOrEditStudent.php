<form id="Form_Student" class="form-horizontal" method="post">

    <div class="form-body">

        <input type="hidden" id="student_id" name="student_id" class="form-control"/>
        <input type="hidden" id="user_id" name="user_id" class="form-control"/>

        <div class="alert alert-success display-hide">
            <button class="close" data-close="alert"></button>
      <span>
      </span>
        </div>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
        <span>
         You have some form errors. Please check below.
        </span>
        </div>

        <!--<h3 class="form-section">Admission Info</h3>-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Admission #:<span class="required">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="admission_no" name="admission_no" class="form-control"
                               placeholder="Admission #"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Admission date:<span class="required">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="admission_date" name="admission_date" class="form-control date-picker"
                               placeholder="Admission date" format="dd-MM-yyyy"/>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="form-section">Personal Detail</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label col-md-6">
                        First name:<span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" id="first_name" name="first_name" class="form-control"
                               placeholder="First name"/>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label col-md-6">
                        Middle name:
                    </label>
                    <div class="col-md-6">
                        <input type="text" id="middle_name" name="middle_name" class="form-control"
                               placeholder="Middle name"/>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label col-md-6">
                        Last name:<span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" id="last_name" name="last_name" class="form-control"
                               placeholder="Last name"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Date of birth:<span class="required">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="date_of_birth" name="date_of_birth" class="form-control date-picker"
                               placeholder="Date of birth" format="dd-MM-yyyy"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Gender:<span class="required">*</span>
                    </label>
                    <div class="col-md-8">
                        <select id="gender" name="gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Blood group:
                    </label>
                    <div class="col-md-8">
                        <select id="blood_group" name="blood_group" class="form-control">
                            <option value="Unknown">Unknown</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Place birth:
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="birth_place" name="birth_place" class="form-control"
                               placeholder="Place birth"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Nationality:
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="nationality" name="nationality" class="form-control"
                               placeholder="Nationality"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Religion:
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="religion" name="religion" class="form-control" placeholder="Religion"/>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="form-section">Contact Detail</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Phone 1:<span class="required">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="phone1" name="phone1" class="form-control" placeholder="Phone 1"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Phone 2:
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="phone2" name="phone2" class="form-control" placeholder="Phone 2"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Address 1:<span class="required">*</span>
                    </label>
                    <div class="col-md-8">
                        <textarea id="address_line1" name="address_line1" rows="4" class="form-control"
                                  placeholder="Address 1"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Address 2:
                    </label>
                    <div class="col-md-8">
                        <textarea id="address_line2" name="address_line2" rows="4" class="form-control"
                                  placeholder="Address 2"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="form-section">Guardian Detail</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Father name:<span class="required">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="father_name" name="father_name" class="form-control" placeholder="Father name"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Father contact:<span class="required">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="father_contact" name="father_contact" class="form-control" placeholder="Father contact"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Mother name:<span class="required">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="mother_name" name="mother_name" class="form-control" placeholder="Mother name"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Mother contact:<span class="required">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="mother_contact" name="mother_contact" class="form-control" placeholder="Mother contact"/>
                    </div>
                </div>
            </div>
        </div>


        <h4 class="form-section">Class & Batch Detail</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Class / Batch:<span class="required">*</span>
                    </label>
                    <div class="col-md-8">
                        <select id="batch_id" name="batch_id" class='form-control select2me'></select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Roll #:
                    </label>
                    <label id="roll_no_prefix"  class="control-label col-md-1">
                    </label>
                    <div class="col-md-7">
                        <input type="text" id="class_roll_no" name="class_roll_no" class="form-control input-small"
                               placeholder="Roll #"/>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="form-section">Settings</h4>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4">
                        Biometric #:
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="biometric_id" name="biometric_id" class="form-control"
                               placeholder="Biometric #"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <!--<label class="control-label col-md-4">
                      Address 2:<span class="required">*</span>
                    </label>
                    <div class="col-md-8">
                      <textarea id="description" name="description" rows="4" class="form-control"></textarea>
                    </div>-->
                </div>
            </div>
        </div>


        <h4 class="form-section">Upload Picture Detail</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label col-md-2">
                        Picture:<span class="required">*</span>
                    </label>
                    <div class="col-md-10">
                        <div class="thumbnail" style="width: 150px;">
                            <img id="photo" name="photo" alt="" src=""/>
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
              <input type="file" class="default" id="StudentPhoto" name="StudentPhoto"/>

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
                <label>
                    <div id="loader"><img src="<?php echo base_url() . "/assets/img/input-spinner.gif"; ?>"/></div>
                </label>
            </div>
        </div>

    </div>
</form>

