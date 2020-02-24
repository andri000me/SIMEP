<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_laporan extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_laporan');
		}

		Public function index()
		{
			//load notifikasi
			$this->load->model('m_notifikasi');
			$jumlah_notifikasi = $this->m_notifikasi->getJumlah($this->session->userdata('pegawai_otoritas'));
			$notifikasi_data['jumlah_notifikasi'] = $jumlah_notifikasi;
			$notifikasi_data['otorisasi'] = $this->session->userdata('pegawai_otoritas');

			$data['laporan']=$this->m_laporan->getAll()->result();
			$this->load->view('header', $notifikasi_data);
			$this->load->view('kasiptk/sidebar');
			$this->load->view('kasiptk/v_laporan', $data);
			$this->load->view('footer');
		}
	 
		public function editLaporan($id_laporan) 
		{
			//load notifikasi
			$this->load->model('m_notifikasi');
			$jumlah_notifikasi = $this->m_notifikasi->getJumlah($this->session->userdata('pegawai_otoritas'));
			$notifikasi_data['jumlah_notifikasi'] = $jumlah_notifikasi;
			$notifikasi_data['otorisasi'] = $this->session->userdata('pegawai_otoritas');

			$this->load->model('m_laporan');
			$laporan_row = $this->m_laporan->getByID($id_laporan);
			$data['laporan'] = $laporan_row;
			$this->load->model('m_skp');
			$data['skp']= $this->m_skp->get_skp()->result();
			$this->load->view('header', $notifikasi_data);
			$this->load->view('kasiptk/sidebar');
			$this->load->view('kasiptk/v_laporan-edit', $data);
			$this->load->view('footer');
		}

		public function validasiLaporan($id_laporan)
		{
			$this->load->model('m_validator');
			$id_validator = $this->m_validator->getByID($this->session->userdata('pegawai_id'))->id_validator;

			$data = array(
	          'id_laporan'		=> $id_laporan,
	          'tgl_validasi'	=> date("Y-m-d"),
	          'id_validator'	=> $id_validator
	        );

	        $this->load->model('m_laporan');
	        $sql = $this->m_laporan->validasiData($data);
	        redirect('kasiptk/data_laporan');
		}

		public function downloadLaporan($id)
		{	
			$this->load->model('m_laporan');
			$laporan = $this->m_laporan->getByID($id);
			$this->load->helper('download');
			force_download(FCPATH . '/uploads/' . $laporan->laporan, null);
			redirect('kasiptk/laporan/editLaporan/' . $id);
		}
}