<html>
<head>
	<TITLE>ilab ::: Admin</TITLE>

	<link rel="stylesheet" href="<?=base_url()?>admin_assets/admin_css/login.css" type="text/css" charset="utf-8">
	<?php include_once('top_global_header.php'); ?>

</head>
<body>
	<div id="main">
		<div id="top">&nbsp;</div>
		<div id="middle">

			<img id="logo" src="<?=base_url()?>admin_assets/admin_images/uni_logo_xs.png" />

			<form action="<?=$url?>" method="post" id="register" name="register" onSubmit="return validateForm();">

				<div id="boxtop">&nbsp;</div><div id="boxmid">
					<?=$sms ?><?='<br>'.$msg ?>
					<div class="section">
						<span><font color="GREEN">Password sent to your mailbox , Please check your mailbox.</font></span>

					</div>

					<div class="section">&nbsp;
					</div>

				</div>
				<div id="boxbot">&nbsp;</div>

				<div class="text" style="float: left;">&nbsp;
				</div>

				<div class="text" style="float: right;">


				</div>
				<div class="text" style="float: left;">
					<p>Back To Login Window</p><p><?=anchor('login','Back')  ?></p>
				</div>
				<br style="clear:both; height: 0px;" />
			</form>
		</div>
		<div id="bottom">&nbsp;</div>
	</div>
</body>
</html>