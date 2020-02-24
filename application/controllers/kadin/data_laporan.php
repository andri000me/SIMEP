<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_laporan extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_laporan');
		}

		public function index()
		{
			$data['laporan']=$this->m_laporan->getAllValidated()->result();
			$this->load->view('header');
			$this->load->view('kadin/sidebar');
			$this->load->view('kadin/v_laporan', $data);
			$this->load->view('footer');
		}

		public function downloadLaporan($id)
		{
			$this->load->model('m_laporan');
			$laporan = $this->m_laporan->getByID($id);
			$this->load->helper('download');
			force_download(FCPATH . '/uploads/' . $laporan->laporan, null);
			redirect('kabidptk/laporan');
		}
}