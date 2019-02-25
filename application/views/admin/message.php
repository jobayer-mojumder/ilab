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
      <TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0  align="center" >


        <TR>
          <TD align=center style="color:#1fa337" height="150"></TD>
        </TR>
        <?php if(isset($msg) && $msg != ""){echo "<TR><TD align=center><h5><font color=EE0000>".$msg."</font></h5></TD></TR>";}?>

      </TABLE>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
 <!----------------FOOTER------------------->
	<?php include('admin_footer.php'); ?>
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