<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include_once(__DIR__ .'/../top_global_header.php'); ?>
	<link href="<?=base_url()?>admin_assets/admin_css/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css">
</head>

<body class="skin-blue sidebar-mini fixed">
	<div class="wrapper">

		<!-- Main Header -->
		<header class="main-header">
			<?php include_once(__DIR__ .'/../header.php'); ?>
			<!-- Header Navbar -->
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<?php include_once(__DIR__ .'/../admin_left.php'); ?>
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<section class="content">

				<div class="row">
					<div class="col-xs-12">
						<div class="box box-info">
							<div class="box-header with-border">
								<h4 class="box-name">Group Edit</h4>
							</div>
							<?php if($this->session->flashdata('msg') && $this->session->flashdata('msg') != ""){ ?>
								<div class="col-sm-10 col-sm-offset-4">
									<p style="color: blue"><?php echo ucwords($this->session->flashdata('msg')); ?></p>
								</div>			
							<?php } ?>

							<?php if( validation_errors() != false ){ ?>
								<div class="col-sm-10 col-sm-offset-4">
									<p style="color: red"><?php echo validation_errors(); ?></p>
								</div>			
							<?php } ?>
							<form class="form-horizontal" method="post" action="<?=site_url('user_admin/group_edit/'.$results->id)?>" enctype="multipart/form-data">
								<div class="box-body">

									<div class="form-group">
										<label for="title" class="col-sm-2 control-label">Group Name</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="name" name="name" placeholder="Name Here" required value="<?=$results->name?>">
										</div>
									</div>

									<div class="form-group">
										<label for="title" class="col-sm-2 control-label">Access Module</label>
										<div class="col-sm-8">
											<div style="height: 350px; overflow-y: scroll;">
												<?php
												$checked = '';
												$parent = '';
												foreach ($modules as $module) {
													foreach ($access as $per) {
														if ($per->a_module==$module->m_id) {
															$checked = 'checked';
															break;
														} else {
															$checked = '';
														}
														
													}
													if($parent != $module->m_parent){
														$parent = $module->m_parent;
														?>
														<div class="col-sm-12" style="margin-left: 0px; padding-left: 0px;">
															<br><h4 style="color: #008a05;"><?=$module->m_parent?></h4>
														</div>
													<?php } ?>
													<div class="col-sm-4" style="padding: 5px;">
														<input <?=$checked?> class="flat-blue" type="checkbox" name="module_name[]" value="<?=$module->m_id?>">&nbsp;&nbsp;<?=$module->m_name?>
													</div>
												<?php } ?>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label for="status" class="col-sm-2 control-label">Publish</label>
										<div class="col-sm-2">
											<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="status" id="status">
												<option value="1" <?php if($results->status==1) echo "selected";?> >Yes</option>
												<option value="0" <?php if($results->status==0) echo "selected";?>>No</option>
											</select>
										</div>
									</div>

								</div>

								<div class="box-footer">
									<div class="col-sm-12"> 
										<div class="col-sm-4 col-md-offset-2">
											<button type="submit" name="submit" class="btn btn-info"> Update </button>
										</div>
									</div>
								</div>
								<br>
							</form>
						</div>
					</div>
				</div>

			</section>
			<!-- /.content -->
		</div>


		<?php include(__DIR__ .'/../admin_footer.php'); ?>
		<div class="control-sidebar-bg"></div>
	</div>

	<!-- jQuery 2.2.3 -->
	<script src="<?=base_url()?>admin_assets/admin_css/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?=base_url()?>admin_assets/admin_css/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>admin_assets/admin_css/dist/js/app.min.js"></script>
<script src="<?=base_url()?>admin_assets/admin_css/plugins/slimScroll/jquery.slimscroll.js"></script>
	<script src="<?=base_url()?>admin_assets/admin_css/plugins/datepicker/bootstrap-datepicker.js"></script>
	<script src="<?=base_url()?>admin_assets/admin_css/plugins/iCheck/icheck.min.js"></script>

	<script type="text/javascript">
		$('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
			checkboxClass: 'icheckbox_flat-blue',
			radioClass   : 'iradio_flat-blue'
		})

	</script>

	<script language="JavaScript">
		$(document).ready(function() {
			$('#date')
			.datepicker({
				format: 'yyyy-mm-dd',
				todayHighlight:true,
				showTodayButton:true,
				autoclose: true,
				clearBtn:true,
				showClose:true,
			})

		});
	</script>

</body>
</HTML>