<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_lembaga extends CI_Controller {

		public function __construct()
		{
				parent::__construct();
				$this->load->model('m_lembaga');
				
				//$this->load->model('m_lembaga');
				
					/*session checks */ 

			/*if($this->session->userdata('is_logged_in')=='')
			{
			 $this->session->set_flashdata('msg','Please Login to Continue');
			 redirect('login');
			}*/

		}

		Public function index()
		{
			$data['lembaga']=$this->m_lembaga->getLembaga()->result();			
			$this->load->view('header');
			$this->load->view('pengawas/sidebar');
			$this->load->view('pengawas/v_data_lembaga', $data);
			$this->load->view('footer');
		}
		
}