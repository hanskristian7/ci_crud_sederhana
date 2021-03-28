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

		if ($this->input->post('keyword')) {
			$keyword = $this->input->post('keyword');
			$data['mahasiswa'] = $this->mahasiswa->searchMahasiswaByKeyword($keyword);
		}

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

	public function delete($id)
	{
		$this->mahasiswa->deleteMahasiswaById($id);

		$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
		Data mahasiswa berhasil dihapus</div>');
		redirect('mahasiswa');
	}

	public function edit($id)
	{
		$data['title'] = "Edit Data Mahasiswa";

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('nim', 'NIM', 'required|trim|min_length[2]|max_length[2]');
		if ($this->form_validation->run() == false) {
			$data['mahasiswa'] = $this->mahasiswa->getMahasiswaById($id);
			$this->load->view('templates/header', $data);
			$this->load->view('mahasiswa/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'id' => $id,
				'nama' => $this->input->post('nama'),
				'nim' => $this->input->post('nim'),
				'email' => $this->input->post('email'),
				'jurusan' => $this->input->post('jurusan')
			];

			$this->mahasiswa->editMahasiswa($data);

			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
			Data mahasiswa berhasil diubah</div>');
			redirect('mahasiswa');
		}
	}

	public function detail($id)
	{
		$data['mahasiswa'] = $this->mahasiswa->getMahasiswaById($id);
		$this->load->view('templates/header', $data);
		$this->load->view('mahasiswa/detail', $data);
		$this->load->view('templates/footer');
	}
}
