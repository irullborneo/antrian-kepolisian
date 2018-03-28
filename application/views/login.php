<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title><?php echo $title?> - Antrian</title>
<link rel="shortcut icon" href="<?php echo site_url('assets/img/laporan.png')?>" />
<link rel="stylesheet" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css')?>">
<link rel="stylesheet" href="<?php echo site_url('assets/font-awesome/css/font-awesome.min.css');?>">
<link rel="stylesheet" href="<?php echo site_url('assets/dist/css/AdminLTE.min.css');?>">
<link rel="stylesheet" href="<?php echo site_url('assets/dist/css/skins/_all-skins.min.css');?>">
<link rel="stylesheet" href="<?php echo site_url('assets/plugins/pace/pace.min.css');?>">
<script src="<?php echo site_url('assets/plugins/jQuery/jquery-2.2.3.min.js');?>"></script>
<script src="<?php echo site_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
<script src="<?php echo site_url('assets/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
<script src="<?php echo site_url('assets/plugins/fastclick/fastclick.js');?>"></script>
<script src="<?php echo site_url('assets/dist/js/app.min.js');?>"></script>
<script src="<?php echo site_url('assets/plugins/pace/pace.min.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function(e){
		$("#username").focus();

		$("#form-login").submit(function(e){
			var datakirim={
				username:$("#username").val(),
				password:$("#password").val(),
			}
			$.ajax({
				type:"POST",
				data:datakirim,
				url:"<?php echo site_url('login/ceklogin')?>",
				success:function(res){
					if(res==""){
						location.reload();	
					}
					else{
						$("#palace-alert").html(res);
						$("#username").val('').focus();
						$("#password").val('');
					}
				}
			})
			return false;
		})
	}).ajaxStart(function() { Pace.restart(); });
</script>
</head>
<style type="text/css">
	body{
		background-image: url('<?php echo site_url('assets/img/Background.png')?>');
		background-size: cover;
	}
</style>
<body class="hold-transition">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Antrian</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="background-color: rgba(41, 128, 185, 0.5)">
    <p class="login-box-msg">Silahkan Masuk telebih dahulu</p>

    <form action="#" method="post" id="form-login">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" id="username" maxlength="12">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" maxlength="12" id="password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">&nbsp;
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>

        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
  <div style="margin-top: 20px" id="palace-alert"><?php echo $this->session->userdata('pesan'); ?></div>
  
</div>
<!-- /.login-box -->


</body>
</html>