<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Program_jadwal extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_program_jadwal');
		}

		Public function index()
		{
			//load notifikasi
			$this->load->model('m_notifikasi');
			$jumlah_notifikasi = $this->m_notifikasi->getJumlah($this->session->userdata('pegawai_otoritas'));
			$notifikasi_data['jumlah_notifikasi'] = $jumlah_notifikasi;
			$notifikasi_data['otorisasi'] = $this->session->userdata('pegawai_otoritas');

			$data['program_jadwal']=$this->m_program_jadwal->getAll()->result();
			$this->load->view('header', $notifikasi_data);
			$this->load->view('kasiptk/sidebar');
			$this->load->view('kasiptk/v_program_jadwal', $data);
			$this->load->view('footer');
		}
	 
		public function editProgramJadwal($id_program_jadwal) 
		{
			//load notifikasi
			$this->load->model('m_notifikasi');
			$jumlah_notifikasi = $this->m_notifikasi->getJumlah($this->session->userdata('pegawai_otoritas'));
			$notifikasi_data['jumlah_notifikasi'] = $jumlah_notifikasi;
			$notifikasi_data['otorisasi'] = $this->session->userdata('pegawai_otoritas');

			$this->load->model('m_program_jadwal');
			$program_jadwal_row = $this->m_program_jadwal->getByID($id_program_jadwal);
			$data['program_jadwal'] = $program_jadwal_row;
			$this->load->model('m_skp');
			$data['skp']= $this->m_skp->get_skp()->result();
			$this->load->view('header', $notifikasi_data);
			$this->load->view('kasiptk/sidebar');
			$this->load->view('kasiptk/v_program_jadwal-edit', $data);
			$this->load->view('footer');
		}

		public function validasiProgramJadwal($id_program_jadwal)
		{
			$this->load->model('m_validator');
			$id_validator = $this->m_validator->getByID($this->session->userdata('pegawai_id'))->id_validator;
			$data = array(
	          'id_program_jadwal'	=>$id_program_jadwal,
	          'tgl_validasi'		=> date("Y-m-d"),
	          'id_validator'		=> $id_validator
	        );

	        $this->load->model('m_program_jadwal');
	        $sql = $this->m_program_jadwal->validasiData($data);
	        redirect('kasiptk/program_jadwal');
		}

		public function downloadProgramJadwal($id)
		{	
			$this->load->model('m_program_jadwal');
			$program_jadwal = $this->m_program_jadwal->getByID($id);
			$this->load->helper('download');
			force_download(FCPATH . '/uploads/' . $program_jadwal->program_jadwal, null);
			redirect('kasiptk/program_jadwal/editProgramJadwal/' . $id);
		}
}