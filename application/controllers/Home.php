<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = array(
					'title' 	=>	'Home' , );
		$this->load->view('home/layout', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */