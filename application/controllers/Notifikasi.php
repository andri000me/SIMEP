<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

	public function view($otoritas) 
	{
		$notifikasi_data = array();
		$data = array();
		
		//load notifikasi
		if ($otoritas == "Admin") {
			$this->load->model('m_notifikasi');
			$jumlah_notifikasi = $this->m_notifikasi->getJumlah($this->session->userdata('admin_otoritas'));
			$notifikasi_data['jumlah_notifikasi'] = $jumlah_notifikasi;
			$notifikasi_data['otorisasi'] = $this->session->userdata('admin_otoritas');
			$data['notifikasi'] = $this->m_notifikasi->getAll($this->session->userdata('admin_otoritas'));
			$this->load->view('header', $notifikasi_data);
			$this->load->view('admin/sidebar');
			$this->load->view('v_notifikasi', $data);
			$this->load->view('footer');
		} else if ($otoritas == "Pengawas") {
			$this->load->model('m_notifikasi');
			$jumlah_notifikasi = $this->m_notifikasi->getJumlah($this->session->userdata('pengawas_otoritas'));
			$notifikasi_data['jumlah_notifikasi'] = $jumlah_notifikasi;
			$notifikasi_data['otorisasi'] = $this->session->userdata('pengawas_otoritas');
			$data['notifikasi'] = $this->m_notifikasi->getAll($this->session->userdata('pengawas_otoritas'));
			$this->load->view('header', $notifikasi_data);
			$this->load->view('pengawas/sidebar');
			$this->load->view('v_notifikasi', $data);
			$this->load->view('footer');
		} else if ($otoritas == "Pegawai%20Bidang%20PTK") {
			$this->load->model('m_notifikasi');
			$jumlah_notifikasi = $this->m_notifikasi->getJumlah($this->session->userdata('pegawai_otoritas'));
			$notifikasi_data['jumlah_notifikasi'] = $jumlah_notifikasi;
			$notifikasi_data['otorisasi'] = $this->session->userdata('pegawai_otoritas');
			$data['notifikasi'] = $this->m_notifikasi->getAll($this->session->userdata('pegawai_otoritas'));
			$this->load->view('header', $notifikasi_data);
			$this->load->view('kasiptk/sidebar');
			$this->load->view('v_notifikasi', $data);
			$this->load->view('footer');
		} else if ($otoritas == "Kepala%20Bidang%20PTK") {
			$this->load->model('m_notifikasi');
			$jumlah_notifikasi = $this->m_notifikasi->getJumlah($this->session->userdata('kabid_otoritas'));
			$notifikasi_data['jumlah_notifikasi'] = $jumlah_notifikasi;
			$notifikasi_data['otorisasi'] = $this->session->userdata('kabid_otoritas');
			$data['notifikasi'] = $this->m_notifikasi->getAll($this->session->userdata('kabid_otoritas'));
			$this->load->view('header', $notifikasi_data);
			$this->load->view('kabid/sidebar');
			$this->load->view('v_notifikasi', $data);
			$this->load->view('footer');
		} else if ($otoritas == "Kepala%20Dinas") {
			$this->load->model('m_notifikasi');
			$jumlah_notifikasi = $this->m_notifikasi->getJumlah($this->session->userdata('kadin_otoritas'));
			$notifikasi_data['jumlah_notifikasi'] = $jumlah_notifikasi;
			$notifikasi_data['otorisasi'] = $this->session->userdata('kadin_otoritas');
			$data['notifikasi'] = $this->m_notifikasi->getAll($this->session->userdata('kadin_otoritas'));
			$this->load->view('header', $notifikasi_data);
			$this->load->view('kabid/sidebar');
			$this->load->view('v_notifikasi', $data);
			$this->load->view('footer');
		}		
	}

	public function read($id) 
	{
		$this->load->model("m_notifikasi");
		$this->m_notifikasi->updateRead($id);
		redirect($this->m_notifikasi->getByID($id)->url);
	}

}

