<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model("cuap_model");
	}

	public function index()
	{
		$data = array();
		$data["post_cuap"] = $this->cuap_model->get_all_cuap($this->session->userdata('id_anggota'));
		$data["avatar"] = $this->session->userdata('avatar');

		$this->load->view('layout/header_view');
		$this->load->view('layout/menu_view');
		$this->load->view('content/beranda/main_view', $data);
		$this->load->view('layout/footer_view');
	}


}
