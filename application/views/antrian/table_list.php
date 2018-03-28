<script type="text/javascript">
	function ubahFoto(id){
		data = new FormData();
		data.append('file', $('#ubahFoto_'+id)[0].files[0]);
		var imgname = $("#ubahFoto_"+id).val();
		var size = $("#ubahFoto_"+id)[0].files[0].size;
		var ext = imgname.substr( (imgname.lastIndexOf(".")+1) );
		if(ext=="jpg" || ext=="png" || ext=="JPG" || ext=="PNG"){
			if(size<=500000){
				$.ajax({
		    		url:"<?php echo site_url('antrian/upload_photo'); ?>?id="+id,
		    		type:"POST",
		    		data:data,
		    		enctype:"multipart/form-data",
		   			processData:false,
		   			contentType:false
		    	}).done(function(data){
		    		$("#foto_"+id).attr('src','<?php echo site_url('assets')?>/'+data);
	    		});
			}else{
				alert('file harus kurang dari 500kb.');
			}
		}else{
			alert('extensi tidak mendukung.');
		}
	}
</script>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>NO</th>
			<th>NAMA</th>
			<th>NO & TGL LP</th>
			<th>PASAL</th>
			<th>NO.SEPRIN HAN</th>
			<th>NO.SEPRIN HAN<br />PERPANJANGAN</th>
			<th>TEMPAT<br />PENAHAMAN</th>
			<th>FOTO</th>
			<th>&nbsp;</th>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th><input type="text" name="nama" id='nama' class="form-control" value="<?php echo $nama?>" onchange='get_antrian()'></th>
			<th><input type="text" name="no_lp" id='no_lp' class="form-control" value="<?php echo $no_lp?>" onchange='get_antrian()'></th>
			<th><input type="text" name="pasal" id='pasal' class="form-control" value="<?php echo $pasal?>" onchange='get_antrian()'></th>
			<th><input type="text" name="no_serpinhan" id='no_serpinhan' class="form-control" value="<?php echo $no_serpinhan?>" onchange='get_antrian()'></th>
			<th><input type="text" name="no_serpinhan_1" id='no_serpinhan_1' class="form-control" value="<?php echo $no_serpinhan_1?>" onchange='get_antrian()'></th>
			<th>
				<select name="tempat_tahanan" id='tempat_tahanan' class="form-control" onchange='get_antrian()'>
					<option value="">Semua</option>
					<?php
						foreach ($tempat->result_array() as $data) {
							if($tempat_tahanan==$data['tempat_tahanan']){
								echo "<option value='$data[tempat_tahanan]' selected=''>$data[tempat_tahanan]</option>";
							}else{
								echo "<option value='$data[tempat_tahanan]'>$data[tempat_tahanan]</option>";
							}
							
						}
					?>
				</select>
			</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php
			if($antrian->num_rows() == 0){
				echo "<tr><td colspan='9'>No results found.</td></tr>";
			}else{
				$no=$p + ($p-1)*($baris-1);
				foreach ($antrian->result_array() as $data) {
					echo "
						<tr>
							<td>$no</td>
							<td>$data[nama]</td>
							<td>$data[no_lp]</td>
							<td>$data[pasal]</td>
							<td>$data[no_sprinhan]</td>
							<td>$data[no_sprinhan_1]</td>
							<td>$data[tempat_tahanan]</td>
							<td style='cursor:pointer' class='lihat_antrian' id-val='$data[id]'><img src='".site_url('assets')."/$data[foto]' class='img img-responsive' style='width:450px' id='foto_$data[id]' /></td>
							<td>
								<a href='".site_url('antrian/edit/'.$data['id'])."' class='btn btn-primary btn-block'><span class='fa fa-edit'></span> Edit</a><br />
								<label for=\"ubahFoto_$data[id]\" class=\"btn btn-info\"><span class='fa fa-user'></span> Ubah Foto</label>
								<input type=\"file\" id=\"ubahFoto_$data[id]\" name=\"ubahFoto_$data[id]\" class=\"ubahFoto_$data[id]\" onChange=\" return ubahFoto('$data[id]');\" style=\"display: none;\" />
								<br /><br />
								<button type='button' class='btn btn-danger btn-block btn-hapus' id-val='$data[id]'><span class='fa fa-trash'></span> Hapus</button>
							</td>
						</tr>
					";
					$no++;
				}
			}
		?>
	</tbody>
</table>

<?php
	$halaman=ceil($banyak_antrian->num_rows() / $baris);

	$spage="";
	$paging=4;

	echo "<div  class=\"text-center\"><ul class='pagination pagination-lg'>";

	for($i=1;$i<=$halaman;$i++){
		if((($i>=$p-$paging) && ($i<=$p+$paging)) || ($i==1) || ($i==$halaman)){
			if(($spage==1) && ($i!=2))
				echo "<li><a href=\"#\">...</a></li>";
			if(($spage!=($halaman-1)) && ($i == $halaman))
				echo "<li><a>...</a></li>";
			if($p==$i)
				echo "<li class=\"disabled\"><a>".$i."</a></li>";
			else{
				if($i==1)
					echo "<li><a style=\"cursor:pointer\" class='menupaging' menupaging='$i'>".$i."</a></li>";
				else
					echo "<li><a style=\"cursor:pointer\" class='menupaging' menupaging='$i'>".$i."</a></li>";
			}
			$spage=$i;
		}
	}
	echo "</ul></div>";
?>

<script type="text/javascript">
	$(document).ready(function(e){
		$(".menupaging").click(function(e){
			var paging=$(this).attr('menupaging');
			var data_kirim={
				data:"Progress",
				p:paging,
				nama:$("#nama").val(),
                no_lp:$("#no_lp").val(),
                pasal:$("#pasal").val(),
                no_serpinhan:$("#no_serpinhan").val(),
                no_serpinhan_1:$("#no_serpinhan_1").val(),
                tempat_tahanan:$("#tempat_tahanan").val(),
			}
			$.ajax({
				type:"POST",
				data:data_kirim,
				url:"<?php echo site_url('antrian/table_list')?>",
				success:function(res){
					$("#table-antrian").html(res);
				}
			})
		})

		$(".btn-hapus").click(function(e){
			$("#modal_hapus").modal('show');
			var id=$(this).attr('id-val');
			$("#btn-hapus").attr('href','<?php echo site_url('antrian/hapus')?>/'+id);
		})
		$(".lihat_antrian").click(function(e){
			var ids = $(this).attr('id-val');
			$.ajax({
				type:"POST",
				data:{id:ids},
				url:"<?php echo site_url('antrian/lihat')?>",
				success:function(res){
					$("#lihat_palace").html(res);
				}
			})
		})
	})
</script>

<div id="modal_hapus" class="modal fade" role="dialog">
  	<div class="modal-dialog modal-sm">

	    <!-- Modal content-->
	    <div class="modal-content ">
	    	<div class="modal-header">
	    		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h2 class="modal-title">Peringatan</h2>
	    	</div>
	    	<div class="modal-body">
	    		<p>Hapus data ini?</p>
	    	</div>
	    	<div class="modal-footer">
	    		<button type="button" class="btn btn-default" data-dismiss='modal'>Tidak</button>
	    		<a href="#" id="btn-hapus" class="btn btn-danger">Hapus</a>
	    	</div>
	    </div>
	</div>
</div>

<div id="lihat_palace"></div>