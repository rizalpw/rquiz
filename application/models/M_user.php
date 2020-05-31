<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {
	
	public function select_all() {
		$this->db->select('*');
		$this->db->from('user');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM user WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_nilai($id) {
		$sql = " SELECT nilai.id AS id, nilai.user_id AS nilai, nilai.user_id AS telp, user.nama AS user, level.nama AS level, soal.isi AS soal FROM nilai, user, level, soal WHERE nilai.id_level = level.id AND nilai.id_soal = soal.id AND nilai.kota_id = kota_id AND nilai.kota_id={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {

		$sql = "INSERT INTO user (username, password, nama) VALUES ('" .$data['user'] ."', MD5('" .$data['password'] ."'), '" .$data['nama'] ."')";
		// $sql = "INSERT INTO user VALUES('','" .$data['user'] ."','" .$data['tanggal'] ."')";
		// $sql = "INSERT INTO user VALUES('','" .$data['user'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('user', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE user SET username = '" .$data['user'] ."', password = MD5('" .$data['password'] ."'), nama = '" .$data['nama'] ."' WHERE user.id = '" .$data['id'] ."'";
		// $sql = "UPDATE user SET nama='" .$data['user'] ."',tanggal='" .$data['tanggal'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM user WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('user');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('user');

		return $data->num_rows();
	}
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */