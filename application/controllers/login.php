<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login', 'LOG', TRUE);
	}
	
	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE){       
            redirect('login/','refresh');
        } else {     
		$this->load->view('default/admin/login');               
        } 
	}

	public function ceklogin()
	{
		$username		= $this->input->post('username');
		$password		= $this->input->post('password');
		$do				= $this->input->post('masuk');
		
		$where_login['username']	= $username;
		$where_login['password']	= do_hash($password, 'md5');
		
		if ($do && $this->LOG->cek_login($where_login) === TRUE){
			redirect("web/");
		} else {
			$this->session->set_flashdata('warning','Username dan Password tidak cocok!');
            redirect("login");
		}
	}

	public function keluar()
	{
		$this->LOG->remov_session();
        session_destroy();
		redirect("login");
	}
	
}

