<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_pengawas extends CI_Model {

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
    private $id_pengawas;
    private $nuptk;
    private $bidang;
    private $pendidikan;
    private $tmp_lahir;
    private $tgl_lahir;

    public function get_pengawas()
    {
        $query = $this->db->query("SELECT * FROM pegawai P JOIN pengawas W ON P.id_pegawai=W.id_pegawai");
        return $query;
    }

    public function getByID($id)
    {
        $query = $this->db->query("
            SELECT W.*, 
            P.nama_pegawai, P.nip_nik, P.pangkat_gol_ruang, 
            P.jabatan, P.jenis_kelamin, P.status, P.unit_kerja, P.tmt_jabatan
            FROM pengawas AS W 
            JOIN pegawai AS P ON W.id_pegawai = P.id_pegawai
            WHERE W.id_pegawai = '$id'
        ");
        return $query->row();
    }

    public function getByIDPengawas($id_pengawas)
    {
        $query = $this->db->query("
            SELECT W.*, 
            P.nama_pegawai, P.nip_nik, P.pangkat_gol_ruang, 
            P.jabatan, P.jenis_kelamin, P.status, P.unit_kerja, P.tmt_jabatan
            FROM pengawas AS W 
            JOIN pegawai AS P ON W.id_pegawai = P.id_pegawai
            WHERE W.id_pengawas = '$id_pengawas'
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
        $this->id_pengawas          = $data['id_pengawas'];
        $this->nuptk                = $data['nuptk'];
        $this->bidang               = $data['bidang'];
        $this->pendidikan           = $data['pendidikan'];
        $this->tmp_lahir            = $data['tmp_lahir'];
        $this->tgl_lahir            = $data['tgl_lahir'];
    
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

        $insert_data1 = array(
            'id_pegawai'    => $this->id_pegawai,
            'id_pengawas'   => $this->id_pengawas,
            'nuptk'         => $this->nuptk,
            'bidang'        => $this->bidang,
            'pendidikan'    => $this->pendidikan,
            'tmp_lahir'     => $this->tmp_lahir,
            'tgl_lahir'     => $this->tgl_lahir
        );

        $this->db->insert("pengawas", $insert_data1);
    }

    public function update($id, $data)
    {
        $this->db->where('id_pengawas', $id);
        $this->db->update('pengawas', $data);
    }

    public function updatePegawai($id, $data)
    {
        $this->db->where('id_pegawai', $id);
        $this->db->update('pegawai', $data);
    }

    public function delete($id)
    {
        $delete_data = array(
            'id_pengawas'    => $id
        );
        $this->db->delete("pengawas", $delete_data);
    }
}