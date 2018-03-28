<script type="text/javascript">
	$(document).ready(function(e){
		$("#modal_edit").modal('show');

		$("#update").click(function(e){
			var tempat = $("#edit_tempat_tahanan").val();
        	if(tempat==""){
        		alert('Kolom Harus diisi');
        	}else{
        		$.ajax({
	        		type:"POST",
	        		data:{tempat_tahanan:tempat,id:"<?php echo $id;?>"},
	        		url:"<?php echo site_url('tempat_tahanan/edit_action')?>",
	        		success:function(res){
	        			$("#modal_edit").modal('hide');
	        			$("#message").html(res);
	        			$("#edit_tempat_tahanan").val();
	        			setTimeout(function() {
	        				get_tempat();
	        			}, 1000);
	        		}
	        	});
        	}
		})
	})
</script>
<div id="modal_edit" class="modal fade" role="dialog">
  	<div class="modal-dialog modal-md">

	    <!-- Modal content-->
	    <div class="modal-content ">
	    	<div class="modal-header">
	    		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h2 class="modal-title">Edit Data</h2>
	    	</div>
	    	<div class="modal-body">
	    		<div class="form-group">
	    			<label for="edit_tempat_tahanan">Tempat Tahanan</label>
	    			<input type="text" id="edit_tempat_tahanan" name="edit_tempat_tahanan" class="form-control" value="<?php echo $edit['tempat_tahanan']?>" />
	    		</div>
	    	</div>
	    	<div class="modal-footer">
	    		<button type="button" class="btn btn-default" data-dismiss='modal'>Batal</button>
	    		<a href="#" id="update" class="btn btn-primary">Update</a>
	    	</div>
	    </div>
	</div>
</div>