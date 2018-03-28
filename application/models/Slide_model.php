<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slide_model extends CI_Model
{ 
    function __construct()
    {
        parent::__construct();
    }

    function insert($data){
        $this->db->insert('slide',$data);
    }

    function get_all(){
        $this->db->order_by('id',"ASC");
        return $this->db->get('slide');
    }

    function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('slide');
    }

}