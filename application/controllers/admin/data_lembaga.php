<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_lembaga extends CI_Controller {

		public function __construct()
		{
				parent::__construct();
				$this->load->model('m_lembaga');
		}

		Public function index()
		{
			$data['lembaga']=$this->m_lembaga->getLembaga()->result();			
			$this->load->view('header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/v_data_lembaga', $data);
			$this->load->view('footer');
		}
	 
		public function addNewLembagaPage()
		{
			$this->load->model('m_pengawas');
			$data['pengawas']= $this->m_pengawas->get_pengawas()->result();
			$this->load->view('header');
			$this->load->view('Admin/sidebar');
			$this->load->view('Admin/v_data_lembaga-tambah', $data);
			$this->load->view('footer');
		}

		public function addLembaga()
		{
			$data_lembaga = array(
				'npsn'				=> $this->input->post('npsn'),
				'nama_sekolah'		=> $this->input->post('nama_sekolah'),
				'nama_kepsek'		=> $this->input->post('nama_kepsek'),
				'alamat'			=> $this->input->post('alamat'),
				'tingkat'			=> $this->input->post('tingkat'),
				'status'			=> $this->input->post('status'),
				'id_pegawai'		=> $this->input->post('id_pegawai')
			);
			$this->m_lembaga->insert($data_lembaga);
			$this->session->set_flashdata('msg','Data Lembaga Berhasil Tersimpan');
			redirect('admin/data_lembaga');
		}

		public function editLembaga($id)
		{
			$data['data_lembaga'] = $this->m_lembaga->getLembaga()->result();
			$data['lembaga'] = $this->m_lembaga->getByID($id);
			// $data['npsn'] = $id;
			$this->load->view('header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/v_data_lembaga-edit', $data);
			$this->load->view('footer');
		}

		public function updateLembaga()
		{
			$data_lembaga = array(
				'npsn'				=> $this->input->post('npsn'),
				'nama_sekolah'		=> $this->input->post('nama_sekolah'),
				'nama_kepsek'		=> $this->input->post('nama_kepsek'),
				'alamat'			=> $this->input->post('alamat'),
				'tingkat'			=> $this->input->post('tingkat'),
				'status'			=> $this->input->post('status'),
				'id_pegawai'		=> $this->input->post('id_pegawai')
			);
			$this->m_lembaga->update($data_lembaga);
			$this->session->set_flashdata('msg','Data Lembaga Berhasil Tersimpan');
			redirect('admin/data_lembaga');
		}
		
}