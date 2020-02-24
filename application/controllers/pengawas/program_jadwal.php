<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Program_jadwal extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_program_jadwal');
		}

		Public function index()
		{
			$data['program_jadwal']=$this->m_program_jadwal->getAll($this->session->userdata('pengawas_id'))->result();			
			$this->load->view('header');
			$this->load->view('pengawas/sidebar');
			$this->load->view('pengawas/v_program_jadwal', $data);
			$this->load->view('footer');
		}
	 
		public function addNewProgramJadwalPage()
		{
			//$this->global['pageTitle'] = 'Tambah User';
			$this->load->model('m_skp');
			$data['skp']= $this->m_skp->get_skp()->result();
			$this->load->view('header');
			$this->load->view('pengawas/sidebar');
			$this->load->view('pengawas/v_program_jadwal-tambah', $data);
			$this->load->view('footer');
		}
		
		public function addNewProgramJadwal()
		{
			$this->load->model('m_pengawas');
			$id_pengawas = $this->m_pengawas->getByID($this->session->userdata('pengawas_id'))->id_pengawas;

			$data = array(
	          'id_program_jadwal'	=>	"pj_" . $_POST['id_detail_skp'] . "_" . date("Ymd_His"),
	          'tahun_program'		=> $_POST['tahun'],
	          'jenis_program_jadwal'=> $_POST['jenis_program_jadwal'],
	          'semester'			=> $_POST['semester'],
	          'tgl_unggah'			=> date("Y-m-d H:i:s"),
	          'id_detail_skp'		=> $_POST['id_detail_skp'],
	          'id_pengawas'			=> $id_pengawas
	        );
			
	        $config['upload_path'] = './uploads/';
	        $config['allowed_types'] = '*';
	        $config['file_name'] = "projad_" . $_POST['id_detail_skp'] . "_" . date("Ymd_His");

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('program_jadwal'))
	        {
	            $error = array('error' => $this->upload->display_errors());
	            redirect('pengawas/program_jadwal');
	        } else {
	            $file = $this->upload->data();
	            $data['program_jadwal'] = $file['file_name'];

	            $this->load->model('m_program_jadwal');
	            $sql = $this->m_program_jadwal->insert($data);

	            // push notifikasi
	            $this->load->model('m_notifikasi');
	            $data = array(
	            	'url'				=> "kasiptk/program_jadwal/editProgramJadwal/" . $data['id_program_jadwal'],
	            	'tanggal_dibuat'	=> date('Y-m-d H:i:s'),
	            	'hal'				=> "Upload Data Program Jadwal - " . $this->session->userdata('pengawas_nama'),
	            	'otorisasi'         => "Pegawai Bidang PTK"
	            );
	            $this->m_notifikasi->insert($data);


	            redirect('pengawas/program_jadwal');
	        }
		}
		
		public function editProgramJadwal($id_program_jadwal) 
		{
			$this->load->model('m_program_jadwal');
			$program_jadwal_row = $this->m_program_jadwal->getByID($id_program_jadwal);
			$data['program_jadwal'] = $program_jadwal_row;
			$this->load->model('m_skp');
			$data['skp']= $this->m_skp->get_skp()->result();
			$this->load->view('header');
			$this->load->view('pengawas/sidebar');
			$this->load->view('pengawas/v_program_jadwal-edit', $data);
			$this->load->view('footer');
		}

		public function updateProgramJadwal($id_program_jadwal)
		{

			$data = array(
	          'id_program_jadwal'	=> $id_program_jadwal,
	          'tahun_program'		=> $_POST['tahun'],
	          'jenis_program_jadwal'=> $_POST['jenis_program_jadwal'],
	          'semester'			=> $_POST['semester'],
	          'tgl_unggah'			=> date("Y-m-d H:i:s"),
	          'id_detail_skp'		=> $_POST['id_detail_skp'],
	          'id_pengawas'			=> $id_pengawas
	        );
	        $config['upload_path'] = './uploads/';
	        $config['allowed_types'] = '*';
	        $config['file_name'] = "projad_" . $_POST['id_detail_skp'] . "_" . date("Ymd_His");

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('program_jadwal'))
	        {
	            $error = array('error' => $this->upload->display_errors());
	            redirect('pengawas/program_jadwal');
	        } else {
	            $file = $this->upload->data();
	            $data['program_jadwal'] = $file['file_name'];

	            $this->load->model('m_program_jadwal');
	            $sql = $this->m_program_jadwal->updateData($data);

	            // push notifikasi
	            $this->load->model('m_notifikasi');
	            $data = array(
	            	'url'				=> "kasiptk/program_jadwal/editProgramJadwal/" . $data['id_program_jadwal'],
	            	'tanggal_dibuat'	=> date('Y-m-d H:i:s'),
	            	'hal'				=> "Upload Data Program Jadwal - " . $this->session->userdata('pengawas_nama'),
	            	'otorisasi'         => "Pegawai Bidang PTK"
	            );

	            redirect('pengawas/program_jadwal');
	        }
		}

		public function downloadProgramJadwal($id)
		{	
			$this->load->model('m_program_jadwal');
			$program_jadwal = $this->m_program_jadwal->getByID($id);
			$this->load->helper('download');
			force_download(FCPATH . '/uploads/' . $program_jadwal->program_jadwal, null);
			redirect('pengawas/program_jadwal');
		}
}