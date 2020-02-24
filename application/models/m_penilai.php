<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_penilai extends CI_Model {

    private $id_pegawai;
    private $jabatan;
    private $status;
    
    public function getPenilai()
    {
        $query = $this->db->query("
            SELECT P.nama_pegawai, P.nip_nik, N.*
            FROM pegawai AS P 
            JOIN penilai AS N ON P.id_pegawai = N.id_pegawai
        ");
        return $query;
    }

    public function getPejabatPenilai()
    {
        $query = $this->db->query("
            SELECT P.nama_pegawai, P.nip_nik, P.pangkat_gol_ruang, P.jabatan, P.unit_kerja, N.*
            FROM pegawai AS P 
            JOIN penilai AS N ON P.id_pegawai = N.id_pegawai
            WHERE N.jabatan = 'Pejabat Penilai' AND  N.status = 'Aktif'
        ");
        return $query;
    }

    public function getPejabatPenilaiAktif()
    {
        $query = $this->db->query("
            SELECT P.nama_pegawai, P.nip_nik, P.pangkat_gol_ruang, P.jabatan, P.unit_kerja, N.*
            FROM pegawai AS P 
            JOIN penilai AS N ON P.id_pegawai = N.id_pegawai
            WHERE N.jabatan = 'Pejabat Penilai' AND  N.status = 'Aktif'
        ");
        return $query->row();        
    }

    public function getAtasanPejabatPenilaiAktif()
    {
        $query = $this->db->query("
            SELECT P.nama_pegawai, P.nip_nik, P.pangkat_gol_ruang, P.jabatan, P.unit_kerja, N.*
            FROM pegawai AS P 
            JOIN penilai AS N ON P.id_pegawai = N.id_pegawai
            WHERE N.jabatan = 'Atasan Pejabat Penilai' AND  N.status = 'Aktif'
        ");
        return $query->row();        
    }

    public function getByID($id)
    {
        $query = $this->db->query("
            SELECT W.*, 
            P.nama_pegawai, P.nip_nik, P.pangkat_gol_ruang, 
            P.jabatan, P.jenis_kelamin, P.status, P.unit_kerja, P.tmt_jabatan
            FROM penilai AS W 
            JOIN pegawai AS P ON W.id_pegawai = P.id_pegawai
            WHERE W.id_penilai = '$id'
        ");
        return $query->row();
    }

    public function getByIDPegawai($id_pegawai)
    {
        $query = $this->db->query("
            SELECT W.*, 
            P.nama_pegawai, P.nip_nik, P.pangkat_gol_ruang, 
            P.jabatan, P.jenis_kelamin, P.status, P.unit_kerja, P.tmt_jabatan
            FROM penilai AS W 
            JOIN pegawai AS P ON W.id_pegawai = P.id_pegawai
            WHERE W.id_pegawai = '$id_pegawai'
        ");
        return $query->row();
    }

    public function insert($data) 
    {
        $this->id_penilai    = $data['id_penilai'];
        $this->id_pegawai    = $data['id_pegawai'];
        $this->jabatan       = $data['jabatan'];
        $this->status        = $data['status'];

        $insert_data = array(
            'id_pegawai'        => $this->id_pegawai,
            'id_penilai'        => $this->id_penilai,
            'jabatan'           => $this->jabatan,
            'status'            => $this->status
        );

        $this->db->insert("penilai", $insert_data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_penilai', $id);
        $this->db->update('penilai', $data);
    }

    public function delete($id)
    {
        $delete_data = array(
            'id_penilai'    => $id
        );
        $this->db->delete("penilai", $delete_data);
    }
}