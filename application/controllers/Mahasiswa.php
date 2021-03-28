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
		// $data['mahasiswa'] = $this->mahasiswa->getAllMahasiswa();

		// buat pagination
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost/belajarCI/crud_sederhana/mahasiswa/index/';
		// $config['total_rows'] = $this->mahasiswa->countMahasiswa();

		//total_row masih belum ngikutin row yang dicari
		$config['total_rows'] = $this->mahasiswa->countMahasiswa();
		$config['per_page'] = 3;

		$config['num_links'] = 2;

		$config['full_tag_open'] = '<nav><ul class="pagination">';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link> href="#"';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		$config['full_tag_close'] = '</ul></nav>';

		$this->pagination->initialize($config);


		$data['start'] = $this->uri->segment(3);

		if ($this->input->post('keyword')) {
			$keyword = $this->input->post('keyword');
			$data['mahasiswa'] = $this->mahasiswa->getMahasiswaPagination($config['per_page'], $data['start'], $keyword);
			// $data['mahasiswa'] = $this->mahasiswa->searchMahasiswaByKeyword($keyword);
		} else {
			$data['mahasiswa'] = $this->mahasiswa->getMahasiswaPagination($config['per_page'], $data['start']);
		}
		// end pagination

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
