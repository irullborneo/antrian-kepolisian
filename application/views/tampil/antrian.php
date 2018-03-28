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
<link rel="stylesheet" href="<?php echo site_url('assets/plugins/limarquee/css/liMarquee.css');?>">

<script src="<?php echo site_url('assets/plugins/jQuery/jquery-2.2.3.min.js');?>"></script>
<script src="<?php echo site_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
<script src="<?php echo site_url('assets/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
<script src="<?php echo site_url('assets/plugins/fastclick/fastclick.js');?>"></script>
<script src="<?php echo site_url('assets/dist/js/app.min.js');?>"></script>
<script src="<?php echo site_url('assets/plugins/limarquee/js/jquery.liMarquee.js');?>"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(e){
		//get_baris_antrian();
		var banyak = 0;
		var tampil = <?php echo $tampil->num_rows()?>;
		/*setInterval(function(){
			$(".box").first().hide('slow',function(){
				$(".box").first().remove();
			});
			banyak++
			if(banyak==tampil){
				get_baris_antrian();
				banyak=0;
			}
		},<?php echo $time_baris?>);*/

		$("#contain").css('height',$(window).height()-$('header').height());
    $("#ssa").css('top',$(".main-header").height()+"px");
    $(".imgs").css('width',$(".palace_img").width());

		$("#marquee").liMarquee({
			hoverstop: false,
		});
    $("#contain").liMarquee({
      direction: "up",
      scrollamount: <?php echo $time_baris/1000?>,
      hoverstop: false,

    });

    setTimeout(function() {
      window.location = '<?php echo site_url('tampil_slide')?>';
    }, <?php echo $time ?>);
	})
	function get_baris_antrian(){
		$.ajax({
			url:"<?php echo site_url('tampil_antrian/baris')?>",
			success:function(res){
				$("#palace_antrian").html(res);
			}
		})
	}
</script>

<body class="hold-transition skin-black-light fixed layout-top-nav">
  <div class="wrapper">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <img src='<?php echo $this->myapp->get_val('LOGO')?>' style="width: 80px; float: left; height: 80px" />
        <h2 style="float: left;color: #000;margin: 10px 0px 0px 20px;padding: 0" ><?php echo $this->myapp->get_val('NAMA APLIKASI')?><br />
        	<small style="color: #000"><?php echo $this->myapp->get_val('JALAN')?></small>
        </h2>
        <div style="clear: both;"></div>

        
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <div style="position: fixed; width: 100%; z-index: 99; background-color: #fff;text-align: center; font-size: 25px" id="ssa">
    <div class="row">
          <div class="col-xs-6">LSDJFLSKDJFSD</div>
          <div class="col-xs-6">KAPOLRES BANJARMASIN</div>
        </div>
  </div>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    
    <div class="fluid-container" id="contain" style="overflow: hidden;">
    	<section class="content" style="margin-top: 20px;">
    		<div class="row" >
    			<div class="col-xs-6" id="palace_antrian">
<?php
  if($antrian->num_rows() > 0){
    foreach ($antrian->result_array() as $data) {
    $date_create=strtotime($data['date_create']);
    $tanggal=time();
    $selisih=$tanggal-$date_create;
    $lama_hari=floor($selisih / (60 * 60 * 24));
    $lama_tahanan=$data['lama_tahanan'] - $lama_hari;
    if($lama_tahanan<=40){
        $background='';
    }else if($lama_tahanan<=60){
        $background='style="background:red;color:yellow"';
    }else{
      $background='style="background:red;color:yellow"';
    }
?>
<div class="box" <?php echo $background; ?>>
    <div class="box-body">
      <div class="row">
        <div class="col-sm-9 col-xs-12">
          <h2 style="margin-top:0px"><?php echo $data['nama']." (".$data['umur']." THN)"; ?></h2>
                <table class="table">
                    <tr>
                        <th width="150px">Tempat Penahanan</th>
                        <td><?php echo $data['tempat_tahanan']?></td>
                    </tr>
                    <tr>
                        <th>Lama Penahanan</th>
                        <td><?php echo $lama_tahanan?> Hari </td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td><?php echo $data['ket']?></td>
                    </tr>
                </table>
        </div>
        <div class="col-sm-3 col-xs-12 palace_img">
          <center>
            <img src="<?php echo site_url('assets/'.$data['foto'])?>" class="imgs img-responsive"/>
          </center>
        </div>
      </div>
  </div>
</div>
<?php
    }
  }
?>
    			</div>
          <div class="col-md-6 col-xs-12">
<?php
  if($antrian_2->num_rows() > 0){
    foreach ($antrian_2->result_array() as $data) {

    $date_create=strtotime($data['date_create']);
    $tanggal=time();
    $selisih=$tanggal-$date_create;
    $lama_hari=floor($selisih / (60 * 60 * 24));
    $lama_tahanan=$data['lama_tahanan'] - $lama_hari;
    if($lama_tahanan<=40){
        $background='';
    }else if($lama_tahanan<=60){
        $background='style="background:red;color:yellow"';
    }else{
      $background='style="background:red;color:yellow"';
    }
?>
<div class="box" <?php echo $background; ?>>
    <div class="box-body">
      <div class="row">
        <div class="col-sm-9 col-xs-12">
          <h2 style="margin-top:0px"><?php echo $data['nama']." (".$data['umur']." THN)"; ?></h2>
                <table class="table">
                    <tr>
                        <th width="150px">Tempat Penahanan</th>
                        <td><?php echo $data['tempat_tahanan']?></td>
                    </tr>
                    <tr>
                        <th>Lama Penahanan</th>
                        <td><?php echo $lama_tahanan?> Hari</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td><?php echo $data['ket']?></td>
                    </tr>
                </table>
        </div>
        <div class="col-sm-3 col-xs-12 palace_img">
          <center>
            <img src="<?php echo site_url('assets/'.$data['foto'])?>" class="imgs img-responsive"/>
          </center>
        </div>
      </div>
  </div>
</div>
<?php
    }
  }
?>
          </div>
    		</div>
    	</section>
      <!-- /.content -->
    </div>
    
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer" id="marquee" style="position: fixed;bottom: -20px;width: 100%; color: #000; font-size: 30px;">
    <?php
      if($teks_baris->num_rows() == 0){
        echo "-";
      }else{
        foreach ($teks_baris->result_array() as $data) {
          echo "<span class='fa fa-star' style='margin: 0 10px 0 10px'></span>".$data['teks'];
        }
      }
    ?>
  </footer>
</div>
<div id="slide" style="position: fixed; width: 100%;height: 100%;z-index: 999999;background-color: #ff0;top: 0px;display: none;">sdf</div>
</body>
</html>