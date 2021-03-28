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
}
