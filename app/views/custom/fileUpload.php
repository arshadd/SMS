<div class="modal fade" id="mdlFileUpload" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-wide">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Upload File</h4>
            </div>
            <div class="scroller" style="height: 300px; width:100px" data-always-visible="1" data-rail-visible1="1">
                <div class="portlet-body form">

                    <?php $attributes = array("class" => "login-form", "id" => "Form_Upload");
                    echo form_open_multipart("uploader/upload", $attributes);?>

<!--                    <form id="Form_Upload" enctype="multipart/form-data" action="" class="form-horizontal" method="post">
-->
                        <div class="form-body">

                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                  <span>
                                     You have some form errors. Please check below.
                                  </span>
                            </div>

                            <div class="alert alert-success display-hide">
                                <button class="close" data-close="alert"></button>
                                  <span>
                                     School information saved successfully.
                                  </span>
                            </div>


                            <input type="hidden" id="type" name="type" class="form-control"/>


                            <div class="form-group">
                                <label class="control-label col-md-2">
                                    Photo:
                                    <span class="required">
                                      *
                                    </span>
                                </label>
                                <div class="col-md-10">
                                    <div class="thumbnail" style="width: 310px;">
                                        <img id="logo" name="logo" alt=""/>
                                    </div>
                                    <div class="margin-top-10 fileupload fileupload-new" data-provides="fileupload"
                                         id="fileupload">
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
                                              <input type="file" class="default" id="Photo" name="Photo"/>

                                            </span>
                                            <a href="#" class="btn btn-danger fileupload-exists"
                                               data-dismiss="fileupload">
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
                                    <button class="btn btn-success" id="btnUpload" type="submit">
                                        <i class="fa fa-upload"></i> Upload
                                    </button>
                                    <label>
                                        <div id="loader"><img
                                                src="<?php echo base_url() . '/assets/img/input-spinner.gif'; ?>"/>
                                        </div>
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
