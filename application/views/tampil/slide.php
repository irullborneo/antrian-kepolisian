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

<script src="<?php echo site_url('assets/plugins/jQuery/jquery-2.2.3.min.js');?>"></script>
<script src="<?php echo site_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
<script src="<?php echo site_url('assets/dist/js/app.min.js');?>"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(e){
		setTimeout(function() {
	      window.location = "<?php echo site_url('tampil_antrian'); ?>";
	    }, <?php echo $time;?>);
	    $(".img_slide").css('height',$(window).height());
	})
</script>
<body>
  <div id="slide_foto" class="carousel slide" data-ride="carousel">
  	<?php
  		if($slide->num_rows() > 0){
  			echo '<ol class="carousel-indicators">';
  			$no=0;
  			foreach($slide->result_array() as $data){
  				if($no==0){
  					echo '<li data-target="#slide_foto" data-slide-to="'.$no.'" class="active"></li>';
  				}else{
  					echo '<li data-target="#slide_foto" data-slide-to="'.$no.'" class=""></li>';
  				}
  				$no++;
  			}
  			echo '</ol>
  			<div class="carousel-inner">';
  			$no=0;
  			foreach($slide->result_array() as $data){
  				if($no==0){
  					echo '<div class="item active">
                    <img src="'.site_url('assets/'.$data['foto']).'" style="width:100%;height: 100%" class="img_slide">
                  </div>';
  				}else{
  					echo '<div class="item">
                    <img src="'.site_url('assets/'.$data['foto']).'" style="width:100%;height: 100%" class="img_slide">
                  </div>';
  				}
  				$no++;
  			}
  			echo '</div>';
  		} 
  	?>          
    </div>
</body>
</html>