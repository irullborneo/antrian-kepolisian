<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting extends CI_Controller
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

        $this->load->model('Setting_model');
    }

    private function konten($konten="",$id=''){
        switch ($konten) {
            case 'setting':
                $waktu_antrian=($this->myapp->get_val("WAKTU ANTRIAN")/1000)/60;
                $waktu_slide=($this->myapp->get_val("WAKTU SLIDE")/1000)/60;
                $waktu_baris=($this->myapp->get_val("WAKTU BARIS")/1000);

                $data=array(
                    'nama_app'=>$this->myapp->get_val("NAMA APLIKASI"),
                    'alamat'=>$this->myapp->get_val("JALAN"),
                    'waktu_antrian'=>$waktu_antrian,
                    'logo'=>$this->myapp->get_val("LOGO"),
                    'waktu_baris'=>$waktu_baris,
                    'waktu_slide'=>$waktu_slide,
                );
                return $this->load->view('setting/home',$data,true);
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
            'title'=>"Pengaturan",
            'konten'=>$this->konten('setting'),
        );

        $this->load->view("template",$komponen);
    }

    public function teks_baris(){
        $data=array(
            'teks'=>$this->Setting_model->get_teks(),
        );
        $this->load->view('setting/teks_baris',$data);
    }

    public function tambah_teks_baris(){
        $teks=$this->input->post('teks',true);
        $date_create=date("Y-m-d H:i:s");
        $create_by=$this->session->userdata('username');
        $data=array(
            'teks'=>$teks,
            'date_create'=>$date_create,
            'create_by'=>$create_by,
        );

        $this->Setting_model->insert_text($data);
    }

    public function hapus_teks(){
        $id=$this->input->post('id',true);
        $this->Setting_model->delete_text($id);
    }

    public function set_setting(){
        $col=$this->input->post('col',true);
        $val=$this->input->post('val',true);
        $waktu='';
        $id='';
        if($col=="waktu_baris"){
            $waktu=$val*1000;
            $id="WAKTU BARIS";
        }else if($col=="waktu_antrian"){
            $waktu=($val*1000)*60;
            $id="WAKTU ANTRIAN";
        }else if($col=="waktu_slide"){
            $waktu=($val*1000)*60;
            $id="WAKTU SLIDE";
        }else if($col=="nama_app"){
            $waktu=$val;
            $id="NAMA APLIKASI";
        }else if($col=="alamat"){
            $waktu=$val;
            $id="JALAN";
        }
        $data=array(
            'col_val'=>$waktu,
        );
        $this->Setting_model->update_setting($id,$data);
    }

    public function ubah_logo(){
       foreach ($_FILES as $key) {
            $name = time().$key['name'];
            $file_ext = pathinfo($name, PATHINFO_EXTENSION);
            unlink('./assets/img/logo.'.$file_ext);
            $path = './assets/img/logo.'.$file_ext;
            @move_uploaded_file($key['tmp_name'],$path);
            $data=array(
                    'col_val'=>"assets/img/logo.".$file_ext,
                );
                $this->Setting_model->update_setting("LOGO",$data);
        } 
    }

}