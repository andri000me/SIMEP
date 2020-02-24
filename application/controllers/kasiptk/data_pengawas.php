<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_pengawas extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_pengawas');

		}

		Public function index()
		{
			//load notifikasi
			$this->load->model('m_notifikasi');
			$jumlah_notifikasi = $this->m_notifikasi->getJumlah($this->session->userdata('pegawai_otoritas'));
			$notifikasi_data['jumlah_notifikasi'] = $jumlah_notifikasi;
			$notifikasi_data['otorisasi'] = $this->session->userdata('pegawai_otoritas');

			$data['pengawas']=$this->m_pengawas->get_pengawas()->result();			
			$this->load->view('header', $notifikasi_data);
			$this->load->view('kasiptk/sidebar');
			$this->load->view('kasiptk/v_data_pengawas', $data);
			$this->load->view('footer');
		}
}