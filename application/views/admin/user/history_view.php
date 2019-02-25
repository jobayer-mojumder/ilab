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
								<h4 class="box-title">Login History</h4>
							</div>
							<?php if($this->session->flashdata('msg') && $this->session->flashdata('msg') != ""){ ?>
							<div class="col-sm-10 col-sm-offset-5">
								<p style="color: blue"><?php echo ucwords($this->session->flashdata('msg')); ?></p>
							</div>			
							<?php } ?>							
							<div class="box-body">
								<table id="table-example" class="table table-striped">
									<thead>
										<tr>
											<th>SL</th>
											<th>IP</th>
											<th style="text-align: center;">Time</th>
											<th style="text-align: center;">Username</th>
											<th style="text-align: center;">Browser</th>
											<th style="text-align: center;">PC</th>
											<th style="text-align: center;">Passed</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										<?php foreach ($results as $result) { 
											if ($result->status) {
												$color='';
											}else{
												$color='#ff3131';
											}
										?>
										<tr style="color: <?=$color?>">
											<td><?=$i++?></td>
											<td><?=$result->ip?></td>
											<td style="text-align: center;"><?=$result->created_at?></td>
											<td style="text-align: center;"><?=$result->username?></td>
											<td style="text-align: center;"><?=$result->browser.' '.$result->version?></td>
											<td style="text-align: center;"><?=$result->platform?></td>
											<td style="text-align: center;"><?=$result->status == 1 ? 'YES': 'NO'?></td>
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
					"pageLength": 30,
				})
			} );
		</script>

		<script language="JavaScript">
			function del(id){
				if(confirm("Are you sure to delete the entry?")==1)
					document.location = "<?=site_url('user_admin/history_del');?>/" + id;
			}
			function status(id, status){
				if(confirm("Are you sure to change the Status?")==1)
					document.location = "<?=site_url('user_admin/history_status_change');?>/" + id + "/" + status;
			}
		</script>

	</body>
</html>