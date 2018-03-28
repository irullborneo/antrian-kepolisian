<script type="text/javascript">
    $(document).ready(function(e){
        get_tempat(); 

        $("#btn-simpan").click(function(e){
        	var tempat = $("#input_tempat_tahanan").val();
        	if(tempat==""){
        		alert('Kolom Harus diisi');
        	}else{
        		$.ajax({
	        		type:"POST",
	        		data:{tempat_tahanan:tempat},
	        		url:"<?php echo site_url('tempat_tahanan/tambah_action')?>",
	        		success:function(res){
	        			$("#modal_tambah").modal('hide');
	        			$("#message").html(res);
	        			$("#input_tempat_tahanan").val();
	        			get_tempat();
	        		}
	        	});
        	}
        })
    })

    function get_tempat(){
        $.ajax({
            type:"POST",
            data:{
                tempat_tahanan:$("#tempat_tahanan").val(),
            },
            url:"<?php echo site_url('tempat_tahanan/table_list')?>",
            success:function(res){
                $("#table-tempat_tahanan").html(res);
            }
        })
    }
</script>
<section class="content-header">
  <h1>
    <span class='fa fa-building'></span> Data Tempat Tahanan
  </h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                	<div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <h3 style="margin-top:0px">Daftar Tempat Tahanan</h3>
                        </div>
                        <div class="col-md-4 text-center">
                            
                        </div>
                        <div class="col-md-4 text-right">
                            <button type="button" class="btn btn-primary" data-toggle='modal' data-target='#modal_tambah'><span class="fa fa-plus"></span> Tambah</button>
                        </div>
                    </div>
                    <div id="message">
                        
                    </div>
                    <div id="table-tempat_tahanan"></div>

                </div>
            </div>
        </div>
	</div>
</section>

<div id="modal_tambah" class="modal fade" role="dialog">
  	<div class="modal-dialog modal-md">

	    <!-- Modal content-->
	    <div class="modal-content ">
	    	<div class="modal-header">
	    		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h2 class="modal-title">Tambah Data</h2>
	    	</div>
	    	<div class="modal-body">
	    		<div class="form-group">
	    			<label for="input_tempat_tahanan">Tempat Tahanan</label>
	    			<input type="text" id="input_tempat_tahanan" name="input_tempat_tahanan" class="form-control" />
	    		</div>
	    	</div>
	    	<div class="modal-footer">
	    		<button type="button" class="btn btn-default" data-dismiss='modal'>Batal</button>
	    		<a href="#" id="btn-simpan" class="btn btn-primary">Simpan</a>
	    	</div>
	    </div>
	</div>
</div>