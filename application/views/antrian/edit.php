<script src="<?php echo site_url('assets/plugins/datepicker/bootstrap-datepicker.js');?>"></script>
<link rel="stylesheet" href="<?php echo site_url('assets/plugins/datepicker/datepicker3.css');?>">
<script type="text/javascript">
	$(document).ready(function(e){
		$('.datepicker').datepicker({
	      autoclose: true
	    });
	})

	function tambahFoto(){
		data = new FormData();
		data.append('file', $('#foto')[0].files[0]);
		var imgname = $("#foto").val();
		var size = $("#foto")[0].files[0].size;
		var ext = imgname.substr( (imgname.lastIndexOf(".")+1) );
		if(ext=="jpg" || ext=="png" || ext=="JPG" || ext=="PNG"){
			if(size<=500000){
				$.ajax({
		    		url:"<?php echo site_url('antrian/upload_photo'); ?>?id=tambah",
		    		type:"POST",
		    		data:data,
		    		enctype:"multipart/form-data",
		   			processData:false,
		   			contentType:false
		    	}).done(function(data){
		    		$("#add_photo").attr('src','<?php echo site_url('assets')?>/'+data);
		    		$("#foto_txt").val(data);
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
    <span class='fa fa-user'></span> Data Antrian
  </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                	<div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <h3 style="margin-top:0px">Edit Antrian</h3>
                        </div>
                        <div class="col-md-4 text-center">
                            
                        </div>
                        <div class="col-md-4 text-right">
                            <?php echo anchor(site_url('antrian'),'Kembali', 'class="btn btn-default"');
                            ?>
                        </div>
                    </div>
                    <div id="message">
                    </div>
                    <form action="<?php echo site_url('antrian/edit_action/'.$id)?>" method="post">
                    	<div class="row">
                    		<div class="col-md-6 col-xs-12">
                    			<div class="form-group">
                    				<label for="nama">NAMA</label>
                    				<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" required="" value="<?php echo $antrian['nama']?>" />
                    			</div>
                    			<div class="form-group">
                    				<label for="umur">UMUR</label>
                    				<div class="input-group">
					                  	<input name="umur" id="umur" type="number" style="text-align: right;" class="form-control" placeholder="Masukkan Umur" required="" value="<?php echo $antrian['umur']?>">
					                  	<div class="input-group-addon">
					                    	Tahun
					                  	</div>
					                </div>
                    			</div>
                    		</div>
                    		<div class="col-md-6 col-xs-12">
                    			<div class="form-group">
                    				<label for="no_lp">NO & TGL LP</label>
                    				<textarea class="form-control" id="no_lp" name="no_lp" rows="5" placeholder="Masukkan No & Tgl LP" required=""><?php echo $antrian['no_lp']?></textarea>
                    			</div>
                    		</div>
                    		<div class="col-xs-12">
                    			<div class="form-group">
                    				<label for="pasal">PASAL</label>
                    				<textarea rows="5" placeholder="Masukkan Pasal" class="form-control" id="pasal" name="pasal" required=""><?php echo $antrian['pasal']?></textarea>
                    			</div>
                    		</div>
                    		<div class="col-xs-12 col-md-6">
                    			<div class="form-group">
                    				<label for="no_sprinhan">NO SPRIN HAN</label>
                    				<input type="text" name="no_sprinhan" id="no_sprinhan" class="form-control" placeholder="Masukkan No Sprin Han" required="" value="<?php echo $antrian['no_sprinhan']?>" />
                    			</div>
                    			<div class="form-group">
                    				<label for="tgl_sprinhan">TGL SPRIN HAN</label>
                    				<div class="input-group date">
                  						<div class="input-group-addon">
                    						<i class="fa fa-calendar"></i>
                  						</div>
                  						<input type="text" class="form-control pull-right datepicker" id="tgl_sprinhan" name="tgl_sprinhan" required="" value="<?php echo date("m/d/Y",strtotime($antrian['tgl_sprinhan']))?>">
                					</div>
                    			</div>
                    		</div>
                    		<div class="col-xs-12 col-md-6">
                    			<div class="form-group">
                    				<label for="no_sprinhan_1">NO SPRIN HAN PERPANJANGAN</label>
                    				<input type="text" name="no_sprinhan_1" id="no_sprinhan_1" class="form-control" placeholder="Masukkan No Sprin Han" value="<?php echo $antrian['no_sprinhan_1']?>" />
                    			</div>
                    			<div class="form-group">
                    				<label for="tgl_sprinhan_1">TGL SPRIN HAN PERPANJANGAN</label>
                    				<div class="input-group date">
                  						<div class="input-group-addon">
                    						<i class="fa fa-calendar"></i>
                  						</div>
                  						<input type="text" class="form-control pull-right datepicker" id="tgl_sprinhan_1" name="tgl_sprinhan_1" value="<?php
                  							if(!is_null($antrian['tgl_sprinhan_1'])){
                  								echo date("m/d/Y",strtotime($antrian['tgl_sprinhan_1']));
                  							}
                  						?>">
                					</div>
                    			</div>
                    		</div>
                    		<div class="col-xs-12 col-md-8">
                    			<div class="row">
                    				<div class="col-md-6 col-xs-12">
                    					<div class="form-group">
		                    				<label for="lama_tahanan">LAMA TAHANAN</label>
		                    				<div class="input-group">
							                  	<input name="lama_tahanan" id="lama_tahanan" type="number" style="text-align: right;" class="form-control" placeholder="Masukkan Lama Tahanan" required="" value="<?php echo $antrian['lama_tahanan']?>">
							                  	<div class="input-group-addon">
							                    	Hari
							                  	</div>
							                </div>
		                    			</div>
                    				</div>
                    				<div class="col-md-6 col-xs-12">
                    					<div class="form-group">
                    						<label for="d">TEMPAT TAHANAN</label>
                    						<select id="tempat_tahanan" name="tempat_tahanan" class="form-control" required="">
                    							<?php
                    							 foreach ($tempat->result_array() as $data) {
                    							 	if($data['id']==$antrian['tempat_tahanan']){
                    							 		echo "<option value='$data[id]' selected=''>$data[tempat_tahanan]</option>";

                    							 	}else{
                    							 		echo "<option value='$data[id]'>$data[tempat_tahanan]</option>";
                    							 	}
                    							 	
                    							 }
                    							?>
                    						</select>
                    					</div>
                    				</div>
                    				<div class="col-xs-12">
                    					<div class="form-group">
		                    				<label for="ket">KETERANGAN</label>
		                    				<textarea rows="3" placeholder="Masukkan Keterangan" class="form-control" id="ket" name="ket"><?php echo $antrian['ket']?></textarea>
		                    			</div>
                    				</div>
                    			</div>
                    		</div>
                    		<div class="col-md-4 col-xs-12">
                    			<div class="form-group">
                    				<center>
                    				<label for="foto"><img src="<?php echo site_url('assets/'.$antrian['foto'])?>" id='add_photo' style='width: 250px; cursor: pointer;'></label>
                    				<input type="file" name="foto" id="foto" style="display: none;" onChange=" return tambahFoto();" />
                    				</center>
                    				<input type="hidden" name="foto_txt" id="foto_txt" value="<?php echo $antrian['foto']?>">
                    			</div>
                    		</div>
                    	</div>
                    	<button type="submit" class="btn btn-primary">UPDATE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>