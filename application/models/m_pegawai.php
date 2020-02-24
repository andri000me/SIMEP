<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_pegawai extends CI_Model {

    private $id_pegawai;
    private $nip_nik;
    private $nama_pegawai;
    private $pangkat_gol_ruang;
    private $jabatan;
    private $tmt_jabatan;
    private $jenis_kelamin;
    private $password;
    private $otoritas;
    private $status;
    private $unit_kerja;
    
    public function getAll()
    {
        $query = $this->db->query("SELECT * FROM pegawai");
        return $query;
    }

    public function getPegawai()
    {
        $query = $this->db->query(
            "SELECT * 
            FROM pegawai
            WHERE jabatan NOT LIKE '%Pengawas%'"
        );
        return $query;
    }

    public function getByID($id)
    {
        $query = $this->db->query("
            SELECT *
            FROM pegawai
            WHERE id_pegawai = '$id'
        ");
        return $query->row();
    }

    public function insert($data) 
    {
        $this->id_pegawai           = $data['id_pegawai'];
        $this->nip_nik              = $data['nip_nik'];
        $this->nama_pegawai         = $data['nama_pegawai'];
        $this->pangkat_gol_ruang    = $data['pangkat_gol_ruang'];
        $this->jabatan              = $data['jabatan'];
        $this->tmt_jabatan          = $data['tmt_jabatan'];
        $this->jenis_kelamin        = $data['jenis_kelamin'];
        $this->password             = $data['password'];
        $this->otoritas             = $data['otoritas'];
        $this->status               = $data['status'];
        $this->unit_kerja           = $data['unit_kerja'];

        $insert_data = array(
            'id_pegawai'        => $this->id_pegawai,
            'nip_nik'           => $this->nip_nik,
            'nama_pegawai'      => $this->nama_pegawai,
            'pangkat_gol_ruang' => $this->pangkat_gol_ruang,
            'jabatan'           => $this->jabatan,
            'tmt_jabatan'       => $this->tmt_jabatan,
            'jenis_kelamin'     => $this->jenis_kelamin,
            'password'          => $this->password,
            'otoritas'          => $this->otoritas,
            'status'            => $this->status,
            'unit_kerja'        => $this->unit_kerja
        );

        $this->db->insert("pegawai", $insert_data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_pegawai', $id);
        $this->db->update('pegawai', $data);
    }

    public function delete($id)
    {
        $delete_data = array(
            'id_pegawai'    => $id
        );
        $this->db->delete("pegawai", $delete_data);
    }
}