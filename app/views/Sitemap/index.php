<?php
$title = "Sitemap";
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
				<i class="fa fa-sitemap icon-large"></i>
				Sitemap
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb breadcrumb">
					<li>
						<i class="fa fa-cogs"></i>
						<a href="#">Sitemap</a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->

			<div class="row">
				<div class="col-md-12">
						<div class="portlet-body">
							<div class="form-body">
								<ul class="menu">
									<li><h4><i class="fa fa-dashboard icon-large"></i><a href="#">Dashboard</a></h4></li>

									<li><h4><i class="fa fa-cogs icon-large"></i><a href="#">Administration</a></h4></li>
									<ul class="sub-menu">
										<li><h5><i class="fa fa-cogs icon-large"></i><a href="#">Settings</a></h5></li>
										<li><h5><i class="fa fa-user icon-large"></i><a href="#">User Management</a></h5></li>
										<li><h5><i class="fa fa-group icon-large"></i><a href="#">Human Resource</a></h5></li>
										<ul class="sub-menu">
											<li><h5><i class="fa fa-user icon-large"></i><a href="#">Employee Management</a></h5></li>
											<li><h5><i class="fa fa-leaf icon-large"></i><a href="#">Leave Management</a></h5></li>
											<li><h5><i class="fa fa-upload icon-large"></i><a href="#">HR Settings</a></h5></li>
											<li><h5><i class="fa fa-money icon-large"></i><a href="#">Payroll / Payslip Management</a></h5></li>
										</ul>

									<li><h4><i class="fa fa-book icon-large"></i><a href="#">Academics</a></h4></li>


									<li><h4><i class="fa fa-sitemap icon-large"></i><a href="#">Sitemap</a></h4></li>

									<!--<ul class="sub-menu">
										<li><h3><i class="fa fa-calendar icon-large"></i><a href="page_blog_item.html">Link 1.1</a></h3></li>
										<ul class="sub-menu">
											<li><h3><i class="fa fa-calendar icon-large"></i><a href="page_blog_item.html">Link 1.1</a></h3></li>
											<ul class="sub-menu">
												<li><h4><i class="fa fa-calendar icon-large"></i><a href="page_blog_item.html">Link 1.1</a></h4></li>
												<ul class="sub-menu">
													<li><h5><i class="fa fa-calendar icon-large"></i><a href="page_blog_item.html">Link 1.1</a></h5></li>
													<ul class="sub-menu">
														<li><h6><i class="fa fa-calendar icon-large"></i><a href="page_blog_item.html">Link 1.1</a></h6></li>
														<li><h6><i class="fa fa-calendar icon-large"></i><a href="page_blog_item.html">Link 1.1</a></h6></li>
														<li><h6><i class="fa fa-calendar icon-large"></i><a href="page_blog_item.html">Link 1.1</a></h6></li>
													</ul>
													<li><h5><i class="fa fa-calendar icon-large"></i><a href="page_blog_item.html">Link 1.1</a></h5></li>
													<li><h5><i class="fa fa-calendar icon-large"></i><a href="page_blog_item.html">Link 1.1</a></h5></li>

												</ul>

												<li><h4><i class="fa fa-calendar icon-large"></i><a href="page_blog_item.html">Link 1.1</a></h4></li>
											</ul>
											<li><h3><i class="fa fa-calendar icon-large"></i><a href="page_blog_item.html">Link 1.1</a></h3></li>
										</ul>
									</ul>
									-->

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
	'<script type="text/javascript" src="' . base_url() . 'assets/module/util.js" ></script>'
);

$pageJsCalls  = array(
	''
);

include(VIEW_PATH.'footer.php');
?>
