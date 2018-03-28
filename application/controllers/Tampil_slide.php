<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tampil_slide extends CI_Controller
{
    function __construct()
    {
        
        parent::__construct();

        $this->load->model('Slide_model');
    }

    public function index()
    {
        $data=array(
        	'title'=>"Slide",
            'slide'=>$this->Slide_model->get_all(),
            'time'=>$this->myapp->get_val('WAKTU SLIDE')
        );

        $this->load->view("tampil/slide",$data);
    }
}