<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_laporan extends CI_Model {

    private $id_laporan;
    private $laporan;
    private $tahun_laporan;
    private $bln_mulai;
    private $bln_selesai;
    private $tgl_unggah;
    private $tgl_validasi;
    private $id_skp_detail;
    private $id_validator;
    private $id_pengawas;

    public function getAll($id_pegawai="%%")
    {
        $query = $this->db->query("SELECT A.*, C.keg_tgs_jbtn FROM laporan A JOIN pengawas B ON A.id_pengawas = B.id_pengawas JOIN skp_detail C ON A.id_skp_detail = C.id_detail_skp WHERE B.id_pegawai LIKE '" . $id_pegawai . "'");
        return $query;
    }

    public function getAllValidated($id_pegawai="%%")
    {
        $query = $this->db->query("SELECT A.*, C.keg_tgs_jbtn FROM laporan A JOIN pengawas B ON A.id_pengawas = B.id_pengawas JOIN skp_detail C ON A.id_skp_detail = C.id_detail_skp WHERE A.tgl_validasi <> '0000-00-00'");
        return $query;
    }    

    public function getByID($id)
    {
        $query = $this->db->query("SELECT A.*, C.keg_tgs_jbtn FROM laporan A JOIN pengawas B ON A.id_pengawas = B.id_pengawas JOIN skp_detail C ON A.id_skp_detail = C.id_detail_skp WHERE A.id_laporan LIKE '" . $id . "'");
        return $query->row();        
    }

    public function insert($data) 
    {
        $insert_data = array(
            'id_laporan'     => $data['id_laporan'],
            'laporan'        => $data['laporan'],
            'tahun_laporan'  => $data['tahun_laporan'],
            'bln_mulai'      => $data['bln_mulai'],
            'bln_selesai'    => $data['bln_selesai'],
            'id_skp_detail'  => $data['id_detail_skp'],
            'tgl_unggah'     => $data['tgl_unggah'],
            'id_pengawas'    => $data['id_pengawas'],
        );

        $this->db->insert("laporan", $insert_data);
    }

    public function updateData($data)
    {
        $this->db->query("
            UPDATE laporan
            SET laporan = '" . $data['laporan'] . "', tgl_unggah = '" . $data['tgl_unggah'] . "', id_skp_detail = '" . $data['id_detail_skp'] . "', tahun_laporan = '" . $data['tahun_laporan'] . "', bln_mulai = '" . $data['bln_mulai'] . "', bln_selesai = '" . $data['bln_selesai'] . "'
            WHERE id_laporan = '" . $data['id_laporan'] . "'
        ");
    }

    public function validasiData($data) {
        $this->db->query("
            UPDATE laporan
            SET id_validator = '" . $data['id_validator'] . "', tgl_validasi = '" . $data['tgl_validasi'] . "'
            WHERE id_laporan = '" . $data['id_laporan'] . "'
        ");
    }


 }