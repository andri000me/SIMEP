<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_pendukung_skp extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_data_pendukung_skp');
		}

		Public function index()
		{
			$data['pendukung_skp']=$this->m_data_pendukung_skp->getAll($this->session->userdata('pengawas_id'))->result();			
			$this->load->view('header');
			$this->load->view('pengawas/sidebar');
			$this->load->view('pengawas/v_data_pendukung_skp', $data);
			$this->load->view('footer');
		}
	 
		public function addNewPendukungSKPPage()
		{
			//$this->global['pageTitle'] = 'Tambah User';
			$this->load->model('m_skp');
			$data['skp']= $this->m_skp->get_skp()->result();
			$this->load->view('header');
			$this->load->view('pengawas/sidebar');
			$this->load->view('pengawas/v_data_pendukung_skp-tambah', $data);
			$this->load->view('footer');
		}

		public function addNewDataPendukungSKP()
		{
			$this->load->model('m_pengawas');
			$id_pengawas = $this->m_pengawas->getByID($this->session->userdata('pengawas_id'))->id_pengawas;

			$data = array(
	          'id_data_pendukung'	=>	"f_" . $_POST['id_detail_skp'] . "_" . date("Ymd_His"),
	          'tahun_pendukung_skp'	=> $_POST['tahun'],
	          'jenis_data'			=> $_POST['jenis_data'],
	          'tgl_unggah'			=> date("Y-m-d"),
	          'id_detail_skp'		=> $_POST['id_detail_skp'],
	          'id_pengawas'			=> $id_pengawas
	        );

	        $config['upload_path'] = './uploads/';
	        $config['allowed_types'] = '*';
	        $config['file_name'] = "file_" . $_POST['id_detail_skp'] . "_" . date("Ymd_His");

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('data_pendukung'))
	        {
	            $error = array('error' => $this->upload->display_errors());
	            redirect('pengawas/data_pendukung_skp');
	        } else {
	            $file = $this->upload->data();
	            $data['data_pendukung'] = $file['file_name'];

	            $this->load->model('m_data_pendukung_skp');
	            $sql = $this->m_data_pendukung_skp->insert($data);

	            // push notifikasi
	            $this->load->model('m_notifikasi');
	            $data = array(
	            	'url'				=> "kasiptk/data_pendukung_skp/editDataPendukungSKP/" . $data['id_data_pendukung'],
	            	'tanggal_dibuat'	=> date('Y-m-d H:i:s'),
	            	'hal'				=> "Upload Data Pendukung SKP - " . $this->session->userdata('pengawas_nama'),
	            	'otorisasi'         => "Pegawai Bidang PTK"
	            );
	            $this->m_notifikasi->insert($data);

	            redirect('pengawas/data_pendukung_skp');
	        }
		}
		
		public function editDataPendukungSKP($id_data_pendukung) 
		{
			$this->load->model('m_data_pendukung_skp');
			$data_pendukung_row = $this->m_data_pendukung_skp->getByID($id_data_pendukung);
			$data['data_pendukung'] = $data_pendukung_row;
			$this->load->model('m_skp');
			$data['skp']= $this->m_skp->get_skp()->result();
			$this->load->view('header');
			$this->load->view('pengawas/sidebar');
			$this->load->view('pengawas/v_data_pendukung_skp-edit', $data);
			$this->load->view('footer');
		}

		public function updateDataPendukungSKP($id_data_pendukung)
		{

			$data = array(
	          'id_data_pendukung'	=>	$id_data_pendukung,
	          'tahun_pendukung_skp'	=> $_POST['tahun'],
	          'jenis_data'			=> $_POST['jenis_data'],
	          'tgl_unggah'			=> date("Y-m-d"),
	          'id_detail_skp'		=> $_POST['id_detail_skp']
	        );

	        $config['upload_path'] = './uploads/';
	        $config['allowed_types'] = '*';
	        $config['file_name'] = "file_" . $_POST['id_detail_skp'] . "_" . date("Ymd_His");

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('data_pendukung'))
	        {
	            $error = array('error' => $this->upload->display_errors());
	            redirect('pengawas/data_pendukung_skp');
	        } else {
	            $file = $this->upload->data();
	            $data['data_pendukung'] = $file['file_name'];

	            $this->load->model('m_data_pendukung_skp');
	            $sql = $this->m_data_pendukung_skp->updateData($data);

	            // push notifikasi
	            $this->load->model('m_notifikasi');
	            $data = array(
	            	'url'				=> "kasiptk/data_pendukung_skp/editDataPendukungSKP/" . $data['id_data_pendukung'],
	            	'tanggal_dibuat'	=> date('Y-m-d H:i:s'),
	            	'hal'				=> "Upload Data Pendukung SKP - " . $this->session->userdata('pengawas_nama'),
	            	'otorisasi'         => "Pegawai Bidang PTK"
	            );
	            $this->m_notifikasi->insert($data);

	            redirect('pengawas/data_pendukung_skp');
	        }
		}
}