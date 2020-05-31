<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nilai extends CI_Model {
	public function select_all_nilai() {
		$sql = "SELECT * FROM nilai";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all() {
		$sql = "SELECT nilai.id AS id, user.nama AS user, kuis.nama AS kuis, nilai.hasil AS hasil, nilai.jawaban FROM kuis, nilai, user WHERE nilai.kuis_id = kuis.id AND nilai.user_id = user.id ;";

		$data = $this->db->query($sql);

		return $data->result();

		// $this->db->select('*');
		// $this->db->from('nilai');

		// $data = $this->db->get();

		// return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM nilai WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_kuis($id) {
		$sql = "SELECT COUNT(*) AS jml FROM kuis WHERE kuis_id = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO `nilai` (`id`, `isi`, `pilihan_benar`, `pilihan_salah_1`, `pilihan_salah_2`, `pilihan_salah_3`, `pilihan_salah_4`, `kuis_id`, `foto`) VALUES (NULL, '" .$data['nilai'] ."', '" .$data['benar'] ."', '" .$data['salah1'] ."', '" .$data['salah2'] ."', '" .$data['salah3'] ."', '" .$data['salah4'] ."', '" .$data['kuis'] ."', NULL)";
		// $sql = "INSERT INTO nilai VALUES('','" .$data['nilai'] ."','" .$data['benar'] ."','" .$data['salah1'] ."','" .$data['salah2'] ."','" .$data['salah3'] ."','" .$data['salah4'] ."','" .$data['kuis'] ."')";
	 // $sql = "INSERT INTO kuis VALUES('','" .$data['kuis'] ."')";
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('nilai', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE nilai SET user_id='" .$data['user'] ."', kuis_id='" .$data['kuis'] ."', hasil='" .$data['hasil'] ."', jawaban='" .$data['jawaban'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM nilai WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('nilai');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('nilai');

		return $data->num_rows();
	}
}

/* End of file M_nilai.php */
/* Location: ./application/models/M_nilai.php */