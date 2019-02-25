<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<?php include_once 'top_global_header.php';?>
		<script language="JavaScript">
			function pss_valid(){
		var un = document.RegForm.curr_pass.value;
        var cp = document.RegForm.pre_pass.value;
		if (document.RegForm.curr_pass.value==""){
				alert("Please enter current password!");
				document.RegForm.curr_pass.focus();
				return false;
			}
		if (un!=cp){
				alert("Sorry this is not Your current Password !");
				document.RegForm.curr_pass.focus();
				return false;
			     }
		}
		</script>
		<script language="JavaScript">
			function Form_valid(){
		var un = document.RegForm.curr_pass.value;
        var cp = document.RegForm.pre_pass.value;

			if(document.RegForm.name.value==""){
				alert("Please Enter Your User Name ");
				document.RegForm.name.focus();
				return false;
			}
if(document.RegForm.email.value==""){
			alert("Please Enter Email Address ");
			document.RegForm.email.focus();
			return false;
		}
var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(document.RegForm.email.value!="" && !regex.test(document.RegForm.email.value)){
alert("Please input a valid e-mail address");
		document.RegForm.email.focus();
		return false;
	}
			if (document.RegForm.curr_pass.value==""){
				alert("Please enter current password!");
				document.RegForm.curr_pass.focus();
				return false;
			}
			if (un!=cp){
				alert("Sorry this is not Your current Password !");
				document.RegForm.curr_pass.focus();
				return false;
			}
			if (document.RegForm.new_pass.value==""){
				alert("Enter new password!");
				document.RegForm.new_pass.focus();
				return false;
			}
			if (document.RegForm.confirm_pass.value==""){
				alert("Retype new password!");
				document.RegForm.confirm_pass.focus();
				return false;
			}
			if (document.RegForm.new_pass.value != document.RegForm.confirm_pass.value){
				alert("Passwords do not match!");
				document.RegForm.confirm_pass.focus();
				return false;
			}
			return true;
		}
	</script>
		<style>
			.add{
	background-color:#D70000;
	color:#FFF;
	 font-size:14px;
	 border-radius: 5px 5px 5px 5px;
	 font-weight:bold;
	 width:100px;
	 height:20px;
	 border:1px solid #000;
	redious:5px;


	}
	.add:hover{background-color:#FF4040;
	color:#FFF;
	font-size:14px;
	 border-radius: 5px 5px 5px 5px;
	 font-weight:bold;
	 width:100px;
	 height:20px;
	border:1px solid #000;
	redious:5px;}
</style>
	</head>

	<body class="skin-blue sidebar-mini fixed">
		<div class="wrapper">

			<!-- Main Header -->
			<header class="main-header">
				<?php include_once 'header.php';?>
				<!-- Header Navbar -->
			</header>
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<?php include_once 'admin_left.php';?>

			</aside>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<?php if (isset($msg) && $msg != "") {echo "<div><h5><font color=EE0000>" . $msg . "</font></h5></div>";}?>
				</section>
				<section class="content">
					<div class="panel">
						<div class="row">
							<div class="col-md-6">
								<!-- general form elements -->
								<div class="box box-primary">
									<div class="box-header with-border">
										<h3 class="box-title">Profile Update</h3>
									</div>
									<!-- /.box-header -->
									<!-- form start -->
									<form method="POST" action="<?=site_url('admin/pass');?>" name="RegForm" onSubmit="return Form_valid();">
										<div class="box-body">
											<div class="form-group">
												<label for="exampleInputEmail1">New User Name</label>&nbsp; <span style="font-size:11px; caption-side:bottom;color:#C00;">Min_length[5]
												</span>
												<input class="form-control" id="exampleInputEmail1" type="hidden" name="aid" value="<?=$curr_info->ad_id;?>"
												 size=40>
												<input class="form-control" type=text name="name" value="<?=$curr_info->username;?>" size=40>

											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">New Email Address</FONT></label>
												<input type=text name="email" value="<?=$curr_info->email;?>" class="form-control" size=40>
											</div>

											<div class="form-group">
												<?php $pass = $this->encrypt->decode($curr_info->password);?>
												<label for="exampleInputPassword1">Current Password</FONT></label>
												<input type=hidden name="pre_pass" value="<?=$pass?>" class="form-control" size=40>
												<input type=password name="curr_pass" value="" class="form-control" size=40>
											</div>

											<div class="form-group">
												<label for="exampleInputPassword1">New Password</FONT></label>
												<input type=password name="new_pass" value="" class="form-control" size=40 onFocus="pss_valid();">
											</div>

											<div class="form-group">
												<label for="exampleInputPassword1">Retype Password</FONT></label>
												<input type=password name="confirm_pass" value="" class="form-control" size=40>
											</div>



										</div>
										<!-- /.box-body -->

										<div class="box-footer">
											<button type="submit" name="updPass" class="btn btn-primary">Save</button>
										</div>
									</form>
								</div>
							</div>

						</div>
					</div>
				</section>
				<!-- Main content -->

				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

			<!-- Main Footer -->
			<!----------------FOOTER------------------->
			<?php include 'admin_footer.php';?>
			<!----------------END FOOTER------------------->

			<!-- Control Sidebar -->
			<aside class="control-sidebar control-sidebar-dark">
				<!-- Create the tabs -->
				<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
					<li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
					<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<!-- Home tab content -->
					<div class="tab-pane active" id="control-sidebar-home-tab">
						<h3 class="control-sidebar-heading">Recent Activity</h3>
						<ul class="control-sidebar-menu">
							<li>
								<a href="javascript::;">
									<i class="menu-icon fa fa-birthday-cake bg-red"></i>

									<div class="menu-info">
										<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

										<p>Will be 23 on April 24th</p>
									</div>
								</a>
							</li>
						</ul>
						<!-- /.control-sidebar-menu -->

						<h3 class="control-sidebar-heading">Tasks Progress</h3>
						<ul class="control-sidebar-menu">
							<li>
								<a href="javascript::;">
									<h4 class="control-sidebar-subheading">
										Custom Template Design
										<span class="pull-right-container">
											<span class="label label-danger pull-right">70%</span>
										</span>
									</h4>

									<div class="progress progress-xxs">
										<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
									</div>
								</a>
							</li>
						</ul>
						<!-- /.control-sidebar-menu -->

					</div>
					<!-- /.tab-pane -->
					<!-- Stats tab content -->
					<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
					<!-- /.tab-pane -->
					<!-- Settings tab content -->
					<div class="tab-pane" id="control-sidebar-settings-tab">
						<form method="post">
							<h3 class="control-sidebar-heading">General Settings</h3>

							<div class="form-group">
								<label class="control-sidebar-subheading">
									Report panel usage
									<input type="checkbox" class="pull-right" checked>
								</label>

								<p>
									Some information about this general settings option
								</p>
							</div>
							<!-- /.form-group -->
						</form>
					</div>
					<!-- /.tab-pane -->
				</div>
			</aside>
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

	</body>

</HTML>