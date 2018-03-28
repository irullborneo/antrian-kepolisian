<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Antrian extends CI_Controller
{
    function __construct()
    {
        
        parent::__construct();
        $cek_login=$this->session->userdata('id');
        if(empty($cek_login)){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Logout!</strong> Silahkan login kembali.
            </div>');
            redirect(site_url('login'));
        }

        $this->load->model('Antrian_model');
    }

    private function konten($konten="",$id=''){
    	switch ($konten) {
            case 'antrian':
                $data=array();
                return $this->load->view('antrian/list',$data,true);
                break;

            case 'import':
                $data=array();
                return $this->load->view('antrian/import',$data,true);
                break;

            case 'tambah':
                $data=array(
                    'tempat'=>$this->Antrian_model->get_all_tempat_tahanan(),
                );
                return $this->load->view('antrian/tambah',$data,true);
                break;

            case 'edit':
                $data=array(
                    'antrian'=>$this->Antrian_model->get_row_by_id($id),
                    'tempat'=>$this->Antrian_model->get_all_tempat_tahanan(),
                    'id'=>$id,
                );
                return $this->load->view('antrian/edit',$data,true);
                break;
            
            default:
                $data=array();
                return $this->load->view('no_halaman',$data,true);
                break;
        }
    }

    public function index()
    {
        $komponen=array(
        	'title'=>"Antrian",
        	'konten'=>$this->konten('antrian'),
        );

        $this->load->view("template",$komponen);
    }

    public function tambah() {
        $komponen=array(
            'title'=>"Tambah Antrian",
            'konten'=>$this->konten('tambah'),
        );
        $this->load->view('template',$komponen);
    }

    public function tambah_action(){
        $nama=$this->input->post('nama',true);
        $umur=$this->input->post('umur',true);
        $no_lp=$this->input->post('no_lp',true);
        $pasal=$this->input->post('pasal',true);
        $no_sprinhan=$this->input->post('no_sprinhan',true);
        $tgl_sprinhan=date("Y-m-d",strtotime($this->input->post('tgl_sprinhan',true)));
        if($no_sprinhan_1==""){
            $no_sprinhan_1=NULL;
        }else{
            $no_sprinhan_1=$this->input->post('no_sprinhan_1',true);
        }
        if($tgl_sprinhan_1==""){
            $tgl_sprinhan_1=NULL;
        }else{
            $tgl_sprinhan_1=date("Y-m-d",strtotime($this->input->post('tgl_sprinhan_1',true)));
        }
        $lama_tahanan=$this->input->post('lama_tahanan',true);
        $tempat_tahanan=$this->input->post('tempat_tahanan',true);
        $ket=$this->input->post('ket',true);
        $foto_txt=$this->input->post('foto_txt',true);
        $date_create=date("Y-m-d H:i:s");
        $create_by=$this->session->userdata('username');

        $data=array(
            'nama'=>$nama,
            'umur'=>$umur,
            'no_lp'=>$no_lp,
            'pasal'=>$pasal,
            'no_sprinhan'=>$no_sprinhan,
            'tgl_sprinhan'=>$tgl_sprinhan,
            'no_sprinhan_1'=>$no_sprinhan_1,
            'tgl_sprinhan_1'=>$tgl_sprinhan_1,
            'lama_tahanan'=>$lama_tahanan,
            'tempat_tahanan'=>$tempat_tahanan,
            'ket'=>$ket,
            'foto'=>$foto_txt,
            'status'=>'1',
            'date_create'=>$date_create,
            'create_by'=>$create_by,
        );

        $insert = $this->Antrian_model->import($data);
        if($insert==1){
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b><i class="icon fa fa-check"></i> Sukses</b> Data berhasil ditambahkan.</div>');      
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b><i class="icon fa fa-check"></i> Gagal</b> Data gagal ditambahkan.</div>');
        }
        redirect(site_url('antrian'));
    }

    public function edit($id){
        $komponen=array(
            'title'=>"Edit Antrian",
            'konten'=>$this->konten('edit',$id),
        );
        $this->load->view('template',$komponen);
    }

    public function edit_action($id){
        $nama=$this->input->post('nama',true);
        $umur=$this->input->post('umur',true);
        $no_lp=$this->input->post('no_lp',true);
        $pasal=$this->input->post('pasal',true);
        $no_sprinhan=$this->input->post('no_sprinhan',true);
        $tgl_sprinhan=date("Y-m-d",strtotime($this->input->post('tgl_sprinhan',true)));
        if($no_sprinhan_1==""){
            $no_sprinhan_1=NULL;
        }else{
            $no_sprinhan_1=$this->input->post('no_sprinhan_1',true);
        }
        if($tgl_sprinhan_1==""){
            $tgl_sprinhan_1=NULL;
        }else{
            $tgl_sprinhan_1=date("Y-m-d",strtotime($this->input->post('tgl_sprinhan_1',true)));
        }
        
        $lama_tahanan=$this->input->post('lama_tahanan',true);
        $tempat_tahanan=$this->input->post('tempat_tahanan',true);
        $ket=$this->input->post('ket',true);
        $foto_txt=$this->input->post('foto_txt',true);
        $date_create=date("Y-m-d H:i:s");
        $create_by=$this->session->userdata('username');

        $data=array(
            'nama'=>$nama,
            'umur'=>$umur,
            'no_lp'=>$no_lp,
            'pasal'=>$pasal,
            'no_sprinhan'=>$no_sprinhan,
            'tgl_sprinhan'=>$tgl_sprinhan,
            'no_sprinhan_1'=>$no_sprinhan_1,
            'tgl_sprinhan_1'=>$tgl_sprinhan_1,
            'lama_tahanan'=>$lama_tahanan,
            'tempat_tahanan'=>$tempat_tahanan,
            'ket'=>$ket,
            'foto'=>$foto_txt,
            'status'=>'1',
            'date_update'=>$date_create,
            'update_by'=>$create_by,
        );
        $this->Antrian_model->update($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b><i class="icon fa fa-check"></i> Sukses</b> Data telah diperbaharui.</div>');
            redirect(site_url('antrian'));
    }

    public function table_list(){
        $p=abs($this->input->post('p',true))==0 ? 1:abs($this->input->post('p',true));
        $baris=20;
        $awal=($p-1)*$baris;

        $nama=$this->input->post('nama',true);
        $no_lp=$this->input->post('no_lp',true);
        $pasal=$this->input->post('pasal',true);
        $no_serpinhan=$this->input->post('no_serpinhan',true);
        $no_serpinhan_1=$this->input->post('no_serpinhan_1',true);
        $tempat_tahanan=$this->input->post('tempat_tahanan',true);

        $data=array(
            'nama'=>$nama,
            'no_lp'=>$no_lp,
            'pasal'=>$pasal,
            'no_serpinhan'=>$no_serpinhan,
            'no_serpinhan_1'=>$no_serpinhan_1,
            'tempat_tahanan'=>$tempat_tahanan,
            'antrian'=>$this->Antrian_model->get_all_antrian($nama,$no_lp,$pasal,$no_serpinhan,$no_serpinhan_1,$tempat_tahanan,'limit',$awal,$baris),
            'banyak_antrian'=>$this->Antrian_model->get_all_antrian($nama,$no_lp,$pasal,$no_serpinhan,$no_serpinhan_1,$tempat_tahanan),
            'baris'=>$baris,
            'tempat'=>$this->Antrian_model->get_all_tempat_tahanan(),
            'p'=>$p,
        );
        $this->load->view('antrian/table_list',$data);
    }

    public function import(){
        $komponen=array(
            'title'=>"Import",
            'konten'=>$this->konten('import'),
        );
        $this->load->view("template",$komponen);
    }

    public function import_action(){
        $this->load->library('excel_reader');
        $filetype = array('xls','xlsx','XLS','XLSX');
        foreach ($_FILES as $key) {
            $name = time().$key['name'];
            $path = './temp/'.$name;
            $file_ext = pathinfo($name, PATHINFO_EXTENSION);
            if(in_array(strtolower($file_ext), $filetype)){
                @move_uploaded_file($key['tmp_name'],$path);
                $this->excel_reader->read($path);
                $worksheet = $this->excel_reader->sheets[0];
                $numRows = $worksheet['numRows']; // ex: 14
                $numCols = $worksheet['numCols']; // ex: 4
                $cells = $worksheet['cells']; // the 1st row are usually the field's name
                if($numCols==12){
                    echo '<table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NAMA '.$numCols.'</th>
                                <th>NO & TGL <br /> LP</th>
                                <th>PASAL</th>
                                <th>NO.SEPRIN HAN</th>
                                <th>NO.SEPRIN HAN<br />PERPANJANGAN</th>
                                <th>TEMPAT<br />PENAHAMAN</th>
                                <th>FOTO</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                    ';
                    
                    for($i=2;$i<=$numRows;$i++){
                        $nama=isset($cells[$i][2]) ? $cells[$i][2] : "";
                        $umur=isset($cells[$i][3]) ? $cells[$i][3] : "";
                        $umur=$this->removeChar($umur);
                        $no_lp=isset($cells[$i][4]) ? $cells[$i][4] : "";
                        $pasal=isset($cells[$i][5]) ? $cells[$i][5] : "";
                        $no_serpinhan=isset($cells[$i][6]) ? $cells[$i][6] : "";
                        $tgl_serpinhan=explode("/", isset($cells[$i][6]) ? $cells[$i][7] : "");
                        $tgl_serpinhan=$tgl_serpinhan[2]."-".$tgl_serpinhan[1]."-".$tgl_serpinhan[0];
                        $no_serpinhan_1=isset($cells[$i][8]) ? $cells[$i][8] : NULL;
                        if(isset($cells[$i][9])){
                            $tgl_serpinhan_1_txt=explode("/", $cells[$i][9]);
                        }else{
                            $tgl_serpinhan_1_txt[0]='00';
                            $tgl_serpinhan_1_txt[1]='00';
                            $tgl_serpinhan_1_txt[2]='0000';
                        }
                        
                        $tgl_serpinhan_1=$tgl_serpinhan_1_txt[2]."-".$tgl_serpinhan_1_txt[1]."-".$tgl_serpinhan_1_txt[0];
                        if($tgl_serpinhan_1=="0000-00-00")
                            $tgl_serpinhan_1=NULL;
                        $lama_tahanan=isset($cells[$i][10]) ? $cells[$i][10] : "";
                        $tempat_tahanan_text=isset($cells[$i][11]) ? $cells[$i][11] : "";
                        $tempat_tahanan=$this->getTempat_tahanan($tempat_tahanan_text);
                        $ket=isset($cells[$i][12]) ? $cells[$i][12] : "";
                        $cek_foto=file_exists("./assets/foto/".$nama.".jpg");
                        if($cek_foto==1){
                            $foto='foto/'.$nama.'.jpg';
                            $upload_foto=false;
                        }else{
                            $foto='img/no_photo.jpg';
                            $upload_foto=true;    
                        }
                        
                        $status='1';
                        $date_create=date("Y-m-d H:i:s");
                        $create_by=$this->session->userdata('username');
                        $data=array(
                            'nama'=>$nama,
                            'umur'=>$umur,
                            'no_lp'=>$no_lp,
                            'pasal'=>$pasal,
                            'no_sprinhan'=>$no_serpinhan,
                            'tgl_sprinhan'=>$tgl_serpinhan,
                            'no_sprinhan_1'=>$no_serpinhan_1,
                            'tgl_sprinhan_1'=>$tgl_serpinhan_1,
                            'lama_tahanan'=>$lama_tahanan,
                            'tempat_tahanan'=>$tempat_tahanan,
                            'ket'=>$ket,
                            'foto'=>$foto,
                            'status'=>$status,
                            'date_create'=>$date_create,
                            'create_by'=>$create_by,
                        );

                        $insert = $this->Antrian_model->import($data);
                        if($insert==1){
                            $upload="<span class='label label-success'>Sukses</span>";
                        }else{
                            $upload="<span class='label label-danger'>Gagal</span>";
                        }

                        $getId=$this->Antrian_model->get_this_id();

                        echo '<tr>
                            <td>'.$nama.'</td>
                            <td>'.$no_lp.'</td>
                            <td>'.$pasal.'</td>
                            <td>'.$no_serpinhan.'</td>
                            <td>'. $no_serpinhan_1.'</td>
                            <td>'.$tempat_tahanan_text.'</td>
                            <td>
                        ';
                        if($upload_foto){
                            echo '<div class="form-group" id="form-group_'.$getId.'">
                                    <label for="uploadPhoto_'.$getId.'" class="btn btn-primary"><span class=\'fa fa-user\'></span> Unggah</label>
                                    <input type="file" id="uploadPhoto_'.$getId.'" name="uploadPhoto_'.$getId.'" class="uploadPhoto" onChange=" return uploadPhoto(\''.$getId.'\');" style="display: none;" />
                                    <p><strong>Catatan </strong> : file berextensi <span class="label label-primary">.jpg</span> atau <span class="label label-primary">.png</span> dan besar file maksimal <b>500kb</b>.</p>
                                </div>';
                        }
                        else{
                            echo "<img src='".site_url('assets/foto/'.$nama.".jpg")."' class='img img-responsive' style='width:350px' />";
                        }
                        echo '
                            
                            </td>
                            <td>'.$upload.'</td>
                        </tr>';
                    }
                    echo '
                        </tbody>
                    </table>';
                }else{
                    echo 'format salah';
                }
                    

                unlink($path);
            }else{
                echo 'extensi tidak mendukung ';
            }
        }
    }

    public function upload_photo(){
        $id=$this->input->get('id',true);
        $filetype = array('jpg','png','JPG','PNG');
        foreach ($_FILES as $key) {
            $name = time().$key['name'];
            $path = './assets/img/'.$name;
            @move_uploaded_file($key['tmp_name'],$path);
            if($id!="tambah"){
                $data=array(
                    'foto'=>"img/".$name,
                    'date_update'=>date("Y-m-d H:i:s"),
                    'update_by'=>$this->session->userdata('username'),
                );
                $this->Antrian_model->update($id, $data);
            }
            echo "img/".$name;

        }
        
    }

    public function hapus($id){
        $antrian = $this->Antrian_model->get_row_by_id($id);
        if($antrian['foto']!="img/no_photo.jpg"){
            $path = "./assets/".$antrian['foto'];
            unlink($path);
        }

        $this->Antrian_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b><i class="icon fa fa-check"></i> Sukses</b> Data telah dihapus</div>');
        redirect(site_url('antrian'));
    }

    public function lihat(){
        $id = $this->input->post('id',true);
        $data=array(
            'lihat'=>$this->Antrian_model->get_row_by_id($id)
        );
        $this->load->view('antrian/lihat',$data);
    }

    private function removeChar($umur){
        $umur=str_replace("THN", "", $umur);
        return $umur;
    }

    private function getTempat_tahanan($tempat_tahanan){
        $cek = $this->Antrian_model->cek_tempat($tempat_tahanan);
        if($cek->num_rows() == 0){
            $data=array(
                'tempat_tahanan'=>$tempat_tahanan
            );
            $this->Antrian_model->insert_tempat($data);
            return $this->Antrian_model->get_last_id();
        }else{
            $cek=$cek->row_array();
            return $cek['id'];
        }
    }
}