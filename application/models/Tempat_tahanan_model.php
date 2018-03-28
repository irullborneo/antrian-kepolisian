<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tempat_tahanan_model extends CI_Model
{ 
    function __construct()
    {
        parent::__construct();
    }

    function get_all_tempat($tempat_tahanan='',$limit='',$awal='',$baris=''){
    	if($tempat_tahanan!=''){
            $this->db->like('tempat_tahanan',$tempat_tahanan,"both");
        }
        if($limit=='limit'){
            $this->db->limit($baris,$awal);
        }
        $this->db->order_by('id','DESC');
        return $this->db->get('tempat_tahanan');
    }

    function insert($data){
    	return $this->db->insert('tempat_tahanan',$data);
    }

    function get_row_by_id($id){
    	$this->db->where('id',$id);
    	return $this->db->get('tempat_tahanan')->row_array();
    }

    function update($id, $data){
        $this->db->where('id', $id);
        $this->db->update('tempat_tahanan', $data);
    }

    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('tempat_tahanan');
    }

}