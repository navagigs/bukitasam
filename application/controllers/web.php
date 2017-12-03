<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Web extends CI_Controller {
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
			$data['content']				= 'default/admin/content/home';
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 
	}

	public function user($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
			$data['content']				= 'default/admin/content/user';			
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'username';
				$data['nama']			= ($this->input->post('nama'))?$this->input->post('nama'):'';
				$data['username']			= ($this->input->post('username'))?$this->input->post('username'):'';
				$data['password']			= ($this->input->post('password'))?$this->input->post('password'):'';
				$data['jabatan']			= ($this->input->post('jabatan'))?$this->input->post('jabatan'):'';
				$data['alamat']				= ($this->input->post('alamat'))?$this->input->post('alamat'):'';
				$data['hak_akses']			= ($this->input->post('hak_akses'))?$this->input->post('hak_akses'):'';
				$simpan						=  $this->input->post('simpan');
				if($simpan) {
					$insert['nama']		= $data['nama'];
					$insert['username']	= $data['username'];
					$insert['password']	= md5($data['password']);
					$insert['jabatan']	= $data['jabatan'];
					$insert['alamat']	= $data['alamat'];
					$insert['hak_akses']= $data['hak_akses'];
					$this->ADM->insert_user($insert);
					$this->session->set_flashdata('success','Data user telah berhasil ditambahkan!,');
					redirect("web/user");
				}
			} elseif ($data['action'] == 'edit'){
				$where['username'] 			=  $filter2;		
				$data['onload']				= 'username';
				$where_user['username']	= $filter2;
				$user						= $this->ADM->get_user('',$where_user);
				//$data['id_user']			= ($this->input->post('id_user'))?$this->input->post('id_user'):$user->id_user;
				$data['nama']				= ($this->input->post('nama'))?$this->input->post('nama'):$user->nama;
				$data['username']			= ($this->input->post('username'))?$this->input->post('username'):$user->username;
				$data['password']			= ($this->input->post('password'))?$this->input->post('password'):$user->password;
				$data['jabatan']			= ($this->input->post('jabatan'))?$this->input->post('jabatan'):$user->jabatan;
				$data['alamat']				= ($this->input->post('alamat'))?$this->input->post('alamat'):$user->alamat;
				$data['hak_akses']			= ($this->input->post('hak_akses'))?$this->input->post('hak_akses'):$user->hak_akses;
				$simpan							= $this->input->post('simpan');
				if($simpan) {
					$where_edit['username']	= $data['username'];
					if($data['password'] == $data['password']) {
					$where_edit['username']	= $data['username'];
						if($data['password'] <> '') {
							$edit['password']		= do_hash(($data['password']), 'md5'); 
						}
					}
					$edit['nama']				= $data['nama'];
					$edit['jabatan']			= $data['jabatan'];
					$edit['alamat']				= $data['alamat'];
					$edit['hak_akses']			= $data['hak_akses'];
					$this->ADM->update_user($where_edit, $edit);
					$this->session->set_flashdata('success','Data user telah berhasil diedit!,');
					redirect("web/user");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['id_user'] 	= $filter2;
				$row = $this->ADM->get_user('*', $where_delete);
				$this->ADM->delete_user($where_delete);
				$this->session->set_flashdata('warning','Data user berhasil dihapus!,');
				redirect("web/user");
			}			
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 
	}

	public function stasiun($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
			$data['content']				= 'default/admin/content/stasiun';			
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'jarak';
				$data['jarak']				= ($this->input->post('jarak'))?$this->input->post('jarak'):'';
				$data['id_kereta']			= ($this->input->post('id_kereta'))?$this->input->post('id_kereta'):'';
				$data['id_pegawai']			= ($this->input->post('id_pegawai'))?$this->input->post('id_pegawai'):'';
				$simpan						=  $this->input->post('simpan');
				if($simpan) {
					$insert['jarak']		= $data['jarak'];
					$insert['id_kereta']	= $data['id_kereta'];
					$insert['id_pegawai']	= $data['id_pegawai'];
					$this->ADM->insert_stasiun($insert);
					$this->session->set_flashdata('success','Data stasiun telah berhasil ditambahkan!,');
					redirect("web/stasiun");
				}
			} elseif ($data['action'] == 'edit'){
				$where['id_stasiun'] 			=  $filter2;		
				$data['onload']					= 'id_stasiun';
				$where_stasiun['id_stasiun']	= $filter2;
				$stasiun						= $this->ADM->get_stasiun('',$where_stasiun);
				$data['jarak']					= ($this->input->post('jarak'))?$this->input->post('jarak'):$stasiun->jarak;
				$data['id_kereta']				= ($this->input->post('id_kereta'))?$this->input->post('id_kereta'):$stasiun->id_kereta;
				$data['id_pegawai']				= ($this->input->post('id_pegawai'))?$this->input->post('id_pegawai'):$stasiun->id_pegawai;
				$simpan							= $this->input->post('simpan');
				if($simpan) {
					$where_edit['jarak']		= $data['jarak'];
					$edit['id_kereta']			= $data['id_kereta'];
					$edit['id_pegawai']			= $data['id_pegawai'];
					$this->ADM->update_stasiun($where_edit, $edit);
					$this->session->set_flashdata('success','Data stasiun telah berhasil diedit!,');
					redirect("web/stasiun");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['id_stasiun'] 	= $filter2;
				$row = $this->ADM->get_stasiun('*', $where_delete);
				$this->ADM->delete_stasiun($where_delete);
				$this->session->set_flashdata('warning','Data stasiun berhasil dihapus!,');
				redirect("web/stasiun");
			}			
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 
	}

	public function kereta($filter1='', $filter2='', $filter3='')
    {
        if($this->session->userdata('logged_in') == TRUE){
            $where_user['username']         = $this->session->userdata('username');
            $data['user']                   = $this->ADM->get_user('',$where_user);
            $data['content']                = 'default/admin/content/kereta';          
            $data['action']                 = (empty($filter1))?'view':$filter1;
            if ($data['action'] == 'view'){
            } elseif ($data['action'] == 'tambah'){
                $data['onload']             = 'jumlah_gerbong';
                $data['jumlah_gerbong']     = ($this->input->post('jumlah_gerbong'))?$this->input->post('jumlah_gerbong'):'';
                $data['tujuan']         	= ($this->input->post('tujuan'))?$this->input->post('tujuan'):'';
                $simpan                     =  $this->input->post('simpan');
                if($simpan) {
                    $insert['jumlah_gerbong']= $data['jumlah_gerbong'];
                    $insert['id_kereta']     = $data['id_kereta'];
                    $insert['tujuan']   	 = $data['tujuan'];
                    $this->ADM->insert_kereta($insert);
                    $this->session->set_flashdata('success','Data kereta telah berhasil ditambahkan!,');
                    redirect("web/kereta");
                }
            } elseif ($data['action'] == 'edit'){
                $where['id_kereta']            =  $filter2;        
                $data['onload']                = 'id_kereta';
                $where_kereta['id_kereta']     = $filter2;
                $kereta                        = $this->ADM->get_kereta('',$where_kereta);
                $data['id_kereta']        		= ($this->input->post('id_kereta'))?$this->input->post('id_kereta'):$kereta->id_kereta;
                $data['jumlah_gerbong']        = ($this->input->post('jumlah_gerbong'))?$this->input->post('jumlah_gerbong'):$kereta->jumlah_gerbong;
                $data['tujuan']             	= ($this->input->post('tujuan'))?$this->input->post('tujuan'):$kereta->tujuan;
                $simpan                         = $this->input->post('simpan');
                if($simpan) {
                    $where_edit['id_kereta']    = $data['id_kereta'];
                    $edit['jumlah_gerbong']     = $data['jumlah_gerbong'];
                    $edit['tujuan']         	= $data['tujuan'];
                    $this->ADM->update_kereta($where_edit, $edit);
                    $this->session->set_flashdata('success','Data kereta telah berhasil diedit!,');
                    redirect("web/kereta");
                }
            } elseif ($data['action'] == 'hapus'){
                $where_delete['id_kereta']     = $filter2;
                $row = $this->ADM->get_kereta('*', $where_delete);
                $this->ADM->delete_kereta($where_delete);
                $this->session->set_flashdata('warning','Data kereta berhasil dihapus!,');
                redirect("web/kereta");
            }           
            $this->load->vars($data);
            $this->load->view('default/admin/home');
        } else {
            redirect("login");
        } 
    }

    public function pegawai($filter1='', $filter2='', $filter3='')
    {
        if($this->session->userdata('logged_in') == TRUE){
            $where_user['username']         = $this->session->userdata('username');
            $data['user']                   = $this->ADM->get_user('',$where_user);
            $data['content']                = 'default/admin/content/pegawai';          
            $data['action']                 = (empty($filter1))?'view':$filter1;
            if ($data['action'] == 'view'){
            } elseif ($data['action'] == 'tambah'){
                $data['onload']             = 'no_pegawai';
                $data['no_pegawai']    		= ($this->input->post('no_pegawai'))?$this->input->post('no_pegawai'):'';
                $data['nama']        		= ($this->input->post('nama'))?$this->input->post('nama'):'';
                $data['jabatan']            = ($this->input->post('jabatan'))?$this->input->post('jabatan'):'';
                $data['alamat']             = ($this->input->post('alamat'))?$this->input->post('alamat'):'';
                $data['status']             = ($this->input->post('status'))?$this->input->post('status'):'';
                $simpan                     =  $this->input->post('simpan');
                if($simpan) {
                    $insert['no_pegawai']   = $data['no_pegawai'];
                    $insert['nama']    		= $data['nama'];
                    $insert['jabatan']      = $data['jabatan'];
                    $insert['alamat']      	= $data['alamat'];
                    $insert['status']      	= $data['status'];
                    $this->ADM->insert_pegawai($insert);
                    $this->session->set_flashdata('success','Data pegawai telah berhasil ditambahkan!,');
                    redirect("web/pegawai");
                }
            } elseif ($data['action'] == 'edit'){
                $where['id_pegawai']            =  $filter2;        
                $data['onload']                 = 'id_pegawai';
                $where_pegawai['id_pegawai']    = $filter2;
                $pegawai                        = $this->ADM->get_pegawai('',$where_pegawai);
                $data['id_pegawai']        		= ($this->input->post('id_pegawai'))?$this->input->post('id_pegawai'):$pegawai->id_pegawai;
                $data['no_pegawai']        		= ($this->input->post('no_pegawai'))?$this->input->post('no_pegawai'):$pegawai->no_pegawai;
                $data['nama']             		= ($this->input->post('nama'))?$this->input->post('nama'):$pegawai->nama;
                $data['jabatan']                = ($this->input->post('jabatan'))?$this->input->post('jabatan'):$pegawai->jabatan;
                $data['alamat']                 = ($this->input->post('alamat'))?$this->input->post('alamat'):$pegawai->alamat;
                $data['status']                 = ($this->input->post('status'))?$this->input->post('status'):$pegawai->status;
                $simpan                         = $this->input->post('simpan');
                if($simpan) {
                    $where_edit['no_pegawai']	= $data['no_pegawai'];
                    $edit['nama']         		= $data['nama'];
                    $edit['jabatan']         	= $data['jabatan'];
                    $edit['alamat']         	= $data['alamat'];
                    $edit['status']         	= $data['status'];
                    $this->ADM->update_pegawai($where_edit, $edit);
                    $this->session->set_flashdata('success','Data pegawai telah berhasil diedit!,');
                    redirect("web/pegawai");
                }
            } elseif ($data['action'] == 'hapus'){
                $where_delete['id_pegawai']     = $filter2;
                $row = $this->ADM->get_pegawai('*', $where_delete);
                $this->ADM->delete_pegawai($where_delete);
                $this->session->set_flashdata('warning','Data pegawai berhasil dihapus!,');
                redirect("web/pegawai");
            }           
            $this->load->vars($data);
            $this->load->view('default/admin/home');
        } else {
            redirect("login");
        } 
    }


    public function surat($filter1='', $filter2='', $filter3='')
    {
        if($this->session->userdata('logged_in') == TRUE){
            $where_user['username']         = $this->session->userdata('username');
            $data['user']                   = $this->ADM->get_user('',$where_user);
            $data['content']                = 'default/admin/content/surat';          
            $data['action']                 = (empty($filter1))?'view':$filter1;
            if ($data['action'] == 'view'){
            } elseif ($data['action'] == 'tambah'){
                $data['onload']             = 'no_surat_angkut';
                $data['no_surat_angkut']    = ($this->input->post('no_surat_angkut'))?$this->input->post('no_surat_angkut'):'';
               // $data['pengisian_ke']       = ($this->input->post('pengisian_ke'))?$this->input->post('pengisian_ke'):'';
                $data['id_pegawai']         = ($this->input->post('id_pegawai'))?$this->input->post('id_pegawai'):'';
                $data['tujuan']             = ($this->input->post('tujuan'))?$this->input->post('tujuan'):'';
                $simpan                     =  $this->input->post('simpan');
                if($simpan) {
                    $insert['no_surat_angkut']  = $data['no_surat_angkut'];
                  //  $insert['pengisian_ke']     = $data['pengisian_ke'];
                    $insert['id_pegawai']       = $data['id_pegawai'];
                    $insert['tujuan']           = $data['tujuan'];
                    $this->ADM->insert_surat($insert);
                    $this->session->set_flashdata('success','Data surat telah berhasil ditambahkan!,');
                    redirect("web/surat");
                }
            } elseif ($data['action'] == 'edit'){
                $where['id_surat_angkut']       =  $filter2;        
                $data['onload']                = 'id_surat_angkut';
                $where_surat['id_surat_angkut'] = $filter2;
                $surat                          = $this->ADM->get_surat('',$where_surat);
                $data['id_surat_angkut']        = ($this->input->post('id_surat_angkut'))?$this->input->post('id_surat_angkut'):$surat->id_surat_angkut;
                $data['no_surat_angkut']        = ($this->input->post('no_surat_angkut'))?$this->input->post('no_surat_angkut'):$surat->no_surat_angkut;
                //$data['pengisian_ke']           = ($this->input->post('pengisian_ke'))?$this->input->post('pengisian_ke'):$surat->pengisian_ke;
                $data['id_pegawai']             = ($this->input->post('id_pegawai'))?$this->input->post('id_pegawai'):$surat->id_pegawai;
                $data['tujuan']             = ($this->input->post('tujuan'))?$this->input->post('tujuan'):$surat->tujuan;
                $simpan                         = $this->input->post('simpan');
                if($simpan) {
                    $where_edit['id_surat_angkut']    = $data['id_surat_angkut'];
                    $edit['no_surat_angkut']          = $data['no_surat_angkut'];
                  //  $edit['pengisian_ke']             = $data['pengisian_ke'];
                    $edit['id_pegawai']               = $data['id_pegawai'];
                    $edit['tujuan']                   = $data['tujuan'];
                    $this->ADM->update_surat($where_edit, $edit);
                    $this->session->set_flashdata('success','Data surat telah berhasil diedit!,');
                    redirect("web/surat");
                }
            } elseif ($data['action'] == 'hapus'){
                $where_delete['id_surat_angkut']     = $filter2;
                $row = $this->ADM->get_surat('*', $where_delete);
                $this->ADM->delete_surat($where_delete);
                $this->session->set_flashdata('warning','Data surat berhasil dihapus!,');
                redirect("web/surat");
            }           
            $this->load->vars($data);
            $this->load->view('default/admin/home');
        } else {
            redirect("login");
        } 
    }

    public function tls($filter1='', $filter2='', $filter3='')
    {
        if($this->session->userdata('logged_in') == TRUE){
            $where_user['username']         = $this->session->userdata('username');
            $data['user']                   = $this->ADM->get_user('',$where_user);
            $data['content']                = 'default/admin/content/tls';          
            $data['action']                 = (empty($filter1))?'view':$filter1;
            if ($data['action'] == 'rcd'){
            } elseif ($data['action'] == 'tambah'){
                $data['onload']             = 'no_dok';
                $data['no_dok']    		    = ($this->input->post('no_dok'))?$this->input->post('no_dok'):'';
                $data['no_surat_angkut']    = ($this->input->post('no_surat_angkut'))?$this->input->post('no_surat_angkut'):'';
                $data['tanggal']        	= ($this->input->post('tanggal'))?$this->input->post('tanggal'):'';
                $data['jumlah_tonase']      = ($this->input->post('jumlah_tonase'))?$this->input->post('jumlah_tonase'):'';
                $data['no_gerbong']         = ($this->input->post('no_gerbong'))?$this->input->post('no_gerbong'):'';
                $data['pengisian_ke']       = ($this->input->post('pengisian_ke'))?$this->input->post('pengisian_ke'):'';
                $data['jenis_batubara']     = ($this->input->post('jenis_batubara'))?$this->input->post('jenis_batubara'):'';
                $data['id_kereta']          = ($this->input->post('id_kereta'))?$this->input->post('id_kereta'):'';
                $simpan                     =  $this->input->post('simpan');
                if($simpan) {
                    $insert['no_dok']           = $data['no_dok'];
                    $insert['no_surat_angkut']  = $data['no_surat_angkut'];
                    $insert['tanggal']    		= $data['tanggal'];
                    $insert['jumlah_tonase']    = $data['jumlah_tonase'];
                    $insert['no_gerbong']      	= $data['no_gerbong'];
                    $insert['pengisian_ke']     = $data['pengisian_ke'];
                    $insert['jenis_batubara']   = $data['jenis_batubara'];
                    $insert['id_kereta']        = $data['id_kereta'];
                    $this->ADM->insert_tls($insert);
                    $this->session->set_flashdata('success','Data TLS telah berhasil ditambahkan!,');
                    redirect("web/tls");
                }
            } elseif ($data['action'] == 'edit'){
                $where['id_tls']            =  $filter2;        
                $data['onload']             = 'id_tls';
                $where_tls['id_tls']    	= $filter2;
                $tls                        = $this->ADM->get_tls('',$where_tls);
                $data['id_tls']        		= ($this->input->post('id_tls'))?$this->input->post('id_tls'):$tls->id_tls;
                $data['no_dok']        		= ($this->input->post('no_dok'))?$this->input->post('no_dok'):$tls->no_dok;
                $data['tanggal']            = ($this->input->post('tanggal'))?$this->input->post('tanggal'):$tls->tanggal;
                $data['jumlah_tonase']      = ($this->input->post('jumlah_tonase'))?$this->input->post('jumlah_tonase'):$tls->jumlah_tonase;
                $data['no_gerbong']         = ($this->input->post('no_gerbong'))?$this->input->post('no_gerbong'):$tls->no_gerbong;
                $data['pengisian_ke']       = ($this->input->post('pengisian_ke'))?$this->input->post('pengisian_ke'):$tls->pengisian_ke;
                $data['jenis_batubara']     = ($this->input->post('jenis_batubara'))?$this->input->post('jenis_batubara'):$tls->jenis_batubara;
                $data['id_kereta']     		= ($this->input->post('id_kereta'))?$this->input->post('id_kereta'):$tls->id_kereta;
                $simpan                     = $this->input->post('simpan');
                if($simpan) {
                    $where_edit['id_tls']			= $data['id_tls'];
                    $edit['no_dok']					= $data['no_dok'];
                    $edit['tanggal']         		= $data['tanggal'];
                    $edit['jumlah_tonase']         	= $data['jumlah_tonase'];
                    $edit['no_gerbong']         	= $data['no_gerbong'];
                    $edit['pengisian_ke']         	= $data['pengisian_ke'];
                    $edit['jenis_batubara']         = $data['jenis_batubara'];
                    $edit['id_kereta']         		= $data['id_kereta'];
                    $this->ADM->update_tls($where_edit, $edit);
                    $this->session->set_flashdata('success','Data TLS telah berhasil diedit!,');
                    redirect("web/tls");
                }
            } elseif ($data['action'] == 'hapus'){
                $where_delete['id_tls']     = $filter2;
                $row = $this->ADM->get_tls('*', $where_delete);
                $this->ADM->delete_tls($where_delete);
                $this->session->set_flashdata('warning','Data TLS berhasil dihapus!,');
                redirect("web/tls");
            }elseif ($data['action'] == 'status'){
				$where_edit['id_tls']	= $filter2; 
				if ($filter3 == 'BONGKAR') {
					$edit['status'] = 'MUAT';
				} else {
 					$edit['status']= 'BONGKAR';
				}
				$this->ADM->update_tls($where_edit, $edit);
				$this->session->set_flashdata('success','Status TLS telah berhasil diedit!,');
				redirect("web/tls");
			}           
            $this->load->vars($data);
            $this->load->view('default/admin/home');
        } else {
            redirect("login");
        } 
    }


     public function singgah($filter1='', $filter2='', $filter3='')
    {
        if($this->session->userdata('logged_in') == TRUE){
            $where_user['username']         = $this->session->userdata('username');
			@date_default_timezone_set('Asia/Jakarta');
            $data['user']                   = $this->ADM->get_user('',$where_user);
            $data['content']                = 'default/admin/content/singgah';          
            $data['action']                 = (empty($filter1))?'view':$filter1;
            if ($data['action'] == 'view'){
            } elseif ($data['action'] == 'tambah'){
                $data['onload']             = 'no_singgah';
                $data['nama_singgah']       = ($this->input->post('nama_singgah'))?$this->input->post('nama_singgah'):'';
                $data['waktu']            	= ($this->input->post('waktu'))?$this->input->post('waktu'):'';
                $data['id_surat_angkut']    = ($this->input->post('id_surat_angkut'))?$this->input->post('id_surat_angkut'):'';
                $data['status']             = ($this->input->post('status'))?$this->input->post('status'):'';
                $simpan                     =  $this->input->post('simpan');
                if($simpan) {
                    $insert['nama_singgah'] = $data['nama_singgah'];
                    $insert['waktu']      	= $data['waktu'];
                    $insert['id_surat_angkut']= $data['id_surat_angkut'];
                    $insert['status']       = $data['status'];
                    $this->ADM->insert_singgah($insert);
                    $this->session->set_flashdata('success','Data singgah telah berhasil ditambahkan!,');
                    redirect("web/singgah");
                }
            } elseif ($data['action'] == 'edit'){
                $where['id_tls']            =  $filter2;        
                $data['onload']                 = 'id_tls';
                $where_tls['id_tls']    = $filter2;
                $tls                        = $this->ADM->get_tls('',$where_tls);
                $data['id_tls']             = ($this->input->post('id_tls'))?$this->input->post('id_tls'):$tls->id_tls;
                $data['posisi']          	= ($this->input->post('posisi'))?$this->input->post('posisi'):$tls->posisi;
                $simpan                         = $this->input->post('simpan');
                if($simpan) {
                    $where_edit['id_tls'] = $data['id_tls'];
                    $edit['posisi']       = $data['posisi'];
                    $this->ADM->update_tls($where_edit, $edit);
                    $this->session->set_flashdata('success','Data singgah telah berhasil diedit!,');
                    redirect("web/singgah");
                }
            } elseif ($data['action'] == 'hapus'){
                $where_delete['id_tls']     = $filter2;
                $row = $this->ADM->get_tls('*', $where_delete);
                $this->ADM->delete_tls($where_delete);
                $this->session->set_flashdata('warning','Data singgah berhasil dihapus!,');
                redirect("web/singgah");
            }           
            $this->load->vars($data);
            $this->load->view('default/admin/home');
        } else {
            redirect("login");
        } 
    }


    public function print_tls($id_tls='')
    {
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
            $where_tls['id_tls'] 			= $id_tls;
            $data['tls']        			= $this->ADM->get_tls('',$where_tls);
			$this->load->vars($data);
			$this->load->view('default/admin/content/print_tls');
	  } else {
			redirect("login");
	  }
	}



    public function laporan_tls($filter1='', $filter2='', $filter3='')
    {
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
			$data['action']						= (empty($filter1))?'view':$filter1;
            $data['content']                = 'default/admin/content/laporan_tls';       
			$this->load->vars($data);
            $this->load->view('default/admin/home');
	  } else {
			redirect("login");
	  }
	}

	 public function laporan($filter1='', $filter2='', $filter3='')
    {
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
			$data['action']						= (empty($filter1))?'view':$filter1;
            $data['content']                = 'default/admin/content/laporan';   
            if ($data['action'] == 'view'){
            } elseif ($data['action'] == 'kereta'){
            }    
			$this->load->vars($data);
            $this->load->view('default/admin/home');
	  } else {
			redirect("login");
	  }
	}

	public function laporantls($filter1='', $filter2='', $filter3='')
    {
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
				        header("Pragma: public");
				        header("Expires: 0");
				        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
				        header("Content-Type: application/force-download");
				        header("Content-Type: application/octet-stream");
				        header("Content-Type: application/download");
				        header("Content-Disposition: attachment;filename=LaporanTLS.xls");
				        header("Content-Transfer-Encoding: binary ");
			$this->load->vars($data);
			$this->load->view('default/admin/content/laporan_tls2');
	  } else {
			redirect("login");
	  }
	}

	public function laporankereta($filter1='', $filter2='', $filter3='')
    {
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
				        header("Pragma: public");
				        header("Expires: 0");
				        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
				        header("Content-Type: application/force-download");
				        header("Content-Type: application/octet-stream");
				        header("Content-Type: application/download");
				        header("Content-Disposition: attachment;filename=LaporanKereta.xls");
				        header("Content-Transfer-Encoding: binary ");
			$this->load->vars($data);
			$this->load->view('default/admin/content/laporankereta');
	  } else {
			redirect("login");
	  }
	}

	public function laporanstasiun($filter1='', $filter2='', $filter3='')
    {
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
				        header("Pragma: public");
				        header("Expires: 0");
				        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
				        header("Content-Type: application/force-download");
				        header("Content-Type: application/octet-stream");
				        header("Content-Type: application/download");
				        header("Content-Disposition: attachment;filename=LaporanStasiun.xls");
				        header("Content-Transfer-Encoding: binary ");
			$this->load->vars($data);
			$this->load->view('default/admin/content/laporanstasiun');
	  } else {
			redirect("login");
	  }
	}
	

	public function laporansinggah($filter1='', $filter2='', $filter3='')
    {
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
				        header("Pragma: public");
				        header("Expires: 0");
				        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
				        header("Content-Type: application/force-download");
				        header("Content-Type: application/octet-stream");
				        header("Content-Type: application/download");
				        header("Content-Disposition: attachment;filename=LaporanSinggah.xls");
				        header("Content-Transfer-Encoding: binary ");
			$this->load->vars($data);
			$this->load->view('default/admin/content/laporansinggah');
	  } else {
			redirect("login");
	  }
	}

	public function laporansurat($filter1='', $filter2='', $filter3='')
    {
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
				        header("Pragma: public");
				        header("Expires: 0");
				        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
				        header("Content-Type: application/force-download");
				        header("Content-Type: application/octet-stream");
				        header("Content-Type: application/download");
				        header("Content-Disposition: attachment;filename=LaporanSurat.xls");
				        header("Content-Transfer-Encoding: binary ");
			$this->load->vars($data);
			$this->load->view('default/admin/content/laporansurat');
	  } else {
			redirect("login");
	  }
	}


	public function laporansemua($filter1='', $filter2='', $filter3='')
    {
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
				        header("Pragma: public");
				        header("Expires: 0");
				        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
				        header("Content-Type: application/force-download");
				        header("Content-Type: application/octet-stream");
				        header("Content-Type: application/download");
				        header("Content-Disposition: attachment;filename=Laporan.xls");
				        header("Content-Transfer-Encoding: binary ");
			$this->load->vars($data);
			$this->load->view('default/admin/content/laporansemua');
	  } else {
			redirect("login");
	  }
	}
}