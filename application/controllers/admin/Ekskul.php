<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ekskul extends CI_Controller {



public function index()
	{
		$data = array(

						'title' 	=>	'Ekskul',
						'isi'		=>	'admin/v_ekskul' );

		$this->load->view('layouts/layout', $data, FALSE);
    }
}

?>