<?php
class M_login extends CI_Model {
	
	function __contsruct(){
		parent::Model();
	}
	
	function cek_login($where){
		$data = "";
		$this->db->select("*");
		$this->db->from("user");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0) {
			$data = $Q->row();
			$this->set_session($data);
			return true;
		}
		return false;
	}
	
	function set_session(&$data){
		$session = array(
					'user_id' 	=> $data->user_id,
					'username' 	=> $data->username,
					'password' 	=> $data->password,
					'hak_akses' => $data->hak_akses,
					'logged_in'	=> TRUE
					);
		$this->session->set_userdata($session);
	}
	
	function update_log($where){
		$where['user_id'] = $data->user_id;
		$this->db->update('user',$data,$where);
	}
	
	function remov_session() {
		$session = array(
					'user_id'  =>'',
					'username'  =>'',
					'password'  =>'',
					'hak_akses'  =>'',
					'logged_in'	  => FALSE
					);
		$this->session->unset_userdata($session);
	}
		
	
}