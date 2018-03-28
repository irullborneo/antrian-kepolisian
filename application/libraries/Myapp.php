<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myapp {

  private $ci;
  public function __construct(){
    $this->ci =& get_instance();
  }

  public function get_val($col){
    $this->ci->db->where('col_name',$col);
    $data=$this->ci->db->get('setting')->row_array();
    return $data['col_val'];
  }
    
}