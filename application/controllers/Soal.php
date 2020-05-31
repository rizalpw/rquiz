<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class soal extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_soal');
		$this->load->model('M_kuis');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['datasoal'] = $this->M_soal->select_all();
		$data['datakuis'] = $this->M_kuis->select_all();
		
		$data['page'] 		= "soal";
		$data['judul'] 		= "Data soal";
		$data['deskripsi'] 	= "Manage Data soal";

		$data['modal_tambah_soal'] = show_my_modal('modals/modal_tambah_soal', 'tambah-soal', $data);

		$this->template->views('soal/home', $data);
	}

	public function tampil() {
		$data['datasoal'] = $this->M_soal->select_all();
		$this->load->view('soal/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('soal', 'soal', 'trim|required');


		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_soal->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data soal Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data soal Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;
		$data['datakuis']	= $this->M_kuis->select_all();
		$id 				= trim($_POST['id']);
		$data['datasoal'] = $this->M_soal->select_by_id($id);

		echo show_my_modal('modals/modal_update_soal', 'update-soal', $data);
	}


	public function prosesUpdate() {
		$this->form_validation->set_rules('soal', 'soal', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_soal->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data soal Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data soal Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_soal->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data soal Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data soal Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['soal'] = $this->M_soal->select_by_id($id);
		$data['datasoal'] = $this->M_soal->select_by_nilai($id);

		echo show_my_modal('modals/modal_detail_soal', 'detail-soal', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_soal->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nama soal");
		$rowCount++;

		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data soal.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data soal.xlsx', NULL);
	}

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->M_soal->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_kuis->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data soal Berhasil diimport ke database'));
						redirect('soal');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data soal Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('soal');
				}

			}
		}
	}
}

/* End of file soal.php */
/* Location: ./application/controllers/soal.php */