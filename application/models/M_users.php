<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id_user', 'desc');
		$querry = $this->db->get();
		return $querry -> result_array(); 
	}


	public function get_by()
	{
		$this->db->where('id_user');
		$querry = $this->db->get('user');
		return $querry->row_array();
	}

	public function hapus($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('user');
	}

	public function edit($data, $id)
	{
		$this->db->where('id_user',$id);
		$this->db->update('user', $data);
	}
	function pass_cek($table,$where){		
	
	return $this->db->get_where($table,$where);
	
	}	

}

/* End of file M_users.php */
/* Location: ./application/models/M_users.php */