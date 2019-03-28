<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi extends CI_Controller {

	/**
	URL Logo ITS
	http://papsi.its.ac.id/modul/downlot.php?file=Logo%20ITS-Bulat.png
	
	URL Logo PAPSI
	http://papsi.its.ac.id/modul/downlot.php?file=logo%20papsi%20transparan.gif
	**/

	public function __construct() 
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model("autentikasi_model");
	}

	public function index()
	{
		$data = array();
		$error = empty($this->session->flashdata('error')) ? "" : $this->session->flashdata('error');
		$data["error"] = $error;

		$this->load->view('login_view', $data);
	}

	public function new() 
	{
		$data = array();
		
		$error = empty($this->session->flashdata('error')) ? "" : $this->session->flashdata('error');
		$data["error"] = $error;

		$success = empty($this->session->flashdata('success')) ? "" : $this->session->flashdata('success');
		$data["success"] = $success;

		$this->load->view('register_view', $data);
	}

	public function register() 
	{
		$nama_lengkap = $this->input->post('nama_anggota');
		$username = $this->input->post('email_anggota');
		$password1 = $this->input->post('password');
		$password2 = $this->input->post('password2');

		if($password1 == $password2) {
			$this->autentikasi_model->daftar_baru($nama_lengkap, $username, md5($password2));

			$this->session->set_flashdata('success',"Pendaftaran anggota berhasil dilakukan.");
			redirect(base_url("index.php/autentikasi/new"));
		}
		else {
			$this->session->set_flashdata('error',"Pendaftaran gagal. Password yang anda masukkan tidak sama");
			redirect(base_url("index.php/autentikasi/new"));
		}

	}


	public function login()
	{
		$user_id = $this->input->post('user_id');
		$password = $this->input->post('password');

		$result = $this->autentikasi_model->cek_autentikasi($user_id, md5($password));

		if($result["valid_user"]) {
			$user = $result["data_user"];

			$avatar = base_url('upload/profil/avatar-unsex.png');
			if(!empty($user->jenis_kelamin)) {
				if($anggota->jenis_kelamin == "L") 
					$avatar = base_url('upload/profil/avatar-man.png');
				else if($anggota->jenis_kelamin == "P")
					$avatar = base_url('upload/profil/avatar-girl.png');
			}

			if(!empty($user->foto_profil)) {
				$avatar = base_url($user->foto_profil);
			}
			
			$data_session = array(
				'id_anggota'  => $user->id_anggota,
				'nama_anggota'  => $user->nama_anggota,
				'foto_profil'  => $user->foto_profil,
				'jenis_kelamin'  => $user->jenis_kelamin,
				'avatar'  => $avatar,
				'id_autentikasi'  => $user->id_autentikasi,
		        'username'  => $user->username
			);

			$this->session->set_userdata($data_session);

			redirect(base_url("index.php/beranda"));
		}
		else {
			$this->session->set_flashdata('error',"username dan password yang anda masukkan tidak ditemukan");
			redirect(base_url());
		}
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
