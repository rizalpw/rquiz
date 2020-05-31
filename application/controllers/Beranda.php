<?php
class Beranda extends CI_Controller {
	public function index(){
		$this->load->view('beranda');
	}
	public function reg(){
		$this->load->view('reg');

	}
}