<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model
{ 
    function __construct()
    {
        parent::__construct();
    }

    function cekuser($username,$password=''){
    	$this->db->where('username',$username);
    	if($password!=''){
    		$this->db->where('password',$password);
    	}
    	return $this->db->get('user');
    }

    function update($data,$id){
        $this->db->where('id',$id);
        $this->db->update('user',$data);
    }

}