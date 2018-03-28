<script type="text/javascript">
    $(document).ready(function(e){
        get_antrian(); 
    })

    function get_antrian(){
        $.ajax({
            type:"POST",
            data:{
                nama:$("#nama").val(),
                no_lp:$("#no_lp").val(),
                pasal:$("#pasal").val(),
                no_serpinhan:$("#no_serpinhan").val(),
                no_serpinhan_1:$("#no_serpinhan_1").val(),
                tempat_tahanan:$("#tempat_tahanan").val(),
            },
            url:"<?php echo site_url('antrian/table_list')?>",
            success:function(res){
                $("#table-antrian").html(res);
            }
        })
    }
</script>
<section class="content-header">
  <h1>
    <span class='fa fa-user'></span> Data Antrian
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
                            <h3 style="margin-top:0px">Daftar Antrian</h3>
                        </div>
                        <div class="col-md-4 text-center">
                            
                        </div>
                        <div class="col-md-4 text-right">
                            <?php echo anchor(site_url('antrian/tambah'), '<span class="fa fa-plus"></span> Tambah', 'class="btn btn-primary"'); ?>
                            <?php echo anchor(site_url('antrian/import'), '<span class="fa fa-share-square-o"></span> Import', 'class="btn btn-info"'); ?>
                        </div>
                    </div>
                    <div id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                    <div id="table-antrian"></div>

                </div>
            </div>
        </div>
	</div>
</section>