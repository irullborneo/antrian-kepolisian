<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title><?php echo $title?> - <?php echo $this->myapp->get_val('NAMA APLIKASI')?></title>
<link rel="shortcut icon" href="<?php echo site_url($this->myapp->get_val('LOGO'))?>" />
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
    $(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
      $('#btn-top').fadeIn();
      } else {
      $('#btn-top').fadeOut();
    }
  });
  $('#btn-top').click(function(){
    $("html, body").animate({ scrollTop: 0 }, 500);
      return false;
  });
  }).ajaxStart(function() { Pace.restart(); });
</script>
<style type="text/css">
  #btn-top {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99999;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
}
</style>
</head>
<body class="hold-transition skin-blue fixed layout-top-nav">
  <div class="wrapper">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo site_url()?>" class="navbar-brand"><b>ANTRIAN</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Master <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url('antrian')?>">Data Antrian</a></li>
                <li><a href="<?php echo site_url('tempat_tahanan')?>">Data Tempat Tahanan</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo site_url('slide')?>">Data Slide</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url('setting'); ?>" id="ubah_toko">Pengaturan</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo site_url('logout'); ?>" id="ubah_toko">Keluar</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="fluid-container">
      <?php echo $konten;
      ?>
      <button class="btn btn-primary" id="btn-top" title="Ke Atas">TOP</button>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="mailto:khanida.shop@gmail.com">Khanida Shop</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
</body>
</html>
