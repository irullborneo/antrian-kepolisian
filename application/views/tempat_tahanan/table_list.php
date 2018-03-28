<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>NO</th>
			<th>TEMPAT TAHANAN</th>
			<th>&nbsp;</th>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th><input type="text" name="tempat_tahanan" id='tempat_tahanan' class="form-control" value="<?php echo $tempat_tahanan?>" onchange='get_tempat()'></th>
			<th width="200px">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php
			if($tempat->num_rows() == 0){
				echo "<tr><td colspan='3'>No results found.</td></tr>";
			}else{
				$no=$p + ($p-1)*($baris-1);
				foreach ($tempat->result_array() as $data) {
					echo "
						<tr>
							<td>$no</td>
							<td>$data[tempat_tahanan]</td>
							<td><center>
								<button type='button' class='btn btn-primary btn-edit' id-val='$data[id]'><span class='fa fa-edit'></span> Edit</button>
								<button type='button' class='btn btn-danger btn-hapus' id-val='$data[id]'><span class='fa fa-trash'></span> Hapus</button>
							</center>
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
	$halaman=ceil($banyak_tempat->num_rows() / $baris);

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
                tempat_tahanan:$("#tempat_tahanan").val(),
			}
			$.ajax({
				type:"POST",
				data:data_kirim,
				url:"<?php echo site_url('tempat_tahanan/table_list')?>",
				success:function(res){
					$("#table-tempat_tahanan").html(res);
				}
			})
		})

		$(".btn-edit").click(function(e){
			var ids=$(this).attr('id-val');
			$.ajax({
				type:"POST",
				data:{id:ids},
				url:"<?php echo site_url('tempat_tahanan/edit')?>",
				success:function(res){
					$("#palace_edit").html(res);
				}
			})
		})

		$(".btn-hapus").click(function(e){
			var ids=$(this).attr('id-val');
			$("#btn-hapus").attr('id-val',ids);
			$("#modal_hapus").modal('show');
		})

		$("#btn-hapus").click(function(e){
			var ids=$(this).attr('id-val');
			$.ajax({
				type:"POST",
				data:{id:ids},
				url:"<?php echo site_url('tempat_tahanan/hapus')?>",
				success:function(res){
					$("#modal_hapus").modal('hide');
					setTimeout(function() {
						get_tempat();
					}, 1000);
				}
			})
		})
	})
</script>

<div id="palace_edit"></div>

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
	    		<button type="button" id="btn-hapus" class="btn btn-danger">Hapus</button>
	    	</div>
	    </div>
	</div>
</div>