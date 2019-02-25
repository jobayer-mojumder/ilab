<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ilab ::: Admin</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Bootstrap Core CSS -->
<link rel="icon" href="<?=base_url()?>images/nbl-fi-small.png" type="image/x-icon" />
<!-- Favicon -->
<link rel="shortcut icon" href="favicon.ico">
<meta property="og:type" content="website">

<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url()?>admin_assets/admin_css/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>admin_assets/admin_css/dist/css/AdminLTE.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>admin_assets/admin_css/plugins/iCheck/square/blue.css">
  
    
 <script type="text/javascript">
function validateForm()
{
var x=document.forms["register"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }
}
</script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
 <div class="login-logo" style="background:#FFFFFF; margin-bottom:0px; padding-top:20px;">
    <a href="<?=base_url()?>"><img  src="<?=base_url()?>admin_assets/admin_images/uni_logo_xs.png"></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">
<?php if(isset($msg) && $msg != ""){echo $sms.'<br>'.$msg;
}else{?>
  Please enter your email address

<?php }?>
</p>
    <form action="<?=site_url('login/pass_re_ins')?>" method="post"  id="register" name="register" onSubmit="return validateForm();">
      <div class="form-group has-feedback">
      <input type="email" name="email" value=""  class="form-control" placeholder="Email"/>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" value="submit"  class="btn btn-success btn-block btn-flat">Send</button>
        </div>
        <!-- /.col -->
        
        
      </div>
      
      
    </form><br />
    <div class="row">
        <div class="col-xs-12">
<div class="text text-right" >
				
				<p>Back To Login Window</p><p><?=anchor('login','Back')  ?></p>
			</div>
</div>
</div>
    <?php /*?><div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div><?php */?>
    <!-- /.social-auth-links -->

    <!--<a href="#">I forgot my password</a><br>
    <p><a href="<?=base_url();?>">Go to Home Page</a></p>
-->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?=base_url()?>admin_assets/admin_css/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src=".<?=base_url()?>admin_assets/admin_css/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=base_url()?>admin_assets/admin_css/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>