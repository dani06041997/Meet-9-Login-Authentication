<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

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

	public function index()
	{
		$this->load->model('pegawai_model');
		$data["pegawai_list"] = $this->pegawai_model->getDataPegawai();
		$this->load->view('pegawai',$data);	
	}

	public function datatable()
	{
		$this->load->model('pegawai_model');
		$data["pegawai_list"] = $this->pegawai_model->getDataPegawai();
		$this->load->view('pegawai_datatable', $data);
		
	}

	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Name', 'trim|required');
		$this->form_validation->set_rules('nip', 'Nip', 'trim|required|numeric');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[5]');
		$this->load->model('pegawai_model');	
		if($this->form_validation->run()==FALSE){

			$this->load->view('tambah_pegawai_view');

		}else{
			$config['upload_path']			='./assets/uploads';
			$config['allowed_types']		='gif|jpg|png';
			$config['max_size']				=1000000000;
			$config['max_width']			=10240;
			$config['max_height']			=7680;
			$this->load->library('upload', $config);
			if( ! $this->upload->do_upload('userfile'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gambar Belum Ditambah !!</div></div>");
              	redirect('pegawai/create');
				//$this->load->view('tambah_pegawai_view', $error);

			}
			else
			{
				
				$this->pegawai_model->insertPegawai();
			$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data Berhasil Ditambah !!</div></div>");
              redirect('pegawai');
				//$this->load->view('tambah_pegawai_sukses');//

				

			}

			 
		}
	}
	//method update butuh parameter id berapa yang akan di update
	public function update($id)
	{
		//load library
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Name', 'trim|required');
		$this->form_validation->set_rules('nip', 'Nip', 'trim|required|numeric');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[5]');
		
		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('pegawai_model');
		$data['pegawai']=$this->pegawai_model->getPegawai($id);
		
		//var_dump($data['pegawai']);
		//$namaFile = $data['pegawai']->foto;
		
		//var dump liat index nya
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view
			$this->load->view('edit_pegawai_view',$data);

		}else{
			
			//jika update database berhasil hapus image yang lama
			//$this->load->view('edit_pegawai_sukses');
			$config['upload_path']			='./assets/uploads';
			$config['allowed_types']		='gif|jpg|png';
			$config['max_size']				=1000000000;
			$config['max_width']			=10240;
			$config['max_height']			=7680;
			$this->load->library('upload', $config);
			if( ! $this->upload->do_upload('userfile'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gambar Belum Ditambah !! Pastikan Upload Gambar Terlebih Dahulu </div></div>");
              	redirect('pegawai/update');
				//$this->pegawai_model->insertPegawai();
			
				//$this->load->view('tambah_pegawai_view', $error);//

			}
			else
			{
				//echo "<pre>";	
                //var_dump($this->upload->data());
                //die();
			
				$this->pegawai_model->updateById($id);
				unlink('assets/uploads/'.$namaFile);
				//hapus foto yang lama
			
				
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data Berhasil Ditambah !!</div></div>");
               	redirect('pegawai');
				//$this->load->view('tambah_pegawai_sukses');//

				

			}

		}
	}

	public function delete($id)
	{
		$where=array('id'=>$id);
		$this->load->model('pegawai_model');
		$this->pegawai_model->deleteById($id);
	$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Data Telah di hapus !!</div></div>");
		redirect('pegawai','refresh');
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */

 ?>