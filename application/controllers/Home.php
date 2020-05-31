<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_user');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['datauser'] 	= $this->M_user->select_all();

		$data['page'] 		= "home";
		$data['judul'] 		= "Data user";
		$data['deskripsi'] 	= "Manage Data user";

		$data['modal_tambah_user'] = show_my_modal('modals/modal_tambah_user', 'tambah-user', $data);

		$this->template->views('user/home', $data);
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */