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
			$this->load->view('kabidptk/sidebar');
			$this->load->view('kabidptk/v_data_pengawas', $data);
			$this->load->view('footer');
		}
		
}