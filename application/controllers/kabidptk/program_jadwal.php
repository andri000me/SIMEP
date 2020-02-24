<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Program_jadwal extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_program_jadwal');
		}

		public function index()
		{
			$data['program_jadwal']=$this->m_program_jadwal->getAllValidated()->result();
			$this->load->view('header');
			$this->load->view('kabidptk/sidebar');
			$this->load->view('kabidptk/v_program_jadwal', $data);
			$this->load->view('footer');
		}

		public function downloadProgramJadwal($id)
		{
			$this->load->model('m_program_jadwal');
			$program_jadwal = $this->m_program_jadwal->getByID($id);
			$this->load->helper('download');
			force_download(FCPATH . '/uploads/' . $program_jadwal->program_jadwal, null);
			redirect('kabidptk/program_jadwal');
		}
}