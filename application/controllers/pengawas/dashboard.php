<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('pengawas/sidebar');
		$this->load->view('pengawas/dashboard_page');
		$this->load->view('footer');
	}

}