<?php
	if($antrian->num_rows() > 0){
		foreach ($antrian->result_array() as $data) {
?>
<script type="text/javascript">
	$(document).ready(function(e){
		
	})
</script>
<?php
    if($data['lama_tahanan']<=10){
        $background='style="background:red;color:#fff"';
    }else{
        $background='';
    }
?>
<div class="box" <?php echo $background; ?>>
    <div class="box-body">
    	<div class="row">
    		<div class="col-sm-10 col-xs-12">
    			<h2 style="margin-top:0px"><?php echo $data['nama']." (".$data['umur']." THN)"; ?></h2>
                <table class="table">
                    <tr>
                        <th width="150px">Tempat Penahanan</th>
                        <td><?php echo $data['tempat_tahanan']?></td>
                    </tr>
                    <tr>
                        <th>Lama Penahanan</th>
                        <td><?php echo $data['lama_tahanan']?> Hari</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td><?php echo $data['ket']?></td>
                    </tr>
                </table>
    		</div>
    		<div class="col-sm-2 col-xs-12">
    			<center>
    				<img src="<?php echo site_url('assets/'.$data['foto'])?>" class="img img-responsive" />
    			</center>
    		</div>
    	</div>
	</div>
</div>
<?php
		}
	}
?>