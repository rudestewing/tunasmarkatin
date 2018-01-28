<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//fungsi cek session disini

	}

	public function index()
	{


		$data = array(

						'title' 	=>	'Admin Page',
						'isi'		=>	'admin/v_index' );

		$this->load->view('layouts/layout', $data, FALSE);
	}


}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */ 