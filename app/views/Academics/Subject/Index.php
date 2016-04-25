<?php
$title = "Subject Management";
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
			<h3 class="page-title">
				<i class="fa fa-building icon-large"></i>
				Subject
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb breadcrumb">
					<li>
						<i class="fa fa-cogs"></i>
						<a href="#">Academics</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Subject</a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->

			<div class="row">
				<div class="col-md-12">
						<div class="portlet-body">
							<div class="form-body well">
								<div class="row">
									<div class="col-md-4">
										<h3 class="page-title"><i class="fa fa-plus-circle icon-large"></i>
											<a href="#">Create Subject</a></h3>
										<p>
											Subject admission form.
										</p>
									</div>
									<div class="col-md-4">
										<h3 class="page-title"><i class="fa fa-search icon-large"></i>
											<a href="<?php echo site_url();?>/academics/subject/manage/search">Subject Search</a></h3>
										<p>
											Search, view, and maintain Subject records.
										</p>
									</div>
									<div class="col-md-4">
										<h3 class="page-title"><i class="fa fa-anchor icon-large"></i>
											<a href="#">Subject Association</a></h3>
										<p>
											Manage Employee subject association.
										</p>
									</div>
								</div>

								<div class="row">
									<div class="col-md-4">
										<h3 class="page-title"><i class="fa fa-print icon-large"></i>
											<a href="<?php echo site_url();?>/academics/subject/report/index">Report</a></h3>
										<p>
											Subject's Report.
										</p>
									</div>
									<!--<div class="col-md-4">
										<h3><i class="fa fa-search icon-large"></i><a href="#">Subject Search</a></h3>
										<p>
											Search, view, and maintain Subject records.
										</p>
									</div>
									<div class="col-md-4">
										<h3><i class="fa fa-list-ol icon-large"></i><a href="#">Manage Roll number</a></h3>
										<p>
											Manage Subject's roll numbers.
										</p>
									</div>-->
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


<?php

$pagePlugin  = array(
	'<script type="text/javascript" src="' . base_url() . 'assets/plugins/custom-datatable/jquery.dataTables.min.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/custom-datatable/DT_bootstrap.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/jquery-validation/dist/jquery.validate.min.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/select2/select2.min.js" ></script>'

,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js" ></script>'

,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-modal/js/bootstrap-modal.js"" ></script>'

	//,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/moment.min.js" ></script>'
	//,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker.js" ></script>'
,'<script type="text/javascript" src="' . base_url() . 'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" ></script>'
);

$pageJsScript  = array(
	'<script type="text/javascript" src="' . base_url() . 'assets/js/util.js" ></script>'
);

$pageJsCalls  = array(
	''
);

include(VIEW_PATH.'footer.php');
?>
