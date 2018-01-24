<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model {

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->order_by('tanggal_buat', 'desc');

		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_by($id ='')
	{

		$this->db->where('id_guru',$id);


		$query = $this->db->get('guru');
		return $query->row_array();
	}
	public function hapus($data,$id)
	{
		$this->db->where('id_guru', $id);
		$this->db->delete('guru');
	}
	public function edit($data, $id)
	{
		$this->db->where('id_guru', $id);
		$this->db->update('guru', $data);
	}
	public function tambah($data)
	{
		$query = $this->db->insert('guru', $data);
		return $query;
	}

}

/* End of file M_guru.php */
/* Location: ./application/models/M_guru.php */