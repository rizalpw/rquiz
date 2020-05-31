<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kuis extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('kuis');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM kuis WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_nilai($id) {
		$sql = " SELECT nilai.id AS id, nilai.user_id AS nilai, nilai.kuis_id AS telp, kuis.nama AS kuis, level.nama AS level, soal.isi AS soal FROM nilai, kuis, level, soal WHERE nilai.id_level = level.id AND nilai.id_soal = soal.id AND nilai.kota_id = kota_id AND nilai.kota_id={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO kuis VALUES('','" .$data['kuis'] ."','" .$data['tanggal'] ."')";
		// $sql = "INSERT INTO kuis VALUES('','" .$data['kuis'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('kuis', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE kuis SET nama='" .$data['kuis'] ."',tanggal='" .$data['tanggal'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM kuis WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('kuis');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('kuis');

		return $data->num_rows();
	}
}

/* End of file M_kuis.php */
/* Location: ./application/models/M_kuis.php */