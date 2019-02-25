<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include_once('top_global_header.php'); ?>

  <script language="JavaScript">
    function del(id)
    {
      if(confirm("Are you sure to delete the entry?")==1)
        document.location = "<?=site_url('cadmin/jury_del');?>/" + id;
    }
  </script>
  <script language="JavaScript">
    function unhot(id)
    {
      if(confirm("Are you sure to Un Publish  the entry?")==1)
        document.location = "<?=site_url('cadmin/jury_unpublish');?>/" + id;
    }
    function hot(id)
    {
      if(confirm("Are you sure to Publish the entry?")==1)
        document.location = "<?=site_url('cadmin/jury_publish');?>/" + id;
    }

    function hunhot(id)
    {
      if(confirm("Are you sure to Un Publish  the entry?")==1)
        document.location = "<?=site_url('cadmin/hnews_unpublish');?>/" + id;
    }
    function hhot(id)
    {
      if(confirm("Are you sure to Publish the entry?")==1)
        document.location = "<?=site_url('cadmin/hnews_publish');?>/" + id;
    }
  </script>

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

      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <span style="font-size:18px; font-family:Trebuchet MS, Tahoma,Arial; font-weight:bold">IP  List ( Your IP<?php echo $_SERVER['SERVER_ADDR'];?>)</span>
            </div>
            <div class="panel-body">
              <?php if(isset($msg) && $msg != ""){ ?>
              <div class="row">
                <div class="col-lg-12">
                  <font face=verdana color=red size=2><?php echo $msg; ?></font>
                </div>
              </div>		
              <?php } ?>

              <div class="row">
                <div class="col-lg-10">

                  <?php if($this->session->flashdata('msg') && $this->session->flashdata('msg') != ""){ ?><font face=verdana color=red size=2><?php echo $this->session->flashdata('msg'); ?></font><?php } ?>
                </div>
                <div class="col-lg-2">

                  <a class="add"  style="float:right; border:2px solid #005bab; padding:3px; border-radius:5px;" href="<?=site_url('admin/ipauth_add');?>">Add New</a>

                </div>	
              </div>	
              <br />
              <div class="row">
                <div class="col-lg-12">

                  <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                        <TR>
                          <TD height=20 class=bodytext width=40><font color="#333"><b>SL.</b></font></TD>
                          <TD height=20 class=bodytext width=200><font color="333"><b>IP </b></font></TD>
                          <TD height=20 class=bodytext width=100><font color="333"><b>Date </b></font></TD>
                          <TD height=20 class=bodytext width=40 align="center"><font color="333"><b>Status</b></font></TD>
                          <TD height=20 class=bodytext width=40 align="center"><font color="333"><b>Edit</b></font></TD>
                          <TD height=20 class=bodytext width=40 align="center"><font color="333"><b>Delete</b></font></TD>
                        </TR>
                      </thead>
                      <tbody>
                        <?php 

                        $x1 = 1;
                        foreach ($ipauth as $ipauth_data):



                          if($x1%2)
                            $par = '#EFEFEF';
                          else
                            $par = 'FFFFFF';
                          $x1++;
                          ?>
                          <TR>
                            <TD height=20 class=bodytext><font size=2 color="#666"><?php echo $x++;?>.</font></TD>
                            <TD height=20 class=bodytext><font size=3 color="#666"><?php echo $ipauth_data->ipauth;?></font></TD>
                            <TD height=20 class=bodytext><font size=3 color="#666"><?php echo $ipauth_data->ipauthtime;?></font></TD>


                            <TD height=20 class=bodytext align="center"><?php if($ipauth_data->status){?><img src="<?=base_url();?>admin_images/yes.gif" border=0><?php } else { ?><img src="<?=base_url();?>admin_images/no.gif" border=0 /><?php } ?></TD>
                            <TD height=20 class=bodytext align="center"><a class=menu href="<?=site_url('admin/ipauth_edit/'.$ipauth_data->id);?>"><img src="<?=base_url();?>admin_images/edit.gif" border=0 /></a></TD>
                            <TD height=20 class=bodytext align="center"><a class=menu href="JavaScript:del(<?=$ipauth_data->id;?>)"><img src="<?=base_url();?>admin_images/del.gif" border=0 /></a></TD>
                          </TR>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
                  <div class="pagination">
                    <?php echo $this->pagination->create_links();?>
                  </div>
                </div>
              </div>
              
              </div>
              <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.content -->
      </div>
    </section>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
 <!----------------FOOTER------------------->
	<?php include('admin_footer.php'); ?>
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

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
   </body>
 </HTML>