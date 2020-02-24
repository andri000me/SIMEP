<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_pegawai extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_pegawai');
		}

		Public function index()
		{
			$data['pegawai']=$this->m_pegawai->getAll()->result();			
			$this->load->view('header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/v_data_pegawai', $data);
			$this->load->view('footer');
		}

		public function addNewPegawaiPage()
		{
			$this->load->view('header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/v_data_pegawai-tambah');
			$this->load->view('footer');
		}
	 
		public function addPegawai()
		{
			$data_pegawai = array(
				'id_pegawai'		=> "p_" . $this->input->post('nip_nik'),
				'nama_pegawai'		=> $this->input->post('nama_pegawai'),
				'nip_nik'			=> $this->input->post('nip_nik'),
				'pangkat_gol_ruang'	=> $this->input->post('pangkat_gol_ruang'),
				'jabatan'			=> $this->input->post('jabatan'),
				'jenis_kelamin'		=> $this->input->post('jenis_kelamin'),
				'otoritas'			=> $this->input->post('otoritas'),
				'status'			=> $this->input->post('status'),
				'unit_kerja'		=> $this->input->post('unit_kerja'),
				'tmt_jabatan'		=> $this->input->post('tmt_jabatan'),
				'password'			=> "terserah"
			);
			$this->m_pegawai->insert($data_pegawai);
			$this->session->set_flashdata('msg','Data Pegawai Berhasil Tersimpan');
			redirect('admin/data_pegawai');
		}

		public function editPegawai($id)
		{
			$data['data_pegawai'] = $this->m_pegawai->getByID($id);
			$this->load->view('header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/v_data_pegawai-edit', $data);
			$this->load->view('footer');
		}

		public function updatePegawai($id)
		{
			$data_pegawai = array(
				'nama_pegawai'		=> $this->input->post('nama_pegawai'),
				'nip_nik'			=> $this->input->post('nip_nik'),
				'pangkat_gol_ruang'	=> $this->input->post('pangkat_gol_ruang'),
				'jabatan'			=> $this->input->post('jabatan'),
				'jenis_kelamin'		=> $this->input->post('jenis_kelamin'),
				'otoritas'			=> $this->input->post('otoritas'),
				'status'			=> $this->input->post('status'),
				'unit_kerja'		=> $this->input->post('unit_kerja'),
				'tmt_jabatan'		=> $this->input->post('tmt_jabatan')
			);
			$this->m_pegawai->update($id, $data_pegawai);
			$this->session->set_flashdata('msg','Data Pegawai Berhasil Tersimpan');
			redirect('admin/data_pegawai');
		}
}