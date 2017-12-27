<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = array(
					'title' 	=>	'Home' , );
		$this->load->view('home/layout', $data, FALSE);
	}


	public function admin(){
		$this->load->view('layouts/v_header');
		$this->load->view('layouts/v_sidebar');
		$this->load->view('admin/v_index');
		$this->load->view('layouts/v_footer');
		
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */