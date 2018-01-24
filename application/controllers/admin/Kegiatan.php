<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {


// person in charge rudi
public function index()
	{
		$data = array(

						'title' 	=>	'Kegiatan Sekolah',
						'isi'		=>	'admin/v_kegiatan' );

		$this->load->view('layouts/layout', $data, FALSE);
    }
}

?>