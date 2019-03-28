<?php

class Cuap_model extends CI_Model {

	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function post_cuap($id_anggota,$post_cuap)
	{
		$data = array(
	        'id_anggota' => $id_anggota,
	        'post' => $post_cuap,
	        'post_parent_id' => 0
		);

		$this->db->insert('cuap', $data);
	}

	public function post_comment($id_anggota,$post_cuap,$post_parent_id)
	{
		$data = array(
	        'id_anggota' => $id_anggota,
	        'post' => $post_cuap,
	        'post_parent_id' => $post_parent_id
		);

		$this->db->insert('cuap', $data);
	}

	public function get_all_cuap()
	{
		$this->db->select('
			anggota.id_anggota,
			anggota.nama_anggota,
			anggota.foto_profil,
			anggota.jenis_kelamin,
			anggota.kelas,
			cuap.id_cuap,cuap.post,
			cuap.post_parent_id,
			cuap.post_date');
		$this->db->from('cuap');
		$this->db->join('anggota', 'anggota.id_anggota = cuap.id_anggota');
		$this->db->where('cuap.post_parent_id', 0);
		$this->db->order_by('cuap.post_date', 'DESC');

		$query = $this->db->get();
		$result = new ArrayObject();

		foreach ($query->result() as $row) {
			$row->comment = $this->get_comment_by_cuap_id($row->id_cuap);
			$result->append($row);
		}

		return $result;
	}

	public function get_cuap_by_id($id_anggota)
	{
		$this->db->select('
			anggota.id_anggota,
			anggota.nama_anggota,
			anggota.foto_profil,
			anggota.jenis_kelamin,
			anggota.kelas,
			cuap.id_cuap,cuap.post,
			cuap.post_parent_id,
			cuap.post_date');
		$this->db->from('cuap');
		$this->db->join('anggota', 'anggota.id_anggota = cuap.id_anggota');
		$this->db->where('cuap.id_anggota', $id_anggota);
		$this->db->where('cuap.post_parent_id', 0);
		$this->db->order_by('cuap.post_date', 'DESC');

		$query = $this->db->get();
		$result = new ArrayObject();

		foreach ($query->result() as $row) {
			$row->comment = $this->get_comment_by_cuap_id($row->id_cuap);
			$result->append($row);
		}

		return $result;
	}

	public function get_comment_by_cuap_id($id_cuap)
	{
		$this->db->select('
			anggota.id_anggota,
			anggota.nama_anggota,
			anggota.foto_profil,
			anggota.jenis_kelamin,
			anggota.kelas,
			cuap.id_cuap,cuap.post,
			cuap.post_parent_id,
			cuap.post_date');
		$this->db->from('cuap');
		$this->db->join('anggota', 'anggota.id_anggota = cuap.id_anggota');
		$this->db->where('cuap.post_parent_id', $id_cuap);
		$this->db->order_by('cuap.post_date', 'ASC');

		$query = $this->db->get();
		return $query->result();
	}

}
