<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model', 'mahasiswa');
	}

	public function index()
	{
		$data['title'] = "Daftar Mahasiswa";
		$data['mahasiswa'] = $this->mahasiswa->getAllMahasiswa();
		// var_dump($data['mahasiswa']);
		// die;
		$this->load->view('templates/header', $data);
		$this->load->view('mahasiswa/index', $data);
		$this->load->view('templates/footer');
	}

	public function insert()
	{
		$data['title'] = "Insert Data Mahasiswa";

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('nim', 'NIM', 'required|trim|min_length[2]|max_length[2]');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('mahasiswa/insert', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'nim' => $this->input->post('nim'),
				'email' => $this->input->post('email'),
				'jurusan' => $this->input->post('jurusan')
			];
			$this->mahasiswa->insertNewMahasiswa($data);

			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
			Data mahasiswa berhasil ditambah</div>');
			redirect('mahasiswa');
		}
	}
}
