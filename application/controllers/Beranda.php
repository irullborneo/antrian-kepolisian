<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Beranda extends CI_Controller
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

        $this->load->model('Beranda_model');
    }

    private function konten($konten=""){
    	switch ($konten) {
            case 'beranda':
                $data=array();
                return $this->load->view('beranda',$data,true);
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
        	'title'=>"Beranda",
        	'konten'=>$this->konten('beranda'),
        );

        $this->load->view("template",$komponen);
    } 

}