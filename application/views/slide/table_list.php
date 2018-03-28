<?php
	if($slide->num_rows() == 0){
		echo '<p>No results found.</p>';
	}else{
		echo "
			<div class='row'>
		";
		foreach ($slide->result_array() as $data) {
			echo "<div class='col-md-4 col-xs-6'>
				<div class='thumbnail'>
					<img src='".site_url('assets/'.$data['foto'])."' style='width:100%;height:250px'>
			        <div class='caption' style='text-align:right'>
			            <button id-val='$data[id]' type='button' class='btn btn-danger btn-hapus'><span class='fa fa-trash'></span> Hapus</button>
			        </div>
				</div>
			</div>";
		}
		echo "
			</div>
		";
	}
?>

<script type="text/javascript">
	$(document).ready(function(e){
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
				url:"<?php echo site_url('slide/hapus')?>",
				success:function(res){
					$("#modal_hapus").modal('hide');
					$("#message").html(res);
					setTimeout(function() {
						get_slide();
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
	    		<a href="#" id="btn-hapus" class="btn btn-danger">Hapus</a>
	    	</div>
	    </div>
	</div>
</div>