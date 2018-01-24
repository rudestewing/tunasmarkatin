<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != "login"){
		redirect(base_url("admin/login"));
		}
	}

	public function index()
	{
		$data = array(

				'title' 		=>	'Welcome' ,
				'isi' 			=>	'user/isi', 


			);
		$this->load->view('layouts/layout', $data, FALSE);
	}

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */