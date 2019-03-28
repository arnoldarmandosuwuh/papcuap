<?php

class Autentikasi_model extends CI_Model {

	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function daftar_baru($nama,$username,$password)
	{
		$data_anggota = array(
	        'nama_anggota' => $nama
		);

		$this->db->insert('anggota', $data_anggota);

		$id_anggota = $this->db->insert_id();

		$data_autentikasi = array(
	        'id_anggota' => $id_anggota,
	        'username' => $username,
	        'password' => $password
		);

		$this->db->insert('autentikasi', $data_autentikasi);
	}

	public function cek_autentikasi($username, $password) 
	{
		$result = array();
		$result_user = false;

		$this->db->select('
			anggota.id_anggota, 
			anggota.nama_anggota, 
			anggota.foto_profil, 
			anggota.jenis_kelamin, 
			autentikasi.id_autentikasi,
			autentikasi.username');
		$this->db->from('autentikasi');
		$this->db->join('anggota', 'anggota.id_anggota = autentikasi.id_anggota');
		$this->db->where('autentikasi.username', $username);
		$this->db->where('autentikasi.password', $password);

		$query = $this->db->get();

		if($query->num_rows() > 0) {
			$result["data_user"] = $query->row();
			$result["valid_user"] = true;
		}
		else {
			$result["data_user"] = array();
			$result["valid_user"] = false;
		}

		return $result;
	}

	public function update_password($id_autentikasi,$password) 
	{
		$this->db->set('password', $password);
		$this->db->where('id_autentikasi', $id_autentikasi);
		$this->db->update('autentikasi');
	
	}

}
