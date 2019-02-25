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
<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 ALIGN=right class="table table-striped">
							<TR>
								<TD>
									<span style="font-size:18px; font-family:Trebuchet MS, Tahoma,Arial; color:#525fb8; font-weight:bold">Edit USER</span>
								</TD>
							</TR>
							<TR><TD height=10></TD></TR>
							
							<?php if(isset($msg) && $msg != ""){ ?>
							<tr><td colspan=2 align=center valign=middle bgcolor=ffffff height=20><font face=verdana color=red size=2><?php echo $msg; ?></font></td></tr>
							
							<?php } ?>
							
							<tr>
								<td valign=top>
									<?php echo validation_errors(); ?>
									<form method=post action="<?=site_url('create_user/user_edit/'.$user->ad_id)?>" enctype="multipart/form-data" name="myform" id="myform">
									<TABLE BORDER=1 CELLSPACING=0 CELLPADDING=0 style="border-collapse: collapse" bordercolor="#e4e4e4" bgcolor=f2f2f2 align=left width="80%">
										<TR><TD>
											<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 ALIGN=center class="table table-striped" width="100%">
												
                                          		<tr>
													<td class=bodytext>Username</td>
													<td>																																			
														<input type=text name="username" required value="<?=$user->username?>" maxlength="50" size=50 class="form-control"> &nbsp; min_length[5]|max_length[50]</span> 
													</td>
												</tr>
                                              
                                                <tr>
													<td class=bodytext>Password</td>
													<td>																																			
														<input type=text name="password" required value="<?=$this->encrypt->decode($user->password);?>" maxlength="250" size=50 class="form-control">
													</td>
												</tr>
                                               
                                                
                                                <tr>
													<td class=bodytext>Email</td>
													<td>																																			
														<input type=text name="email"  required value="<?=$user->email?>" maxlength="250" size=86 class="form-control">
													</td>
												</tr>
                                               
                                                <tr>
													<td class=bodytext valign=top>Group</td>
													<td class=bodytext valign=top>
														<select name="group" required>
                                                        <option value="" >Select</option>
															<option value="complain" <?php if($user->group=="complain")echo "selected";?> >Complain</option>
															<option value="admin" <?php if($user->group=="admin")echo "selected";?>>Admin</option>
														</select>
													</td>
												</tr>
												
												
												<tr>
													<td class=bodytext valign=top>Publish</td>
													<td class=bodytext valign=top>
														<select name=status>
															<option value=1 <?php if($user->status)echo "selected";?>>Yes</option>
															<option value=0 <?php if(!$user->status)echo "selected";?>>No</option>
														</select>
													</td>
												</tr>
											
												<tr>
													<td class=bodytext></td>													
													<td>
													
                                                        
                                                        <button class="btn btn-success" type="submit" name="submit">Save</button>
													</td>
												</tr>
												<TR><TD height=20></TD></TR>
											</TABLE>
										</td></tr>																								
									</TABLE>
									</form>
								</td>
							</tr>
							<TR><TD height=10></TD></TR>
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

</body>
</HTML>