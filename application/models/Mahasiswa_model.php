<?php
class Mahasiswa_model extends CI_Model
{
	public function getAllMahasiswa()
	{
		$result = $this->db->get('mahasiswa')->result_array();
		return $result;
	}
}
