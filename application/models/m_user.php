<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_user extends CI_Model {

    private $id_user;
    private $nip_nik;
    private $password;
    private $otoritas;
    private $status;
    private $id_pegawai;
    private $nama_pegawwai;
    private $pangkat_gol_ruang;
    private $jabatan;
    private $unit_kerja;
    
    public function get_user()
    {
        $query = $this->db->query("SELECT * FROM pegawai");
        return $query;
    }

    public function set_user($data)
    {
        $this->nip_nik = $data['nip_nik_nuptk'];
        $this->nama_pegawwai = $data['nama_pegawwai'];
        $this->pangkat_gol_ruang = $data['pangkat_gol_ruang'];
        $this->jabatan = $data['jabatan'];
        $this->otoritas = $data['otoritas'];
        $this->status = $data['status'];
        $this->unit_kerja = $data['unit_kerja'];
        $data = array('id' => $this->id, 'username' => $this->username, 'password' => $this->password, 'type' => $this->type, 'kodeSekolah' => $this->kodeSekolah, 'status' => $this->status);
        $this->db->insert('login', $data);
    }

    public function update_user($data, $id)
    {
        $this->username = $data['username'];
        $this->password = $data['password'];
        $this->type = $data['type'];
        $this->db->set('username', $this->username);
        $this->db->set('password', $this->password);
        $this->db->set('type', $this->type);
        $this->db->where('id', $id);
        $this->db->update('login');
    }   

    public function delete_user($where)
    {
        $this->db->where($where);
        $this->db->delete('login');
    }

 }