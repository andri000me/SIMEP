<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_perilaku_kerja extends CI_Model {

    private $id_perilaku_kerja_skp;
    private $unsur;
    private $nilai;
    private $predikat;
    private $tanggal_penilaian;
    private $id_header_skp;
    
    public function isExistSKP($id_header_skp)
    {
        $row = $this->db->query("
            SELECT COUNT(*) jumlah
            FROM skp_perilaku_kerja
            WHERE id_header_skp = '" . $id_header_skp . "'
        ")->row();
        return $row->jumlah > 0;
    }

    public function insertPerilakuKerja($data)
    {
        foreach ($data as $d) {
            $predikat = "";
            if ($d['nilai'] <= 50)
                $predikat = "Buruk";
            else if ($d['nilai'] <= 60)
                $predikat = "Sedang";
            else if ($d['nilai'] <= 75)
                $predikat = "Cukup Baik";
            else if ($d['nilai'] <= 90.99)
                $predikat = "Baik";
            else
                $predikat = "Sangat Baik";
            $this->db->query("
                INSERT INTO skp_perilaku_kerja (id_perilaku_kerja_skp, unsur, nilai, predikat, tanggal_penilaian, id_header_skp)
                VALUES('" . $d['id_perilaku_kerja_skp'] . "', '" . $d['unsur'] . "', '" . $d['nilai'] . "', '" . $predikat . "', '" . date("Y-m-d H:i:s") . "', '" . $d['id_header_skp'] . "')
            ");
        }
    }

    public function getAllBySKP($id_header_skp)
    {
        return $this->db->query("
            SELECT *
            FROM skp_perilaku_kerja
            WHERE id_header_skp = '" . $id_header_skp . "'
        ")->result();
    }

    public function updatePerilakuKerja($data)
    {
        foreach ($data as $d) {
            $predikat = "";
            if ($d['nilai'] <= 50)
                $predikat = "Buruk";
            else if ($d['nilai'] <= 60)
                $predikat = "Sedang";
            else if ($d['nilai'] <= 75)
                $predikat = "Cukup Baik";
            else if ($d['nilai'] <= 90.99)
                $predikat = "Baik";
            else
                $predikat = "Sangat Baik";
            $this->db->query("
                UPDATE skp_perilaku_kerja 
                SET nilai = '" . $d['nilai'] . "', predikat = '" . $predikat . "', tanggal_penilaian = '" . date("Y-m-d H:i:s") . "'
                WHERE id_perilaku_kerja_skp = '" . $d['id_perilaku_kerja_skp'] . "'
            ");
        }
    }
}