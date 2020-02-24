<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_lembaga extends CI_Model {

    private $npsn;
    private $nama_sekolah;
    private $nama_kepsek;
    private $alamat;
    private $tingkat;
    private $status;
    private $id_pegawai;

    public function getLembaga()
    {
        $query = $this->db->query("
            SELECT P.nama_pegawai, P.nip_nik, L.* 
            FROM lembaga AS L 
            JOIN pegawai AS P ON L.id_pegawai = P.id_pegawai
        ");
        return $query;
    }

    public function getByID($id)
    {
        $query = $this->db->query("
            SELECT L.*,
            P.nama_pegawai, P.nip_nik
            FROM lembaga AS L
            JOIN pegawai AS P ON L.id_pegawai = P.id_pegawai
            WHERE npsn = '$id'
        ");
        return $query->row();
    }
    
    public function insert($data)
    {
        $this->npsn         = $data['npsn'];
        $this->nama_sekolah = $data['nama_sekolah'];
        $this->nama_kepsek  = $data['nama_kepsek'];
        $this->alamat       = $data['alamat'];
        $this->tingkat      = $data['tingkat'];
        $this->status       = $data['status'];
        $this->id_pegawai   = $data['id_pegawai'];
        
        $insert_data = array(
            'npsn'              => $this->npsn,
            'nama_sekolah'      => $this->nama_sekolah,
            'nama_kepsek'       => $this->nama_kepsek,
            'alamat'            => $this->alamat,
            'tingkat'           => $this->tingkat,
            'status'            => $this->status,
            'id_pegawai'        => $this->id_pegawai,
        );

        $this->db->insert('lembaga', $insert_data);
    }

    public function update($id, $data)
    {
        $this->db->where('npsn', $id);
        $this->db->update('lembaga', $data);
    }

    public function delete($id)
    {
        $delete_data = array(
            'npsn'    => $id
        );
        $this->db->delete("lembaga", $delete_data);
    }
 }