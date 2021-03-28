<?php
class Mahasiswa_model extends CI_Model
{
	public function getAllMahasiswa()
	{
		$result = $this->db->get('mahasiswa')->result_array();
		return $result;
	}

	public function insertNewMahasiswa($data)
	{
		$this->db->insert('mahasiswa', $data);
		return true;
	}

	public function deleteMahasiswaById($id)
	{
		$this->db->delete('mahasiswa', ['id' => $id]);
		return true;
	}

	public function getMahasiswaById($id)
	{
		$result = $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
		if ($result) {
			return $result;
		} else {
			return false;
		}
	}

	public function editMahasiswa($data)
	{
		$this->db->replace('mahasiswa', $data);
		return true;
	}
}
