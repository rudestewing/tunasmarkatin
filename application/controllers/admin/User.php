<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {



public function index()
	{
		$data = array(

						'title' 	=>	'Guru & Staff Page',
						'isi'		=>	'admin/v_user' );

		$this->load->view('layouts/layout', $data, FALSE);
    }
}

?>