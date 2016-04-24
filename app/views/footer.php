<!-- BEGIN COPYRIGHT -->
<div class="footer hidden-print">
  <div class="footer-inner">
    2016 &copy; School Management System by Codaira.
  </div>
  <div class="footer-tools">
    <span class="go-top hidden-xs">
      <i class="fa fa-angle-up"></i>
    </span>
  </div>
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>assets/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/jquery-1.10.2.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/jquery.blockui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/jquery.cokie.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/uniform/jquery.uniform.min.js"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php foreach ($pagePlugin as $plugin)
{
    echo $plugin.PHP_EOL;
}
?>
<!-- END PAGE LEVEL PLUGINS -->


<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/app.js"></script>
<?php foreach ($pageJsScript as $jsScript)
{
    echo $jsScript.PHP_EOL;
}
?>
<!-- END PAGE LEVEL SCRIPTS -->

<script>
jQuery(document).ready(function() {
App.init();
<?php foreach ($pageJsCalls as $jsCall)
{
  echo $jsCall.PHP_EOL;
}
?>
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>