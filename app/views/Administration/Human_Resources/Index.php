<?php
$title = "Human Resources";
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
				<i class="fa fa-group icon-large"></i>
				HR Management
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb breadcrumb">
					<li>
						<i class="fa fa-cogs"></i>
						<a href="#">Administration</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">HR Management</a>
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
											<a href="#">Employee Admission</a></h3>
										<p>
											Employee admission form.
										</p>
									</div>
									<div class="col-md-4">
										<h3 class="page-title"><i class="fa fa-plane icon-large"></i>
											<a href="#">Leave Management</a></h3>
										<p>
											Manage employee attendance and leaves.
										</p>
									</div>
									<div class="col-md-4">
										<h3 class="page-title"><i class="fa fa-cog icon-large"></i>
											<a href="#">HR Settings</a></h3>
										<p>
											Set up and maintain Human Resources.
										</p>
									</div>
								</div>

								<div class="row">
									<div class="col-md-4">
										<h3 class="page-title"><i class="fa fa-money icon-large"></i>
											<a href="#">Payroll Management</a></h3>
										<p>
											Set up employee payroll and generate payslips.
										</p>
									</div>
									<div class="col-md-4">
										<h3 class="page-title"><i class="fa fa-check-circle icon-large"></i>
											<a href="<?php echo base_url();?>index.php/administration/hr/manage/employee_attendance">Employee Attendance</a></h3>
										<p>
											Set up employee attendances.
										</p>
									</div>
									<div class="col-md-4">
										<h3 class="page-title"><i class="fa fa-search icon-large"></i>
											<a href="<?php echo base_url();?>index.php/administration/hr/manage/employee_search">Employee Search</a></h3>
										<p>
											Search, view, and maintain employee records.
										</p>
									</div>
								</div>

								<div class="row">
									<div class="col-md-4">
										<h3 class="page-title"><i class="fa fa-anchor icon-large"></i>
											<a href="#">Subject Association</a></h3>
										<p>
											Assign an employee with one or more subjects.
										</p>
									</div>
									<div class="col-md-4">
										<h3 class="page-title"><i class="fa fa-print icon-large"></i>
											<a href="<?php echo base_url();?>index.php/administration/hr/report/index">Report</a></h3>
										<p>
											View report.
										</p>
									</div>
									<!--<div class="col-md-4">
										<h3><i class="fa fa-money icon-large"></i><a href="#">Employee Search</a></h3>
										<p>
											Set up employee payroll and generate payslips.
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
