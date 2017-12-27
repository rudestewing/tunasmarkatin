<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data = array(

						'title' 	=>	'Admin Page',
						'isi'		=>	'admin/v_index' );

		$this->load->view('layouts/layout', $data, FALSE);
	}

	public function guru()
	{
		$data = array(

						'title' 	=>	'Guru & Staff Page',
						'isi'		=>	'admin/v_index' );

		$this->load->view('layouts/layout', $data, FALSE);
	}

	public function alumni()
	{
		$data = array(

						'title' 	=>	'Almuni Page',
						'isi'		=>	'admin/v_index' );

		$this->load->view('layouts/layout', $data, FALSE);
	}

	public function siswa()
	{
		$data = array(

						'title' 	=>	'Siswa Page',
						'isi'		=>	'admin/v_index' );

		$this->load->view('layouts/layout', $data, FALSE);
	}

	public function ekskul()
	{
		$data = array(

						'title' 	=>	'Ekskul Page',
						'isi'		=>	'admin/v_index' );

		$this->load->view('layouts/layout', $data, FALSE);
	}

	public function kegiatan()
	{
		$data = array(

						'title' 	=>	'Kegiatan Page',
						'isi'		=>	'admin/v_index' );

		$this->load->view('layouts/layout', $data, FALSE);
	}


}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */ 