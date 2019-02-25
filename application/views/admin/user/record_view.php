<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include_once(__DIR__ .'/../top_global_header.php'); ?>
	<link href="<?=base_url()?>admin_assets/admin_css/plugins/datatables/3/dataTables.bootstrap.css" rel="stylesheet">
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
							<div class="box-header">
								<h4 class="box-title">Admin Records</h4>
							</div>
							<?php if($this->session->flashdata('msg') && $this->session->flashdata('msg') != ""){ ?>
								<div class="col-sm-10 col-sm-offset-5">
									<p style="color: blue"><?php echo ucwords($this->session->flashdata('msg')); ?></p>
								</div>			
							<?php } ?>							
							<div class="box-body">
								<form class="form-horizontal" method="post" action="<?=site_url('user_admin/clear_record')?>">
									<div class="col-sm-8" style="margin-left: 0px; padding-left: 0px;">
										<div class="col-sm-3">
											<input type="date" name="start" required>
										</div>
										<div class="col-sm-1" style=" text-align: center;">
											<span><b>To</b></span>
										</div>
										<div class="col-sm-3">
											<input type="date" name="end" required>
										</div>

										<div class="col-sm-2">
											<button type="submit" name="submit" class="btn btn-info"> Clear </button>
										</div>
									</div>
								</form>
								<table id="table-example" class="table table-striped">
									<thead>
										<tr>
											<th>SL</th>
											<th>Admin</th>
											<th>Action</th>
											<th style="text-align: center;">Location</th>
											<th>Date</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										<?php foreach ($results as $result) {

											$date = date('h:i A', strtotime($result->created_at));

											if ($result->action == 'ADD') {
												$text = "<b>Added</b> a new record in <b>".$result->module.'</b> on '.$date;
											} else if($result->action == 'UPDATE') {
												$text = "<b>Updated</b> a record in <b>".$result->module.'</b> on '.$date;
											}else if($result->action == 'STATUS'){
												$text = "<b>Changed</b> status of a record in <b>".$result->module.'</b> on '.$date;
											}else{
												$text = "<b>Deleted</b> a record from <b>".$result->module.'</b> on '.$date;
											}
											?>
											<tr>
												<td><?=$i++?></td>
												<td><?=$result->fullname;?></td>
												<td><?=$text;?></td>
												<td style="text-align: center;"><a href="<?=base_url($result->location)?>">
													<?php if ($result->m_parent && $result->m_sub) {
														echo $result->m_parent .' > '. $result->m_sub .' > '.$result->m_name;
													} else {
														echo $result->m_parent.' > '.$result->m_name;
													}
													?></a></td>
													<td><?=date('d-M-Y', strtotime($result->created_at))?></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>

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
		<script src="<?=base_url()?>admin_assets/admin_css/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="<?=base_url()?>admin_assets/admin_css/plugins/datatables/3/dataTables.bootstrap.min.js"></script>
		<script src="<?=base_url()?>admin_assets/admin_css/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?=base_url()?>admin_assets/admin_css/dist/js/app.min.js"></script>
<script src="<?=base_url()?>admin_assets/admin_css/plugins/slimScroll/jquery.slimscroll.js"></script>

		<script>
			$(document).ready(function() {
				var allTable= $('table').DataTable({
					"bPaginate": true,
					"bLengthChange": false,
					"bFilter": true,
					"bInfo": true,
					"bAutoWidth": false,
					"pageLength": 50,
				})
			} );
		</script>

		<script language="JavaScript">
			function del(id){
				if(confirm("Are you sure to delete the entry?")==1)
					document.location = "<?=site_url('user_admin/record_del');?>/" + id;
			}
			function status(id, status){
				if(confirm("Are you sure to change the Status?")==1)
					document.location = "<?=site_url('user_admin/record_status_change');?>/" + id + "/" + status;
			}
		</script>

	</body>
	</html>