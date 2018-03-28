<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting_model extends CI_Model
{ 
    function __construct()
    {
        parent::__construct();
    }

    function get_teks(){
        $this->db->order_by('id','desc');
        return $this->db->get('teks_baris');
    }

    function insert_text($data){
        $this->db->insert('teks_baris',$data);
    }

    function delete_text($id){
        $this->db->where('id',$id);
        $this->db->delete('teks_baris');
    }

    function update_setting($col,$data){
        $this->db->where('col_name',$col);
        $this->db->update('setting',$data);
    }

}