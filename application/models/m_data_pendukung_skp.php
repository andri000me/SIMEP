<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_data_pendukung_skp extends CI_Model {

    private $id_data_pendukung;
    private $tahun_pendukung_skp;
    private $jenis_data;
    private $data_pendukung;
    private $tgl_unggah;
    private $tgl_validasi;
    private $id_detail_skp;
    private $id_validator;
    
    public function getAll($id_pegawai="%%")
    {
        $query = $this->db->query("SELECT A.*, C.keg_tgs_jbtn FROM data_pendukung_skp A JOIN pengawas B ON A.id_pengawas = B.id_pengawas JOIN skp_detail C ON A.id_detail_skp = C.id_detail_skp WHERE B.id_pegawai LIKE '" . $id_pegawai . "'");
        return $query;
    }

    public function getAllValidated($id_pegawai="%%")
    {
        $query = $this->db->query("SELECT A.*, C.keg_tgs_jbtn FROM data_pendukung_skp A JOIN pengawas B ON A.id_pengawas = B.id_pengawas JOIN skp_detail C ON A.id_detail_skp = C.id_detail_skp WHERE A.tgl_validasi <> '0000-00-00'");
        return $query;
    }    

    public function getByID($id)
    {
        $query = $this->db->query("SELECT A.*, C.keg_tgs_jbtn FROM data_pendukung_skp A JOIN pengawas B ON A.id_pengawas = B.id_pengawas JOIN skp_detail C ON A.id_detail_skp = C.id_detail_skp WHERE A.id_data_pendukung LIKE '" . $id . "'");
        return $query->row();        
    }

    public function insert($data) 
    {
        $insert_data = array(
            'id_data_pendukung'   => $data['id_data_pendukung'],
            'tahun_pendukung_skp' => $data['tahun_pendukung_skp'],
            'jenis_data'          => $data['jenis_data'],
            'tgl_unggah'          => $data['tgl_unggah'],
            'id_detail_skp'       => $data['id_detail_skp'],
            'id_pengawas'         => $data['id_pengawas'],
            'data_pendukung'      => $data['data_pendukung']
        );

        $this->db->insert("data_pendukung_skp", $insert_data);
    }

    public function updateData($data)
    {
        $this->db->query("
            UPDATE data_pendukung_skp
            SET tahun_pendukung_skp = '" . $data['tahun_pendukung_skp'] . "', jenis_data = '" . $data['jenis_data'] . "', tgl_unggah = '" . $data['tgl_unggah'] . "', id_detail_skp = '" . $data['id_detail_skp'] . "', data_pendukung = '" . $data['data_pendukung'] . "'
            WHERE id_data_pendukung = '" . $data['id_data_pendukung'] . "'
        ");
    }

    public function validasiData($data) {
        $this->db->query("
            UPDATE data_pendukung_skp
            SET id_validator = '" . $data['id_validator'] . "', tgl_validasi = '" . $data['tgl_validasi'] . "'
            WHERE id_data_pendukung = '" . $data['id_data_pendukung'] . "'
        ");
    }
}