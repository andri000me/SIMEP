<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_validator extends CI_Model {

    private $id_pegawai;
    private $jabatan;
    private $status;
    
    public function getValidator()
    {
        $query = $this->db->query("
            SELECT P.nama_pegawai, P.nip_nik, V.* 
            FROM pegawai AS P 
            JOIN validator AS V ON P.id_pegawai = V.id_pegawai
        ");
        return $query;
    }


    public function getByID($id)
    {
        $query = $this->db->query("
            SELECT P.nama_pegawai, P.nip_nik, V.*
            FROM pegawai AS P
            JOIN validator AS V ON P.id_pegawai = V.id_pegawai
            WHERE P.id_pegawai = '$id'
        ");
        return $query->row();
    }

    public function insert($data) 
    {
        $this->id_validator  = $data['id_validator'];
        $this->id_pegawai    = $data['id_pegawai'];
        $this->jabatan       = $data['jabatan'];
        $this->status        = $data['status'];

        $insert_data = array(
            'id_pegawai'        => $this->id_pegawai,
            'id_validator'      => $this->id_validator,
            'jabatan'           => $this->jabatan,
            'status'            => $this->status   
        );

        $this->db->insert("validator", $insert_data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_validator', $id);
        $this->db->update('validator', $data);
    }

    public function delete($id)
    {
        $delete_data = array(
            'id_validator'    => $id
        );
        $this->db->delete("validator", $delete_data);
    }
}