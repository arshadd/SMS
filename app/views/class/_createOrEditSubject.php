<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <form id="Form_Subject" class="form-horizontal" method="post">

                <div class='form-body'>
                    <div class='alert alert-danger display-hide'>
                        <button data-close='alert' class='close'></button>
                        You have some form errors. Please check below.
                    </div>

                    <input type="hidden" id="subject_id" name="subject_id" class="form-control"/>
                    <input type="hidden" id="batch_id" name="batch_id" class="form-control"/>

                    <div class='form-group'>
                        <label class='control-label col-md-3'>
                            Code:<span class='required'>*</span>
                        </label>
                        <div class='col-md-9'>
                            <input type='text' id='code' name='code' class='form-control'/>
                        </div>
                    </div>


                    <div class='form-group'>
                        <label class='control-label col-md-3'>
                            Name:<span class='required'>*</span>
                        </label>
                        <div class='col-md-9'>
                            <input type='text' id='name' name='name' class='form-control'/>
                        </div>
                    </div>


                    <div class='form-group'>
                        <label class='control-label col-md-3'>
                            Max weekly classes:
                        </label>
                        <div class='col-md-9'>
                            <input type='text' id='max_weekly_classes' name='max_weekly_classes' class='form-control'/>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label class='control-label col-md-3'>
                            Credit hours:
                        </label>
                        <div class='col-md-9'>
                            <input type='text' id='credit_hours' name='credit_hours' class='form-control'/>
                        </div>
                    </div>

                    <div class='form-actions fluid'>
                        <div class='col-md-offset-3 col-md-9'>
                            <a href="#" data-dismiss="modal" class="btn btn-default">
                                <i class="fa fa-mail-reply"></i> Close
                            </a>
                            <button class='btn btn-success' type='submit'>
                                <i class='fa fa-save'></i> Save
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>