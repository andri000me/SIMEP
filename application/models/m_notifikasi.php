<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_notifikasi extends CI_Model {

    private $id;
    private $otorisasi;
    private $tanggal_dibuat;
    private $tanggal_dibaca;
    private $hal;
    private $url;
    
    public function insert($data)
    {
        $this->db->query("
            INSERT INTO notifikasi (otorisasi, tanggal_dibuat, hal, url)
            VALUES ('" . $data['otorisasi'] . "', '" . $data['tanggal_dibuat'] . "', '" . $data['hal'] . "', '" . $data['url'] . "')
        ");
    }

    public function getByID($id)
    {
        return $this->db->query("
            SELECT *
            FROM notifikasi
            WHERE id = '$id'
        ")->row();   
    }

    public function getAll($otoritas='%%')
    {
        return $this->db->query("
            SELECT *
            FROM notifikasi
            WHERE otorisasi LIKE '" . $otoritas . "' AND tanggal_dibaca = '0000-00-00 00:00:00'
        ")->result();
    }

    public function getJumlah($otoritas='%%')
    {
        return $this->db->query("
            SELECT COUNT(*) jumlah
            FROM notifikasi
            WHERE otorisasi LIKE '" . $otoritas . "' AND tanggal_dibaca = '0000-00-00 00:00:00'
        ")->row()->jumlah;
    }

    public function updateRead($id)
    {
        $this->db->query("
            UPDATE notifikasi 
            SET tanggal_dibaca = '" . date("Y-m-d H:i:s") . "'
            WHERE id = '" . $id . "'
        ");
    }
}