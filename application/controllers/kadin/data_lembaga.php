<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_lembaga extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_lembaga');
	}

	Public function index()
	{
		$data['lembaga']=$this->m_lembaga->getLembaga()->result();			
		$this->load->view('header');
		$this->load->view('kadin/sidebar');
		$this->load->view('kadin/v_data_lembaga', $data);
		$this->load->view('footer');
	}
		
}