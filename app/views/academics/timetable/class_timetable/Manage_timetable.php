<?php
$title = "Class / Batch Timetable";
$body_class ="page-header-fixed";

$pageCss  = array(
    '<link href="' . base_url() . 'assets/plugins/select2/select2_conquer.css" rel="stylesheet" type="text/css" />'
,'<link href="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.css" rel="stylesheet" type="text/css" />'
,'<link href="' . base_url() . 'assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" type="text/css" />'

, '<link href="' . base_url() . 'assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />'

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
            <h3 class="page-title"><i class="fa fa-calendar icon-large"></i>
                Class / Batch Timetable
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-cogs"></i>
                        <a href="#">Acadamic</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>/academics/timetable/manage/index">Timetable</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Class / Batch Timetable</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->


            <div class="row">
                <div class="col-md-12">
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-building"></i> Class / Batch Details
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-horizontal" id="Form_Subject_Search">
                                <div class="form-body">

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
                                Class / Batch Timetable Details
                            </div>
                            <div class="actions">
                                <a href="#" class="btn btn-primary addNewSubject"  onclick="SubjectAssociationModule.addView();">
                                    <i class="fa fa-pencil-square-o"></i> Add New Subject Association
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table id="SubjectAssociationGrid" class="table table-striped table-bordered table-hover table-full-width">
                                <thead>
                                <tr>
                                    <th class='hidden-xs'>Employee</th>
                                    <th class='hidden-xs'>Subject</th>
                                    <th class="hidden-xs">Manage</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-archive "></i> Preview
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-horizontal">
                                <div class="form-body">
                                    <div id="calendar" class="has-toolbar">
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- END CONTAINER -->

<div id="mdlCreateSubjectAssociation" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="true" data-width="500">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Create Subject Association</h4>
    </div>
    <div class="modal-body">
        <?php include('Create_edit_subject_association.php');?>
    </div>
    <!-- <div class="modal-footer">
       <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
       <button type="button" data-dismiss="modal" class="btn btn-info">Continue Task</button>
     </div>-->
</div>


<div id="mdlDeleteSubjectAssociation" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="true" data-width="400">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Confirm Delete</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="post">
            <div class="form-body">

                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                <span>
                   You have some form errors. Please check below.
                </span>
                </div>

                <div class="alert alert-info display">
              <span>
                 Are you sure want to delete?
              </span>
                </div>
                <input type="hidden" id="class_id" name="class_id" class="form-control"/>
                <div class="form-actions fluid">
                    <div class="col-md-offset-3 col-md-9">
                        <a href="#" data-dismiss="modal" class="btn btn-default">
                            <i class="fa fa-mail-reply"></i> Close
                        </a>
                        <button class="btn btn-success" id="btnDelete" type="button">
                            <i class="fa fa-trash-o"></i> Delete
                        </button>
                        <label>
                            <div id="loader"><img src="<?php echo base_url() . '/assets/img/input-spinner.gif'; ?>"/></div>
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>





<?php

$pagePlugin  = array(

    '<script type="text/javascript" src="' . base_url() . 'assets/plugins/custom-datatable/jquery.dataTables.min.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/select2/select2.min.js" ></script>'

,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-modal/js/bootstrap-modal.js" ></script>'

,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" ></script>'

    //,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/moment.min.js" ></script>'
    //,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" ></script>'
);

$pageJsScript  = array(
    '<script type="text/javascript" src="' . base_url() . 'assets/js/util.js" ></script>'
    ,    '<script type="text/javascript" src="' . base_url() . 'assets/js/Academics/Timetable/Class_Timetable/calendar.js" ></script>'

,'<script type="text/javascript" src="' . base_url() . 'assets/js/Academics/Subject/Subject_Association/SubjectAssociationModule.js" ></script>'
);

$pageJsCalls  = array(
    'SubjectAssociationModule.init();'
    ,'Calendar.init();'

);

include(VIEW_PATH.'footer.php');
?>
