<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kegiatan');
	}

	public function index()
	{
		$data_kegiatan = $this->m_kegiatan->get_all_kegiatan();
	
		$data = array(
					'data_kegiatan' => $data_kegiatan,
					'title' 	=>	'Home' , );
		$this->load->view('home/layout', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */