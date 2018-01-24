<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->order_by('tanggal_buat', 'desc');

		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_by($id ='')
	{

		$this->db->where('id_siswa',$id);


		$query = $this->db->get('siswa');
		return $query->row_array();
	}
	public function hapus($data,$id)
	{
		$this->db->where('id_siswa', $id);
		$this->db->delete('siswa');
	}
	public function edit($data,$id)
	{
		$this->db->where('id_siswa',$id);
		$this->db->update('siswa', $data);
	}
	public function tambah($data)
	{
		$query = $this->db->insert('siswa', $data);
		return $query;
	}

}

/* End of file M_siswa.php */
/* Location: ./application/models/M_siswa.php */