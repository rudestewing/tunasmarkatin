<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {


public function __construct(){
	parent::__construct();
	$this->load->model('m_kegiatan');
}

public function index(){
	$data = array(	
					'title' 	=>	'Guru & Staff Page',
					'isi'		=>	'admin/v_kegiatan' );
	$this->load->view('layouts/layout', $data, FALSE);
	}


public function fetch_kegiatan(){

		$this->load->model("m_kegiatan");
		$fetch_kegiatan = $this->m_kegiatan->get_datatables();
		$data_kegiatan = array();
		
		$no=1;
		foreach($fetch_kegiatan as $row)
		{
			
			 $sub_array = array();
			 $sub_array[] = $no;
			 $sub_array[] = $row->gambar;
			 $sub_array[] = $row->judul;
			 $sub_array[] = $row->deskripsi;
			 $sub_array[] = $row->tanggal_kegiatan;
			 $sub_array[] = 'aksi';

			 $data_kegiatan[] = $sub_array;
			 $no++;
		}
		$output = array(
			//  "draw"					   =>	  intval($_POST['draw']),
			 "recordsTotal"            =>     $this->m_kegiatan->count_all_data(),
			 "recordsFiltered"         =>     $this->m_kegiatan->count_filtered_data(),
			 "data"                    =>     $data_kegiatan
		);

		echo json_encode($output);
   }




public function tambah(){
	$this->load->library('form_validation');
	// var_dump($tanggal_kegiatan);

	$v = $this->form_validation;

	$v->set_rules('id_kegiatan','ID Kegiatan','trim|required|min_length[8]|max_length[8]',array(
		'required'=>'id kegiatan harus di isi',
		'min_length'=>'harus 8 karakter',
		'max_length'=>'harus 8 karakter'
	));
	
	$v->set_rules('judul','Judul Kegiatan','trim|required|min_length[8]|max_length[32]',array(
		'required'=>'judul kegiatan harus di isi',
		'min_length'=>'minimal karakter 8 karakter',
		'max_length'=>'maksimal 32 karakter'
	));
	
	$v->set_rules('deskripsi','Deskripsi Kegiatan','trim|required|min_length[50]',array(
		'required'=>'Deskripsi kegiatan harus di isi',
		'min_length'=>'minimal 50 karakter'
	));
	
	$v->set_rules('tanggal_kegiatan','Tanggal Kegiatan','trim|required',array(
		'required'=>'Tanggal kegiatan harus di isi'
	));

	if($v -> run()===FALSE){

		$data = array(
						'title' 	=>	'Guru & Staff Page',
						'isi'		=>	'admin/v_kegiatan' );

		
		$this->load->view('layouts/layout', $data, FALSE);
		
	} else {
		// validation run()===True here
		//config untuk upload file gambar kegiatan

		if(!empty($_FILES['gambar']['name'])){
			//input dengan gambar
			$config = array(
				'upload_path'	=> './assets-admin/gambar/kegiatan/',
				'allowed_types' => 'jpg|png',
				'max_size'		=> '5000'
				);

			$this->load->library('upload',$config);
			
			if($this->upload->do_upload('gambar')){

				$id_kegiatan		= $this->input->post('id_kegiatan');
				$judul 				= $this->input->post('judul');
				$deskripsi 			= $this->input->post('deskripsi');
				$tanggal			= $this->input->post('tanggal_kegiatan');

				$gambar				= $this->upload->data();

				$date 				= date_create($tanggal); 
				$tanggal_kegiatan 	= date_format($date,'Y-m-d');
				$data_baru = array(
					'id_kegiatan'		=> $id_kegiatan,
					'judul'				=> $judul,
					'deskripsi'			=> $deskripsi,
					'tanggal_kegiatan' 	=> $tanggal_kegiatan,
					'gambar'			=> $gambar['file_name'] 
					);
	
				$this->m_kegiatan->tambah_data($data_baru);
				$this->session->set_flashdata('sukses','berhasil input nih');
				redirect('admin/kegiatan');
				

			} else {

				$kegiatan = $this->m_kegiatan->get_all_data();

				$data = array(
								'kegiatan'	=> $kegiatan,
								'title' 	=>	'Guru & Staff Page',
								'isi'		=>	'admin/v_kegiatan' );

				
				$this->load->view('layouts/layout', $data, FALSE);
			}

		} else {
			//input tanpa gambar
			// $id_kegiatan		= $this->input->post('id_kegiatan');
			// $judul 				= $this->input->post('judul');
			// $deskripsi 			= $this->input->post('deskripsi');
			// $tanggal			= $this->input->post('tanggal_kegiatan');
			
			// $this->m_kegiatan->tambah_data($data_baru);
			// $this->session->set_flashdata('sukses','berhasil input nih');
			// redirect('admin/kegiatan');

		}

	}
	


}


public function view($id_kegiatan){
	// $kegiatan = $this->m_kegiatan->get_kegiatan($id_kegiatan);

	// $data = array(	'kegiatan' 	=> $kegiatan,
	// 				'title'		=> 'Guru & Staff Page',
	// 				'isi'		=> 'admin/v_kegiatan_detail' );

	// $this->load->view('layouts/layout',$data, FALSE );
	


}


public function hapus($id_kegiatan){

}

public function update(){

}

}






?>