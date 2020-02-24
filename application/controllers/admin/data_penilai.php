<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_penilai extends CI_Controller {

		public function __construct()
		{
				parent::__construct();
				$this->load->model('m_penilai');
		}

		Public function index()
		{
			$data['penilai']=$this->m_penilai->getPenilai()->result();			
			$this->load->view('header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/v_data_penilai', $data);
			$this->load->view('footer');
		}

		public function addNewPenilaiPage()
		{
			$this->load->model('m_pegawai');
			$data['pegawai']=$this->m_pegawai->getPegawai()->result();
			$this->load->view('header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/v_data_penilai-tambah', $data);
			$this->load->view('footer');
		}

		public function addPenilai()
		{
			$data_penilai = array(
				'id_pegawai'        => $this->input->post('id_pegawai'),
	            'id_penilai'        => "n_" . $this->input->post('id_pegawai'),
	            'jabatan'           => $this->input->post('jabatan'),
	            'status'            => $this->input->post('status')
			);
			$this->m_penilai->insert($data_penilai);
			$this->session->set_flashdata('msg','Data Penilai Berhasil Tersimpan');
			redirect('admin/data_penilai');
		}

		public function editPenilai($id)
		{
			$data['id_penilai'] = $id;
			$data['data_penilai'] = $this->m_penilai->getPenilai()->result();
			$this->load->view('header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/v_data_penilai-edit', $data);
			$this->load->view('footer');
		}

		public function updatePenilai()
		{
			$data_penilai = array(
				'id_pegawai'        => $this->input->post('id_pegawai'),
	            'jabatan'           => $this->input->post('jabatan'),
	            'status'            => $this->input->post('status')
			);
			$this->m_penilai->update($id, $data_penilai);
			$this->session->set_flashdata('msg','Data Penilai Berhasil Tersimpan');
			redirect('admin/data_penilai');
		}
}

?>