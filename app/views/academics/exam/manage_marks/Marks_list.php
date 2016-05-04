<?php
$title = "Manage Exam Marks";
$body_class ="page-header-fixed";

$pageCss  = array(
    '<link href="' . base_url() . 'assets/plugins/select2/select2_conquer.css" rel="stylesheet" type="text/css" />'
,'<link href="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.css" rel="stylesheet" type="text/css" />'

,'<link href="' . base_url() . 'assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />'
,'<link href="' . base_url() . 'assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />'

,'<link href="' . base_url() . 'assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />'
,'<link href="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />'

);


include(VIEW_PATH.'header.php');
?>

<!-- BEGIN BODY -->

<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">

    <?php $this->load->view('topheader') ?>

</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">

    <?php $this->load->view('leftnavigation') ?>

    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">
                <i class="fa fa-arrow-right icon-large"></i>
                Manage Exam Marks
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-cogs"></i>
                        <a href="#">Academics</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>/academics/exam/manage/index">Exam</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Manage Exam Marks</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->


            <div class="row">
                <div class="col-md-12">
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-building"></i> Class Details
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-horizontal">
                                <div class="form-body">

                                    <div class="form-group">
                                        <label class="control-label col-md-3">
                                            Class / Batch Name:
                                        </label>
                                        <div class="col-md-9">
                                            <select id="batch_id" name="batch_id" class="form-control select2me input-xlarge">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">
                                            Exam:
                                        </label>
                                        <div class="col-md-9">
                                            <select id="exam_id" name="exam_id" class="form-control select2me input-medium">
                                                <option>1st Term</option>
                                                <option>2nd Term</option>
                                                <option>3rd Term</option>
                                                <option>Half Yearly</option>
                                                <option>Final Exam</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">
                                            Subject:
                                        </label>
                                        <div class="col-md-9">
                                            <select id="subject_id" name="subject_id" class="form-control select2me input-medium">
                                                <option>Math</option>
                                                <option>English</option>
                                                <option>Science</option>
                                                <option>Urdu</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">
                                        </label>
                                        <div class="col-md-9">
                                            <button type="button" id="btnSearch" class="btn btn-info">
                                                <i class="fa fa-search"></i> Search
                                            </button>
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
                                <i class="fa fa-reorder"></i> Exam Marks
                            </div>
                            <div class="tools">

                            </div>
                        </div>

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

                        <div class="portlet-body form">
                            <form id="Form_Marks" class="form-horizontal" method="post">
                                <table id="MarksGrid" class="table table-striped table-bordered table-hover table-full-width">
                                    <thead>
                                    <tr>
                                        <th class="hidden-xs" colspan="6">
                                            <h4>
                                                <span class="label label-primary">Marks for 1st Terms, Class 1 : Subject : English</span>
                                            </h4>
                                        </th>
                                    </tr>

                                    <tr>
                                        <th class='hidden-xs'>#</th>
                                        <th class='hidden-xs'>Full Name</th>
                                        <th class='hidden-xs'>Roll #</th>
                                        <th class='hidden-xs'>Admission #</th>

                                        <th class='hidden-xs'>Marks Obtained</th>
                                        <th class='hidden-xs'>Comments</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                                <div class="form-actions right">
                                    <button type="button" id="btnSaveAttendance" class="btn btn-success"><i class="fa fa-arrow-right"></i> Save Exams Marks</button>
                                    <label>
                                        <div id="loader"><img src="<?php echo base_url() . '/assets/img/input-spinner.gif'; ?>"/></div>
                                    </label>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</div>
<!-- END CONTAINER -->


<?php

$pagePlugin  = array(
    '<script type="text/javascript" src="' . base_url() . 'assets/plugins/custom-datatable/jquery.dataTables.min.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/select2/select2.min.js" ></script>'


,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-modal/js/bootstrap-modal.js"" ></script>'

,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/moment.min.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" ></script>'
);

$pageJsScript  = array(
    '<script type="text/javascript" src="' . base_url() . 'assets/js/util.js" ></script>'
, '<script type="text/javascript" src="' . base_url() . 'assets/js/Academics/Exam/Manage_Marks/ExamMarksModule.js" ></script>'

);

$pageJsCalls  = array(
    'ExamMarksModule.init();'
);

include(VIEW_PATH.'footer.php');
?>




