<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
      {
          parent::__construct();

             $this->load->model('m_login');
      }


	function index()
	{
		$this->load->view('login_header');
		$this->load->view('login_page');
		$this->load->view('login_footer');
	}

	function validate()
	{
		if(isset($_POST['login'])){
			$nip_nik = $this->input->post('nip_nik',true);
			$password = $this->input->post('password',true);
			$is_valid = $this->m_login->validate($nip_nik,$password);
			if($is_valid)
			{
			    $pegawai = $this->m_login->get_pegawai($nip_nik,$password);
  				
	            $nama_pegawai 	= $pegawai->nama_pegawai;
	            $nip_nik	 	= $pegawai->nip_nik;                
	            $password 		= $pegawai->password;                 
	            $otoritas 		= $pegawai->otoritas;
	            $id_pegawai		= $pegawai->id_pegawai;
	            if($otoritas=='Admin')
	            {
	            	$data = array(
          				'admin_nama' 		=> $nama_pegawai, 
          				'admin_password' 	=> $password,
          				'admin_otoritas'	=> $otoritas,
          				'admin_nip_nik'		=> $nip_nik,
          				'admin_id'			=> $id_pegawai,
          				'is_logged_in' 		=> true
          			);
          			$this->session->set_userdata($data); /*Here  setting the Admin datas in session */
	            	redirect('admin/data_pegawai');
	            }
	            elseif($otoritas=='Pengawas')
	            {
	            	$data = array(
	            		'pengawas_nama'			=> $nama_pegawai, 
	            		'pengawas_password' 	=> $password,
	            		'pengawas_otoritas'		=> $otoritas,
	            		'pengawas_nip_nik'		=> $nip_nik,
	            		'pengawas_id'			=> $id_pegawai,
	            		'pengawas_is_logged_in' => true
	            	);
	            	$this->session->set_userdata($data); /*Here  setting the Pengawas datas in session */
	            	redirect('pengawas/skp');
	            }
	            elseif($otoritas=='Pegawai Bidang PTK')
	            {
	            	$data = array(
	            		'pegawai_nama' 			=> $nama_pegawai, 
	            		'pegawai_password' 		=> $password,
	            		'pegawai_otoritas'		=> $otoritas,
	            		'pegawai_nip_nik'		=> $nip_nik,
	            		'pegawai_id'			=> $id_pegawai,
	            		'pegawai_is_logged_in' 	=> true
	            	);
	            	$this->session->set_userdata($data); /*Here  setting the Pegawai Bidang datas in session */
	            	redirect('kasiptk/skp');
	            }
	            elseif($otoritas=='Kepala Bidang PTK')
	            {
	            	$data = array(
	            		'kabid_nama' 			=> $nama_pegawai, 
	            		'kabid_password' 		=> $password,
	            		'kabid_otoritas'		=> $otoritas,
	            		'kabid_nip_nik'			=> $nip_nik,
	            		'kabid_id'				=> $id_pegawai,
	            		'kabid_is_logged_in' 	=> true
	            	);
	            	$this->session->set_userdata($data); /*Here  setting the Kepala Bidang datas in session */
	            	redirect('kabidptk/skp');
	            }
	            elseif($otoritas=='Kepala Dinas')
	            {
	            	$data = array(
	            		'kadin_nama' 			=> $nama_pegawai, 
	            		'kadin_password' 		=> $password,
	            		'kadin_otoritas'		=> $otoritas,
	            		'kadin_nip_nik'			=> $nip_nik,
	            		'kadin_id'				=> $id_pegawai,
	            		'kadin_is_logged_in' 	=> true
	            	);
	            	$this->session->set_userdata($data); /*Here  setting the Kepala Dinas datas in session */
	            	redirect('kadin/skp');
	            }
        	}
        	else // incorrect username or password
        	{
        		$this->session->set_flashdata('msg1', 'Username or Password Incorrect!');
          		redirect('login');
          	}
	    }
	}

	public function logout()
	{
		$this->session->unset_userdata($this->adminLogout());
		$this->session->unset_userdata($this->pengawasLogout());
		$this->session->unset_userdata($this->pegawaiLogout());
		$this->session->unset_userdata($this->kabidLogout());
		$this->session->unset_userdata($this->kadinLogout());
        $this->session->set_flashdata('msg', 'User Signed Out Now!');
        redirect('login');
	}

	public function adminLogout()
    {             
  		$array_items = array(
	        'admin_nama',
			'admin_password',
			'admin_otoritas',
			'admin_id',
			'is_logged_in',
			'pengawas_nama'
    	);
        return $array_items;
    }

    public function pengawasLogout()
    {             
  		$array_items = array(
	        'pengawas_nama',
			'pengawas_password',
			'pengawas_otoritas',
			'pengawas_id',
			'pengawas_is_logged_in',
    	);
        return $array_items;
    }

    public function pegawaiLogout()
    {             
  		$array_items = array(
	        'pegawai_nama',
			'pegawai_password',
			'pegawai_otoritas',
			'pegawai_id',
			'pegawai_is_logged_in',
    	);
        return $array_items;
    }

    public function kabidLogout()
    {             
  		$array_items = array(
	        'kabid_nama',
			'kabid_password',
			'kabid_otoritas',
			'kabid_id',
			'kabid_is_logged_in',
    	);
        return $array_items;
    }

    public function kadinLogout()
    {             
  		$array_items = array(
	        'kadin_nama',
			'kadin_password',
			'kadin_otoritas',
			'kadin_id',
			'kadin_is_logged_in',
    	);
        return $array_items;
    }

}