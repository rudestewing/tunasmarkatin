<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {



public function index()
	{
		$data = array(

						'title' 	=>	'Guru & Staff Page',
						'isi'		=>	'admin/v_alumni' );

		$this->load->view('layouts/layout', $data, FALSE);
    }
}

?>

