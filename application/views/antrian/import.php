<section class="content-header">
  <h1>
    <span class='fa fa-user'></span> Data Antrian
  </h1>
</section>

<script type="text/javascript">
	function importFile(){
		data = new FormData();
		data.append('file', $('#import')[0].files[0]);
		var imgname = $("input[type=file]").val();
		var size = $("#import")[0].files[0].size;
		var ext = imgname.substr( (imgname.lastIndexOf(".")+1) );
		if(ext=="xls" || ext=="XLS" || ext=="XLSX" || ext=="xlsx"){
			if(size<=500000){
				$("#progressing-bar").show();
				$.ajax({
		    		xhr: function() {
					    var xhr = new window.XMLHttpRequest();

					        // Upload progress
					    xhr.upload.addEventListener("progress", function(evt){
					        if (evt.lengthComputable) {
					            var percentComplete = evt.loaded / evt.total;
					            $("#progressing").attr("aria-valuenow",percentComplete*100);
					            $("#progressing").attr("style","width: "+percentComplete*100+"%");
					            $("#text-bar").html(percentComplete*100 +"% Complete");
					            console.log(percentComplete);
					        }
					    }, false);

				      	return xhr;
					},
		    		url:"<?php echo site_url('antrian/import_action'); ?>",
		    		type:"POST",
		    		data:data,
		    		enctype:"multipart/form-data",
		   			processData:false,
		   			contentType:false
		    	}).done(function(data){
		    		if(data.includes("format salah")){
		    			$("#message").html('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b><i class="icon fa fa-warning"></i> Peringatan</b> Format excel salah. div>');
		    		}
		   			else if(data.includes('extensi tidak mendukung')){
		   				$("#message").html('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b><i class="icon fa fa-warning"></i> Peringatan</b> extensi tidak mendukung.</div>');
		   			}
	    			else{
		    			$("#contoh").html(data);
		    			$("#form-import").hide();
		    			$("#progressing").removeClass('progress-bar-striped');
	    			}
	    		});
			}else{
				$("#message").html('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b><i class="icon fa fa-warning"></i> Peringatan</b> file harus kurang dari 500kb.</div>');
			}
		}else{
			$("#message").html('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b><i class="icon fa fa-warning"></i> Peringatan</b> extensi tidak mendukung.</div>');
		}
	}

	function uploadPhoto(id){
		data = new FormData();
		data.append('file', $('#uploadPhoto_'+id)[0].files[0]);
		var imgname = $("#uploadPhoto_"+id).val();
		var size = $("#uploadPhoto_"+id)[0].files[0].size;
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
		    		$("#form-group_"+id).empty();
		    		$("#form-group_"+id).html("<img src='<?php echo site_url('assets')?>/"+data+"' class='img img-responsive' style='width:350px' />");
	    		});
			}else{
				$("#message").html('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b><i class="icon fa fa-warning"></i> Peringatan</b> file harus kurang dari 500kb.</div>');
			}
		}else{
			$("#message").html('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b><i class="icon fa fa-warning"></i> Peringatan</b> extensi tidak mendukung.</div>');
		}
	}
</script>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <h3 style="margin-top:0px">Import Antrian</h3>
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
                    <form action="#" method="post" class="form-inline" id="form-import">
                        <div class="form-group">
                        	<label for="import" class="btn btn-primary btn-lg"><span class='fa fa-upload'></span> Unggah</label>
                        	<input type="file" id="import" name="import" class="import" onChange=" return importFile();" style="display: none;" />
                        </div><br /><br />
                        <p><strong>Catatan </strong> : file berextensi <span class="label label-primary">.xls</span> atau <span class="label label-primary">.xlsx</span> dan besar file maksimal <b>500kb</b>. Silahkan unggah contoh formatnya <a href="<?php echo site_url('temp/template.xls')?>" class="label label-primary">disini</a></p>
                    </form>
                    <div id="progressing-bar" class="progress active" style="display: none;">
                		<div id="progressing" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
                  			<span id="text-bar">1% Complete</span>
                		</div>
              		</div>

              		<div id="contoh"></div>
                </div>
            </div>
        </div>
    </div>
</section>