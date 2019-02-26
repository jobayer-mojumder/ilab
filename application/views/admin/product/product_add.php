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
								<h4 class="box-name">Products ADD</h4>
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
							<form class="form-horizontal" method="post" action="<?=site_url('products_admin/product_add')?>" enctype="multipart/form-data">
								<div class="box-body">

									<div class="form-group">
										<label for="status" class="col-sm-2 control-label">Product category</label>
										<div class="col-sm-2">
											<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="product_category" id="product_category" required>
												<option value="">Select</option>
												<option value="Health">Health</option>
												<option value="Education">Education</option>
												<option value="Environment">Environment</option>
												<option value="Disability">Disability</option>
												<option value="Agriculture">Agriculture</option>
												<option value="Industry">Industry</option>
												<option value="Hill track">Hill track</option>
												<option value="Ek-Shop">Ek-Shop</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label for="product_name" class="col-sm-2 control-label">Product name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product name Here" required value="">
										</div>
									</div>

									<div class="form-group">
										<label for="product_description" class="col-sm-2 control-label">Product description</label>
										<div class="col-sm-9">
											<textarea type="text" class="form-control" id="product_description" name="product_description"></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="image1" class="col-sm-2 control-label">Product Image 1</label>
										<div class="col-sm-4">
											<input type="file" class="form-control" id="image1" name="image1" > 
										</div>
									</div>

									<div class="form-group">
										<label for="image1" class="col-sm-2 control-label">Product Image 2</label>
										<div class="col-sm-4">
											<input type="file" class="form-control" id="image2" name="image2" > 
										</div>
									</div>

									<div class="form-group">
										<label for="product_video" class="col-sm-2 control-label">Product video</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="product_video" name="product_video" placeholder="Product video Here" value="">
										</div>
									</div>

									<div class="form-group">
										<label for="product_innovator_name" class="col-sm-2 control-label">Product innovator name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="product_innovator_name" name="product_innovator_name" placeholder="Product innovator_name Here" required value="">
										</div>
									</div>

									<div class="form-group">
										<label for="image3" class="col-sm-2 control-label">Product innovator image</label>
										<div class="col-sm-4">
											<input type="file" class="form-control" id="image3" name="image3" > 
										</div>
									</div>

									<div class="form-group">
										<label for="product_cost_tk" class="col-sm-2 control-label">Product cost (tk)</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="product_cost_tk" name="product_cost_tk" placeholder="Product cost in tk Here" required value="">
										</div>
									</div>

									<div class="form-group">
										<label for="product_cost_tk" class="col-sm-2 control-label">Product cost (Dollar)</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="product_cost_doller" name="product_cost_doller" placeholder="Product cost in dollar Here" required value="">
										</div>
									</div>

									<div class="form-group">
										<label for="status" class="col-sm-2 control-label">Publish</label>
										<div class="col-sm-2">
											<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="status" id="status">
												<option value="1">Yes</option>
												<option value="0">No</option>
											</select>
										</div>
									</div>

								</div>

								<div class="box-footer">
									<div class="col-sm-12"> 
										<div class="col-sm-4 col-md-offset-2">
											<button type="submit" name="submit" class="btn btn-info"> Save </button>
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
	<script language="JavaScript">
		$(document).ready(function() {
			$('#date')
			.datepicker({
				format: 'dd-mm-yyyy',
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