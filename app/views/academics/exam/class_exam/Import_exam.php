

<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-building"></i> Import Settings
                </div>
            </div>
            <div class="portlet-body form">
                <div class="form-horizontal" id="Form_Subject_Search">
                    <div class="form-body">

                        <div class="form-group">
                            <label class="control-label col-md-3">
                            <label class="">Import From</label>
                            </label>
                            <div class="col-md-9">

                                <div class="radio-list">
                                    <label class="radio-inline">
                                        <div class="radio" ><span class="checked"><input type="radio" name="optionsRadios" id="optionsRadios4" value="option1" checked=""></span></div> System </label>
                                    <label class="radio-inline">
                                        <div class="radio" ><span><input type="radio" name="optionsRadios" id="optionsRadios5" value="option2"></span></div> Class </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">
                                Class / Batch Name:
                            </label>
                            <div class="col-md-9">
                                <select id="subject_batch_id" name="subject_batch_id" class="form-control select2me input-xlarge">
                                </select>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt"></i>
                    Exam List
                </div>

                <div class="tools">

                </div>
            </div>
            <div class="portlet-body">
                <table id="ExamGrid" class="table table-striped table-bordered table-hover table-full-width">
                    <thead>
                    <tr>
                        <th class='hidden-xs' colspan="3">
                            <div class="checkbox-list">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="rdoMarkAll" value="P"/> Select All
                                </label>
                            </div>

                        </th>
                    </tr>
                    <tr>
                        <th class='hidden-xs'>Manage</th>
                        <th class='hidden-xs'>Name</th>
                        <th class='hidden-xs'>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="checkbox" name="asdfas" /></td>
                        <td>1st Term</td>
                        <td>First Term Exams</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="asdfas"/></td>
                        <td>2nd Term</td>
                        <td>Second Term Exams</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="asdfas"/></td>
                        <td>3rd Term</td>
                        <td>Third Term Exams</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="asdfas"/></td>
                        <td>1st Term</td>
                        <td>First Term Exams</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="asdfas"/></td>
                        <td>2nd Term</td>
                        <td>Second Term Exams</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="asdfas"/></td>
                        <td>3rd Term</td>
                        <td>Third Term Exams</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="asdfas"/></td>
                        <td>1st Term</td>
                        <td>First Term Exams</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="asdfas"/></td>
                        <td>2nd Term</td>
                        <td>Second Term Exams</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="asdfas"/></td>
                        <td>3rd Term</td>
                        <td>Third Term Exams</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="form-actions fluid">
                <div class="col-md-offset-3 col-md-9">
                    <a href="#" data-dismiss="modal" class="btn btn-default">
                        <i class="fa fa-mail-reply"></i> Close
                    </a>
                    <button class="btn btn-success" type="submit">
                        <i class="fa fa-chevron-circle-down"></i> Import
                    </button>
                    <label>
                        <div id="loader"><img
                                src="<?php echo base_url() . '/assets/img/input-spinner.gif'; ?>"/></div>
                    </label>
                </div>
            </div>

        </div>
    </div>
</div>
