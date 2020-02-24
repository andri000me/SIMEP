<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_validator extends CI_Controller {

		public function __construct()
		{
				parent::__construct();
				$this->load->model('m_validator');
		}

		Public function index()
		{
			$data['validator']=$this->m_validator->getValidator()->result();			
			$this->load->view('header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/v_data_validator', $data);
			$this->load->view('footer');
		}

		public function addNewValidatorPage()
		{
			$this->load->model('m_pegawai');
			$data['pegawai']=$this->m_pegawai->getPegawai()->result();
			$this->load->view('header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/v_data_validator-tambah', $data);
			$this->load->view('footer');
		}

		public function addValidator()
		{
			$data_validator = array(
				'id_pegawai'        => $this->input->post('id_pegawai'),
	            'id_validator'      => "v_" . $this->input->post('id_pegawai'),
	            'jabatan'           => $this->input->post('jabatan'),
	            'status'            => $this->input->post('status')
			);
			$this->m_validator->insert($data_validator);
			$this->session->set_flashdata('msg','Data Validator Berhasil Tersimpan');
			redirect('admin/data_validator');
		}

		public function editValidator($id)
		{
			$data['validator'] = $this->m_validator->getByID($id);
			$data['data_validator'] = $this->m_validator->getValidator()->result();
			$this->load->view('header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/v_data_validator-edit', $data);
			$this->load->view('footer');
		}

		public function updateValidator($id){
			$data_validator = array(
				'id_pegawai'        => $this->input->post('id_pegawai'),
	            'jabatan'           => $this->input->post('jabatan'),
	            'status'            => $this->input->post('status')
			);
			$this->m_validator->update($id, $data_validator);
			$this->session->set_flashdata('msg','Data Validator Berhasil Tersimpan');
			redirect('admin/data_validator');
		}
}

?>