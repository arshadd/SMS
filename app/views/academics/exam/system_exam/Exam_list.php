<?php
$title = "Exam List";
$body_class ="page-header-fixed";

$pageCss  = array(
    '<link href="' . base_url() . 'assets/plugins/select2/select2_conquer.css" rel="stylesheet" type="text/css" />'
,'<link href="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.css" rel="stylesheet" type="text/css" />'
,'<link href="' . base_url() . 'assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" type="text/css" />'


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
            <h3 class="page-title"><i class="fa fa-tags icon-large"></i>
                System Exam List
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-cogs"></i>
                        <a href="#">Acadamic</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>/academics/exam/manage/index">Exam</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">System Exam List</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->


            <div class="row">
                <div class="col-md-12">
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-list-alt"></i>
                                Exam List
                            </div>
                            <div class="actions">
                                <a href="#" class="btn btn-primary addNewSubject"  onclick="ExamModule.addView();">
                                    <i class="fa fa-pencil-square-o"></i> Add New Exam
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table id="ExamGrid" class="table table-striped table-bordered table-hover table-full-width">
                                <thead>
                                <tr>
                                    <th class='hidden-xs'>Name</th>
                                    <!--<th class='hidden-xs'>Date</th>-->
                                    <th class='hidden-xs'>Description</th>
                                    <th class="hidden-xs">Manage</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1st Term</td>
                                        <!--<td>20 Jan, 2016</td>-->
                                        <td>First Term Exams</td>
                                        <td>
                                                <a href="#" class="btn btn-default btn-xs purple editView" data-id="5"><i class="fa fa-edit"></i> Edit</a>
                                                | <a href="#" class="btn btn-default btn-xs purple deleteView" data-id="6"><i class="fa fa-trash-o"></i> Delete</a>

                                         </td>
                                    </tr>
                                    <tr>
                                        <td>2nd Term</td>
                                        <!--<td>20 Jan, 2016</td>-->
                                        <td>Second Term Exams</td>
                                        <td>
                                            <a href="#" class="btn btn-default btn-xs purple editView" data-id="5"><i class="fa fa-edit"></i> Edit</a>
                                            | <a href="#" class="btn btn-default btn-xs purple deleteView" data-id="6"><i class="fa fa-trash-o"></i> Delete</a>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3rd Term</td>
                                        <!--<td>20 Jan, 2016</td>-->
                                        <td>Third Term Exams</td>
                                        <td>
                                            <a href="#" class="btn btn-default btn-xs purple editView" data-id="5"><i class="fa fa-edit"></i> Edit</a>
                                            | <a href="#" class="btn btn-default btn-xs purple deleteView" data-id="6"><i class="fa fa-trash-o"></i> Delete</a>

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>

</div>
<!-- END CONTAINER -->

<div id="mdlCreateExam" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="true" data-width="500">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Create Exam</h4>
    </div>
    <div class="modal-body">
        <?php include('Create_edit_Exam.php');?>
    </div>
</div>


<div id="mdlDeleteExam" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="true" data-width="400">
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


    //,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/moment.min.js" ></script>'
    //,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" ></script>'
);

$pageJsScript  = array(
    '<script type="text/javascript" src="' . base_url() . 'assets/js/util.js" ></script>'
    ,    '<script type="text/javascript" src="' . base_url() . 'assets/js/Academics/Exam/System_Exam/ExamModule.js" ></script>'

);

$pageJsCalls  = array(
'ExamModule.init()'
);

include(VIEW_PATH.'footer.php');
?>
