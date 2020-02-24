<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	function validate($nip_nik, $password)
	{
		$this->db->where('status','Aktif');
		$this->db->where('password', $password);
		$this->db->where('nip_nik', $nip_nik);
		$query = $this->db->get('pegawai');
		return $query->row() != null;	
	}

	/*Get Session values */		
	function get_pegawai($nip_nik, $password)
	{	
		$this->db->where('password', $password);
		$this->db->where('nip_nik', $nip_nik);
		return $this->db->get('pegawai')->row();
	}
}