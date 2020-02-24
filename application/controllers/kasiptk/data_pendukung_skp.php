<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_pendukung_skp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_data_pendukung_skp');
	}

	Public function index()
	{
		//load notifikasi
		$this->load->model('m_notifikasi');
		$jumlah_notifikasi = $this->m_notifikasi->getJumlah($this->session->userdata('pegawai_otoritas'));
		$notifikasi_data['jumlah_notifikasi'] = $jumlah_notifikasi;
		$notifikasi_data['otorisasi'] = $this->session->userdata('pegawai_otoritas');

		$data['pendukung_skp']=$this->m_data_pendukung_skp->getAll()->result();			
		$this->load->view('header', $notifikasi_data);
		$this->load->view('kasiptk/sidebar');
		$this->load->view('kasiptk/v_data_pendukung_skp', $data);
		$this->load->view('footer');
	}
 
	public function editDataPendukungSKP($id_data_pendukung) 
	{
		//load notifikasi
		$this->load->model('m_notifikasi');
		$jumlah_notifikasi = $this->m_notifikasi->getJumlah($this->session->userdata('pegawai_otoritas'));
		$notifikasi_data['jumlah_notifikasi'] = $jumlah_notifikasi;
		$notifikasi_data['otorisasi'] = $this->session->userdata('pegawai_otoritas');

		$this->load->model('m_data_pendukung_skp');
		$data_pendukung_row = $this->m_data_pendukung_skp->getByID($id_data_pendukung);
		$data['data_pendukung'] = $data_pendukung_row;
		$this->load->model('m_skp');
		$data['skp']= $this->m_skp->get_skp()->result();
		$this->load->view('header', $notifikasi_data);
		$this->load->view('kasiptk/sidebar');
		$this->load->view('kasiptk/v_data_pendukung_skp-edit', $data);
		$this->load->view('footer');
	}

	public function validasiDataPendukungSKP($id_data_pendukung)
	{
		$this->load->model('m_validator');
		$id_validator = $this->m_validator->getByID($this->session->userdata('pegawai_id'))->id_validator;

		$data = array(
          'id_data_pendukung'	=>$id_data_pendukung,
          'tgl_validasi'		=> date("Y-m-d"),
          'id_validator'		=> $id_validator
        );

        $this->load->model('m_data_pendukung_skp');
        $sql = $this->m_data_pendukung_skp->validasiData($data);
        redirect('kasiptk/data_pendukung_skp');
	}

	public function downloadDataPendukungSKP($id)
	{	
		$this->load->model('m_data_pendukung_skp');
		$data_pendukung_skp = $this->m_data_pendukung_skp->getByID($id);
		$this->load->helper('download');
		force_download(FCPATH . '/uploads/' . $data_pendukung_skp->data_pendukung, null);
		redirect('kasiptk/data_pendukung_skp/editDataPendukungSKP/' . $id);
	}
}