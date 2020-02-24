<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_program_jadwal extends CI_Model {

    private $id_program_jadwal;
    private $program_jadwal;
    private $jenis_program_jadwal;
    private $tahun_program;
    private $semester;
    private $tgl_unggah;
    private $tgl_validasi;
    private $id_detail_skp;
    private $id_validator;
    private $id_pengawas;

    public function getAll($id_pegawai="%%")
    {
        $query = $this->db->query("SELECT A.*, C.keg_tgs_jbtn FROM program_jadwal A JOIN pengawas B ON A.id_pengawas = B.id_pengawas JOIN skp_detail C ON A.id_detail_skp = C.id_detail_skp WHERE B.id_pegawai LIKE '" . $id_pegawai . "'");
        return $query;
    }

    public function getAllValidated($id_pegawai="%%")
    {
        $query = $this->db->query("SELECT A.*, C.keg_tgs_jbtn FROM program_jadwal A JOIN pengawas B ON A.id_pengawas = B.id_pengawas JOIN skp_detail C ON A.id_detail_skp = C.id_detail_skp WHERE A.tgl_validasi <> '0000-00-00'");
        return $query;
    }    

    public function getByID($id)
    {
        $query = $this->db->query("SELECT A.*, C.keg_tgs_jbtn FROM program_jadwal A JOIN pengawas B ON A.id_pengawas = B.id_pengawas JOIN skp_detail C ON A.id_detail_skp = C.id_detail_skp WHERE A.id_program_jadwal LIKE '" . $id . "'");
        return $query->row();        
    }

    public function insert($data) 
    {
        $insert_data = array(
            'id_program_jadwal'     => $data['id_program_jadwal'],
            'program_jadwal'        => $data['program_jadwal'],
            'jenis_program_jadwal'  => $data['jenis_program_jadwal'],
            'tahun_program'         => $data['tahun_program'],
            'semester'              => $data['semester'],
            'id_detail_skp'         => $data['id_detail_skp'],
            'tgl_unggah'            => $data['tgl_unggah'],
            'id_pengawas'           => $data['id_pengawas'],
        );

        $this->db->insert("program_jadwal", $insert_data);
    }

    public function updateData($data)
    {
        $this->db->query("
            UPDATE program_jadwal
            SET program_jadwal = '" . $data['program_jadwal'] . "', jenis_program_jadwal = '" . $data['jenis_program_jadwal'] . "', tgl_unggah = '" . $data['tgl_unggah'] . "', id_detail_skp = '" . $data['id_detail_skp'] . "', tahun_program = '" . $data['tahun_program'] . "', semester = '" . $data['semester'] . "'
            WHERE id_program_jadwal = '" . $data['id_program_jadwal'] . "'
        ");
    }

    public function validasiData($data) {
        $this->db->query("
            UPDATE program_jadwal
            SET id_validator = '" . $data['id_validator'] . "', tgl_validasi = '" . $data['tgl_validasi'] . "'
            WHERE id_program_jadwal = '" . $data['id_program_jadwal'] . "'
        ");
    }


 }