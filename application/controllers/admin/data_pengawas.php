<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_pengawas extends CI_Controller {

		public function __construct()
		{
				parent::__construct();
				$this->load->model('m_pengawas');
		}

		Public function index()
		{
			$data['pengawas']=$this->m_pengawas->get_pengawas()->result();			
			$this->load->view('header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/v_data_pengawas', $data);
			$this->load->view('footer');
		}

		public function addNewPengawasPage()
		{
			$this->load->view('header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/v_data_pengawas-tambah');
			$this->load->view('footer');
		}
		
		public function addPengawas()
		{
			$data_pengawas = array(
				'id_pegawai'		=> "p_" . $this->input->post('nip_nik'),
				'nama_pegawai'		=> $this->input->post('nama_pegawai'),
				'nip_nik'			=> $this->input->post('nip_nik'),
				'pangkat_gol_ruang'	=> $this->input->post('pangkat_gol_ruang'),
				'jabatan'			=> $this->input->post('jabatan'),
				'jenis_kelamin'		=> $this->input->post('jenis_kelamin'),
				'otoritas'			=> "Pengawas",
				'status'			=> $this->input->post('status'),
				'unit_kerja'		=> $this->input->post('unit_kerja'),
				'tmt_jabatan'		=> $this->input->post('tmt_jabatan'),
				'password'			=> "terserah",
				'id_pengawas'		=> "pgw_" . $this->input->post('nip_nik'),
				'nuptk'				=> $this->input->post('nuptk'),
				'bidang'			=> $this->input->post('bidang'),
				'pendidikan'		=> $this->input->post('pendidikan'),
				'tmp_lahir'			=> $this->input->post('tmp_lahir'),
				'tgl_lahir'			=> $this->input->post('tgl_lahir')
			);
			$this->m_pengawas->insert($data_pengawas);
			$this->session->set_flashdata('msg','Data Pengawas Berhasil Tersimpan');
			redirect('admin/data_pengawas');
		}

		public function editPengawas($id)
		{
			$data['data_pengawas'] = $this->m_pengawas->getByID($id);
			$this->load->view('header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/v_data_pengawas-edit', $data);
			$this->load->view('footer');
		}

		public function updatePengawas($id)
		{
			$data_pengawas = array(
				'nama_pegawai'		=> $this->input->post('nama_pegawai'),
				'nip_nik'			=> $this->input->post('nip_nik'),
				'pangkat_gol_ruang'	=> $this->input->post('pangkat_gol_ruang'),
				'jabatan'			=> $this->input->post('jabatan'),
				'jenis_kelamin'		=> $this->input->post('jenis_kelamin'),
				'status'			=> $this->input->post('status'),
				'unit_kerja'		=> $this->input->post('unit_kerja'),
				'tmt_jabatan'		=> $this->input->post('tmt_jabatan'),
				'nuptk'				=> $this->input->post('nuptk'),
				'bidang'			=> $this->input->post('bidang'),
				'pendidikan'		=> $this->input->post('pendidikan'),
				'tmp_lahir'			=> $this->input->post('tmp_lahir'),
				'tgl_lahir'			=> $this->input->post('tgl_lahir')
			);
			$this->m_pengawas->update($id, $data_pengawas);
			$this->m_pengawas->updatePegawai($id, $data_pengawas);
			$this->session->set_flashdata('msg','Data Pengawas Berhasil Tersimpan');
			redirect('admin/data_pengawas');
		}
}