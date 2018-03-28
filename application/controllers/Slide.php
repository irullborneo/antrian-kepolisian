<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slide extends CI_Controller
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

        $this->load->model('Slide_model');
    }

    private function konten($konten="",$id=''){
    	switch ($konten) {
            case 'slide':
                $data=array();
                return $this->load->view('slide/list',$data,true);
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
        	'title'=>"Slide",
        	'konten'=>$this->konten('slide'),
        );

        $this->load->view("template",$komponen);
    }

    public function table_list(){
        $data=array(
            'slide'=>$this->Slide_model->get_all(),
        );
        $this->load->view('slide/table_list',$data);
    }

    public function upload(){
        $filetype = array('jpg','png','JPG','PNG');
        foreach ($_FILES as $key) {
            $name = time().$key['name'];
            $path = './assets/slide/'.$name;
            @move_uploaded_file($key['tmp_name'],$path);
            $data=array(
                'foto'=>"slide/".$name,
                'status'=>'1',
                'date_create'=>date("Y-m-d H:i:s"),
                'create_by'=>$this->session->userdata('username'),
            );
            $this->Slide_model->insert($data);
            echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b><i class="icon fa fa-check"></i> Berhasil</b> Foto telah disimpan.</div>';
        }
    }

    public function hapus(){
        $id=$this->input->post('id',true);
        $this->Slide_model->delete($id);
        echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b><i class="icon fa fa-check"></i> Berhasil</b> Foto telah dihapus</div>';
    }
}