<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SKP extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_skp');
		}

		Public function index()
		{
			$this->load->model('m_pengawas');
			$id_pengawas = $this->m_pengawas->getByID($this->session->userdata('pengawas_id'))->id_pengawas;
			$data['skp']=$this->m_skp->get_skp_header($id_pengawas)->result();
			$this->load->view('header');
			$this->load->view('pengawas/sidebar');
			$this->load->view('pengawas/v_skp', $data);
			$this->load->view('footer');
		}

		public function addNewSKPPage()
		{
			//$this->global['pageTitle'] = 'Tambah User';
			$this->load->model('m_pengawas');
			$this->load->model('m_penilai');
			$data['penilai']=$this->m_penilai->getPejabatPenilai()->row();
			$data['pengawas']=$this->m_pengawas->getByID($this->session->userdata('pengawas_id'));
			$this->load->view('header');
			$this->load->view('pengawas/sidebar');
			$this->load->view('pengawas/v_skp-tambah', $data);
			$this->load->view('footer');
		}

		public function addSKP()
		{
			$this->load->model('m_skp');
			$id_tahun_skp = $this->m_skp->getTahunAktif()->id_tahun_skp;
			$tahun_skp = $this->m_skp->getTahunAktif()->tahun_skp;
			$this->load->model('m_penilai');
			$id_pejabat_penilai = $this->m_penilai->getPejabatPenilaiAktif()->id_penilai;
			$this->load->model('m_pengawas');
			$id_pengawas = $this->m_pengawas->getByID($this->session->userdata('pengawas_id'))->id_pengawas;
			$data['header_skp'] = array(
				'id_header_skp'			=> "skp_" . $tahun_skp . "_" . $this->session->userdata('pengawas_nip_nik'),
				'id_pejabat_penilai' 	=> $id_pejabat_penilai,
				'id_tahun_skp'			=> $id_tahun_skp,
				'id_pengawas' 			=> $id_pengawas,
				'tanggal_pengajuan'		=> date("Y-m-d H:i:s"),
				'status_skp'			=> "Diajukan Menunggu Validasi"
			);
			$detail_data = array();

			for ($i = 0; $i < count($_POST['keg_tgs_jbtn']); $i++) {
				$detail_data[] = array(
					'id_detail_skp'				=> "skp_" . $tahun_skp . "_" . $this->session->userdata('pengawas_nip_nik') . "_" . $i,
					'keg_tgs_jbtn' 				=> $_POST['keg_tgs_jbtn'][$i],
					'jenis_unsur'				=> $_POST['jenis_unsur'][$i],
					'ak_asli'					=> $_POST['ak_asli'][$i],
					'ak_tgt'					=> $_POST['ak_asli'][$i] * $_POST['kuan_output_tgt'][$i],
					'kuan_output_tgt'			=> $_POST['kuan_output_tgt'][$i],
					'satuan_kuan_output_tgt'	=> $_POST['satuan_kuan_output_tgt'][$i],
					'kual_mutu_tgt'				=> $_POST['kual_mutu_tgt'][$i],
					'wkt_tgt'					=> $_POST['wkt_tgt'][$i],
					'satuan_wkt_tgt'			=> $_POST['satuan_wkt_tgt'][$i],
					'biaya_tgt'					=> $_POST['biaya_tgt'][$i],
					'id_header_skp'				=> "skp_" . $tahun_skp . "_" . $this->session->userdata('pengawas_nip_nik')
				);
			}
			$data['detail_skp'] = $detail_data;
			$this->m_skp->saveSKP($data);
			redirect('pengawas/skp');
		}

		public function detailSKP($id_header_skp)
		{
			$this->load->model("m_skp");
			$status_skp = $this->m_skp->getByID($id_header_skp)->status_skp;
			$data['id_header_skp'] = $id_header_skp;
			$data['status_skp'] = $status_skp;
			$data['skp_detail']=$this->m_skp->get_skp()->result();
			$this->load->view('header');
			$this->load->view('pengawas/sidebar');
			$this->load->view('pengawas/v_skp-detail', $data);
			$this->load->view('footer');
		}

		public function editSKP($id_header_skp)
		{
			$this->load->model('m_pengawas');
			$this->load->model('m_penilai');
			$this->load->model('m_skp');
			$data['penilai']=$this->m_penilai->getPejabatPenilai()->row();
			$data['pengawas']=$this->m_pengawas->getByID($this->session->userdata('pengawas_id'));
			$data['detail_skp'] = $this->m_skp->getDetailSKPByIDSKP($id_header_skp);
			$this->load->view('header');
			$this->load->view('pengawas/sidebar');
			$this->load->view('pengawas/v_skp-edit', $data);
			$this->load->view('footer');
		}

		public function updateSKP()
		{
			$this->load->model('m_skp');
			$detail_data = array();
			for ($i = 0; $i < count($_POST['keg_tgs_jbtn']); $i++) {
				$detail_data[] = array(
					'id_detail_skp'				=> $_POST['id_detail_skp'][$i],
					'keg_tgs_jbtn' 				=> $_POST['keg_tgs_jbtn'][$i],
					'jenis_unsur'				=> $_POST['jenis_unsur'][$i],
					'ak_asli'					=> $_POST['ak_asli'][$i],
					'ak_tgt'					=> $_POST['ak_asli'][$i] * $_POST['kuan_output_tgt'][$i],
					'kuan_output_tgt'			=> $_POST['kuan_output_tgt'][$i],
					'satuan_kuan_output_tgt'	=> $_POST['satuan_kuan_output_tgt'][$i],
					'kual_mutu_tgt'				=> $_POST['kual_mutu_tgt'][$i],
					'wkt_tgt'					=> $_POST['wkt_tgt'][$i],
					'satuan_wkt_tgt'			=> $_POST['satuan_wkt_tgt'][$i],
					'biaya_tgt'					=> $_POST['biaya_tgt'][$i]
				);
			}
			$data['detail_skp'] = $detail_data;
			$this->m_skp->updateSKP($data);
			redirect('pengawas/skp');
		}

		public function realisasiSKP($id_header_skp)
		{
			$this->load->model('m_pengawas');
			$this->load->model('m_penilai');
			$this->load->model('m_skp');
			$id_penilai = $this->m_skp->getByID($id_header_skp)->id_pejabat_penilai;
			$data['penilai']=$this->m_penilai->getByID($id_penilai);
			$id_pengawas = $this->m_skp->getByID($id_header_skp)->id_pengawas;
			$data['pengawas']=$this->m_pengawas->getByIDPengawas($id_pengawas);
			$data['id_header_skp'] = $id_header_skp;
			$data['detail_skp'] = $this->m_skp->getDetailSKPByIDSKP($id_header_skp);

			$this->load->view('header');
			$this->load->view('pengawas/sidebar');
			$this->load->view('pengawas/v_skp-detail_realisasi', $data);
			$this->load->view('footer');
		}

		public function penilaianSKP($id_header_skp)
		{
			$this->load->model('m_pengawas');
			$this->load->model('m_penilai');
			$this->load->model('m_skp');
			$this->load->model("m_perilaku_kerja");
			$data_skp = $this->m_skp->getByID($id_header_skp);
			$data['data_skp'] = $data_skp;
			$data_perilaku_kerja = $this->m_perilaku_kerja->getAllBySKP($id_header_skp);
			$data['data_perilaku_kerja'] = $data_perilaku_kerja;
			$id_penilai = $this->m_skp->getByID($id_header_skp)->id_pejabat_penilai;
			$data['penilai']=$this->m_penilai->getByID($id_penilai);
			$id_pengawas = $this->m_skp->getByID($id_header_skp)->id_pengawas;
			$data['pengawas']=$this->m_pengawas->getByIDPengawas($id_pengawas);
			$data['id_header_skp'] = $id_header_skp;
			$this->load->view('header');
			$this->load->view('pengawas/sidebar');
			$this->load->view('pengawas/v_penilaian_akhir', $data);
			$this->load->view('footer');
		}
} 