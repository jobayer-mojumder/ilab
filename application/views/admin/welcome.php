<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include_once('top_global_header.php'); ?>

</head>

<body class="skin-blue sidebar-mini fixed">
	<div class="wrapper">

		<!-- Main Header -->
		<header class="main-header">
			<?php include_once('header.php'); ?>
			<!-- Header Navbar -->
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<?php include_once('admin_left.php'); ?>
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>
			<!-- Main content -->
			<section class="content">

				<div class="table-responsive">

					<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0  align="center"   class="table table-striped">
						
						<TR>
							<TD align=center style="color: #008a05"><h1></h1></TD>
						</TR>
						<TR>
							<TD align=center style="color: #008a05"><h1>WELCOME </h1></TD>
						</TR>
						<TR>
							<TD align=center style="color: #008a05"><h2> To </h2></TD>
						</TR>
						<TR>
							<TD align=center style="color: #008a05"></TD>
						</TR>
						<TR>
							<TD align=center style="color: #008a05"><img src="<?=base_url('admin_assets/admin_images/uni_logo_xs.png')?>"></TD>
						</TR>
						<TR>
							<TD align=center style="color: #008a05"><h1></h1></TD>
						</TR>

					</TABLE>
				</div>

			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Main Footer -->
<!----------------FOOTER------------------->
<?php include('admin_footer.php'); ?>
<!----------------END FOOTER------------------->

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
	immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="<?=base_url()?>admin_assets/admin_css/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url()?>admin_assets/admin_css/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>admin_assets/admin_css/dist/js/app.min.js"></script>
<script src="<?=base_url()?>admin_assets/admin_css/plugins/slimScroll/jquery.slimscroll.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
Both of these plugins are recommended to enhance the
user experience. Slimscroll is required when using the
fixed layout. -->
</body>
</HTML>