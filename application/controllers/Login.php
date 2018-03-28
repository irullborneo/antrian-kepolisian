<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$cek_login=$this->session->userdata('id');
		if(isset($cek_login)){
			redirect(site_url());
		}
		$this->load->model('Login_model');
	}

	public function index()
	{
		$komponen=array(
			'title'=>"Login",
		);

		$this->load->view('login',$komponen);
	}

	public function ceklogin(){
		$username=$this->anti_injection($this->input->post('username',true));
		$password=md5($this->anti_injection($this->input->post('password',true)));

		$cekuser=$this->Login_model->cekuser($username)->num_rows();
		if($cekuser == 1){
			$cekuser=$this->Login_model->cekuser($username,$password);
			if($cekuser->num_rows() == 1){
				$user=$cekuser->row_array();
				if($user['status']==1 || $user['status']==2){
					$data_session=array(
	                    "id"=>$user['id'],
	                    "username"=>$user['username'],
	                    "nama"=>$user['nama'],
	                    "level"=>$user['id_level']
	                );
	                $this->session->set_userdata($data_session);

	                $data=array(
	                	'last_login'=>date("Y-m-d H:i:s"),
	                	'ip_address'=>$this->input->ip_address(),
	                );

	                $this->Login_model->update($data,$user['id']);
				}
				else{
					echo '<div class="alert alert-danger alert-dismissable fade in">
		    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    				<strong>Gagal!</strong> Anda tidak bisa mengakses ini
		  			</div>';
				}
			}
			else{
				echo '<div class="alert alert-danger alert-dismissable fade in">
	    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    				<strong>Gagal!</strong> Password yang digunakan salah
	  			</div>';
			}
		}
		else{
			echo '<div class="alert alert-danger alert-dismissable fade in">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				<strong>Gagal!</strong> Username yang digunakan salah
  			</div>';
		}

		
	}

	private function anti_injection($data){
	  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	  return $filter;
	}
}
