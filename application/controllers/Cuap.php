<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model("cuap_model");
	}

	public function index()
	{
		$data = array();
		$data["post_cuap"] = $this->cuap_model->get_cuap_by_id($this->session->userdata('id_anggota'));
		$data["avatar"] = $this->session->userdata('avatar');

		$this->load->view('layout/header_view');
		$this->load->view('layout/menu_view');
		$this->load->view('content/cuap/main_view', $data);
		$this->load->view('layout/footer_view');
	}

	public function post()
	{
		$id_anggota = $this->input->post('id_anggota');
		$post_cuap = $this->input->post('post_cuap');

		$this->cuap_model->post_cuap($id_anggota, $post_cuap);
		redirect(base_url("index.php/cuap"));
	}

	public function comment()
	{
		$id_anggota = $this->input->post('id_anggota');
		$post_cuap = $this->input->post('komentar');
		$post_parent_id = $this->input->post('post_parent_id');

		$this->cuap_model->post_comment($id_anggota, $post_cuap, $post_parent_id);
		redirect(base_url("index.php/cuap"));
	}

	public function comment_beranda()
	{
		$id_anggota = $this->input->post('id_anggota');
		$post_cuap = $this->input->post('komentar');
		$post_parent_id = $this->input->post('post_parent_id');

		$this->cuap_model->post_comment($id_anggota, $post_cuap, $post_parent_id);
		redirect(base_url("index.php/beranda"));
	}

}
