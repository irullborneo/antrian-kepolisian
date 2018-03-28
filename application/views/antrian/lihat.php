<script type="text/javascript">
	$(document).ready(function(e){
		$("#modal_lihat").modal('show');
	})
</script>
<div id="modal_lihat" class="modal fade" role="dialog">
  	<div class="modal-dialog modal-lg">

	    <!-- Modal content-->
	    <div class="modal-content ">
	    	<div class="modal-header">
	    		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h2 class="modal-title">Data Lihat</h2>
	    	</div>
	    	<div class="modal-body">
	    		<div class="row">
	    			<div class="col-sm-4 col-xs-12">
	    				<center><img src="./assets/<?php echo $lihat['foto']?>" class='img img-responsive img-thumbnail' style='width: 250px'></center>
	    			</div>
	    			<div class="col-sm-8 col-xs-12">
	    				<table class="table">
			    			<tr>
			    				<th>Nama</th>
			    				<td><?php echo $lihat['nama']?></td>
			    			</tr>
			    			<tr>
			    				<th>Umur</th>
			    				<td><?php echo $lihat['umur']?> Tahun</td>
			    			</tr>
			    			<tr>
			    				<th>NO & TGL LP</th>
			    				<td><?php echo $lihat['no_lp']?></td>
			    			</tr>
			    			<tr>
			    				<th>Pasal</th>
			    				<td><?php echo $lihat['pasal']?></td>
			    			</tr>
			    			<tr>
			    				<th>No Sprin Han</th>
			    				<td><?php echo $lihat['no_sprinhan']?></td>
			    			</tr>
			    			<tr>
			    				<th>Tgl Sprin Han</th>
			    				<td><?php echo date("d/m/Y",strtotime($lihat['tgl_sprinhan']))?></td>
			    			</tr>
			    			<tr>
			    				<th>No Sprin Han (Perpanjangan)</th>
			    				<td><?php echo $lihat['no_sprinhan_1']?></td>
			    			</tr>
			    			<tr>
			    				<th>Tgl Sprin Han (Perpanjangan)</th>
			    				<td><?php 
			    					if(!is_null($lihat['tgl_sprinhan_1']))
			    						echo date("d/m/Y",strtotime($lihat['tgl_sprinhan_1']));
			    				?></td>
			    			</tr>
			    			<tr>
			    				<th>Lama Tahanan</th>
			    				<td><?php echo $lihat['lama_tahanan']?> Hari</td>
			    			</tr>
			    			<tr>
			    				<th>Tempat Tahanan</th>
			    				<td><?php echo $lihat['tempat_tahanan']?></td>
			    			</tr>
			    			<tr>
			    				<th>Keterangan</th>
			    				<td><?php echo $lihat['ket']?></td>
			    			</tr>
			    		</table>
	    			</div>
	    		</div>

	    	</div>
	    	<div class="modal-footer">
	    		<button type="button" class="btn btn-default" data-dismiss='modal'>Tutup</button>
	    	</div>
	    </div>
	</div>
</div>