<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_tahun_SKP extends CI_Controller {

		public function __construct()
		{
				parent::__construct();
				$this->load->model('m_skp');
		}

		Public function index()
		{
			$data['skp_tahun']=$this->m_skp->getTahunSKP()->result();			
			$this->load->view('header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/v_data_skp_tahun', $data);
			$this->load->view('footer');
		}

		public function addNewTahunSKPPage()
		{
			$this->load->view('header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/v_data_skp_tahun-tambah');
			$this->load->view('footer');
		}

		public function addTahunSKP()
		{
			$data_tahun_skp = array(
				'id_tahun_skp'		=> "skp_thn_" . $this->input->post('tahun_skp'),
				'tahun_skp'			=> $this->input->post('tahun_skp'),
				'status'			=> $this->input->post('status'),
				'surat_keterangan'	=> $this->input->post('surat_keterangan')
			);
			$this->m_skp->insertTahunSKP($data_tahun_skp);
			$this->session->set_flashdata('msg','Data Tahun SKP Berhasil Tersimpan');
			redirect('admin/data_tahun_skp');
		}

		public function editTahunSKP($id)
		{
			$data['data_tahun_skp'] = $this->m_skp->getTahunByID($id);
			$this->load->view('header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/v_data_skp_tahun-edit', $data);
			$this->load->view('footer');
		}

		public function updateTahunSKP($id)
		{
			$data_tahun_skp = array(
				'tahun_skp'			=> $this->input->post('tahun_skp'),
				'status'			=> $this->input->post('status'),
				'surat_keterangan'	=> $this->input->post('surat_keterangan')
			);
			$this->m_skp->updateTahunSKP($id, $data_tahun_skp);
			$this->session->set_flashdata('msg','Data Tahun SKP Berhasil Tersimpan');
			redirect('admin/data_tahun_skp');
		}
}

?>