<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SKP extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_skp');
		}

		Public function index()
		{
			//load notifikasi
			$this->load->model('m_notifikasi');
			$jumlah_notifikasi = $this->m_notifikasi->getJumlah($this->session->userdata('pegawai_otoritas'));
			$notifikasi_data['jumlah_notifikasi'] = $jumlah_notifikasi;
			$notifikasi_data['otorisasi'] = $this->session->userdata('pegawai_otoritas');

			$data['skp']=$this->m_skp->get_skp_header()->result();			
			$this->load->view('header', $notifikasi_data);
			$this->load->view('kasiptk/sidebar');
			$this->load->view('kasiptk/v_skp', $data);
			$this->load->view('footer');
		}

		public function detailSKP()
		{
			//load notifikasi
			$this->load->model('m_notifikasi');
			$jumlah_notifikasi = $this->m_notifikasi->getJumlah($this->session->userdata('pegawai_otoritas'));
			$notifikasi_data['jumlah_notifikasi'] = $jumlah_notifikasi;
			$notifikasi_data['otorisasi'] = $this->session->userdata('pegawai_otoritas');

			$data['skp_detail']=$this->m_skp->get_skp()->result();;
			$this->load->view('header', $notifikasi_data);
			$this->load->view('kasiptk/sidebar');
			$this->load->view('kasiptk/v_skp-detail', $data);
			$this->load->view('footer');
		}		
}