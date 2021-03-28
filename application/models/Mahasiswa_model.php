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
		return $this->db->insert('mahasiswa', $data);
	}

	public function deleteMahasiswaById($id)
	{
		return $this->db->delete('mahasiswa', ['id' => $id]);
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

	public function searchMahasiswaByKeyword($keyword)
	{
		$this->db->like('nama', $keyword);
		$this->db->or_like('jurusan', $keyword);
		$this->db->or_like('nim', $keyword);
		$this->db->or_like('email', $keyword);
		return $this->db->get('mahasiswa')->result_array();
	}
}
