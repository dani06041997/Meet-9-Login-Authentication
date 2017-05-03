<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
		}else{
			redirect('login','refresh');
		}
	}

	public function index($idPegawai)
	{
		$this->load->model('pegawai_model');		
		$data["jabatan_list"] = $this->pegawai_model->getJabatanByPegawai($idPegawai);
		
		$this->load->view('jabatan', $data);
	}

	public function FunctionName()
	{
		$data["jabatan_list2"] = $this->pegawai_model->getDataPegawai();
	}

	public function create($idPegawai)
	{
		// idPegawai = 1
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('tglmulai', 'Tanggal Mulai', 'trim|required');
		$this->form_validation->set_rules('tglselesai', 'Tanggal Selesai', 'trim|required');
		$this->load->model('pegawai_model');	
		if($this->form_validation->run()==FALSE){
			$this->load->view('tambah_jabatan_view');
		}else{
			$this->pegawai_model->insertJabatan($idPegawai);
			$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data Berhasil Ditambah !!</div></div>");
              redirect('pegawai');
		}
		
	}



}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */

 