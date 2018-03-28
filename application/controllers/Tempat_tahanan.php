<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tempat_tahanan extends CI_Controller
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

        $this->load->model('Tempat_tahanan_model');
    }

    private function konten($konten="",$id=''){
    	switch ($konten) {
            case 'tempat_tahanan':
                $data=array();
                return $this->load->view('tempat_tahanan/list',$data,true);
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
        	'title'=>"Tempat Tahanan",
        	'konten'=>$this->konten('tempat_tahanan'),
        );

        $this->load->view("template",$komponen);
    }

    public function table_list(){
        $p=abs($this->input->post('p',true))==0 ? 1:abs($this->input->post('p',true));
        $baris=20;
        $awal=($p-1)*$baris;

        $tempat_tahanan=$this->input->post('tempat_tahanan',true);

        $data=array(
            'tempat_tahanan'=>$tempat_tahanan,
            'tempat'=>$this->Tempat_tahanan_model->get_all_tempat($tempat_tahanan,'limit',$awal,$baris),
            'banyak_tempat'=>$this->Tempat_tahanan_model->get_all_tempat($tempat_tahanan),
            'baris'=>$baris,
            'p'=>$p,
        );
        $this->load->view('tempat_tahanan/table_list',$data);
    }

    public function tambah_action(){
        $data=array(
            'tempat_tahanan'=>$this->input->post('tempat_tahanan',true),
        );
        $insert = $this->Tempat_tahanan_model->insert($data);
        if($insert==1){
            echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b><i class="icon fa fa-check"></i> Sukses</b> Data berhasil ditambahkan.</div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b><i class="icon fa fa-check"></i> Gagal</b> Data gagal ditambahkan.</div>';
        }
    }

    public function edit(){
        $id=$this->input->post('id',true);
        $data=array(
            'id'=>$id,
            'edit'=>$this->Tempat_tahanan_model->get_row_by_id($id),
        );
        $this->load->view('tempat_tahanan/edit',$data);
    }

    public function edit_action(){
        $data=array(
            'tempat_tahanan'=>$this->input->post('tempat_tahanan',true),
        );
        $this->Tempat_tahanan_model->update($this->input->post('id',true),$data);
        echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b><i class="icon fa fa-check"></i> Sukses</b> Data berhasil diupdate.</div>';
    }

    public function hapus(){
        $id=$this->input->post('id',true);
        $this->Tempat_tahanan_model->delete($id);
        echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b><i class="icon fa fa-check"></i> Sukses</b> Data telah dihapus</div>';
    }
}