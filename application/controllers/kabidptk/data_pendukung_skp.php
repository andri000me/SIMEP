<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_pendukung_skp extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_data_pendukung_skp');
		}

		public function index()
		{
			$data['pendukung_skp']=$this->m_data_pendukung_skp->getAllValidated()->result();
			$this->load->view('header');
			$this->load->view('kabidptk/sidebar');
			$this->load->view('kabidptk/v_data_pendukung_skp', $data);
			$this->load->view('footer');
		}

		public function downloadDataPendukungSKP($id)
		{
			$this->load->model('m_data_pendukung_skp');
			$data_pendukung_skp = $this->m_data_pendukung_skp->getByID($id);
			$this->load->helper('download');
			force_download(FCPATH . '/uploads/' . $data_pendukung_skp->data_pendukung, null);
			redirect('kabidptk/data_pendukung_skp');
		}
}