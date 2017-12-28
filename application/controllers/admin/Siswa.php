<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {



public function index()
	{
		$data = array(

						'title' 	=>	'Guru & Staff Page',
						'isi'		=>	'admin/v_siswa' );

		$this->load->view('layouts/layout', $data, FALSE);
    }
}

?>