<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_user');
				
			/*session checks */ 

			/*if($this->session->userdata('is_logged_in')=='')
			{
			 $this->session->set_flashdata('msg','Please Login to Continue');
			 redirect('login');
			}*/
		}

		Public function index()
		{
			$data['user']=$this->m_user->get_user()->result();			
			$this->load->view('header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('admin/v_data_pengguna', $data);
			$this->load->view('footer');
		}
	 
		// public function addNewPegawaiPage()
		// {
		// 	//$this->global['pageTitle'] = 'Tambah User';
		// 	$this->load->view('header');
		// 	$this->load->view('admin/sidebar');
		// 	$this->load->view('admin/v_data_pegawai-tambah');
		// 	$this->load->view('footer');
		// }

		// public function addNewPengawasPage()
		// {
		// 	//$this->global['pageTitle'] = 'Tambah User';
		// 	$this->load->view('header');
		// 	$this->load->view('admin/sidebar');
		// 	$this->load->view('admin/v_data_pengawas-tambah');
		// 	$this->load->view('footer');
		// }

		// public function addNewUser()
		// { 
		// 	$data = array(
		// 		'nip_nik_nuptk' => $this->input->post('nip_nik_nuptk'),
		// 		'nama_pegawai' => $this->input->post('nama_pegawai'),
		// 		'password' => $this->input->post('password'),
		// 		'otoritas' =>  $this->input->post('otoritas'),
		// 		'status' => $this->input->post('status'),
		// 		'unit_kerja' => $this->input->post('unit_kerja')
		// 	);

		// 	$this->m_user->set_user($data);
		// 	redirect('admin/user');
		// }

		public function edit_user($id)
		{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'type' => $this->input->post('email'),
			);
			
			$this->Admin_model->update_user($data, $id);
			redirect('admin/user');
		}

		public function hapus_user($id)
		{   
			$where = array('id' => $id);
			$this->user_model->delete_user($where);
			redirect('admin/user');
		}
		
}
					 