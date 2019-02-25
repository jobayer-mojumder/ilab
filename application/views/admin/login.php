<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ilab ::: Admin</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Bootstrap Core CSS -->
    <link rel="icon" href="<?=base_url()?>images/isp-fi-small.png" type="image/x-icon" />
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
        function validateForm(){

            if(document.register.username.value=="")
            {
                alert("Please username can not be blank");
                document.register.username.focus();
                return false;
            }
            if(document.register.password.value=="")
            {
                alert("Please password can not be blank");
                document.register.password.focus();
                return false;
            }
        }


    </script>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <br />
        <div class="login-logo" style="background:#FFFFFF ">
            <a href="<?=base_url()?>"><img  src="<?=base_url()?>admin_assets/admin_images/uni_logo_xs.png"></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">

            <p class="login-box-msg">Sign in to start your session</p>
            <?php if(isset($msg) && $msg != ""){
                echo "<h5><font color=EE0000>".$msg."</font></h5>";}?>
            <div style="color:red;">
                <?php echo validation_errors(); ?>
            </div>
            <form action="<?=site_url("admin/login")?>" method="post" id="register" name="register" onSubmit="return validateForm();">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username"  name="username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" name="login"  class="btn btn-success btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->


                </div>


            </form>
            <div class="row">
                <div class="col-xs-12">
                    <div class="text text-right" >

                        <p><font color="red">Forgot Your Password ?</font> <?=anchor('login/pass_re/','Click Here').$this->access_level ?></p>
                        <p><a href="<?=base_url();?>">Go to Home Page</a></p>
                    </div>
                </div>
            </div>
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