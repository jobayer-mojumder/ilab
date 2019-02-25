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
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <span style="font-size:18px; font-family:Trebuchet MS, Tahoma,Arial; color:#525fb8; font-weight:bold">IP  List ( Your IP<?php echo $_SERVER['SERVER_ADDR'];?>)</span>
            </div>
            <div class="panel-body">
              <font color="Red"><?php echo validation_errors(); ?></font>
              <div class="row">
                <div class="col-lg-6">
                 <form method=post action="<?=site_url('admin/ipauth_add')?>" enctype="multipart/form-data" name="myform" id="myform">      <div class="form-group">
                  <label>IP address</label>
                  <input class="form-control" type=text name="ipauth"  required   value="">

                </div>


                <div class="form-group " >
                  <label>Status</label>
                  <select name="status" required class="form-control">
                   <option value=1 selected>Yes</option>
                   <option value=0>No</option>
                 </select>

               </div>
               <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success">Save</button>

              </div>
            </form>
          </div>

          <!-- /.col-lg-6 (nested) -->
        </div>
        <!-- /.row (nested) -->
      </div>
      <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
  </div>
  <!-- /.col-lg-12 -->
</div>
</section>

<!-- Main content -->
<section class="content">

  <!-- Your Page Content Here -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


	<?php include('admin_footer.php'); ?>
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