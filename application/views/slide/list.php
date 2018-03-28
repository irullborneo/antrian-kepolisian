<script type="text/javascript">
    $(document).ready(function(e){
        get_slide(); 
    })

    function get_slide(){
        $.ajax({
            type:"POST",
            url:"<?php echo site_url('slide/table_list')?>",
            success:function(res){
                $("#table-slide").html(res);
            }
        })
    }

    function tambahSlide(){
        data = new FormData();
        data.append('file', $('#slide_foto')[0].files[0]);
        var imgname = $("#slide_foto").val();
        var size = $("#slide_foto")[0].files[0].size;
        var ext = imgname.substr( (imgname.lastIndexOf(".")+1) );
        if(ext=="jpg" || ext=="png" || ext=="JPG" || ext=="PNG"){
            if(size<=1000000){
                $.ajax({
                    url:"<?php echo site_url('slide/upload'); ?>",
                    type:"POST",
                    data:data,
                    enctype:"multipart/form-data",
                    processData:false,
                    contentType:false
                }).done(function(data){
                    $("#message").html(data);
                    get_slide();
                });
            }else{
                alert('file harus kurang dari 1Mb.');
            }
        }else{
            alert('extensi tidak mendukung.');
        }
    }
</script>

<section class="content-header">
  <h1>
    <span class='fa fa-file-image-o'></span> Data Slide
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
                            <h3 style="margin-top:0px">Daftar Slide</h3>
                        </div>
                        <div class="col-md-4 text-center">
                            
                        </div>
                        <div class="col-md-4 text-right">
                            <label for="slide_foto" class="btn btn-primary" ><span class="fa fa-plus"></span> Tambah</label>
                            <input type="file" id="slide_foto" name="slide_foto" style="display: none;" onChange=" return tambahSlide();" />
                        </div>
                    </div>
                    <div id="message">
                        
                    </div>
                    <div id="table-slide"></div>

                </div>
            </div>
        </div>
	</div>
</section>