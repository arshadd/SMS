<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <form id="Form_Exam" class="form-horizontal" method="post">

                <div class="form-body">

                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button>
                          <span>
                             You have some form errors. Please check below.
                          </span>
                    </div>

                    <input type="hidden" id="class_id" name="class_id" class="form-control"/>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            Name:<span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                            <input type="text" id="code" name="code" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">
                            Description:<span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                            <textarea id="desc" name="desc" class="form-control" rows="4">
                            </textarea>
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
                                <div id="loader"><img
                                        src="<?php echo base_url() . '/assets/img/input-spinner.gif'; ?>"/></div>
                            </label>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>
</div>