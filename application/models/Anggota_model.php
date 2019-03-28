<?php

class Anggota_model extends CI_Model {

	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_anggota_by_id($id_anggota)
	{
		$this->db->select('
			anggota.id_anggota,
			anggota.nama_anggota,
			anggota.jenis_kelamin,
			anggota.kelas,
			anggota.foto_profil');
		$this->db->from('anggota');
		$this->db->where('anggota.id_anggota', $id_anggota);

		$query = $this->db->get();
		return $query->row();
	}

	public function update_profil($id_anggota,$nama_anggota,$kelas,$jenis_kelamin)
	{
		$this->db->set('nama_anggota', $nama_anggota);
		$this->db->set('jenis_kelamin', $jenis_kelamin);
		$this->db->set('kelas', $kelas);
		$this->db->where('id_anggota', $id_anggota);
		$this->db->update('anggota');
	}

	public function upload_photo_profil($id_anggota,$url_file_name)
	{
		$this->db->set('foto_profil', $url_file_name);
		$this->db->where('id_anggota', $id_anggota);
		$this->db->update('anggota');
	}

}
