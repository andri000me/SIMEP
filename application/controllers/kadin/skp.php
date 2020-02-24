<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SKP extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_skp');
		}

		Public function index()
		{		
			$data['skp']=$this->m_skp->get_skp_header()->result();			
			$this->load->view('header');
			$this->load->view('kadin/sidebar');
			$this->load->view('kadin/v_skp', $data);
			$this->load->view('footer');
		}

		public function detailSKP()
		{
			$data['skp_detail']=$this->m_skp->get_skp()->result();;
			$this->load->view('header');
			$this->load->view('kadin/sidebar');
			$this->load->view('kadin/v_skp-detail', $data);
			$this->load->view('footer');
		}		
}