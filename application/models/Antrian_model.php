<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Antrian_model extends CI_Model
{ 
    function __construct()
    {
        parent::__construct();
    }

    function import($data){
    	return $this->db->insert('antrian',$data);
    }

    function insert_tempat($data){
    	$this->db->insert('tempat_tahanan',$data);
    }

    function get_last_id(){
    	$this->db->order_by('id','DESC');
    	$this->db->limit(1,0);
    	$data=$this->db->get('tempat_tahanan')->row_array();
    	return $data['id'];
    }

    function get_this_id(){
    	$this->db->order_by('id','DESC');
    	$this->db->limit(1,0);
    	$data=$this->db->get('antrian')->row_array();
    	return $data['id'];
    }

    function get_row_by_id($id){
    	$this->db->where('antrian.id',$id);
        $this->db->join('tempat_tahanan','antrian.tempat_tahanan=tempat_tahanan.id');
    	return $this->db->get('antrian')->row_array();
    }

    function cek_tempat($tempat){
    	$this->db->where('tempat_tahanan',$tempat);
    	return $this->db->get('tempat_tahanan');
    }

    function update($id, $data){
        $this->db->where('id', $id);
        $this->db->update('antrian', $data);
    }

    function get_all_antrian($nama='',$no_lp='',$pasal='',$no_serpinhan='',$no_serpinhan_1='',$tempat_tahanan='',$limit='',$awal='',$baris=''){
        $this->db->select("antrian.id as id, nama, no_lp, pasal, no_sprinhan, no_sprinhan_1, tempat_tahanan.tempat_tahanan as tempat_tahanan, foto");
        if($nama!=''){
            $this->db->like('nama',$nama,"both");
        }
        if($no_lp!=''){
            $this->db->like('no_lp',$no_lp,"both");
        }
        if($pasal!=''){
            $this->db->like('pasal',$pasal,"both");
        }
        if($no_serpinhan!=''){
            $this->db->like('no_sprinhan',$no_serpinhan,"both");
        }
        if($no_serpinhan_1!=''){
            $this->db->like('no_sprinhan_1',$no_serpinhan_1,"both");
        }
        if($tempat_tahanan!=''){
            $this->db->like('tempat_tahanan.tempat_tahanan',$tempat_tahanan,"both");
        }
        if($limit=='limit'){
            $this->db->limit($baris,$awal);
        }

        $this->db->join('tempat_tahanan','antrian.tempat_tahanan=tempat_tahanan.id');
        $this->db->order_by('antrian.id','DESC');
        return $this->db->get('antrian');

    }

    function get_tampil_antrian($antrian=''){
        $this->db->select("antrian.id as id, umur, nama, no_lp, pasal, no_sprinhan, no_sprinhan_1, tempat_tahanan.tempat_tahanan as tempat_tahanan, foto, ket, lama_tahanan, date_create");
        $this->db->join('tempat_tahanan','antrian.tempat_tahanan=tempat_tahanan.id');
        if($antrian==1){
            $this->db->not_like('tempat_tahanan.tempat_tahanan',"tahti","both");
        }else{
            $this->db->like('tempat_tahanan.tempat_tahanan',"tahti","both");
        }
        
        $this->db->order_by('antrian.id','DESC');
        return $this->db->get('antrian');

    }

    function get_all_tempat_tahanan(){
        $this->db->order_by('id','desc');
        return $this->db->get('tempat_tahanan');
    }

    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('antrian');
    }

    function get_teks_baris(){
        $this->db->order_by('id','asc');
        return $this->db->get('teks_baris');
    }

}