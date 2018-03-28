<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tampil_antrian extends CI_Controller
{
    function __construct()
    {
        
        parent::__construct();

        $this->load->model('Antrian_model');
    }

    public function index()
    {
        $data=array(
        	'title'=>"Antrian",
            'tampil'=>$this->Antrian_model->get_tampil_antrian(),
            'teks_baris'=>$this->Antrian_model->get_teks_baris(),
            'time_baris'=>$this->myapp->get_val('WAKTU BARIS'),
            'time'=>$this->myapp->get_val('WAKTU ANTRIAN'),
            'antrian'=>$this->Antrian_model->get_tampil_antrian(2),
            'antrian_2'=>$this->Antrian_model->get_tampil_antrian(1),
        );

        $this->load->view("tampil/antrian",$data);
    }

    public function baris(){
        $data=array(
            
        );
        $this->load->view('tampil/antrian_baris',$data);
    }
}