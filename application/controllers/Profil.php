<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

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
		$this->load->helper(array('form', 'url'));
		$this->load->model("anggota_model");
	}


	public function index()
	{
		$data = array();
		$anggota = $this->anggota_model->get_anggota_by_id($this->session->userdata('id_anggota'));
		$data["anggota"] = $anggota;
		if(empty($anggota->jenis_kelamin)) {
			$data["avatar"] = base_url('upload/profil/avatar-unsex.png');
		}
		else {
			if($anggota->jenis_kelamin == "L") 
				$data["avatar"] = base_url('upload/profil/avatar-man.png');
			else if($anggota->jenis_kelamin == "P")
				$data["avatar"] = base_url('upload/profil/avatar-girl.png');
		}	

		if(!empty($anggota->foto_profil)) {
			$data["avatar"] = base_url($anggota->foto_profil);
		}

		$error = empty($this->session->flashdata('error')) ? "" : $this->session->flashdata('error');
		$data["error"] = $error;

		$upload_data = empty($this->session->flashdata('upload_data')) ? "" : $this->session->flashdata('upload_data');
		$data["upload_data"] = $upload_data;

		$this->load->view('layout/header_view');
		$this->load->view('layout/menu_view');
		$this->load->view('content/profil/main_view', $data);
		$this->load->view('layout/footer_view');
	}

	public function update()
	{
		$id_anggota = $this->session->userdata('id_anggota');
		$nama_anggota = $this->input->post('nama_anggota');
		$kelas = $this->input->post('kelas');
		$jenis_kelamin = $this->input->post('jenis_kelamin');

		$this->anggota_model->update_profil($id_anggota,$nama_anggota,$kelas,$jenis_kelamin);
		redirect(base_url("index.php/profil"));
	}

	public function upload_photo_profil()
	{
		$config['upload_path']          = './upload/profil/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 300;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('input_profil_image')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error',$error);
            redirect(base_url("index.php/profil"));
        }
        else {
        	$upload_data = $this->upload->data();

        	$id_anggota = $this->session->userdata('id_anggota');
        	$url_file_name = "upload/profil/".$upload_data["file_name"];
        	$this->anggota_model->upload_photo_profil($id_anggota,$url_file_name);

        	$this->session->set_flashdata('upload_data',$upload_data);
            redirect(base_url("index.php/profil"));
        }
	}
}
