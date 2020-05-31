<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_soal extends CI_Model {
	public function select_all_soal() {
		$sql = "SELECT * FROM soal";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all() {
		$sql = "SELECT soal.id AS id, soal.isi AS isi, soal.pilihan_benar AS pilihan_benar, soal.pilihan_salah_1 AS pilihan_salah_1, soal.pilihan_salah_2 AS pilihan_salah_2, soal.pilihan_salah_3 AS pilihan_salah_3, soal.pilihan_salah_4 AS pilihan_salah_4, kuis.nama AS kuis FROM kuis, soal WHERE soal.kuis_id = kuis.id;";

		$data = $this->db->query($sql);

		return $data->result();

		// $this->db->select('*');
		// $this->db->from('soal');

		// $data = $this->db->get();

		// return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM soal WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_kuis($id) {
		$sql = "SELECT COUNT(*) AS jml FROM kuis WHERE kuis_id = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO `soal` (`id`, `isi`, `pilihan_benar`, `pilihan_salah_1`, `pilihan_salah_2`, `pilihan_salah_3`, `pilihan_salah_4`, `kuis_id`, `foto`) VALUES (NULL, '" .$data['soal'] ."', '" .$data['benar'] ."', '" .$data['salah1'] ."', '" .$data['salah2'] ."', '" .$data['salah3'] ."', '" .$data['salah4'] ."', '" .$data['kuis'] ."', NULL)";
		// $sql = "INSERT INTO soal VALUES('','" .$data['soal'] ."','" .$data['benar'] ."','" .$data['salah1'] ."','" .$data['salah2'] ."','" .$data['salah3'] ."','" .$data['salah4'] ."','" .$data['kuis'] ."')";
	 // $sql = "INSERT INTO kuis VALUES('','" .$data['kuis'] ."')";
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('soal', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE soal SET isi='" .$data['soal'] ."', pilihan_benar='" .$data['benar'] ."', pilihan_salah_1='" .$data['salah_1'] ."', pilihan_salah_2='" .$data['salah_2'] ."', pilihan_salah_3='" .$data['salah_3'] ."', pilihan_salah_4='" .$data['salah_4'] ."', kuis_id='" .$data['kuis'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM soal WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('soal');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('soal');

		return $data->num_rows();
	}
}

/* End of file M_soal.php */
/* Location: ./application/models/M_soal.php */