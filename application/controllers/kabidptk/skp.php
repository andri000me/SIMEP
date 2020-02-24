<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SKP extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_skp');
		}

		Public function index()
		{
			$data['skp']=$this->m_skp->get_skp_header()->result();			
			$this->load->view('header');
			$this->load->view('kabidptk/sidebar');
			$this->load->view('kabidptk/v_skp', $data);
			$this->load->view('footer');
		}

		public function detailSKP()
		{
			$data['skp_detail']=$this->m_skp->get_skp()->result();;
			$this->load->view('header');
			$this->load->view('kabidptk/sidebar');
			$this->load->view('kabidptk/v_skp-detail', $data);
			$this->load->view('footer');
		}

		public function validasiSKP($id_header_skp)
		{
			$this->load->model('m_pengawas');
			$this->load->model('m_penilai');
			$this->load->model('m_skp');
			$data['penilai']=$this->m_penilai->getByIDPegawai($this->session->userdata('kabid_id'));
			$id_pengawas = $this->m_skp->getByID($id_header_skp)->id_pengawas;
			$data['pengawas']=$this->m_pengawas->getByIDPengawas($id_pengawas);
			$data['id_header_skp'] = $id_header_skp;
			$data['status_skp'] = $this->m_skp->getByID($id_header_skp)->status_skp;
			$data['detail_skp'] = $this->m_skp->getDetailSKPByIDSKP($id_header_skp);

			$this->load->view('header');
			$this->load->view('kabidptk/sidebar');
			$this->load->view('kabidptk/v_skp-validasi', $data);
			$this->load->view('footer');
		}		

		public function updateSKP($id_header_skp)
		{
			$this->load->model('m_skp');
			$status_skp = $_POST['status_skp'][0];
			$this->m_skp->updateStatusSKP($id_header_skp, $status_skp);
			redirect('kabidptk/skp');
		}

		public function nilaiSKP($id_header_skp)
		{
			$this->load->model('m_pengawas');
			$this->load->model('m_penilai');
			$this->load->model('m_skp');
			$data['penilai']=$this->m_penilai->getByIDPegawai($this->session->userdata('kabid_id'));
			$id_pengawas = $this->m_skp->getByID($id_header_skp)->id_pengawas;
			$data['pengawas']=$this->m_pengawas->getByIDPengawas($id_pengawas);
			$data['id_header_skp'] = $id_header_skp;
			$data['detail_skp'] = $this->m_skp->getDetailSKPByIDSKP($id_header_skp);

			$this->load->view('header');
			$this->load->view('kabidptk/sidebar');
			$this->load->view('kabidptk/v_skp-nilai', $data);
			$this->load->view('footer');
		}

		public function updateNilaiSKP($id_header_skp)
		{
			$this->load->model('m_skp');
			$detail_data = array();
			for ($i = 0; $i < count($_POST['id_detail_skp']); $i++) {
				$detail_data[] = array(
					'id_detail_skp'				=> $_POST['id_detail_skp'][$i],
					'ak_real'					=> $_POST['ak_real'][$i],
					'kuan_output_real'			=> $_POST['kuan_output_real'][$i],
					'satuan_kuan_output_real'	=> $_POST['satuan_kuan_output_real'][$i],
					'kual_mutu_real'			=> $_POST['kual_mutu_real'][$i],
					'wkt_real'					=> $_POST['wkt_real'][$i],
					'satuan_wkt_real'			=> $_POST['satuan_wkt_real'][$i],
					'biaya_real'				=> $_POST['biaya_real'][$i]
				);
			}
			$data['detail_skp'] = $detail_data;
			$this->m_skp->updateNilaiSKP($data);
			redirect('kabidptk/skp');
		}

		public function perhitunganNilaiSKP($id_header_skp)
		{
			$this->load->model('m_pengawas');
			$this->load->model('m_penilai');
			$this->load->model('m_skp');
			$data['penilai']=$this->m_penilai->getByIDPegawai($this->session->userdata('kabid_id'));
			$id_pengawas = $this->m_skp->getByID($id_header_skp)->id_pengawas;
			$data['pengawas']=$this->m_pengawas->getByIDPengawas($id_pengawas);
			$data['id_header_skp'] = $id_header_skp;
            $dskp = $this->m_skp->getPengukuranSKPByIDSKP($id_header_skp);
			$data['detail_skp'] = $dskp['detail_skp'];
			$data['total_nilai_capaian_skp'] = $dskp['total_nilai_capaian_skp'];
			$this->load->view('header');
			$this->load->view('kabidptk/sidebar');
			$this->load->view('kabidptk/v_skp-penilaian', $data);
			$this->load->view('footer');
		}

		public function updatePenilaianSKP($id_header_skp)
		{
			$this->load->model('m_penilai');
			$id_atasan_pejabat_penilai = $this->m_penilai->getPejabatPenilaiAktif()->id_penilai;
			$this->load->model('m_skp');
			$data['header_skp'] = array(
				'id_header_skp'				=> $id_header_skp,
				'tanggal_penilaian'			=> date("Y-m-d H:i:s"),
				'id_atasan_pejabat_penilai'	=> $id_atasan_pejabat_penilai
			);
			$detail_data = array();
			for ($i = 0; $i < count($_POST['id_detail_skp']); $i++) {
				$detail_data[] = array(
					'id_detail_skp'				=> $_POST['id_detail_skp'][$i],
					'penghitungan'				=> $_POST['penghitungan'][$i],
					'nilai_capaian_skp'			=> $_POST['nilai_capaian_skp'][$i]
				);
			}
			$data['detail_skp'] = $detail_data;
			$this->m_skp->updatePenilaianSKP($data);
			redirect('kabidptk/skp');
		}

		public function penilaianPerilakuKerja($id_header_skp)
		{
			$this->load->model('m_perilaku_kerja');
			if (!$this->m_perilaku_kerja->isExistSKP($id_header_skp)) {
				$this->load->model('m_pengawas');
				$this->load->model('m_penilai');
				$this->load->model('m_skp');
				$data['penilai']=$this->m_penilai->getByIDPegawai($this->session->userdata('kabid_id'));
				$id_pengawas = $this->m_skp->getByID($id_header_skp)->id_pengawas;
				$data['pengawas']=$this->m_pengawas->getByIDPengawas($id_pengawas);
				$data['id_header_skp'] = $id_header_skp;
				$this->load->view('header');
				$this->load->view('kabidptk/sidebar');
				$this->load->view('kabidptk/v_perilaku_kerja-penilaian', $data);
				$this->load->view('footer');
			} else {
				$data_perilaku_kerja = $this->m_perilaku_kerja->getAllBySKP($id_header_skp);
				$this->load->model('m_pengawas');
				$this->load->model('m_penilai');
				$this->load->model('m_skp');
				$data['data_perilaku_kerja'] = $data_perilaku_kerja;
				$data['penilai']=$this->m_penilai->getByIDPegawai($this->session->userdata('kabid_id'));
				$id_pengawas = $this->m_skp->getByID($id_header_skp)->id_pengawas;
				$data['pengawas']=$this->m_pengawas->getByIDPengawas($id_pengawas);
				$data['id_header_skp'] = $id_header_skp;
				$this->load->view('header');
				$this->load->view('kabidptk/sidebar');
				$this->load->view('kabidptk/v_perilaku_kerja-detail', $data);
				$this->load->view('footer');
			}
		}

		public function insertPerilakuKerja($id_header_skp)
		{
			$this->load->model("m_perilaku_kerja");
			$data = array();
			for ($i = 0; $i < count($_POST['unsur']); $i++) {
				$data[] = array(
					'id_perilaku_kerja_skp'	=> "pk_" . $id_header_skp . "_" . $this->session->userdata('kabid_id') . "_" . $i,
					'unsur'					=> $_POST['unsur'][$i],
					'nilai'					=> $_POST['nilai'][$i],
					'id_header_skp'			=> $id_header_skp
				);
			}
			$this->m_perilaku_kerja->insertPerilakuKerja($data);
			redirect('kabidptk/skp');
		}

		public function editPerilakuKerja($id_header_skp) 
		{
			$this->load->model('m_pengawas');
			$this->load->model('m_penilai');
			$this->load->model('m_skp');
			$this->load->model('m_perilaku_kerja');
			$data['penilai']=$this->m_penilai->getByIDPegawai($this->session->userdata('kabid_id'));
			$id_pengawas = $this->m_skp->getByID($id_header_skp)->id_pengawas;
			$data['pengawas']=$this->m_pengawas->getByIDPengawas($id_pengawas);
			$data['id_header_skp'] = $id_header_skp;
			$data_perilaku_kerja = $this->m_perilaku_kerja->getAllBySKP($id_header_skp);
			$data['data_perilaku_kerja'] = $data_perilaku_kerja;
			$this->load->view('header');
			$this->load->view('kabidptk/sidebar');
			$this->load->view('kabidptk/v_perilaku_kerja-edit', $data);
			$this->load->view('footer');
		}

		public function updatePerilakuKerja($id_header_skp) 
		{
			$this->load->model("m_perilaku_kerja");
			$data = array();
			for ($i = 0; $i < count($_POST['unsur']); $i++) {
				$data[] = array(
					'id_perilaku_kerja_skp'	=> $_POST['id_perilaku_kerja_skp'][$i],
					'unsur'					=> $_POST['unsur'][$i],
					'nilai'					=> $_POST['nilai'][$i]
				);
			}
			$this->m_perilaku_kerja->updatePerilakuKerja($data);
			redirect('kabidptk/skp');
		}

		public function penilaianAkhir($id_header_skp)
		{
			$this->load->model('m_pengawas');
			$this->load->model('m_penilai');
			$this->load->model('m_skp');
			$this->load->model("m_perilaku_kerja");
			$data_skp = $this->m_skp->getByID($id_header_skp);
			$data['data_skp'] = $data_skp;
			$data_perilaku_kerja = $this->m_perilaku_kerja->getAllBySKP($id_header_skp);
			$data['data_perilaku_kerja'] = $data_perilaku_kerja;
			$data['penilai']=$this->m_penilai->getByIDPegawai($this->session->userdata('kabid_id'));
			$id_pengawas = $this->m_skp->getByID($id_header_skp)->id_pengawas;
			$data['pengawas']=$this->m_pengawas->getByIDPengawas($id_pengawas);
			$data['id_header_skp'] = $id_header_skp;
			$this->load->view('header');
			$this->load->view('kabidptk/sidebar');
			$this->load->view('kabidptk/v_penilaian_akhir', $data);
			$this->load->view('footer');
		}

		public function downloadSKP($id_header_skp)
		{
			$this->load->model('m_skp');
			$this->load->model('m_penilai');
			$this->load->model('m_pengawas');
			$this->load->model('m_perilaku_kerja');

			$header_skp = $this->m_skp->getByID($id_header_skp);
			$detail_skp = $this->m_skp->getDetailSKPByIDSKP($id_header_skp);
			$data_perilaku_kerja = $this->m_perilaku_kerja->getAllBySKP($id_header_skp);
			$tahun_skp = $this->m_skp->getTahunByID($header_skp->id_tahun_skp)->tahun_skp;
			
			$nama_penilai = $this->m_penilai->getByID($header_skp->id_pejabat_penilai)->nama_pegawai;
			$nip_penilai = $this->m_penilai->getByID($header_skp->id_pejabat_penilai)->nip_nik;
			$pangkat_gol_ruang_penilai = $this->m_penilai->getByID($header_skp->id_pejabat_penilai)->pangkat_gol_ruang;
			$jabatan_penilai = $this->m_penilai->getByID($header_skp->id_pejabat_penilai)->jabatan;
			$unit_organisasi_penilai = $this->m_penilai->getByID($header_skp->id_pejabat_penilai)->unit_kerja;
			
			$nama_pengawas = $this->m_pengawas->getByIDPengawas($header_skp->id_pengawas)->nama_pegawai; 
			$nip_pengawas = $this->m_pengawas->getByIDPengawas($header_skp->id_pengawas)->nip_nik;
			$pangkat_gol_ruang_pengawas = $this->m_pengawas->getByIDPengawas($header_skp->id_pengawas)->pangkat_gol_ruang;
			$jabatan_pengawas = $this->m_pengawas->getByIDPengawas($header_skp->id_pengawas)->jabatan;
			$unit_organisasi_pengawas = $this->m_pengawas->getByIDPengawas($header_skp->id_pengawas)->unit_kerja;
			
			$nama_atasan_penilai = $this->m_penilai->getByID($header_skp->id_atasan_pejabat_penilai)->nama_pegawai;
			$nip_atasan_penilai = $this->m_penilai->getByID($header_skp->id_atasan_pejabat_penilai)->nip_nik;
			$pangkat_gol_ruang_atasan_penilai = $this->m_penilai->getByID($header_skp->id_atasan_pejabat_penilai)->pangkat_gol_ruang;
			$jabatan_atasan_penilai = $this->m_penilai->getByID($header_skp->id_atasan_pejabat_penilai)->jabatan;
			$unit_organisasi_atasan_penilai = $this->m_penilai->getByID($header_skp->id_atasan_pejabat_penilai)->unit_kerja;

			$this->load->library('excel');
			$objPHPExcel = PHPExcel_IOFactory::load(FCPATH . '/assets/templates/skp.xlsx');

			$objPHPExcel->setActiveSheetIndexByName("PENGUKURAN SKP");
			$objWorksheet = $objPHPExcel->getActiveSheet();
			$objWorksheet->setCellValue("A4", "Jangka Waktu Penilaian 01 Januari s.d. 31 Desember " . $tahun_skp);
			$objWorksheet->setCellValue("K11", "Malang, " . date("d-m-Y"));
			$objWorksheet->setCellValue("K15", $nama_penilai);
			$objWorksheet->setCellValue("K16", "NIP. " . $nip_penilai);
			if (count($detail_skp) - 2 > 0)
				$objWorksheet->insertNewRowBefore(9, count($detail_skp) - 2);
			$start_row_num = 8;
			$end_row_num = 8;
			$row_num = $start_row_num;
			$no = 1;
			foreach ($detail_skp as $d) {
				$col_num = 0;
				$objWorksheet->setCellValueByColumnAndRow($col_num, $row_num, $no);
				$col_num++;
				$objWorksheet->setCellValueByColumnAndRow($col_num, $row_num, $d->keg_tgs_jbtn);
				$col_num++;
				$objWorksheet->setCellValueByColumnAndRow($col_num, $row_num, $d->ak_tgt);
				$col_num++;
				$objWorksheet->setCellValueByColumnAndRow($col_num, $row_num, $d->kuan_output_tgt);
				$col_num++;
				$objWorksheet->setCellValueByColumnAndRow($col_num, $row_num, $d->satuan_kuan_output_tgt);
				$col_num++;
				$objWorksheet->setCellValueByColumnAndRow($col_num, $row_num, $d->kual_mutu_tgt);
				$col_num++;
				$objWorksheet->setCellValueByColumnAndRow($col_num, $row_num, $d->wkt_tgt);
				$col_num++;
				$objWorksheet->setCellValueByColumnAndRow($col_num, $row_num, $d->satuan_wkt_tgt);
				$col_num++;
				$objWorksheet->setCellValueByColumnAndRow($col_num, $row_num, $d->biaya_tgt);
				$col_num++;
				$objWorksheet->setCellValueByColumnAndRow($col_num, $row_num, $d->ak_real);
				$col_num++;
				$objWorksheet->setCellValueByColumnAndRow($col_num, $row_num, $d->kuan_output_real);
				$col_num++;
				$objWorksheet->setCellValueByColumnAndRow($col_num, $row_num, $d->satuan_kuan_output_real);
				$col_num++;
				$objWorksheet->setCellValueByColumnAndRow($col_num, $row_num, $d->kual_mutu_real);
				$col_num++;
				$objWorksheet->setCellValueByColumnAndRow($col_num, $row_num, $d->wkt_real);
				$col_num++;
				$objWorksheet->setCellValueByColumnAndRow($col_num, $row_num, $d->satuan_wkt_real);
				$col_num++;
				$objWorksheet->setCellValueByColumnAndRow($col_num, $row_num, $d->biaya_real);
				$row_num++;
				$end_row_num++;
				$no++;
			}

			$objPHPExcel->setActiveSheetIndexByName("PENILAIAN SKP");
			$objWorksheet = $objPHPExcel->getActiveSheet();
			$objWorksheet->setCellValue("R36", "Januari s.d. 31 Desember " . $tahun_skp);
			$objWorksheet->setCellValue("P38", $nama_pengawas);
			$objWorksheet->setCellValue("P39", $nip_pengawas);
			$objWorksheet->setCellValue("P40", $pangkat_gol_ruang_pengawas);
			$objWorksheet->setCellValue("P41", $jabatan_pengawas);
			$objWorksheet->setCellValue("P42", $unit_organisasi_pengawas);
			$objWorksheet->setCellValue("P44", $nama_penilai);
			$objWorksheet->setCellValue("P45", $nip_penilai);
			$objWorksheet->setCellValue("P46", $pangkat_gol_ruang_penilai);
			$objWorksheet->setCellValue("P47", $jabatan_penilai);
			$objWorksheet->setCellValue("P48", $unit_organisasi_penilai);
			$objWorksheet->setCellValue("P50", $nama_atasan_penilai);
			$objWorksheet->setCellValue("P51", $nip_atasan_penilai);
			$objWorksheet->setCellValue("P52", $pangkat_gol_ruang_atasan_penilai);
			$objWorksheet->setCellValue("P53", $jabatan_atasan_penilai);
			$objWorksheet->setCellValue("P54", $unit_organisasi_atasan_penilai);
		
			$objWorksheet->setCellValue("F3", $header_skp->total_nilai_capaian_skp);
			$cur_row = 4;
			foreach ($data_perilaku_kerja as $dpk) {
				if ($cur_row > 9) break;
				$objWorksheet->setCellValue("F" . $cur_row, $dpk->nilai);
				$cur_row++;
			}

			$objPHPExcel->setActiveSheetIndexByName("PENGUKURAN SKP");
			$objWorksheet = $objPHPExcel->getActiveSheet();
			$filename = $id_header_skp;
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
			$objWriter->save('php://output');
		}
}