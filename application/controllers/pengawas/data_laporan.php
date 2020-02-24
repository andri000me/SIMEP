<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_laporan extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_laporan');
		}

		Public function index()
		{
			$data['laporan']=$this->m_laporan->getAll($this->session->userdata('pengawas_id'))->result();
			$this->load->view('header');
			$this->load->view('pengawas/sidebar');
			$this->load->view('pengawas/v_laporan', $data);
			$this->load->view('footer');
		}
	 
		public function addNewLaporanPage()
		{
			//$this->global['pageTitle'] = 'Tambah User';
			$this->load->model('m_skp');
			$data['skp']= $this->m_skp->get_skp()->result();
			$this->load->view('header');
			$this->load->view('pengawas/sidebar');
			$this->load->view('pengawas/v_laporan-tambah', $data);
			$this->load->view('footer');
		}
		
		public function addNewLaporan()
		{
			$this->load->model('m_pengawas');
			$id_pengawas = $this->m_pengawas->getByID($this->session->userdata('pengawas_id'))->id_pengawas;

			$data = array(
	          'id_laporan'			=>	"l_" . $_POST['id_detail_skp'] . "_" . date("Ymd_His"),
	          'tahun_laporan'		=> $_POST['tahun'],
	          'bln_mulai'			=> $_POST['bln_mulai'],
	          'bln_selesai'			=> $_POST['bln_selesai'],
	          'tgl_unggah'			=> date("Y-m-d H:i:s"),
	          'id_detail_skp'		=> $_POST['id_detail_skp'],
	          'id_pengawas'			=> $id_pengawas
	        );
			
	        $config['upload_path'] = './uploads/';
	        $config['allowed_types'] = '*';
	        $config['file_name'] = "laporan_" . $_POST['id_detail_skp'] . "_" . date("Ymd_His");

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('laporan'))
	        {
	            $error = array('error' => $this->upload->display_errors());
	            redirect('pengawas/data_laporan');
	        } else {
	            $file = $this->upload->data();
	            $data['laporan'] = $file['file_name'];

	            $this->load->model('m_laporan');
	            $sql = $this->m_laporan->insert($data);

	            // push notifikasi
	            $this->load->model('m_notifikasi');
	            $data = array(
	            	'url'				=> "kasiptk/data_laporan/editLaporan/" . $data['id_laporan'],
	            	'tanggal_dibuat'	=> date('Y-m-d H:i:s'),
	            	'hal'				=> "Upload Data Laporan - " . $this->session->userdata('pengawas_nama'),
	            	'otorisasi'         => "Pegawai Bidang PTK"
	            );
	            $this->m_notifikasi->insert($data);

	            redirect('pengawas/data_laporan');
	        }
		}
		
		public function editLaporan($id_laporan) 
		{
			$this->load->model('m_laporan');
			$laporan_row = $this->m_laporan->getByID($id_laporan);
			$data['laporan'] = $laporan_row;
			$this->load->model('m_skp');
			$data['skp']= $this->m_skp->get_skp()->result();
			$this->load->view('header');
			$this->load->view('pengawas/sidebar');
			$this->load->view('pengawas/v_laporan-edit', $data);
			$this->load->view('footer');
		}

		public function updateLaporan($id_laporan)
		{

			$data = array(
	          'id_laporan'			=> $id_laporan,
	          'tahun_laporan'		=> $_POST['tahun'],
	          'bln_mulai'			=> $_POST['bln_mulai'],
	          'bln_selesai'			=> $_POST['bln_selesai'],
	          'tgl_unggah'			=> date("Y-m-d H:i:s"),
	          'id_detail_skp'		=> $_POST['id_detail_skp']
	        );
	        $config['upload_path'] = './uploads/';
	        $config['allowed_types'] = '*';
	        $config['file_name'] = "laporan_" . $_POST['id_detail_skp'] . "_" . date("Ymd_His");

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('laporan'))
	        {
	            $error = array('error' => $this->upload->display_errors());
	            redirect('pengawas/data_laporan');
	        } else {
	            $file = $this->upload->data();
	            $data['laporan'] = $file['file_name'];

	            $this->load->model('m_laporan');
	            $sql = $this->m_laporan->updateData($data);

	            // push notifikasi
	            $this->load->model('m_notifikasi');
	            $data = array(
	            	'url'				=> "kasiptk/data_laporan/editLaporan/" . $data['id_laporan'],
	            	'tanggal_dibuat'	=> date('Y-m-d H:i:s'),
	            	'hal'				=> "Upload Data Laporan - " . $this->session->userdata('pengawas_nama'),
	            	'otorisasi'         => "Pegawai Bidang PTK"
	            );
	            $this->m_notifikasi->insert($data);


	            redirect('pengawas/data_laporan');
	        }
		}

		public function downloadLaporan($id)
		{	
			$this->load->model('m_laporan');
			$laporan = $this->m_laporan->getByID($id);
			$this->load->helper('download');
			force_download(FCPATH . '/uploads/' . $laporan->laporan, null);
			redirect('kasiptk/laporan/editLaporan/' . $id);
		}
}