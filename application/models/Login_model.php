<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function login_check($table,$where){		
	
	return $this->db->get_where($table,$where);
	
	}	

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */