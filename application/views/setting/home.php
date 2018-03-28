<script type="text/javascript">
	$(document).ready(function(e){
		getTextBaris();
		$("#btn-tambah").click(function(e){
			var b = $("#input_text_baris").val();
			if(b!=""){
				setTextBaris(b);
			}
		})

		$("#input_text_baris").keyup(function(a){
			var key=a.keyCode || a.which;
			if(key==13){
				var b = $("#input_text_baris").val();
				if(b!=""){
					setTextBaris(b);
				}
			}
		})

		$(".waktu").change(function(e){
			var ids=$(this).attr('id');
			var val = $(this).val();

			if(val<1){
				$(this).val('1');
			}
			var i = $(this).val();
			setData(ids,i);
		})

		$(".input_data").change(function(e){
			var ids=$(this).attr('id');
			var val = $(this).val();
			setData(ids,val);
		})
	})
	function getTextBaris(){
		$.ajax({
			url:"<?php echo site_url('setting/teks_baris')?>",
			success:function(res){
				$("#palace_baris").html(res);
			}
		})
	}

	function setTextBaris(b){
		$.ajax({
			type:"POST",
			data:{
				teks:b
			},
			url:"<?php echo site_url('setting/tambah_teks_baris')?>",
			success:function(res){
				$("#input_text_baris").val('');
				getTextBaris();
			}
		})
	}

	function setData(c,v){
		$.ajax({
			type:"POST",
			data:{
				col:c,
				val:v,
			},
			url:"<?php echo site_url('setting/set_setting')?>",
			success:function(res){
			}
		})
	}

	function ubahLogo(){
		data = new FormData();
		data.append('file', $('#logo')[0].files[0]);
		var imgname = $("#logo").val();
		var size = $("#logo")[0].files[0].size;
		var ext = imgname.substr( (imgname.lastIndexOf(".")+1) );
		if(ext=="png" || ext=="PNG"){
			if(size<=500000){
				$.ajax({
		    		url:"<?php echo site_url('setting/ubah_logo'); ?>",
		    		type:"POST",
		    		data:data,
		    		enctype:"multipart/form-data",
		   			processData:false,
		   			contentType:false
		    	}).done(function(data){
		    		setTimeout(function() {
		    			location.reload();
		    		}, 2000);
	    		});
			}else{
				alert('file harus kurang dari 500kb.');
			}
		}else{
			alert('extensi tidak mendukung.');
		}
		
	}
</script>
<section class="content-header">
  <h1>
    <span class='fa fa-cogs'></span> Pengaturan
  </h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#umum" data-toggle="tab" aria-expanded="true">Umum</a></li>
              <li class=""><a href="#waktu" data-toggle="tab" aria-expanded="false">Waktu</a></li>
              <li class=""><a href="#text_baris" data-toggle="tab" aria-expanded="false">Teks Baris</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="umum">
                <div class='row'>
                	<div class="col-md-3">
                		<label>LOGO</label>
                		<center>
                			<div id="palace_img">
                				<img src='<?php echo site_url($logo)?>' class="img img-responsive" id='logo_img' />
                			</div>
                			
                			<div class="form-group">

                				<label for="logo" class="btn btn-info"><span class="fa fa-upload"></span> Unggah</label>
                				<input type="file" name="logo" id="logo" style="display: none;" onChange=" return ubahLogo();">
                			</div>
                		</center>
                	</div>
                	<div class="col-md-6 col-xs-12">
                		<div class="form-group">
                			<label for="nama_app">NAMA APLIKASI</label>
                			<input type="text" name="nama_app" id="nama_app" class="form-control input_data" value="<?php echo $nama_app?>">
                		</div>
                		<div class="form-group">
                			<label for="alamat">ALAMAT</label>
                			<textarea rows="3" class="form-control input_data" id="alamat" name="alamat"><?php echo $alamat?></textarea>
                		</div>
                	</div>
                </div>													
              </div>
              <div class="tab-pane" id="waktu">
              	<div class="row">
              		<div class="col-md-4 col-xs-12">
              			<div class="form-group">
		              		<label for="waktu_antrian">WAKTU ANTRIAN</label>
		              		<div class="input-group">
							    <input name="waktu_antrian" id="waktu_antrian" type="number" style="text-align: right;" class="form-control waktu" value="<?php echo $waktu_antrian?>">
								<div class="input-group-addon">
							   	Menit
						       	</div>
							</div>
		              	</div>
		              	<div class="form-group">
		              		<label for="waktu_baris">WAKTU BARIS ANTRIAN</label>
		              		<div class="input-group">
							    <input name="waktu_baris" id="waktu_baris" type="number" style="text-align: right;" class="form-control waktu" value="<?php echo $waktu_baris?>">
								<div class="input-group-addon">
							   	Detik
						       	</div>
							</div>
		              	</div>
		              	<div class="form-group">
		              		<label for="waktu_slide">WAKTU SLIDE</label>
		              		<div class="input-group">
							    <input name="waktu_slide" id="waktu_slide" type="number" style="text-align: right;" class="form-control waktu" value="<?php echo $waktu_slide?>">
								<div class="input-group-addon">
							   	Menit
						       	</div>
							</div>
		              	</div>
              		</div>
              	</div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="text_baris">
                <div class="row">
                	<div class="col-md-4 col-xs-12">
                		<div class="input-group">
	                
			                <!-- /btn-group -->
			                <input type="text" class="form-control" id="input_text_baris">
			                <div class="input-group-btn">
			                  <button type="button" class="btn btn-primary" id="btn-tambah">Tambah</button>
			                </div>
			            </div>
		        	</div>
                </div>
                <div id="palace_baris" style="margin-top: 20px">dsd</div>
                </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
    </div>
</section>