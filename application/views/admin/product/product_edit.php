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
								<h4 class="box-name">Products EDIT</h4>
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
							<form class="form-horizontal" method="post" action="<?=site_url('products_admin/product_edit/'.$results->product_id)?>" enctype="multipart/form-data">
								<div class="box-body">

									
									<div class="form-group">
										<label for="status" class="col-sm-2 control-label">product_category</label>
										<div class="col-sm-2">
											<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="product_category" id="product_category" required>
												<option <?php if($results->product_category=='') echo "selected";?> value="">Select</option>

												<option <?php if($results->product_category=='Health') echo "selected";?>  value="Health">Health</option>

												<option <?php if($results->product_category=='Education') echo "selected";?>  value="Education">Education</option>

												<option <?php if($results->product_category=='Environment') echo "selected";?>  value="Environment">Environment</option>

												<option <?php if($results->product_category=='Disability') echo "selected";?>  value="Disability">Disability</option>

												<option <?php if($results->product_category=='Agriculture') echo "selected";?>  value="Agriculture">Agriculture</option>

												<option <?php if($results->product_category=='Industry') echo "selected";?>  value="Industry">Industry</option>

												<option <?php if($results->product_category=='Hill track') echo "selected";?>  value="Hill track">Hill track</option>

												<option <?php if($results->product_category=='Ekshop') echo "selected";?>  value="Ekshop">Ekshop</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label for="product_name" class="col-sm-2 control-label">product_name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="product_name" name="product_name" placeholder="product_name Here" required value="<?=$results->product_name?>">
										</div>
									</div>

									<div class="form-group">
										<label for="product_description" class="col-sm-2 control-label">product_description</label>
										<div class="col-sm-9">
											<textarea type="text" class="form-control" id="product_description" name="product_description"><?=$results->product_description?></textarea>
										</div>
									</div>
                                    
                                    <div class="form-group">
										<label for="image1" class="col-sm-2 control-label">Product Image 1</label>
										<div class="col-sm-4">
											<input type="file" class="form-control" id="image1" name="image1" >
											<?php if($results->product_image1){?>
											
											<input type="text" class="col-sm-7" style="display: block; margin-right: 10px;" name="old_image2" value="<?=$results->product_image1?>" readonly>
											<input type="checkbox" class="flat-blue"  name="image_del1" value="1"> Delete Old Image
											<?php } ?>
										</div>
									</div>
                                    
                                    <div class="form-group">
										<label for="image2" class="col-sm-2 control-label">Product Image 2</label>
										<div class="col-sm-4">
											<input type="file" class="form-control" id="image2" name="image2" >
											<?php if($results->product_image2){?>
											
											<input type="text" class="col-sm-7" style="display: block; margin-right: 10px;" name="old_image2" value="<?=$results->product_image2?>" readonly>
											<input type="checkbox" class="flat-blue"  name="image_del2" value="1"> Delete Old Image
											<?php } ?>
										</div>
									</div>

									<div class="form-group">
										<label for="product_video" class="col-sm-2 control-label">product_video</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="product_video" name="product_video" placeholder="product_video Here" required value="<?=$results->product_video?>">
										</div>
									</div>

									<div class="form-group">
										<label for="product_innovator_name" class="col-sm-2 control-label">product_innovator_name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="product_innovator_name" name="product_innovator_name" placeholder="product_innovator_name Here" required value="<?=$results->product_innovator_name?>">
										</div>
									</div>

									
                                    <div class="form-group">
										<label for="image" class="col-sm-2 control-label">product_innovator_image</label>
										<div class="col-sm-4">
											<input type="file" class="form-control" id="image3" name="image3" >
											<?php if($results->product_innovator_image){?>
											
											<input type="text" class="col-sm-7" style="display: block; margin-right: 10px;" name="old_image3" value="<?=$results->product_innovator_image?>" readonly>
											<input type="checkbox" class="flat-blue"  name="image_del3" value="1"> Delete Old Image
											<?php } ?>
										</div>
									</div>

									<div class="form-group">
										<label for="product_cost_tk" class="col-sm-2 control-label">product_cost_tk</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="product_cost_tk" name="product_cost_tk" placeholder="product_cost_tk Here" required value="<?=$results->product_cost_tk?>">
										</div>
									</div>

									<div class="form-group">
										<label for="product_cost_tk" class="col-sm-2 control-label">product_cost_doller</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="product_cost_doller" name="product_cost_doller" placeholder="product_cost_doller Here" required value="<?=$results->product_cost_doller?>">
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