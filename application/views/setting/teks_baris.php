<?php
	if($teks->num_rows() == 0){
		echo "no result found.";
	}else{
		echo "<table class='table'>";
		foreach ($teks->result_array() as $data) {
			echo "<tr>
				<td width='20px'><button type='button' class='btn btn-danger btn-hapus' id-val='$data[id]'><span class='fa fa-trash'></span> </button></td>
				<td>$data[teks]</td>
			</tr>";
		}
		echo "</table>";
	}
?>

<script type="text/javascript">
	$(document).ready(function(e){
		$(".btn-hapus").click(function(e){
			var id = $(this).attr('id-val');
			$("#btn-hapus").attr('id-val',id);
			$("#modal_hapus").modal('show');
		})

		$("#btn-hapus").click(function(e){
			var ids = $(this).attr('id-val');
			$.ajax({
				type:"POST",
				data:{id:ids},
				url:"<?php echo site_url('setting/hapus_teks')?>",
				success:function(e){
					$("#modal_hapus").modal('hide');
					setTimeout(function() {
						getTextBaris();
					}, 1000);
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
	    		<button type="button" id="btn-hapus" class="btn btn-danger">Hapus</button>
	    	</div>
	    </div>
	</div>
</div>