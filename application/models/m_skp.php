<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_skp extends CI_Model {

    private $id_tahun_skp;
    private $tahun_skp;
    private $status;
    private $surat_keterangan;
    private $id_pegawai;
    
    public function getTahunSKP()
    {
        $query = $this->db->query("SELECT * FROM skp_tahun");
        return $query;
    }

    public function getTahunByID($id)
    {
        $query = $this->db->query("
            SELECT *
            FROM skp_tahun
            WHERE id_tahun_skp = '$id'
        ");
        return $query->row();
    }

    public function getTahunAktif()
    {
        $query = $this->db->query("
            SELECT *
            FROM skp_tahun
            WHERE status = 'Aktif'
        ");
        return $query->row();
    }

    public function insertTahunSKP($data)
    {
        $this->id_tahun_skp     = $data['id_tahun_skp'];
        $this->tahun_skp        = $data['tahun_skp'];
        $this->status           = $data['status'];
        $this->surat_keterangan = $data['surat_keterangan'];

        $insert_data = array(
            'id_tahun_skp'      => $this->id_tahun_skp,
            'tahun_skp'         => $this->tahun_skp,
            'status'            => $this->status,
            'surat_keterangan'  => $this->surat_keterangan
        );

         $this->db->insert("skp_tahun", $insert_data);
    }

     public function updateTahunSKP($id, $data)
    {
        $this->db->where('id_tahun_skp', $id);
        $this->db->update('skp_tahun', $data);
    }

    public function deleteTahunSKP($id)
    {
        $delete_data = array(
            'id_tahun_skp'    => $id
        );
        $this->db->delete("skp_tahun", $delete_data);
    }

//------------------------------------------------------------------

    public function get_skp_header($id_pengawas="%%")
    {
        $query = $this->db->query("
            SELECT *, SUM(D.nilai_capaian_skp) AS 'total_nilai_capaian_skp' 
            FROM pegawai AS P JOIN pengawas AS PG ON P.id_pegawai = PG.id_pegawai JOIN skp_header AS H  ON PG.id_pengawas = H.id_pengawas JOIN skp_tahun AS T ON H.id_tahun_skp = T.id_tahun_skp LEFT JOIN skp_detail D ON H.id_header_skp = D.id_header_skp
            WHERE H.id_pengawas LIKE '" . $id_pengawas . "'
            GROUP BY H.id_header_skp
        ");
        return $query;
    }    

    public function get_skp()
    {
        $query = $this->db->query(
            "SELECT * FROM skp_header AS H 
            JOIN skp_detail AS D ON H.id_header_skp = D.id_header_skp"
        );
        return $query;
    }

    public function getByID($id_header_skp)
    {
        $query = $this->db->query("
            SELECT A.*, SUM(B.nilai_capaian_skp) AS 'total_nilai_capaian_skp'
            FROM skp_header A LEFT JOIN skp_detail B ON A.id_header_skp = B.id_header_skp
            WHERE A.id_header_skp = '" . $id_header_skp . "'
            GROUP BY A.id_header_skp
        ");
        return $query->row();
    }

    public function saveSKP($data)
    {
        $this->db->query("
            INSERT INTO skp_header (id_header_skp, id_pejabat_penilai, id_tahun_skp, id_pengawas, tanggal_pengajuan, status_skp)
            VALUES ('" . $data['header_skp']['id_header_skp'] . "', '" . $data['header_skp']['id_pejabat_penilai'] . "', '" . $data['header_skp']['id_tahun_skp'] . "', '" . $data['header_skp']['id_pengawas'] . "', '" . $data['header_skp']['tanggal_pengajuan'] . "', '" . $data['header_skp']['status_skp'] . "')
        ");

        foreach ($data['detail_skp'] as $detail_skp) {
            $this->db->query("
                INSERT INTO skp_detail (id_detail_skp, keg_tgs_jbtn, jenis_unsur, ak_asli, ak_tgt, kuan_output_tgt, satuan_kuan_output_tgt, kual_mutu_tgt, wkt_tgt, satuan_wkt_tgt, biaya_tgt, id_header_skp)
                VALUES ('" . $detail_skp['id_detail_skp'] . "', '" . $detail_skp['keg_tgs_jbtn'] . "', '" . $detail_skp['jenis_unsur'] . "', '" . $detail_skp['ak_asli'] . "', '" . $detail_skp['ak_tgt'] . "', '" . $detail_skp['kuan_output_tgt'] . "', '" . $detail_skp['satuan_kuan_output_tgt'] . "', '" . $detail_skp['kual_mutu_tgt'] . "', '" . $detail_skp['wkt_tgt'] . "', '" . $detail_skp['satuan_wkt_tgt'] . "', '" . $detail_skp['biaya_tgt'] . "', '" . $detail_skp['id_header_skp'] . "')
            ");
        }
    }

    public function getDetailSKPByIDSKP($id_header_skp)
    {
        $query = $this->db->query("
            SELECT * 
            FROM skp_detail
            WHERE id_header_skp = '" . $id_header_skp . "'
        ");
        return $query->result();
    }

    public function getPengukuranSKPByIDSKP($id_header_skp)
    {
        $dskp = $this->db->query("
            SELECT * 
            FROM skp_detail
            WHERE id_header_skp = '" . $id_header_skp . "'
        ")->result();
        $detail_skp = array();
        $total_nilai_capaian_skp = 0;
        foreach ($dskp as $ds) {
            $kuantitas = $ds->kuan_output_real / $ds->kuan_output_tgt;
            $kualitas = $ds->kual_mutu_real / $ds->kual_mutu_tgt;
            $persen_waktu = 100 - ($ds->wkt_real / $ds->wkt_tgt * 100);
            $persen_biaya = 100 - ($ds->biaya_real / $ds->biaya_tgt * 100);
            $rw = 0;
            if ($persen_waktu == 0)
                $rw = ((1.76 * $ds->wkt_tgt - $ds->wkt_real) / $ds->wkt_tgt) * 0 * 100;
            else if ($persen_waktu < 24)
                $rw = ((1.76 * $ds->wkt_tgt - $ds->wkt_real) / $ds->wkt_tgt) * 100;
            else if ($persen_waktu > 24)
                $rw = 76 - ((((1.76 * $ds->wkt_tgt - $ds->wkt_real) / $ds->wkt_tgt) * 100) - 100);

            $rb = 0;
            if ($persen_biaya == 0)
                $rb = ((1.76 * $ds->biaya_tgt - $ds->biaya_real) / $ds->biaya_tgt) * 0 * 100;
            else if ($persen_biaya < 24)
                $rb = ((1.76 * $ds->biaya_tgt - $ds->biaya_real) / $ds->biaya_tgt) * 100;
            else if ($persen_biaya > 24)
                $rb = 76 - ((((1.76 * $ds->biaya_tgt - $ds->biaya_real) / $ds->biaya_tgt) * 100) - 100);

            $waktu = $rw;
            $biaya = $rb;

            $perhitungan = $kuantitas + $kualitas + $waktu;
            if ($biaya > 0)
                $perhitungan += $biaya;

            $nilai_capaian_skp = 0;
            if ($ds->biaya_tgt == 0) {
                if ($ds->biaya_real == 0)
                    $nilai_capaian_skp = $perhitungan / 3;
                else
                    $nilai_capaian_skp = $perhitungan / 4;
            } else {
                $nilai_capaian_skp = $perhitungan / 4;
            }
            $total_nilai_capaian_skp += $nilai_capaian_skp;
            $detail_skp[] = (object) array(
                'id_detail_skp'         => $ds->id_detail_skp,
                'jenis_unsur'           => $ds->jenis_unsur,
                'keg_tgs_jbtn'          => $ds->keg_tgs_jbtn,
                'nilai_capaian_skp'     => $nilai_capaian_skp,
                'perhitungan'           => $perhitungan
            );
        }
        return array(
            'detail_skp'                => $detail_skp,
            'total_nilai_capaian_skp'   => $total_nilai_capaian_skp
        );
    }

    public function updateSKP($data)
    {
        foreach ($data['detail_skp'] as $detail_skp) {
            $this->db->query("
                UPDATE skp_detail 
                SET keg_tgs_jbtn = '" . $detail_skp['keg_tgs_jbtn'] . "', jenis_unsur = '" . $detail_skp['jenis_unsur'] . "', ak_asli = '" . $detail_skp['ak_asli'] . "', ak_tgt = '" . $detail_skp['ak_tgt'] . "', kuan_output_tgt = '" . $detail_skp['kuan_output_tgt'] . "', satuan_kuan_output_tgt = '" . $detail_skp['satuan_kuan_output_tgt'] . "', kual_mutu_tgt = '" . $detail_skp['kual_mutu_tgt'] . "', wkt_tgt = '" . $detail_skp['wkt_tgt'] . "', satuan_wkt_tgt = '" . $detail_skp['satuan_wkt_tgt'] . "', biaya_tgt = '" . $detail_skp['biaya_tgt'] . "'
                WHERE id_detail_skp = '" . $detail_skp['id_detail_skp'] . "'
            ");
        }   
    }

    public function updateStatusSKP($id_header_skp, $status_skp)
    {
        $this->db->query("
            UPDATE skp_header
            SET status_skp = '" . $status_skp . "', tanggal_validasi = '" . date("Y-m-d H:i:s") . "'
            WHERE id_header_skp = '" . $id_header_skp . "'
        ");
    }

    public function updateNilaiSKP($data)
    {
        foreach ($data['detail_skp'] as $detail_skp) {
            $this->db->query("
                UPDATE skp_detail 
                SET ak_real = '" . $detail_skp['ak_real'] . "', kuan_output_real = '" . $detail_skp['kuan_output_real'] . "', satuan_kuan_output_real = '" . $detail_skp['satuan_kuan_output_real'] . "', kual_mutu_real = '" . $detail_skp['kual_mutu_real'] . "', wkt_real = '" . $detail_skp['wkt_real'] . "', satuan_wkt_real = '" . $detail_skp['satuan_wkt_real'] . "', biaya_real = '" . $detail_skp['biaya_real'] . "'
                WHERE id_detail_skp = '" . $detail_skp['id_detail_skp'] . "'
            ");
        }   
    }

    public function updatePenilaianSKP($data)
    {
        $this->db->query("
            UPDATE skp_header
            SET id_atasan_pejabat_penilai = '" . $data['header_skp']['id_atasan_pejabat_penilai'] . "', tanggal_penilaian = '" . $data['header_skp']['tanggal_penilaian'] . "'
            WHERE id_header_skp = '" . $data['header_skp']['id_header_skp'] . "'
        ");

        foreach ($data['detail_skp'] as $detail_skp) {
            $this->db->query("
                UPDATE skp_detail 
                SET penghitungan = '" . $detail_skp['penghitungan'] . "', nilai_capaian_skp = '" . $detail_skp['nilai_capaian_skp'] . "'
                WHERE id_detail_skp = '" . $detail_skp['id_detail_skp'] . "'
            ");
        }
    }
}